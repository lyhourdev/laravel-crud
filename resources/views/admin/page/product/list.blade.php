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
                <button class="btn btn-block btn-primary btn-xs" data-toggle="modal" data-target="#product_from">Add
                    Item
                </button>
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
                <td>aaaaaa</td>
                <td>aaaaaa</td>
                <td>aaaaaa</td>
                <td>aaaaaa</td>
                <td>aaaaaa</td>
                <td>aaaaaa</td>
                <td>aaaaaa</td>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    <div class="modal fade" id="product_from">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Item Code</label>
                        <input value="" name="item_code" type="text" class="form-control  " id="item_code"
                               placeholder="Enter Item Code">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Item Name</label>
                        <input value="" name="name" type="text" class="form-control  " id="name"
                               placeholder="Enter Name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Item Barcode</label>
                        <input value="" name="barcode" type="text" class="form-control" id="barcode"
                               placeholder="Enter Barcode">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Item QTY</label>
                        <input value="" name="qty" type="text" class="form-control  " id="qty"
                               placeholder="Enter QTY">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Item Price</label>
                        <input value="" name="price" type="text" class="form-control  " id="price"
                               placeholder="Enter Price">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="save" type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection

@section('script')
    <script>

        var my_array = [
            "lyhour",
            "male",
            10
        ];
        console.log(my_array[1]);


        var my_json = {
            name:"lyhour",
            gender:"male",
            age:10
        };
        console.log(my_json.name);


        var my_json_in_array = [
            {
                name:"lyhour",
                gender:"male",
                age:10
            },
            {
                name:"vin",
                gender:"male",
                age:10
            }
        ];
        console.log(my_json_in_array[1].gender);


        var abc = {
            name:[
                'name1',
                'name3',
            ],
            gender:[
                'gender1',
                'gender2',
            ]
        };

        console.log(abc.gender[1]);

        var abcd = {
            name:[
                [
                    "a",
                    {
                        a:"a1"
                    }
                ],
                'name3',
            ],
            gender:[
                'gender1',
                'gender2',
            ]
        };
        console.log('=================================');
        console.log(abcd.name[0][0]);
        console.log(abcd.name[0][1].a);
        console.log(abcd.name[1]);

        var test_ = 10;
        //console.log($('#item_code').val());

        $('#save').on('click', function () {

            $.ajax({
                type: 'POST',
                url: '{{url('/product')}}',
                dataType: 'json',
                data: {
                    item_code: $('#item_code').val(),
                    name: $('#name').val(),
                    barcode: $('#barcode').val(),
                    qty: $('#qty').val(),
                    price: $('#price').val(),
                    _token: $("input[name=_token]").val(),
                },
                success: function (data) {
                    console.log(data);
                },
                error: function (err) {
                    alert('no');
                }
            });

        });

    </script>
@endsection
