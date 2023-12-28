<?php

namespace App\Http\Controllers;

use App\Models\ItemCategories;
use App\Models\Items;
use App\Models\LogActivity;
use App\Models\Services;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function main_page(Request $request)
    {
        $data = [
            'items' => Items::whereNotIn('status', ['102'])->get(), //Service
        ];

        return view('main.service-menu.service-component', $data);
    }

    public function available_items()
    {
        $data =  Items::whereNotIn('status', ['102'])->get(); //Service
        return response()->json(['message' => 'data is found', 'items' => $data], 200);
    }

    public function index(Request $request)
    {   
        $Services = Services::query()->orderBy('status', 'ASC')->orderBy('created_at', 'DESC')->with('items');

        // if($request->filled('items_id'))
        // {
        //     $Items->where('id', $request->items_id);
        // }

        return DataTables::eloquent($Services)->make(true);
    }

    public function service_show($id)
    {
        $idItem = base64_decode($id);
        $item   = Items::with('last_edit_user', 'categories')->find($idItem);
        if(!empty($item))
        {
            $categories = ItemCategories::all();
            $items      = Items::all();
            return response()->json(['data' => $item, 'categories' => $categories, 'items' => $items], 200);
        }

        return response()->json(['message' => 'Data is not found'], 400);
    }

    public function open_edit_service($id)
    {
        $idService  = base64_decode($id);
        $service    = Services::find($idService);
        if(!empty($service))
        {   
            $items      = Items::all();
            return response()->json(['data' => $service, 'items' => $items], 200);
        }

        return response()->json(['message' => 'Data is not found'], 400);
    }

    public function generate_code(){

        $res = '';
        
        do{
            $str = Str::random(3);
            $num = strval(rand(100,999));
            $arr = array($str,$num);
            $res = strtoupper(str_shuffle(join("",$arr)));
        }while(Services::where('service_id', $res)->first());

        return $res;
    }

    public function service_store(Request $request)
    {
        $request->validate([
            'service_by'            => 'required',
            'nama_kerusakan'        => 'required',
            'nomor_seri'            => 'required',
            'tanggal_kerusakan'     => 'required',
        ],[
            'service_by.required'           => 'Agen Service Belum Diisi',
            'nama_kerusakan.required'       => 'Kerusakan Barang Belum Ditentukan',
            'nomor_seri.required'           => 'Nomor Seri Belum Ditentukan',
            'tanggal_kerusakan.required'    => 'Tanggal Kerusakan Barang Belum Ditentukan',
        ]);
        
        DB::beginTransaction();
        
        try{

            // dd($request);

            $item = Items::find($request->item_id);

            if($item == null)
            {
                return response()->json(['message' => 'Data barang tidak ada di database'], 400);
            }

            $item->update([
                'status' => 102, //Service
            ]);

            $imgEvidence = NULL;

            if( $request->hasFile('picture') )
            {

                $imgName    = date('Ymd').time().rand().'.'.$request->picture->extension();
                $request->picture->move("images/service_evidences/", $imgName);
                $imgEvidence = "images/service_evidences/" . $imgName;

                // $ttdFromClient = $data->ttd;
                // if($ttdFromClient != '')
                // {  
                //     if(file_exists("assets/imgs/delivery_evidence/ttd/" . $ttdFromClient)){
                //         unlink("assets/imgs/delivery_evidence/ttd/" . $ttdFromClient);
                //     }

                //     $ttdImage = date('Ymd').time().rand().'.'.$request->Manualsign->extension();
                //     $request->Manualsign->move("assets/imgs/delivery_evidence/ttd/", $ttdImage);
                // }else{

                //     $ttdImage = date('Ymd').time().rand().'.'.$request->Manualsign->extension();
                //     $request->Manualsign->move("assets/imgs/delivery_evidence/ttd/", $ttdImage);
                // }

                
            }
        
            $data = Services::create([
                'item_id'           => $request->item_id,
                'last_edited_by_id' => auth()->user()->id, 
                'service_id'        => $this->generate_code(),
                'service_by'        => $request->service_by,
                'nama_kerusakan'    => $request->nama_kerusakan,
                'nama_barang'       => $item->nama_barang,
                'nomor_seri'        => $item->nomor_seri,
                'status'            => 107, //In Progress
                'pictures'          => $imgEvidence,
                'tanggal_kerusakan' => date('Y-m-d H:i:s', strtotime($request->tanggal_kerusakan)),
            ]);

            LogActivity::create([
                'user_id'       => auth()->user()->id,
                'code_activity' => 109,
                'activity_name' => 'Create data service',
                'data'          => $data,
            ]);
          

            DB::commit();

            return response()->json(['message' => 'Services created'], 200);

        }catch(\Throwable $th){

            DB::rollBack();

            unlink("images/service_evidences/" . $imgEvidence);
            return response()->json(['message'  => $th->getMessage()], 422);
        }

        return response()->json(['message' => 'Success'], 200);
    }

    public function service_update(Request $request, $id)
    {
        $idService = base64_decode($id);
        $request->validate([
            'service_by'            => 'required',
            'nama_kerusakan'        => 'required',
            'nomor_seri'            => 'required',
            'tanggal_kerusakan'     => 'required',
        ],[
            'service_by.required'           => 'Agen Service Belum Diisi',
            'nama_kerusakan.required'       => 'Kerusakan Barang Belum Ditentukan',
            'nomor_seri.required'           => 'Nomor Seri Belum Ditentukan',
            'tanggal_kerusakan.required'    => 'Tanggal Kerusakan Barang Belum Ditentukan',
        ]);
        
        DB::beginTransaction();
        
        try{

            $service = Services::find($idService);

            $imgEvidence = $service->pictures;

            if( $request->hasFile('picture') )
            {
                $imgEvidence = $service->pictures;

                if($imgEvidence != '')
                {  
                    if(file_exists($imgEvidence)){
                        unlink($imgEvidence);
                    }

                    $imgName = date('Ymd').time().rand().'.'.$request->picture->extension();
                    $request->picture->move("images/service_evidences/", $imgName);
                    $imgEvidence = "images/service_evidences/" . $imgName;

                }else{

                    $imgName = date('Ymd').time().rand().'.'.$request->Manualsign->extension();
                    $request->picture->move("images/service_evidences/", $imgName);
                    $imgEvidence = "images/service_evidences/" . $imgName;
                }

                
            }
        
            $service->update([
                'item_id'           => $request->item_id,
                'last_edited_by_id' => auth()->user()->id, 
                'service_by'        => $request->service_by,
                'nama_kerusakan'    => $request->nama_kerusakan,
                'nama_barang'       => $request->nama_barang,
                'nomor_seri'        => $request->nomor_seri,
                'status'            => $service->status, //In Progress
                'pictures'          => $imgEvidence,
                'tanggal_kerusakan' => date('Y-m-d H:i:s', strtotime($request->tanggal_kerusakan)),
            ]);

            LogActivity::create([
                'user_id'       => auth()->user()->id,
                'code_activity' => 109,
                'activity_name' => 'Create data service',
                'data'          => $service,
            ]);
          

            DB::commit();

            return response()->json(['message' => 'Services updated'], 200);

        }catch(\Throwable $th){

            DB::rollBack();

            unlink("images/service_evidences/" . $imgEvidence);
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

    public function service_detail($id)
    {
        $id = base64_decode($id);

        $data = 
        [
            'Services' => Services::where('item_id', $id)->orderBy('created_at', 'DESC')->get(),
            'Item'     => Items::find($id),
        ];

        return view('main.service-menu.service-detail-component', $data);
    }

    public function service_done(Request $request)
    {
        $service = Services::find($request->id_service);
        
        if($service == null)
        {
            return response()->json(['message' => 'Data service tidak ada di database'], 400);
        }

        Items::find($service->item_id)->update(['status' => '103']);

        $service->update([
            'service_notes' => $request->service_notes,
            'status'        => 108
        ]);

        return response()->json(['message' => 'Terimakasih, data sudah diterima'], 200);
    }
}
