<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Edit Post</h1>

    <form action="<?php echo e(route('posts.update', $post->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <!-- Title Field -->
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo e(old('title', $post->title)); ?>" required>
        </div>

        <!-- Content Field -->
        <div class="form-group mb-3">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required><?php echo e(old('content', $post->content)); ?></textarea>
        </div>

        <!-- Interest Dropdown -->
        <div class="form-group mb-3">
            <label for="interest">Interest</label>
            <select class="form-control" id="interest" name="interest_id" required>
                <?php $__currentLoopData = $interests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($interest->id); ?>" 
                        <?php if(old('interest_id', $post->interest_id) == $interest->id): ?> selected <?php endif; ?>>
                        <?php echo e($interest->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update Post</button>

        <!-- Back Button -->
        <a href="<?php echo e(route('posts.show', $post->id)); ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vboxuser/interestBoardApp/resources/views/posts/edit.blade.php ENDPATH**/ ?>