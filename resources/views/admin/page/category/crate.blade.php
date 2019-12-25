@extends('admin.master')

@section('title','Category | Crate')

@section('content_header')
    @include('admin.inc.content_header',[
    'title' => 'Category Crate',
    'url' => '/category',
    'url_title' => 'User',
    'active_title' => 'User Crate'
    ])
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{url('/category')}}" role="form">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Category Code</label>
                    <input name="category_code" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Category Code">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Category Title</label>
                    <input name="category_title" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Category Title">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
