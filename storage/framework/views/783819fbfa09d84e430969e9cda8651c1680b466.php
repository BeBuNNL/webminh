<?php $__env->startSection('title'); ?>
    <title>Invoices detail</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/iCheck/all.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <h1>
            Invoices
            <small>Management your invoices</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('ad.dashboard')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo e(route('ad.invoice.list.get')); ?>">Invoices</a></li>
            <li class="active">Invoice detail</li>
        </ol>
    </section>
    <section class="content">
        <?php
        if (isset($invoice))
            $id = $invoice->id;
        else
            $id = 0;
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Detail of invoice <?php echo e($invoice->id); ?></h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="tbInvoice" class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px"># </th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $invoiceDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(++$i.'.'); ?></td>
                                    <td><?php echo e($detail->product->name); ?></td>
                                    <td><?php echo e($detail->qty); ?></td>
                                    <td><?php echo e($detail->detail_price); ?></td>
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
    <!-- iCheck 1.0.1 -->
    <script src="<?php echo e(asset('plugins/iCheck/icheck.min.js')); ?>"></script>
    <script>
        $(function () {
            $('#tbInvoice').DataTable( {
                language: {
                    search: '<i class="btn btn-default fa fa-search"></i>',
                    searchPlaceholder: "Search",
                }
            } );
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>