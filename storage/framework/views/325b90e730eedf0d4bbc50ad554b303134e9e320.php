<?php
    $float_right_ = isset($float_right)?$float_right:true;
?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?php echo e($title); ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <?php if($float_right_): ?>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(url($url)); ?>/#"><?php echo e($url_title); ?></a></li>
                        <li class="breadcrumb-item active"><?php echo e($active_title); ?></li>
                    </ol>
                <?php endif; ?>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<?php /**PATH C:\Users\Leap Lyhour\PhpstormProjects\laravel-crud\resources\views/admin/inc/content_header.blade.php ENDPATH**/ ?>