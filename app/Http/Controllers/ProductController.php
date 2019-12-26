<?php

namespace App\Http\Controllers;

use App\Models\Admin\Item;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $items = DB::table('items')->get();
        $items = Item::paginate(6);
        return view('admin.page.item.list', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.item.crate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        DB::table('items')->insert([
//            'item_code'=>$request->item_code,
//            'name'=>$request->name,
//            'barcode'=>$request->barcode,
//            'qty'=>$request->qty,
//            'price'=>$request->price,
//        ]);

        $validatedData = $request->validate([
            'item_code' => 'required|min:2|max:5',
            'name' => 'required',
            'qty' => 'numeric',
            'price' => 'numeric',
        ]);
        //for ($i = 0; $i < 1000; $i++) {
        $item = new Item();
        $item->item_code = $request->item_code;
        $item->name = $request->name;
        $item->barcode = $request->barcode;
        $item->qty = $request->qty;
        $item->price = $request->price;
        $item->save();
        //}


        return redirect('item');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $item = DB::table('items')->find($id);
        $item = Item::find($id);
        return view('admin.page.item.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        DB::table('items')->where('id',$id)->update([
//            'item_code'=>$request->item_code,
//            'name'=>$request->name,
//            'barcode'=>$request->barcode,
//            'qty'=>$request->qty,
//            'price'=>$request->price,
//        ]);

        $item = Item::find($id);
        $item->item_code = $request->item_code;
        $item->name = $request->name;
        $item->barcode = $request->barcode;
        $item->qty = $request->qty;
        $item->price = $request->price;
        $item->save();


        return redirect('item');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        DB::table('items')->where('id',$id)->delete();
        $item = Item::find($id);
        $item->delete();
        return redirect('item');
    }
}
