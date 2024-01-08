<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemCategories;
use App\Models\Items;
use App\Models\LogActivity;
use App\Models\StatusCode;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ItemsController extends Controller
{
    public function main_page(Request $request)
    {

        $data            = [
            'categories'     => ItemCategories::all(),
            'statusCode'     => StatusCode::whereIn('code_id', ['100', '101', '103'])->get()
        ];

        return view('main.item-menu.item-component', $data);
    }

    public function index(Request $request)
    {   
        $Items = Items::query()->with('last_edit_user');

        // dd($Items->get());
        if($request->filled('items_id'))
        {
            $Items->where('id', $request->items_id);
        }

        return DataTables::eloquent($Items)->make(true);
    }

    public function item_show($id)
    {   
        $idItem = base64_decode($id);

        $item = Items::with('statusCode', 'last_edit_user', 'categories')->find($idItem);
        if(!empty($item))
        {
            $categories = ItemCategories::all();
            $statusCode = StatusCode::whereIn('code_id', ['100', '101', '103'])->get();
            return response()->json(['data' => $item, 'categories' => $categories, 'statusCode' => $statusCode], 200);
        }

        return response()->json(['message' => 'Data is not found'], 400);
    }

    public function item_store(Request $request)
    {
        $request->validate([
            'nama_barang'   => 'required',
            'penerima'      => 'required',
            'category_id'   => 'required',
            'nomor_seri'    => 'required',
            'merk'          => 'required',
            'tipe'          => 'required',
        ],[
            'category_id.required'  => 'Kategori Barang Belum Ditentukan',
            'nama_barang.required'  => 'Nama Barang Belum Ditentukan',
            'penerima.required'     => 'Penerima Barang Belum Ditentukan',
            'nomor_seri.required'   => 'Nomor Seri Belum Ditentukan',
            'merk.required'         => 'Merk Barang Belum Ditentukan',
            'tipe.required'         => 'Tipe Barang Belum Ditentukan',
        ]);

        DB::beginTransaction();
        
        try{

            if($request->has('collective'))
            {
                $totalItem = (int)$request->count_koletif;
                if($totalItem <= 0)
                {
                    return response()->json(['message' => 'Tuliskan total barang yang ingin disimpan secara kolektif'], 401);
                }

                for($i = 1; $i <= $totalItem; $i++)
                {
                    $data = Items::create([
                        'category_id'       => $request->category_id,
                        'last_edited_by_id' => auth()->user()->id, 
                        'nama_barang'       => $request->nama_barang,
                        'penerima'          => $request->penerima,
                        'nomor_seri'        => 'rsah2023',
                        'merk'              => $request->merk,
                        'tipe'              => $request->tipe,
                        'status'            => $request->status,
                        'kode_logistik'     => $request->kode_logistik,
                        'watt'              => $request->watt,
                        'kapasitas'         => $request->kapasitas,
                        'keterangan'        => $request->keterangan,
                        'toko'              => $request->toko,
                        'harga'             => $request->harga,
                    ]);

                    LogActivity::create([
                        'user_id'       => auth()->user()->id,
                        'code_activity' => 105,
                        'activity_name' => 'Create item',
                        'data'          => $data,
                    ]);
                }
            }else{

                $data = Items::create([
                    'category_id'       => $request->category_id,
                    'last_edited_by_id' => auth()->user()->id, 
                    'nama_barang'       => $request->nama_barang,
                    'penerima'          => $request->penerima,
                    'nomor_seri'        => $request->nomor_seri,
                    'merk'              => $request->merk,
                    'tipe'              => $request->tipe,
                    'status'            => $request->status,
                    'kode_logistik'     => $request->kode_logistik,
                    'watt'              => $request->watt,
                    'kapasitas'         => $request->kapasitas,
                    'keterangan'        => $request->keterangan,
                    'toko'              => $request->toko,
                    'harga'             => $request->harga,
                ]);

                LogActivity::create([
                    'user_id'       => auth()->user()->id,
                    'code_activity' => 105,
                    'activity_name' => 'Create item',
                    'data'          => $data,
                ]);
            }

            DB::commit();

            return response()->json(['message' => 'Items created'], 200);

        }catch(\Throwable $th){

            DB::rollBack();
            return response()->json(['message'  => $th->getMessage()], 422);
        }

        

        

        return response()->json(['message' => 'Success'], 200);
    }

    public function item_update(Request $request, $id)
    {
        $idItem = base64_decode($id);

        $item = Items::find($idItem);
        if(!empty($item))
        {
            $item->update([
                'category_id'       => (int)$request->category_id,
                'last_edited_by_id' => auth()->user()->id, 
                'nama_barang'       => $request->nama_barang,
                'penerima'          => $request->penerima,
                'nomor_seri'        => $request->nomor_seri,
                'merk'              => $request->merk,
                'tipe'              => $request->tipe,
                'status'            => $request->status,
                'kode_logistik'     => $request->kode_logistik,
                'watt'              => $request->watt,
                'kapasitas'         => $request->kapasitas,
                'keterangan'        => $request->keterangan,
                'toko'              => $request->toko,
                'harga'             => $request->harga,
            ]);

            return response()->json(['data' => $item], 200);
        }

        return response()->json(['message' => 'Data is not found'], 400);
    }

}
