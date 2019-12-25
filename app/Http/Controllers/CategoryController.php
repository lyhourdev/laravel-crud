<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function list(){
        $categories = DB::table('categories')->get();

        return view('admin.page.category.list',[
            'categories' => $categories
        ]);
    }

    public function crate(){
        return view('admin.page.category.crate');
    }

    public function save_data(Request $request){
        DB::table('categories')->insert(
            [
                'category_code' => $request->category_code,
                'category_title' => $request->category_title
            ]
        );

        return redirect('/category');
    }

    public function delete_data($id){
        DB::table('categories')->where('id',  $id)->delete();
        return redirect('/category');
    }

    public function edit_data($id){
        $category = DB::table('categories')->find($id);

        return view('admin.page.category.edit',[
            'category' => $category
        ]);

    }

    public function update_data(Request $request){
        DB::table('categories')->where('id', $request->id)->update(
            [
                'category_code' => $request->category_code,
                'category_title' => $request->category_title
            ]
        );

        return redirect('/category');
    }
}
