<?php $__env->startSection('title','Item | Edit'); ?>

<?php $__env->startSection('content_header'); ?>
    <?php echo $__env->make('admin.inc.content_header',[
    'title' => 'Item Edit',
    'url' => '/item',
    'url_title' => 'Item',
    'active_title' => 'Item Edit'
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="<?php echo e(url('/item/'.$item->id)); ?>" role="form">
            <?php echo csrf_field(); ?>
            <?php echo method_field('patch'); ?>
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Item Code</label>
                    <input value="<?php echo e($item->item_code); ?>" name="item_code" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Item Code">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Item Name</label>
                    <input value="<?php echo e($item->name); ?>" name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Item Barcode</label>
                    <input value="<?php echo e($item->barcode); ?>" name="barcode" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Barcode">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Item QTY</label>
                    <input value="<?php echo e($item->qty); ?>" name="qty" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter QTY">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Item Price</label>
                    <input value="<?php echo e($item->price); ?>" name="price" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Price">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Leap Lyhour\PhpstormProjects\laravel-crud\resources\views/admin/page/item/edit.blade.php ENDPATH**/ ?>