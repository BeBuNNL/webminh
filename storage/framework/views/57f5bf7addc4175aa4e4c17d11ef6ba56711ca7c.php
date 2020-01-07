<?php $__env->startSection('title'); ?>
    <title>List of user</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <h1>
            User
            <small>Management your user</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('ad.dashboard')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">User Management</a></li>
            <li class="active">User</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List of users</h3>

                    </div>
                    <div class="form-group box-body">
                        <a href="<?php echo e(route('ad.admin.form.get',['id'=>0])); ?>">
                            <button class="btn btn-default bg-green " data-style="expand-right">
                                <span class="btn-label"><i class="fa fa-plus"></i></span>  Add user
                            </button>
                        </a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="brand_table" class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px"># </th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Option</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(++$i.'.'); ?></td>
                                    <td><?php echo e($user->name); ?></td>
                                    <td>
                                        <img width="100px" src="<?php echo e($user->img); ?>" class="img-rounded img-thumbnail img-responsive">
                                    </td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td><?php if($user->role == 0): ?> Admin <?php else: ?> Employee <?php endif; ?></td>
                                    <td>
                                        <?php if($user->role == 1 && Auth::guard('admin')->user()->role ==0): ?>
                                        <a href="#"
                                           class="btn btn-icon bg-red " title="Delete"> <i class="fa fa-trash-o"></i></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts-ori'); ?>
    <!-- DataTables -->
    <script src="<?php echo e(asset('bower_components/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>
    <script>
        $(function () {
            $('#brand_table').DataTable( {
                columnDefs: [ {
                    targets: 4,
                    render: function ( data, type, row ) {
                        return type === 'display' && data.length > 500 ?
                            data.substr( 0, 500 ) +'…' :
                            data;
                    }
                } ],
                language: {
                    search: '<i class="btn btn-default fa fa-search"></i>',
                    searchPlaceholder: "Search",
                }
            } );
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>