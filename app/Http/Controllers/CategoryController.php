<?php

namespace App\Http\Controllers;

use App\Models\ItemCategories;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class CategoryController extends Controller
{
    public function index(Request $request)
    {   
        $ItemCategories = ItemCategories::query();
        if($request->filled('category_id'))
        {
            $ItemCategories->where('id', $request->category_id);
        }

        return DataTables::eloquent($ItemCategories)->make(true);
    }

    public function category_show($id)
    {   
        $idCategory = base64_decode($id);

        $category = ItemCategories::find($idCategory);
        if(!empty($category))
        {
            return response()->json(['data' => $category], 200);
        }

        return response()->json(['message' => 'Data is not found'], 400);
    }

    public function category_store(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ]);

        ItemCategories::create([
            'category_name' => $request->category_name,
            'stock'         => 0,
        ]);

        return response()->json(['message' => 'Success'], 200);
    }

    public function category_update(Request $request, $id)
    {
        $idCategory = base64_decode($id);

        $category = ItemCategories::find($idCategory);

        if(!empty($category))
        {
            $category->update([
                'category_name' => $request->edit_category_name,
            ]);
            return response()->json(['data' => $category], 200);
        }

        return response()->json(['message' => 'Data is not found'], 400);
    }
}
