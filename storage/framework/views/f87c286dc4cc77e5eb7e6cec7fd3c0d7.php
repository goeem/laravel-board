<?php $__env->startSection('content'); ?>
<div class="container my-5">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-success text-white">
            <h1 class="card-title"><?php echo e($post->title); ?></h1>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <p class="text-muted"><strong>Posted by:</strong> <?php echo e($post->user->name); ?></p>
                <p class="text-muted"><strong>Interest:</strong> <a href="<?php echo e(route('interests.show', $post->interest->id)); ?>" class="text-success"><?php echo e($post->interest->name); ?></a></p>
                <p class="text-muted"><strong>Created on:</strong> <?php echo e($post->created_at->format('F d, Y')); ?></p>
            </div>

            <div class="mb-4">
                <h4>Content:</h4>
                <p class="fs-5"><?php echo e($post->content); ?></p>
            </div>

            <!-- Buttons Section -->
            <div class="d-flex">
                <!-- Back button -->
                <a href="<?php echo e(route('interests.show', $post->interest->id)); ?>" class="btn btn-outline-secondary me-2">
                    Back to <?php echo e($post->interest->name); ?> Posts
                </a>

                <?php if(auth()->id() === $post->user_id): ?>
                    <!-- Edit Button -->
                    <a href="<?php echo e(route('posts.edit', $post->id)); ?>" class="btn btn-outline-primary me-2">
                        Edit
                    </a>

                    <!-- Delete Button -->
                    <form action="<?php echo e(route('posts.destroy', $post->id)); ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-outline-danger">
                            Delete
                        </button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vboxuser/interestBoardApp/resources/views/posts/show.blade.php ENDPATH**/ ?>