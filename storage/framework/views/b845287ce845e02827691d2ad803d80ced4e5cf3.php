<?php $__env->startSection("contenu"); ?>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Ajout d'un nouveau Post</h3>


        <div class="mt-4">
            <?php if(session()->has("success")): ?>
                <div class="alerte alert-success">
                    <h3><?php echo e(session()->get('success')); ?></h3>
                </div>
            <?php endif; ?>


            <form style="width:65%" method="post" action="<?php echo e(route('posts.ajouter')); ?>">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">content</label>
                    <input type="text" class="form-control" name="content" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">slug</label>
                    <input type="text" class="form-control" name="slug">
                </div>
                <div class="mb-3">
                    <label class="form-label">Excerpt</label>
                    <input type="text" class="form-control" name="excerpt">
                </div>
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select class="form-control" name="category_id" required>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option name="category_id" value="<?php echo e($category->id); ?>"><?php echo e($category->libelle); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="<?php echo e(route('posts')); ?>" class="btn btn-warning">Retour</a>

            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Alban\Documents\SynologyDrive\Cours\BTS\Développement\DEV\Laravel\Crud\resources\views/Post/postCreate.blade.php ENDPATH**/ ?>