<?php $__env->startSection('content'); ?>
<div class="container my-5">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-success text-white">
            <h2 class="card-title mb-0">Create a Post</h2>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('posts.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                
                <div class="form-group mb-4">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required placeholder="Enter post title">
                </div>

                <div class="form-group mb-4">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="5" required placeholder="Write your post content here"></textarea>
                </div>

                <!-- Interest Selection -->
                <div class="form-group mb-4">
                    <label for="interest" class="form-label">Interest</label>
                    <select class="form-control" id="interest" name="interest_id" required>
                        <?php $__currentLoopData = $interests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($interest->id); ?>" 
                                <?php if(isset($interest_id) && $interest_id == $interest->id): ?> selected <?php endif; ?>>
                                <?php echo e($interest->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-success w-100">Submit Post</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vboxuser/interestBoardApp/resources/views/posts/create.blade.php ENDPATH**/ ?>