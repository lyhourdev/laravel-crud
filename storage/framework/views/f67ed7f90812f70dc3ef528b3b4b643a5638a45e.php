<?php $__env->startSection('title','Category | List'); ?>
<?php $__env->startSection('content_header'); ?>
    <?php echo $__env->make('admin.inc.content_header',[
    'title' => 'Category List',
    'float_right' => false
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <a href="<?php echo e(url('/category/crate')); ?>" class="btn btn-block btn-primary btn-sm">Add Category</a>
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
                    <th>Category Code</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($category->id); ?></td>
                        <td><?php echo e($category->category_code); ?></td>
                        <td><?php echo e($category->category_title); ?></td>
                        <td>
                            <a href="<?php echo e(url('/category/edit/'.$category->id)); ?>" class="btn btn-block btn-warning btn-xs">Edit</a>
                            <form method="post" action="<?php echo e(url('/category/'.$category->id)); ?>">
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Leap Lyhour\PhpstormProjects\laravel-crud\resources\views/admin/page/category/list.blade.php ENDPATH**/ ?>