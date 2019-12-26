@extends('admin.master')

@section('title','Item | List')

@section('content_header')
    @include('admin.inc.content_header',[
    'title' => 'product Crate',
    'url' => '/product',
    'url_title' => 'product',
    'active_title' => 'product Crate'
    ])
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{url('/product')}}" role="form">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Item Code</label>
                    @error('item_code')
                        <label class="col-form-label" for="inputError" style="color: red;"><i class="far fa-times-circle"></i> {{ $message }}</label>
                    @enderror
                    <input value="{{old('item_code')}}" name="item_code" type="text" class="form-control @error('item_code') is-invalid @enderror " id="exampleInputEmail1" placeholder="Enter Item Code">


                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Item Name</label>
                    @error('name')
                    <label class="col-form-label" for="inputError" style="color: red;"><i class="far fa-times-circle"></i> {{ $message }}</label>
                    @enderror
                    <input value="{{old('name')}}" name="name" type="text" class="form-control @error('name') is-invalid @enderror " id="exampleInputEmail1" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Item Barcode</label>
                    <input value="{{old('barcode')}}" name="barcode" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Barcode">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Item QTY</label>
                    @error('qty')
                    <label class="col-form-label" for="inputError" style="color: red;"><i class="far fa-times-circle"></i> {{ $message }}</label>
                    @enderror
                    <input value="{{old('qty')}}" name="qty" type="text" class="form-control @error('qty') is-invalid @enderror " id="exampleInputEmail1" placeholder="Enter QTY">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Item Price</label>
                    @error('price')
                    <label class="col-form-label" for="inputError" style="color: red;"><i class="far fa-times-circle"></i> {{ $message }}</label>
                    @enderror
                    <input value="{{old('price')}}" name="price" type="text" class="form-control @error('qty') is-invalid @enderror " id="exampleInputEmail1" placeholder="Enter Price">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
