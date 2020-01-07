<?php $__env->startSection('title','Item | List'); ?>

<?php $__env->startSection('content_header'); ?>
    <?php echo $__env->make('admin.inc.content_header',[
'title' => 'Item List',
'float_right' => false
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <span id="paginate"></span>

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
                    <?php echo csrf_field(); ?>
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


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        // $('.btn_aa').on('click',function () {
        //     console.log('A is Click !!');
        //     $('#btn_bb').html('ZZZZZZ');
        // });
        // $('#btn_bb').on('click',function () {
        //     console.log('B is Click !!');
        // });
        // $('button').on('click',function () {
        //     console.log('C is Click !!');
        // });


        // var jkhaskjhd = 'adasdasdd';
        // console.log(jkhaskjhd);
        //
        // var my_array = [
        //     'a',
        //     'b',
        //     'c',
        //     'd'
        // ];
        // console.log(my_array.length);
        //
        // jQuery.each(my_array, function(key, value) {
        //     // do something with `item` (or `this` is also `item` if you like)
        //     console.log(key+' => '+value);
        // });
        // console.log('========================');
        // var array_json = {
        //     a:'avvvv',
        //     b:'b',
        //     c:'cxxxx'
        // };
        //
        //
        // jQuery.each(array_json, function(key, value) {
        //     // do something with `item` (or `this` is also `item` if you like)
        //     console.log(key+' => '+value);
        // });

        var xx = 10;
        var hhh = '<h1>aaaaaa</h1>\n' + '<h1>' + xx + '</h1>';
        hhh += 'XXXXXXX\n';
        hhh += 'VVVVVV\n';
        hhh += 'CCCCCC\n';
        console.log(hhh);
        // $('#abcd').html(hhh);
        //
        $('#save').on('click', function () {

            $.ajax({
                type: 'POST',
                url: '<?php echo e(url('/product')); ?>',
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
                    var html = ' <tr>\n' +
                        '                        <td>' + data.id + '</td>\n' +
                        '                        <td>' + data.item_code + '</td>\n' +
                        '                        <td>' + data.name + '</td>\n' +
                        '                        <td>' + data.barcode + '</td>\n' +
                        '                        <td>' + data.qty + '</td>\n' +
                        '                        <td>' + data.price + '</td>\n' +
                        '                        <td>\n' +
                        '        <button class="btn btn-block btn-warning btn-xs">Edit</button>\n' +
                        '         <button class="btn btn-block btn-danger btn-xs">Delete</button>\n' +
                        '    </td>' +
                        '                    </tr>';

                    //$('tbody').append(html);//add ពីក្រោម
                    $('tbody').prepend(html);//add ពីលើ
                    $('#product_from').modal('hide');

                    $('#item_code').val('');
                    $('#name').val('');
                    $('#barcode').val('');
                    $('#qty').val('');
                    $('#price').val('');

                },
                error: function (err) {
                    alert('no');
                }
            });

        });

        function getMyData(url){
            $.ajax({
                type: 'GET',
                url: url,
                dataType: 'json',
                data: {},
                success: function (value) {
                    // console.log(value.paginate);
                    var html = '';
                    jQuery.each(value.my_value.data, function (key, data_) {
                        html += ' <tr id="tr_' + data_.id + '">\n' +
                            '                        <td>' + data_.id + '</td>\n' +
                            '                        <td>' + data_.item_code + '</td>\n' +
                            '                        <td>' + data_.name + '</td>\n' +
                            '                        <td>' + data_.barcode + '</td>\n' +
                            '                        <td>' + data_.qty + '</td>\n' +
                            '                        <td>' + data_.price + '</td>\n' +
                            '                        <td>\n' +
                            '        <button class="btn btn-block btn-warning btn-xs">Edit</button>\n' +
                            '        <button class="btn btn-block btn-danger btn-xs btn_delete" data-id="' + data_.id + '">Delete</button>\n' +
                            '    </td>' +
                            '                    </tr>';
                    });
                    $('tbody').html(html);//add ពីលើ
                    $('#paginate').html(value.paginate);//add ពីលើ
                },
                error: function (err) {
                    alert('no');
                }
            });
        }

        getMyData('<?php echo e(url('/product/data')); ?>');

        $(".content").delegate(".my_pagination", "click", function(e) {
            e.preventDefault();
            console.log($(this).attr('href'));
            getMyData($(this).attr('href'));
        });
        $(".content").delegate(".btn_delete", "click", function() {
            console.log($(this).data('id'));

            if(confirm("Press a button yes to delete !!")){
                $.ajax({
                    type: 'DELETE',
                    url: '<?php echo e(url('product')); ?>',
                    dataType: 'json',
                    data: {
                        id:$(this).data('id'),
                        _token: $("input[name=_token]").val(),
                    },
                    success: function (value) {
                        console.log(value);
                        $('#tr_'+value.id).remove();
                    },
                    error: function (err) {
                        alert('no');
                    }
                });
            }

        });




    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Leap Lyhour\PhpstormProjects\laravel-crud\resources\views/admin/page/product/list.blade.php ENDPATH**/ ?>