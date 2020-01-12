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
                <button class="btn btn-block btn-primary btn-xs" id="add_pro" data-toggle="modal"
                        data-target="#product_from">Add
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
                    <input type="hidden" id="id">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Item Code</label>
                        <input type="text" class="form-control required" id="item_code" placeholder="Enter Item Code">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Item Name</label>
                        <input type="text" class="form-control required" id="name"
                               placeholder="Enter Name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Item Barcode</label>
                        <input type="text" class="form-control required" id="barcode"
                               placeholder="Enter Barcode">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Item QTY</label>
                        <input type="text" class="form-control required" id="qty" data-required="number"
                               placeholder="Enter QTY">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Item Price</label>
                        <input type="text" class="form-control required" id="price" data-required="number"
                               placeholder="Enter Price">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="save" type="button" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>



@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
@endsection

@section('script')
    <script src="{{asset('adminlte/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        function myTrData(data, action = 'save') {
            var html = '';
            if (action == 'save') {
                html = '<tr id="tr_' + data.id + '">\n';
            }
            html += '                        <td>' + data.id + '</td>\n' +
                '                        <td>' + data.item_code + '</td>\n' +
                '                        <td>' + data.name + '</td>\n' +
                '                        <td>' + data.barcode + '</td>\n' +
                '                        <td>' + data.qty + '</td>\n' +
                '                        <td>' + data.price + '</td>\n' +
                '                        <td>' +
                '        <button class="btn btn-block btn-warning btn-xs btn-edit" data-id="' + data.id + '">Edit</button>\n' +
                '        <button class="btn btn-block btn-danger btn-xs btn-delete" data-id="' + data.id + '">Delete</button>\n' +
                '</td>\n';

            if (action == 'save') {
                html += '</tr>';
            }
            return html;
        }

        $.ajax({
            type: 'GET',
            url: '{{url('/get/my-data')}}',
            dataType: 'json',
            success: function (data_) {
                var html = '';
                jQuery.each(data_, function (key, data) {
                    html += myTrData(data);
                });
                $('tbody').prepend(html);
            },
            error: function (err) {
                alert(err);
            }
        });

        $('#save').on('click', function () {

            if (Validation()) {
                $('#save').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving');
                $('#save').prop('disabled', true);
                $.ajax({
                    type: 'POST',
                    url: '{{url('/my-data')}}',
                    dataType: 'json',
                    data: {
                        id: $('#id').val(),
                        item_code: $('#item_code').val(),
                        name: $('#name').val(),
                        barcode: $('#barcode').val(),
                        qty: $('#qty').val(),
                        price: $('#price').val(),
                        _token: $("input[name=_token]").val(),
                    },
                    success: function (data) {

                        if ($('#id').val()) {
                            $('#tr_' + data.id).html(myTrData(data, 'update'));
                            $('#product_from').modal('hide');
                        } else {
                            $('tbody').prepend(myTrData(data));
                            $('#save').html('Save');
                            $('#save').prop('disabled', false);

                            Toast.fire({
                                type: 'success',
                                title: 'ទិនន័យបញ្ចូល បានជោគជ័យ !!!!'
                            });
                        }
                        add_or_clear_data();
                    },
                    error: function (err) {
                        alert(err);
                        $('#save').html('Save');
                        $('#save').prop('disabled', false);
                    }
                });
            }
        });

        $("tbody").delegate(".btn-edit", "click", function () {
            $.ajax({
                type: 'GET',
                url: '{{url('/get/my-data/edit')}}',
                dataType: 'json',
                data: {
                    id: $(this).data('id')
                },
                success: function (data) {
                    add_or_clear_data(data);
                    $('#save').text('Update');
                    $('#save').prop('disabled', false);
                    $('#product_from').modal('show');
                },
                error: function (err) {
                    alert(err);
                }
            });
        });

        $("tbody").delegate(".btn-delete", "click", function () {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: 'DELETE',
                        url: '{{url('/my-data')}}',
                        dataType: 'json',
                        data: {
                            id: $(this).data('id'),
                            _token: $("input[name=_token]").val(),
                        },
                        success: function (data) {
                            $('#tr_' + data.id).remove();
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        },
                        error: function (err) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Delete Fale',
                                footer: '<a href>Why do I have this issue?</a>'
                            });
                        }
                    });

                }
            });
        });

        $('#add_pro').on('click', function () {
            $('#save').text('Save');
            $('#save').prop('disabled', false);
            add_or_clear_data();
        });

        function add_or_clear_data(value = {}) {
            $('#id').val(value.id ? value.id : '');
            $('#item_code').val(value.item_code ? value.item_code : '');
            $('#name').val(value.name ? value.name : '');
            $('#barcode').val(value.barcode ? value.barcode : '');
            $('#qty').val(value.qty ? value.qty : '');
            $('#price').val(value.price ? value.price : '');
        }

        function Validation() {
            var my_Validation = true;
            $(".required").removeClass("is-invalid");
            $(".required").each(function () {
                if (!$(this).val()) {
                    $(this).addClass("is-invalid");
                    my_Validation = false;
                } else {
                    if ($(this).data('required')) {
                        if ($(this).data('required') == 'number') {
                            if (!$.isNumeric($(this).val())) {
                                $(this).addClass("is-invalid");
                                $(this).val('');
                                my_Validation = false;
                            }
                        }
                    }
                }
            });

            return my_Validation;
        }


    </script>
@endsection
