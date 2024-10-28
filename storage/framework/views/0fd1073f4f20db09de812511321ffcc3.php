<?php $__env->startSection('content'); ?>
<div class="container my-5">
    <h1 class="text-center text-success mb-4">Select a Board</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php $__currentLoopData = $interests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col">
                <a href="<?php echo e(route('interests.show', $interest->id)); ?>" class="text-decoration-none">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title text-success"><?php echo e($interest->name); ?></h5>
                            <p class="card-text text-muted">Explore and discuss topics related to <?php echo e($interest->name); ?>.</p>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vboxuser/interestBoardApp/resources/views/interests/index.blade.php ENDPATH**/ ?>