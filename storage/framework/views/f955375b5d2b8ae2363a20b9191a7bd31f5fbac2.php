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
                <tr>
                    <?php echo csrf_field(); ?>
                    <th>0</th>
                    <th>
                        <span class="er_item_code required"></span>
                        <input type="text" class="form-control required" id="item_code" placeholder="Enter Item Code">
                    </th>
                    <th>
                        <span class="er_name required"></span>
                        <input type="text" class="form-control required" id="name" placeholder="Enter Name">
                    </th>
                    <th>
                        <span class="er_barcode required"></span>
                        <input type="text" class="form-control required" id="barcode" placeholder="Enter Barcode">
                    </th>
                    <th>
                        <span class="er_qty required"></span>
                        <input type="text" class="form-control required" id="qty" data-required="number"
                               placeholder="Enter QTY">
                    </th>
                    <th>
                        <span class="er_price required"></span>
                        <input type="text" class="form-control required" id="price" data-required="number"
                               placeholder="Enter Price">
                    </th>
                    <th>
                        <button type="button" class="btn btn-default" id="save">Save</button>
                        <button id="clear" type="button" class="btn btn-primary">Clear</button>
                    </th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>




<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>

        $.ajax({
            type: 'GET',
            url: '<?php echo e(url('/get/my-data-one')); ?>',
            dataType: 'json',
            success: function (datas) {
                var html = '';
                jQuery.each(datas, function (key, data) {
                    html += myTr(data);
                });

                $('tbody').html(html);
            },
            error: function (err) {

            }
        });

        $('#save').on('click', function () {
            clear_err();
            $.ajax({
                type: 'POST',
                url: '<?php echo e(url('/my-data-one')); ?>',
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
                    $('tbody').prepend(myTr(data));
                    clear();
                    clear_err();
                },
                error: function (err) {
                    console.log(err.responseJSON.errors);
                    jQuery.each(err.responseJSON.errors, function (key, value) {
                        $('#' + key).addClass("is-invalid");
                        $('.er_' + key).html('<label class="col-form-label" for="inputError" style="color: red;" wfd-id="21"><i class="far fa-times-circle"></i> ' + value + '</label>');
                        $('#' + key).val('');
                    });
                }
            });
        });

        $('#clear').on('click',function () {
            clear();
            clear_err();
        });

        function myTr(data) {
            return '<tr>\n' +
                '                    <td>' + data.id + '</td>\n' +
                '                    <td>' + data.item_code + '</td>\n' +
                '                    <td>' + data.name + '</td>\n' +
                '                    <td>' + data.barcode + '</td>\n' +
                '                    <td>' + data.qty + '</td>\n' +
                '                    <td>' + data.price + '</td>\n' +
                '                    <td>aaaaaa</td>\n' +
                '                </tr>';
        }

        function clear() {
            $('#item_code').val('');
            $('#name').val('');
            $('#barcode').val('');
            $('#qty').val('');
            $('#price').val('');
        }
        function clear_err() {
            $(".required").removeClass("is-invalid");
            $(".required").html('');
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Leap Lyhour\PhpstormProjects\laravel-crud\resources\views/admin/page/my_data_one/list.blade.php ENDPATH**/ ?>