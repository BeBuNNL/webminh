<?php $__env->startSection('title'); ?>
    <title>List of Invoices</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
    <!-- Checkbox-Type -->
    <link href="<?php echo e(asset('plugins/switchery/css/switchery.min.css')); ?>" rel="stylesheet"/>

    <link rel="stylesheet" href="<?php echo e(asset('plugins/switchery-master/dist/switchery.css')); ?>"/>
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
            <li class="active">Invoices</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List of invoices</h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="tbInvoice" class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px"># </th>
                                <th>Account</th>
                                <th>Receiver</th>
                                <th>Order date</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Ship Cost</th>
                                <th>Discount</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Option</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(++$i.'.'); ?></td>
                                    <?php if(isset($invoice->customer)): ?>
                                        <td><?php echo e($invoice->customer->name); ?></td>
                                    <?php else: ?>
                                        <td>Guest</td>
                                    <?php endif; ?>
                                    <td><?php echo e($invoice->receiver); ?></td>
                                    <td><?php echo e($invoice->order_date); ?></td>
                                    <td><?php echo e($invoice->billing_address); ?></td>
                                    <td><?php echo e($invoice->email); ?></td>
                                    <td><?php echo e($invoice->phone); ?></td>
                                    <td><?php echo e($invoice->ship_cost); ?></td>
                                    <?php if(isset($invoice->coupon)): ?>
                                        <td><?php echo e($invoice->coupon->type==0?"%".$invoice->coupon->value:$invoice->coupon->value); ?></td>
                                    <?php else: ?>
                                        <td>0</td>
                                    <?php endif; ?>
                                    <td><?php echo e($invoice->total); ?></td>
                                    <td>
                                        <input name="status" type="checkbox" <?php echo e($invoice->status==1?"checked disabled":""); ?> class="js-switch" data-color="#81c868" onchange="checkStatus(this,<?php echo e($invoice->id); ?>)"/>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('ad.invoice.detail.get',[$invoice->id])); ?>"
                                           class="btn btn-icon bg-purple " title="More detail"> <i class="fa fa-gear"></i></a>
                                        <br></br>
                                        <a href="<?php echo e(route('ad.invoice.get',[$invoice->id])); ?>"
                                           class="btn btn-icon bg-light-blue " title="Print"> <i class="fa fa-print"></i></a>
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
    <script src="<?php echo e(asset('plugins/switchery/js/switchery.min.js')); ?>"></script>
    <!-- iCheck 1.0.1 -->
    <script src="<?php echo e(asset('plugins/iCheck/icheck.min.js')); ?>"></script>

    <script src="<?php echo e(asset('plugins/switchery-master/dist/switchery.js')); ?>"></script>
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
    <script type="text/javascript">
        // var elem = document.querySelectorAll('.js-switch');
        // var init = new Switchery(elem,{ size: 'small' });
        if (Array.prototype.forEach) {
            var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

            elems.forEach(function(html) {
                var switchery = new Switchery(html,{ size: 'small' });
            });
        } else {
            var elems = document.querySelectorAll('.js-switch');

            for (var i = 0; i < elems.length; i++) {
                var switchery = new Switchery(elems[i],{ size: 'small' });
            }
        }
    </script>

    <script type="text/javascript">
        function checkStatus(obj, id) {
            if(obj.checked == true){

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "<?php echo e(route('ad.invoice.status')); ?>",
                    type: "POST",
                    async: true,
                    data: {
//                        "_token": token,
                        "_token": CSRF_TOKEN,
                        "id": id,
                    },
                    success: function (data) {
                        if(data=="Success"){
                            swal("This invoice", "is confirmed sucessfully !", "success");
                            obj.disabled;
                        }
                       else{
                            swal("Out of stock", "Make sure that Stock Availability!", "warning").then((value) =>{
                                window.location.reload();
                            });

                        }
                    }
                });
            } else{
                swal("", " Can not change back invoice status ", "error");
                obj.checked;
            }
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>