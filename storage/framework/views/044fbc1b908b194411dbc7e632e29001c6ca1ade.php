<?php $__env->startSection('title'); ?>
    <title>List of attributes</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
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
            <li class="active">Attributes</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List of attributes</h3>

                    </div>
                    <div class="form-group box-body">
                        <a href="<?php echo e(route('ad.attribute.form.get',['id'=>0])); ?>">
                            <button class="btn btn-default bg-green " data-style="expand-right">
                                <span class="btn-label"><i class="fa fa-plus"></i></span>  Add attribute
                            </button>
                        </a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body ">
                        <table id="tbAtt" class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px"># </th>
                                <th>Name</th>
                                <th>Option</th>
                            </tr>
                            </thead>

                            <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $att): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(++$i.'.'); ?></td>
                                <td><?php echo e($att->name); ?></td>
                                <td>

                                    <a href="<?php echo e(route('ad.attribute.form.post',[$att->id])); ?>"
                                       class="btn btn-icon bg-light-blue " title="Edit"> <i class="fa fa-pencil"></i></a>
                                    
                                       
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List of attribute values</h3>

                    </div>

                    <div class="form-group box-body">
                        <a href="<?php echo e(route('ad.attribute.attValueForm.get',['id'=>0])); ?>">
                            <button class="btn btn-default bg-green " data-style="expand-right">
                                <span class="btn-label"><i class="fa fa-plus"></i></span>  Add value
                            </button>
                        </a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="tbAttValue" class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px"># </th>
                                <th>Attribute</th>
                                <th>Value</th>
                                <th>Option</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $attValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(++$i.'.'); ?></td>
                                    <td><?php echo e($detail->attribute->name); ?></td>
                                    <td><?php echo e($detail->value); ?></td>
                                    <td>

                                        <a href="<?php echo e(route('ad.attribute.attValueForm.get',[$detail->id])); ?>"
                                           class="btn btn-icon bg-light-blue " title="Edit"> <i class="fa fa-pencil"></i></a>
                                        
                                           
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
            $('#tbAtt').DataTable( {
                language: {
                    search: '<i class="btn btn-default fa fa-search"></i>',
                    searchPlaceholder: "Search",
                }
            } );
            $('#tbAttValue').DataTable( {
                language: {
                    search: '<i class="btn btn-default fa fa-search"></i>',
                    searchPlaceholder: "Search",
                }
            } );
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>