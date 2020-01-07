<?php $__env->startSection('title'); ?>
    <title>Add Product</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/iCheck/all.css')); ?>">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo e(asset('bower_components/select2/dist/css/select2.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <h1>
            Products
            <small>Management your Product</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('ad.dashboard')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo e(route('ad.product.list.get')); ?>">Products</a></li>
            <li class="active">Add/update product</li>
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
        if (isset($product))
            $id = $product->id;
        else
            $id = 0;
        ?>
        <div class="row ">
            <!-- left column -->
            <div class="col-md-6 ">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Add product</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="<?php echo e(route("ad.product.form.post",[$id])); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <div class="box-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input name="name" type="text" class="form-control"
                                       value="<?php echo e(old('name',isset($product)?$product->name:"")); ?>"
                                       placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label>Brand</label>
                                <select class="form-control select2" name="brand_id" style="width: 100%;">
                                    <option value="" selected>--- Choose a brand ---</option>
                                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($detail->id); ?>" <?php if(old('brand_id',isset($product)?$product->brand_id:"") == $detail->id): ?> selected <?php endif; ?>><?php echo e($detail->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Image link</label>
                                <input name="img_link" type="text" class="form-control"
                                       value="<?php echo e(old('img_link',isset($product)?$product->img_link:"")); ?>"
                                       placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label>Image list</label>
                                <textarea name="img_list" class="form-control" rows="3" placeholder="Enter ..."
                                ><?php echo e(old('img_list',isset($product)?$product->img_list:"")); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input name="price" type="text" class="form-control"
                                       value="<?php echo e(old('price',isset($product)?$product->price:"")); ?>"
                                       placeholder="Enter price">
                            </div>
                            <div class="form-group">
                                <label>Discount</label>
                                <input name="discount" type="text" class="form-control"
                                       value="<?php echo e(old('discount',isset($product)?$product->discount:"")); ?>"
                                       placeholder="Enter discount">
                            </div>
                            <div class="form-group">
                                <label>Stock</label>
                                <input name="stock" type="text" class="form-control"
                                       value="<?php echo e(old('stock',isset($product)?$product->stock:"")); ?>"
                                       placeholder="Enter stock">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="des" class="form-control" rows="4" placeholder="Enter ..."
                                ><?php echo e(old('des',isset($product)?$product->des:"")); ?></textarea>
                            </div>
                            <!-- checkbox -->
                            <div class="form-group">
                                <label>
                                    <input name="status" type="checkbox" class="flat-red"
                                           <?php if((isset($product)?$product->status:0) == 0): ?> checked <?php endif; ?>
                                           value = "<?php echo e(old('status',isset($product)?$product->status:0)); ?>">
                                     Active
                                </label>
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
    <script src="<?php echo e(asset('bower_components/select2/dist/js/select2.full.min.js')); ?>"></script>
    <!-- iCheck 1.0.1 -->
    <script src="<?php echo e(asset('plugins/iCheck/icheck.min.js')); ?>"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass   : 'iradio_minimal-blue'
            })
            //Red color scheme for iCheck
            $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                checkboxClass: 'icheckbox_minimal-red',
                radioClass   : 'iradio_minimal-red'
            })
            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass   : 'iradio_flat-green'
            })

        })
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>