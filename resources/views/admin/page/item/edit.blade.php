@extends('admin.master')

@section('title','Item | Edit')

@section('content_header')
    @include('admin.inc.content_header',[
    'title' => 'Item Edit',
    'url' => '/item',
    'url_title' => 'Item',
    'active_title' => 'Item Edit'
    ])
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{url('/item/'.$item->id)}}" role="form">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Item Code</label>
                    <input value="{{$item->item_code}}" name="item_code" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Item Code">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Item Name</label>
                    <input value="{{$item->name}}" name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Item Barcode</label>
                    <input value="{{$item->barcode}}" name="barcode" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Barcode">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Item QTY</label>
                    <input value="{{$item->qty}}" name="qty" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter QTY">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Item Price</label>
                    <input value="{{$item->price}}" name="price" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Price">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
