<?php $__env->startSection('title'); ?>
    <title>Confirmation</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('dist/css/AdminLTE.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <div class=" p-t-40 p-b-40 p-l-75 p-r-75">
        <ul class="timeline">
            <!-- timeline item -->
            <li>
                <!-- timeline icon -->
                <div class="timeline-item">
                    <span class="time" ><i class="fa fa-clock-o"></i></span>

                    <h3 class="timeline-header"><a href="#">Ordered successfully!</a></h3>

                    <div class="timeline-body">
                        Thanks so much for shopping us.
                    </div>

                    <div class="timeline-footer">
                        <a href="<?php echo e(route('index.home.get')); ?>" class="btn btn-primary s-text17 btn-sm" style="color: white">Back home</a>
                    </div>
                </div>
            </li>
            <!-- END timeline item -->
        </ul>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        var dt = new Date();
        $(".time").text(dt.toLocaleTimeString());
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("index.layout.index", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>