<?php

namespace App\Http\Controllers;

use App\Models\Admin\MyDataOne;
use Illuminate\Http\Request;

class MyDataOneController extends Controller
{
    public function index(){
        return view('admin.page.my_data_one.list');
    }

    public function store(Request $request)
    {

        $request->validate([
            'item_code' => 'required|min:2|max:5',
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        $item = new MyDataOne();
        $item->item_code = $request->item_code;
        $item->name = $request->name;
        $item->barcode = $request->barcode;
        $item->qty = $request->qty;
        $item->price = $request->price;
        $item->save();

        return response()->json($item);
    }

    public function getData(){
        $data = MyDataOne::orderBy('id', 'desc')->get();
        return response()->json($data);
    }
}
