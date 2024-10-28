<?php $__env->startSection('content'); ?>
<div class="container my-5">
    <!-- Board Header -->
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-4 text-center"><?php echo e($interest->name); ?></h1>
            <p class="text-center text-muted">Discuss and post about <?php echo e($interest->name); ?></p>
        </div>
    </div>

    <!-- Create Post Button -->
    <div class="row mb-4">
        <div class="col-md-12 text-center">
            <a href="<?php echo e(route('posts.create', ['interest_id' => $interest->id])); ?>" class="btn btn-success btn-lg">
                New Thread in <?php echo e($interest->name); ?>

            </a>
        </div>
    </div>

    <!-- Threads List -->
    <div class="row">
        <div class="col-md-12">
            <h3 class="mb-3">Threads in <?php echo e($interest->name); ?></h3>
            <?php if($interest->posts->count() > 0): ?>
                <div class="list-group">
                    <?php $__currentLoopData = $interest->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="list-group-item border rounded shadow-sm mb-3 p-4" style="background-color: #f8f9fa;">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5><a href="<?php echo e(route('posts.show', $post->id)); ?>" class="text-dark"><?php echo e($post->title); ?></a></h5>
                                    <small class="text-muted">Posted by <?php echo e($post->user->name); ?> on <?php echo e($post->created_at->format('M d, Y')); ?></small>
                                </div>
                            </div>
                            <hr>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <p class="text-muted text-center">No threads available in this board yet.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Back Button -->
    <div class="row mt-4">
        <div class="col-md-12 text-center">
            <a href="<?php echo e(route('interests.index')); ?>" class="btn btn-secondary">
                Back to Boards
            </a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vboxuser/interestBoardApp/resources/views/interests/show.blade.php ENDPATH**/ ?>