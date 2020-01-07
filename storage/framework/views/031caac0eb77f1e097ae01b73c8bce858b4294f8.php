<?php $__env->startSection('title'); ?>
    <title>Add Coupon</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <h1>
            Coupons
            <small>Management your coupons</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('ad.dashboard')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo e(route('ad.coupon.list.get')); ?>">Coupons</a></li>
            <li class="active">Add/update coupon</li>
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
        if (isset($coupon))
            $id = $coupon->id;
        else
            $id = 0;
        ?>
        <div class="row ">
            <!-- left column -->
            <div class="col-md-6 ">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Add coupon</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="<?php echo e(route("ad.coupon.form.post",[$id])); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <div class="box-body">
                            <div class="form-group">
                                <label>Type</label>
                                <select class="form-control select2" name="type" style="width: 100%;">
                                    <option value="" selected>--- Choose an attribute ---</option>
                                    <option value="0" <?php if(old('type',isset($coupon)?$coupon->type:"") == 0): ?> selected <?php endif; ?>>Percent</option>
                                    <option value="1" <?php if(old('type',isset($coupon)?$coupon->type:"") == 1): ?> selected <?php endif; ?>>Fix cost</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Value</label>
                                <input name="value" type="text" class="form-control"
                                       value="<?php echo e(old('value',isset($coupon)?$coupon->value:"")); ?>"
                                       placeholder="Enter value">
                            </div>
                            <div class="form-group">
                                <label>Start date</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input name="startdate" type="text" value="<?php echo e(old('startdate',isset($coupon)?$coupon->startdate:"")); ?>"
                                           class="form-control pull-right" id="datepicker1">
                                </div>
                                <!-- /.input group -->
                            </div>

                            <div class="form-group">
                                <label>End date</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input name="enddate" type="text" value="<?php echo e(old('enddate',isset($coupon)?$coupon->enddate:"")); ?>"
                                           class="form-control pull-right" id="datepicker2">
                                </div>
                                <!-- /.input group -->
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
<?php $__env->startSection('scripts-ori'); ?>

    <script type="text/javascript">
        $('#datepicker1').datepicker({ format: 'yyyy-mm-dd' })

        $('#datepicker2').datepicker({ format: 'yyyy-mm-dd' })
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>