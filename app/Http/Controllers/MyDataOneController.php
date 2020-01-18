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
            'barcode' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        if ($request->id == 0){
            $item = new MyDataOne();
        }else{
            $item = MyDataOne::find($request->id);
        }

        $item->item_code = $request->item_code;
        $item->name = $request->name;
        $item->barcode = $request->barcode;
        $item->qty = $request->qty;
        $item->price = $request->price;
        $item->save();

        return response()->json($item);
    }

    public function getData(){
        $data = MyDataOne::orderBy('id', 'desc')->paginate(5);
        return response()->json([
            'my_data'=>$data,
            'pagination'=>view('admin.page.my_data_one.pagination',['data'=>$data])->render()
        ]);
    }

    public function delete(Request $request){
        $data = MyDataOne::find($request->id);
        $data->delete();
        return response()->json($data);
    }

    public function show(Request $request){

        return response()->json(MyDataOne::find($request->id));

    }
}
