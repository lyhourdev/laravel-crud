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

        return view('admin.page.product.list');
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
    public function edit(Request $request)
    {
//        $item = DB::table('items')->find($id);
        $item = Item::find($request->id);
        return response()->json($item);
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

        $item = new Item();
        $item->item_code = $request->item_code;
        $item->name = $request->name;
        $item->barcode = $request->barcode;
        $item->qty = $request->qty;
        $item->price = $request->price;
        $item->save();

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
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->id){
            $item = Item::find($request->id);
        }else{
            $item = new Item();
        }

        $item->item_code = $request->item_code;
        $item->name = $request->name;
        $item->barcode = $request->barcode;
        $item->qty = $request->qty;
        $item->price = $request->price;
        $item->save();

        return response()->json($item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
//        DB::table('items')->where('id',$id)->delete();
        $item = Item::find($request->id);
        $item->delete();
        return response()->json($item);
    }

    public function getProductData(){
        $peoduct = Item::orderBy('id', 'desc')->paginate(5);
        return response()->json([
            'my_value' => $peoduct,
            'paginate' => view('admin.inc.paginate',['peoduct'=>$peoduct])->render()
        ]);
//        return response()->json([
//            'data'=>$peoduct,
//            'paginate'=>view('admin.inc.paginate',['peoduct'=>$peoduct])->render()
//        ]);

    }
}
