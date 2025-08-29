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
            <?php echo e(__('Business Details')); ?>

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
                    <div class="d-flex justify-content-between  align-items-center ">
                        <h2  class="my-3 text-xl text-gray-800" >Businesses Details</h2>
                        <a href="<?php echo e(route('editform')); ?>"class="btn btn-primary">add +</a>
                    </div>
                    <hr>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th >No.</th>
                                <th >Logo</th>
                                <th class="my-1">Name</th>
                                <th class="my-1">Email</th>    
                                <th class="my-1">Adress</th>
                                <th class="my-1">Created User</th>
                                <th class="my-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($business->isNotEmpty()): ?>
                                    <?php $__currentLoopData = $business; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $busines): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr >
                                        <td style="width: 50px;"><?php echo e($index + 1); ?></td> 
                                        <td style="width: 100px;"><img src="<?php echo e(asset('storage/' . $busines->img)); ?>" alt="logo Image" style="height: 100px; width: 100px; object-fit: cover;"></td> 
                                        <td style="width: 150px;"><?php echo e($busines->name); ?></td> 
                                        <td style="width: 200px;"><?php echo e($busines->email); ?></td> 
                                        <td style="width: 250px;"><?php echo e($busines->address); ?></td>
                                        <td style="width: 150px;"><?php echo e($busines->created_user); ?></td> 
                                        <td style="width: 250px;">
                                        <button type="button" class="btn btn-primary my-1" data-bs-toggle="modal" data-bs-target="#exampleModal" 
                                        data-name="<?php echo e($busines->name); ?>" data-email="<?php echo e($busines->email); ?>" data-address="<?php echo e($busines->address); ?>" data-created_user="<?php echo e($busines->created_user); ?>">view</button>
                                            <a class="btn btn-success my-1" href="<?php echo e(route('editform' , [ 'id' => $busines->id ] )); ?>">Edit</a>
                                            <a class="btn btn-danger py-2 my-1  " onclick="return confirmDelete();"  href="<?php echo e(route('deletebussiness' , [ 'id' => $busines->id ] )); ?>"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
</svg></a>  
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

    <!-- model start -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Business Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p  class="my-2"><strong>Name: </strong><span id="modalName"></span></p>
                <p  class="my-2"><strong>Email: </strong><span id="modalEmail"></span></p>
                <p  class="my-2"><strong>Address: </strong><span id="modalAddress"></span></p>
                <p class="my-2"><strong>Created User: </strong><span id="created_user"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
    <!-- model end -->
    <?php if($trashedata->isNotEmpty()): ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" p-6 text-gray-900">
                    <div class="d-flex justify-content-center  ">
                        <h2  class="my-3 text-xl text-gray-800 " > Trashed Businesses Details</h2>
                    </div>
                    <hr>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Adress</th>
                                <th scope="col">Created User</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $trashedata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $trashe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="width: 50px;"><?php echo e($index + 1); ?></td> 
                                <td style="width: 100px;"><img src="<?php echo e(asset('storage/' . $trashe->img)); ?>" alt="logo Image" style="max-height: 100px;"></td> 
                                <td style="width: 150px;"><?php echo e($trashe->name); ?></td> 
                                <td style="width: 200px;"><?php echo e($trashe->email); ?></td> 
                                <td style="width: 250px;"><?php echo e($trashe->address); ?></td>
                                <td style="width: 150px;"><?php echo e($trashe->created_user); ?></td> 
                                <td style="width: 250px;">
                                <a class="btn btn-success my-2"   href="<?php echo e(route('restore' , [ 'id' => $trashe->id ] )); ?>">Restore</a>
                                    <a class="btn btn-danger my-2" onclick="return confirmDelete();"  href="<?php echo e(route('forcedelete' , [ 'id' => $trashe->id ] )); ?>">Delete</a>
                                    
                                </td> 
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
     
    <script>
        // model data fetch
        $(document).ready(function() {
            $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var name = button.data('name');
            var email = button.data('email');
            var address = button.data('address');
            var created_user = button.data('created_user');
            
            $('#modalName').text(name);
            $('#modalEmail').text(email);
            $('#modalAddress').text(address);
            $('#created_user').text(created_user);
            });
        });
    </script>
   
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
<?php /**PATH C:\xampp\htdocs\project\resources\views/bussiness.blade.php ENDPATH**/ ?>