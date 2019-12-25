@extends('admin.master')

@section('title','Category | List')
@section('content_header')
    @include('admin.inc.content_header',[
    'title' => 'Category List',
    'float_right' => false
    ])
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <a href="{{url('/category/crate')}}" class="btn btn-block btn-primary btn-sm">Add Category</a>
            </h3>

            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

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
                    <th>Category Code</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->category_code}}</td>
                        <td>{{$category->category_title}}</td>
                        <td>
                            <a href="{{url('/category/edit/'.$category->id)}}" class="btn btn-block btn-warning btn-xs">Edit</a>
                            <form method="post" action="{{url('/category/'.$category->id)}}">
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
@endsection
