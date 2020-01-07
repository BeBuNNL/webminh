<?php $__env->startSection('title'); ?>
    <title>Invoice</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content Wrapper. Contains page content -->
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Invoice
                <small>#<?php echo e($invoice->id); ?></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('ad.invoice.list.get')); ?>"><i class="fa fa-dashboard"></i> Invoice</a></li>
                <li class="active">Invoice</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="invoice " style="overflow:hidden!important;  height:100% !important;">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-globe"></i> VenRom, Inc.
                        <small class="pull-right">Date: <?php echo e(date("Y-m-d")); ?></small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    From
                    <address>
                        <strong>VenRom, Inc.</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        Phone: (804) 123-5432<br>
                        Email: Venrom@gmail.com
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    To
                    <address>
                        <strong><?php echo e($invoice->receiver); ?></strong><br>
                        <?php echo e($invoice->billing_address); ?><br>
                        Phone: <?php echo e($invoice->phone); ?><br>
                        Email: <?php echo e($invoice->email); ?>

                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Invoice #<?php echo e($invoice->id); ?></b><br>
                    <br>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $subtotal = 0 ?>
                        <?php $__currentLoopData = $invoiceDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(++$i.'.'); ?></td>
                                <td><?php echo e($detail->product->name); ?></td>
                                <td><?php echo e($detail->qty); ?></td>
                                <td><?php echo e($detail->detail_price); ?></td>
                                <?php $subtotal += $detail->detail_price ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <div class="col-xs-6"></div>
            <!-- /.col -->
            <div class="col-xs-6">
                <p class="lead">Amount Due <?php echo e($invoice->order_date); ?></p>
                <div class="table-responsive">

                    <table class="table">
                        <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>$<?php echo e($subtotal); ?></td>
                        </tr>
                        <tr>
                            <th>Discount:</th>
                            <?php if(isset($invoice->coupon)): ?>
                                <td><?php echo e($invoice->coupon->type==0?"%".$invoice->coupon->value:"$".$invoice->coupon->value); ?></td>
                            <?php else: ?>
                                <td>$0</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <th>Shipping:</th>
                            <td>$15</td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td>$<?php echo e($invoice->total); ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- /.col -->
            <!-- /.row -->
            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-xs-12">
                    <button class="print btn btn-default"><i class="fa fa-print"></i> Print</button>
                    <button onclick="window.print()"  class="btn btn-primary pull-right" style="margin-right: 5px;">
                        <i class="fa fa-download"></i> Generate PDF
                    </button>
                </div>
            </div>
        </section>
        <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-ori'); ?>
    <script>
        $('.print').on('click',function (e) {
            window.print();
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>