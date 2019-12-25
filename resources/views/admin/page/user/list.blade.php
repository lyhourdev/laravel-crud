
@extends('admin.master')

@section('title','User | List')

@section('content_header')
    @include('admin.inc.content_header',[
    'title' => 'User List',
    'float_right' => false
    ])
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="{{url('/user/create')}}" type="button" class="btn btn-block btn-primary">Add User</a>
                    </h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right"
                                   placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>DOB</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($user_data as $v)
                            <tr>
                                <td>{{$v->id}}</td>
                                <td>{{$v->name}}</td>
                                <td>{{$v->gender}}</td>
                                <td>{{$v->dob}}</td>
                                <td>{{$v->phone}}</td>
                                <td>{{$v->email}}</td>
                                <td>
                                    <a href="{{url('/user/edit/'.$v->id)}}" class="btn btn-block btn-warning btn-xs">Edit</a>
                                    <form method="post" action="{{url('/user/'.$v->id)}}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-block btn-danger btn-xs">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
