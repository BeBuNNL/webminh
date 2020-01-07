<?php $__env->startSection('title'); ?>
    <title>Add Attribute</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <h1>
            Attributes
            <small>attributes of all products</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('ad.dashboard')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Products</a></li>
            <li><a href="<?php echo e(route('ad.attribute.list.get')); ?>">Attributes</a></li>
            <li class="active">Add Attribute</li>
        </ol>
    </section>

    <?php if(count($errors) > 0 || session('error')): ?>
        <div class="alert alert-danger" role="alert">
            <strong>Warning!</strong><br>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($err); ?><br/>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <strong>Success!</strong>
            <button type="button" class="close" data-dismiss="alert">×</button>
            <br/>
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <section class="content ">
        <?php
        if (isset($attribute))
            $id = $attribute->id;
        else
            $id = 0;
        ?>
        <div class="row ">
            <!-- left column -->
            <div class="col-md-6 ">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Add attribute</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="<?php echo e(route("ad.attribute.form.post",[$id])); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <div class="box-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input name="name" type="text" class="form-control"
                                       value="<?php echo e(old('name',isset($attribute)?$attribute->name:"")); ?>"
                                       placeholder="Enter name">
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>