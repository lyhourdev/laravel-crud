@extends('admin.master')

@section('title','User | Create')

@section('content_header')
    @include('admin.inc.content_header',[
    'title' => 'User Crate',
    'url' => '/user',
    'url_title' => 'User',
    'active_title' => 'User Crate'
    ])
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Input Your Info</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{url('/user')}}" role="form">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>User Name</label>
                    <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Your Name">
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <select name="gender" class="form-control">
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>DOB</label>
                    <input name="dob" type="date" class="form-control">
                </div>

                <div class="form-group">
                    <label>Phone</label>
                    <input name="phone" type="text" class="form-control" placeholder="Enter Your Phone Number">
                </div>
                <div class="form-group">
                    <label>E-Mail</label>
                    <input name="email" type="email" class="form-control" placeholder="Enter Your E-Mail">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
