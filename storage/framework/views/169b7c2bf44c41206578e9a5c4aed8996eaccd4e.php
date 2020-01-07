<?php $__env->startSection('title'); ?>
    <title>User Profile</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <h1>
            User Profile
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('ad.dashboard')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">User Management</a></li>
            <li class="active">User profile</li>
        </ol>
    </section>
    <section class="content">

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
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <div>
                            <img class=" profile-user-img img-circle center-block " width="100" height="100"  src="<?php echo e($user->img); ?>" alt="User profile picture">
                        </div>


                        <h3 class="profile-username text-center"><?php echo e($user->name); ?></h3>

                        <p class="text-muted text-center"><?php if($user->status == 0): ?> Admin <?php else: ?> Employee <?php endif; ?></p>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#settings" href="#activity" data-toggle="tab">Settings</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="setting">
                            <form method="Post" action="<?php echo e(route('ad.admin.edit',[$user->id])); ?>"  class="form-horizontal">
                                <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" id="inputName" value="<?php echo e($user->name); ?>" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="email" id="inputEmail" disabled="true" value="<?php echo e($user->email); ?>" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Image</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="img" value="<?php echo e($user->img); ?>" id="inputName" placeholder="Image link">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputExperience" class="col-sm-2 control-label">Password</label>

                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" name="password" id="inputExperience" placeholder="Type your password"></input>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts-ori'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>