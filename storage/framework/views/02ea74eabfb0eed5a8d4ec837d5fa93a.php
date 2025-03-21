<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Location Details')); ?>

        </h2>
     <?php $__env->endSlot(); ?>
    <!-- error message start -->
    <div id="errorMessage">
        <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
        <?php endif; ?>
        <?php if(session('error')): ?>
        <div class="alert alert-danger">
            <?php echo e(session('error')); ?>

        </div>
        <?php endif; ?>
    </div>
    <!-- error message end -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" p-6 text-gray-900">
                    <div class="d-flex justify-content-between align-items-center">
                    <h2  class="my-3 text-xl text-gray-800" >Location Details</h2>
                    <a href="<?php echo e(route('locationform')); ?>" class="btn btn-primary" > add + </a>
                    </div><hr>
                    <table class="table table-striped" action="">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">business name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Adress</th>
                                <th scope="col">Created User</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($Location->isNotEmpty()): ?>
                                <?php $__currentLoopData = $Location; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $locations): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td style="width: 50px;"><?php echo e($index+1); ?></td>
                                    <td style="width: 100px;"><?php echo e($locations->name); ?></td>
                                    <td><?php echo e($locations->business ? $locations->business->name : 'No Business Assigned'); ?></td>
                                    <td style="width: 150px;"><?php echo e($locations->email); ?></td>
                                    <td style="width: 160px;"><?php echo e($locations->address); ?></td>
                                    <td style="width: 150px;"><?php echo e($locations->created_user); ?></td>
                                    <td style="width: 150px;">
                                        <a href="<?php echo e(route('locationform' ,[ 'id' => $locations->id ] )); ?>" class="btn btn-success lass my-1">Edit</a>
                                        <a href="<?php echo e(route('deletelocationdata' , [ 'id' => $locations->id ] )); ?>" onclick="return confirmDelete();" class="btn btn-danger lass my-1" >Delete</a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center">No Data found</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\project\resources\views/locatondetail.blade.php ENDPATH**/ ?>