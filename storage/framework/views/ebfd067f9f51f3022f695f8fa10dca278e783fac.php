<?php $__env->startSection('title'); ?>
    <title>List of Products</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <h1>
            Products
            <small>Management your products</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('ad.dashboard')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Products</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List of products</h3>

                    </div>
                    <div class="form-group box-body">
                        <a href="<?php echo e(route('ad.product.form.get',['id'=>0])); ?>">
                            <button class="btn btn-default bg-green " data-style="expand-right">
                                <span class="btn-label"><i class="fa fa-plus"></i></span>  Add product
                            </button>
                        </a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="productTable" class="table table-hover table-bordered table-striped">
                            <thead>
                            <tr>

                                <th style="width: 10px"># </th>
                                <th>Name</th>
                                <th>Brand</th>
                                <th>Image link</th>
                                <th>Image list</th>
                                <th>View</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Stock</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Option</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(++$i.'.'); ?></td>
                                    <td><?php echo e($product->name); ?></td>
                                    <td><?php echo e($product->brand->name); ?></td>
                                    <td>
                                        <img width="100px" src="<?php echo e($product->img_link); ?>" class="img-rounded img-thumbnail img-responsive">
                                    </td>
                                    <td><?php echo e($product->img_list); ?></td>
                                    <td><?php echo e($product->view); ?></td>
                                    <td><?php echo e($product->price); ?></td>
                                    <td><?php echo e($product->discount); ?></td>
                                    <td><?php echo e($product->stock); ?></td>
                                    <td><?php echo e($product->des); ?></td>
                                    <td><?php if($product->status == 0): ?> Active <?php else: ?> Inactive <?php endif; ?></td>
                                    <td>

                                        <a href="<?php echo e(route('ad.product.form.get',[$product->id])); ?>"
                                           class="btn btn-icon bg-light-blue " title="Edit"> <i class="fa fa-pencil"></i></a>
                                        <br></br>
                                        <a href="<?php echo e(route('ad.product.detailForm.get',[$product->id])); ?>"
                                           class="btn btn-icon bg-purple " title="More detail"> <i class="fa fa-gear"></i></a>
                                        <br></br>
                                        <button href="#"
                                           class="delete btn btn-icon bg-red " data-for="<?php echo e($product->id); ?>" title="Delete"> <i class="fa fa-trash-o"></i></button>
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
            $('#productTable').DataTable( {
                columnDefs: [ {
                    targets: 9,
                    render: function ( data, type, row ) {
                        return type === 'display' && data.length > 100 ?
                            data.substr( 0, 100 ) +'…' :
                            data;
                    }
                },{
                    targets: 4,
                    render: function ( data, type, row ) {
                        return type === 'display' && data.length > 10 ?
                            data.substr( 0, 10 ) +'…' :
                            data;
                    }
                }
                ],
                language: {
                    search: '<i class="btn btn-default fa fa-search"></i>',
                    searchPlaceholder: "Search",
                }
            } );
        })
    </script>
    <script type="text/javascript">
        $('.delete').on('click',function (e) {
            e.preventDefault();
            var ele = $(this);
            swal({
                title: "Are you sure?",
                text: "this product will be disable !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            url: '<?php echo e(route('ad.product.dis')); ?>',
                            method: "post",
                            data: {_token: CSRF_TOKEN, id: ele.attr("data-for")},
                            success: function (response) {
                                window.location.reload();
                            },
                            error: function(xhr, textStatus, error){
                                alert(error + "\r\n" + xhr.responseText);
                            },
                        });
                    } else {

                    }
                });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>