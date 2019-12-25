<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function List(){

        $all_user = DB::table('users')->get();
        return view('admin.page.user.list',[
            'user_data' => $all_user
        ]);
    }
    public function Create(){
        return view('admin.page.user.create');
    }

    public function Submit(Request $request){
        DB::table('users')->insert(
            [
                'name'=>$request->name,
                'gender'=>$request->gender,
                'dob'=>$request->dob,
                'phone'=>$request->phone,
                'email'=>$request->email
            ]
        );
        return redirect('/user');
    }

    public function delete_data($id){
        $my_user = DB::table('users')->where('id',$id)->delete();
        return redirect('/user');
    }

    public  function edit_data($id){
        $my_user = DB::table('users')->find($id);
        return view('admin.page.user.edit',[
            'user_data' => $my_user,
        ]);
    }

    public function update_data(Request $request){
        DB::table('users')->where('id', $request->id)->update(
            [
                'name'=>$request->name,
                'gender'=>$request->gender,
                'dob'=>$request->dob,
                'phone'=>$request->phone,
                'email'=>$request->email
            ]
        );
        return redirect('/user');
    }

}
