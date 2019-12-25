@extends('admin.master')

@section('title','Item | List')

@section('content_header')
    @include('admin.inc.content_header',[
    'title' => 'Item Crate',
    'url' => '/item',
    'url_title' => 'Item',
    'active_title' => 'Item Crate'
    ])
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{url('/item')}}" role="form">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Item Code</label>
                    <input name="item_code" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Item Code">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Item Name</label>
                    <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Item Barcode</label>
                    <input name="barcode" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Barcode">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Item QTY</label>
                    <input name="qty" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter QTY">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Item Price</label>
                    <input name="price" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Price">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
