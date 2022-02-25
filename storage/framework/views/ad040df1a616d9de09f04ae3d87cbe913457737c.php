<?php $__env->startSection("contenu"); ?>

    <div class="mt-4">
        <div class="d-flex justify-content-between mb-2">
            <?php echo e($posts->links()); ?>

            <div><a href="<?php echo e(route('posts.create')); ?>" class="btn btn-primary">Ajouter un nouveau Post</a></div>
        </div>

        <?php if(session()->has("successDelete")): ?>
            <div class="alerte alert-success">
                <h3><?php echo e(session()->get('successDelete')); ?></h3>
            </div>
        <?php endif; ?>

        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">slug</th>
                <th scope="col">excerpt</th>
                <th scope="col">category_id</th>
                <th scope="col">Action</th>

            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row"><?php echo e($loop->index + 1); ?></th>
                    <td><?php echo e($post->title); ?></td>
                    <td><?php echo e($post->content); ?></td>
                    <td><?php echo e($post->slug); ?></td>
                    <td><?php echo e($post->excerpt); ?></td>

                    <td><?php echo e($post->category->libelle); ?></td>
                    <td>
                        <a href="/posts/<?php echo e($post->id); ?>/edit" class="btn btn-info">Editer</a>
                        <a href="#" class="btn btn-danger" onclick="if(confirm('Voulez-vous vraiment supprimer ce post ?')){document.getElementById('form-<?php echo e($post->id); ?>').submit() }">Supprimer</a>


                        <form id="form-<?php echo e($post->id); ?>" action="<?php echo e(route('posts.supprimer',['posts'=>$post->id])); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="_method" value="delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Alban\Documents\SynologyDrive\Cours\BTS\Développement\DEV\Laravel\Crud\resources\views/Post/index.blade.php ENDPATH**/ ?>