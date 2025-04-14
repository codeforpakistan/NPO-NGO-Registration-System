<?php $__env->startSection('content'); ?>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>

    
    
<div class="app-content">
<?php if(session('success')): ?>
    <script>
        Swal.fire({
            position: "center",
            icon: "success",
            title: "<?php echo e(session('success')); ?>",
            showConfirmButton: false,
            timer: 2000
        });
    </script>
<?php endif; ?>  
    <section class="section">
        <!--page-header open-->
        <div class="page-header pt-0">
            <h4 class="page-title font-weight-bold">System Users Form</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-light-color">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">System Users</li>
            </ol>
        </div>
        <!--page-header closed-->

        <!--row open-->
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12" style="margin-top: 80px;">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="font-weight-bold">Add System User</h4>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(url('add-user/add')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                    
                        <!-- First Row (Name and Email) -->
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label class="form-label font-weight-bold">User Name</label>
                                <input class="form-control" type="text" name="name" required>
                            </div>
                    
                            <div class="form-group col-lg-6">
                                <label class="form-label font-weight-bold">User Email</label>
                                <input class="form-control" type="email" name="email" required>
                            </div>
                        </div>
                    
                        <!-- Second Row (Password and Phone Number) -->
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label class="form-label font-weight-bold">Password</label>
                                <input class="form-control" type="password" name="password" required>
                            </div>
                    
                            <div class="form-group col-lg-6">
                                <label class="form-label font-weight-bold">Phone Number</label>
                                <input class="form-control" type="text" name="phone_number" required>
                            </div>
                        </div>
                    
                        <!-- Third Row (Select Operation Area) -->
                        <div class="row">
                        <div class="form-group col-lg-6">
                                <label class="form-label font-weight-bold" for="role_id">Select Role</label>
                                <select name="role_id" id="role_id" class="form-control" required>
                                    <option value="">Choose Role</option>
                                    <?php $__currentLoopData = $Role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="form-label font-weight-bold" for="district_id">Select District</label>
                                <select name="district_id" id="district_id" class="form-control" required>
                                    <option value="">Choose District</option>
                                    <?php $__currentLoopData = $area; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    
                        <!-- Submit Button Row -->
                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                            
                        </div>
                    
                    </form>
                    

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card export-database">
                    <div class="card-header">
                        <h4>Users</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Role</th>
                                        <th>District</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($user->id); ?></td>
                                        <td><?php echo e($user->name); ?></td>
                                        <td><?php echo e($user->email); ?></td>
                                        <td><?php echo e($user->phone_number); ?></td>
                                        <td><?php echo e(optional($user->role)->name ?? 'N/A'); ?></td>
                                        <td><?php echo e(optional($user->District)->name ?? 'N/A'); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div
    </section>
</div>


              
 <?php $__env->stopSection(); ?>
 
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\durshal_cfp\ngo\resources\views/sitting/add-user.blade.php ENDPATH**/ ?>