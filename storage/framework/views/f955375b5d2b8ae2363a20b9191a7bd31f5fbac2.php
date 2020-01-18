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
                    <th id="id">0</th>
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
    <span id="pagination"></span>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo e(asset('adminlte')); ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <!-- SweetAlert2 -->
    <script src="<?php echo e(asset('adminlte')); ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script>

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        getData('<?php echo e(url('/get/my-data-one')); ?>');

        function getData(my_url) {
            $.ajax({
                type: 'GET',
                url: my_url,
                dataType: 'json',
                success: function (datas) {
                    console.log(datas);
                    var html = '';
                    jQuery.each(datas.my_data.data, function (key, data) {
                        html += myTr(data);
                    });
                    $('tbody').html(html);

                    $('#pagination').html(datas.pagination);
                },
                error: function (err) {

                }
            });
        }

        $("#pagination").delegate(".my_link", "click", function (event) {
            event.preventDefault();
            getData($(this).attr("href"));
        });

        $('#save').on('click', function () {
            clear_err();
            $.ajax({
                type: 'POST',
                url: '<?php echo e(url('/my-data-one')); ?>',
                dataType: 'json',
                data: {
                    id: $('#id').text(),
                    item_code: $('#item_code').val(),
                    name: $('#name').val(),
                    barcode: $('#barcode').val(),
                    qty: $('#qty').val(),
                    price: $('#price').val(),
                    _token: $("input[name=_token]").val(),
                },
                success: function (data) {
                    if ($('#id').text() - 0 == 0) {
                        $('tbody').prepend(myTr(data));
                    } else {
                        $('#tr_' + data.id).html('                    <td>' + data.id + '</td>\n' +
                            '                    <td>' + data.item_code + '</td>\n' +
                            '                    <td>' + data.name + '</td>\n' +
                            '                    <td>' + data.barcode + '</td>\n' +
                            '                    <td>' + data.qty + '</td>\n' +
                            '                    <td>' + data.price + '</td>\n' +
                            '                    <td>');
                    }

                    add_and_clear();
                    clear_err();
                    Toast.fire({
                        type: 'success',
                        title: 'ទិន័យបញ្ចូលបានជោគជ័យ !!!'
                    });
                },
                error: function (err) {
                    // console.log(err.responseJSON.errors);
                    // console.log(err.responseJSON.errors);
                    jQuery.each(err.responseJSON.errors, function (key, value) {
                        $('#' + key).addClass("is-invalid");
                        $('.er_' + key).html('<label class="col-form-label" for="inputError" style="color: red;"><i class="far fa-times-circle"></i> ' + value + '</label>');
                        $('#' + key).val('');
                    });
                    Toast.fire({
                        type: 'error',
                        title: 'ទិន័យបញ្ចូលបានបរាជ័យ !!!'
                    })
                }
            });
        });

        // var array__ = [
        //     'a',
        //     'b',
        //     'c'
        // ];
        // console.log(array__);
        // jQuery.each(array__, function (key, value) {
        //     console.log('key = '+key+' value = '+ value);
        // });
        //
        // var array_obj = {
        //     a:'ក',
        //     b:'ខ',
        //     c:'គ'
        // };
        // console.log(array_obj);
        // jQuery.each(array_obj, function (key, value) {
        //     console.log('key = '+key+' value = '+ value);
        // });

        $('#clear').on('click', function () {
            add_and_clear();
            clear_err();
        });

        $("tbody").delegate(".btn-delete", "click", function () {
            // console.log($(this).data('id'));
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
                        url: '<?php echo e(url('/my-data-one')); ?>',
                        dataType: 'json',
                        data: {
                            id: $(this).data('id'),
                            _token: $("input[name=_token]").val(),
                        },
                        success: function (data) {
                            // console.log(data);
                            $('#tr_' + data.id).remove();
                            Swal.fire(
                                'Deleted!',
                                'លុបទិន័យបានជៅគជ័យ !!!',
                                'success'
                            );
                            // Toast.fire({
                            //     type: 'success',
                            //     title: 'លុបទិន័យបានជៅគជ័យ !!!'
                            // });
                            add_and_clear();
                            clear_err();
                        },
                        error: function (err) {
                            Toast.fire({
                                type: 'error',
                                title: 'លុបទិន័យបានបរាជ័យ !!!'
                            });
                            add_and_clear();
                            clear_err();
                        }
                    });
                }else {
                    add_and_clear();
                    clear_err();
                }
            })


        });

        function myTr(data) {
            return '<tr id="tr_' + data.id + '" data-id="' + data.id + '">\n' +
                '                    <td>' + data.id + '</td>\n' +
                '                    <td>' + data.item_code + '</td>\n' +
                '                    <td>' + data.name + '</td>\n' +
                '                    <td>' + data.barcode + '</td>\n' +
                '                    <td>' + data.qty + '</td>\n' +
                '                    <td>' + data.price + '</td>\n' +
                '                    <td>' +
                '<button class="btn btn-block btn-danger btn-xs btn-delete" data-id="' + data.id + '">Delete</button>' +
                '</td>\n' +
                '                </tr>';
        }

        $("tbody").delegate("tr", "click", function () {
            $.ajax({
                type: 'GET',
                url: '<?php echo e(url('/shoe/my-data-one')); ?>',
                dataType: 'json',
                data: {
                    id: $(this).data('id'),
                },
                success: function (data) {
                    // console.log(data);
                    add_and_clear(data);
                },
                error: function (err) {

                }
            });
        });

        function add_and_clear(data = {}) {
            $('#save').text(data.id ? 'Update' : 'Save');
            $('#id').text(data.id ? data.id : 0);
            $('#item_code').val(data.item_code ? data.item_code : '');
            $('#name').val(data.name ? data.name : '');
            $('#barcode').val(data.barcode ? data.barcode : '');
            $('#qty').val(data.qty ? data.qty : '');
            $('#price').val(data.price ? data.price : '');
        }

        function clear_err() {
            $(".required").removeClass("is-invalid");
            $(".required").html('');
        }

        // eval("var bbbb = 10;");
        // console.log(bbbb);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Leap Lyhour\PhpstormProjects\laravel-crud\resources\views/admin/page/my_data_one/list.blade.php ENDPATH**/ ?>