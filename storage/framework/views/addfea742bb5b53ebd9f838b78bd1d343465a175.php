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
                <a href="<?php echo e(url('/item/crate')); ?>" class="btn btn-block btn-primary btn-xs">Add Item</a>
            </h3>

            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <form method="get" action="<?php echo e(url('item')); ?>">
                        <input value="<?php echo e($search); ?>" type="text" name="search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
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
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item->id); ?></td>
                        <td><?php echo e($item->item_code); ?></td>
                        <td><?php echo e($item->name); ?></td>
                        <td><?php echo e($item->barcode); ?></td>
                        <td><?php echo e($item->qty); ?></td>
                        <td><?php echo e($item->price); ?></td>
                        <td>
                            <a href="<?php echo e(url('/item/edit/'.$item->id)); ?>" class="btn btn-block btn-warning btn-xs">Edit</a>
                            <form method="post" action="<?php echo e(url('/item/'.$item->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('delete'); ?>
                                <button type="submit" class="btn btn-block btn-danger btn-xs">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <?php echo e($items->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Leap Lyhour\PhpstormProjects\laravel-crud\resources\views/admin/page/item/list.blade.php ENDPATH**/ ?>