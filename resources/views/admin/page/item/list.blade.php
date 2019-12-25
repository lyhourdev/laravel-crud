@extends('admin.master')

@section('title','Item | List')

@section('content_header')
    @include('admin.inc.content_header',[
'title' => 'Item List',
'float_right' => false
])
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <a href="{{url('/item/crate')}}" class="btn btn-block btn-primary btn-xs">Add Item</a>
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
                    <th>Item Code</th>
                    <th>Item Name</th>
                    <th>Barcode</th>
                    <th>QTY</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->item_code}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->barcode}}</td>
                        <td>{{$item->qty}}</td>
                        <td>{{$item->price}}</td>
                        <td>
                            <a href="{{url('/item/edit/'.$item->id)}}" class="btn btn-block btn-warning btn-xs">Edit</a>
                            <form method="post" action="{{url('/item/'.$item->id)}}">
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
