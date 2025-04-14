<?php $__env->startSection('content'); ?>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>

    
    
<div class="app-content">
    <?php if(session('success')): ?>
    <script>
        Swal.fire({
            position: "top-end",
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
            <h4 class="page-title font-weight-bold">Membership Form</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-light-color"></a></li>
                <li class="breadcrumb-item active" aria-current="page"></li>
            </ol>
        </div>
        <!--page-header closed-->

        <!--row open-->
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12" style="margin-top: 80px;">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="font-weight-bold"> Members</h4>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(url('add-member')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="user_id" value="<?php echo e(session('id')); ?>">

                      

                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label class="form-label font-weight-bold">Select Membership Type</label>
                                <select name="member_type_id" class="form-control" required>
                                 
                                    <?php $__currentLoopData = $membershipTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($type->id); ?>"><?php echo e($type->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="form-label font-weight-bold" for="id">Select Name  Agency</label>
                                <select name="basic_info_id" id="basic_info_id" class="form-control" required>
                                    <option class="form-label font-weight-bold" value="">Choose Name Agency</option>
                                    <?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>






                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label class="form-label font-weight-bold">Name</label>
                                <input class="form-control form-control-lg" type="text" name="name" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="form-label font-weight-bold">Date Of Birth</label>
                                <input type="date" class="form-control form-control-lg" name="date_of_birth" required/>
                            </div>
                        </div>
                    
                        <!-- Gender and City -->
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label class="form-label font-weight-bold">Select Gender</label>
                                <select class="form-control select2" name="gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="form-label font-weight-bold">Select City</label>
                                <select name="city_id" class="form-control" required>
                                    <option value="">Choose City</option>
                                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($city->city_id); ?>"><?php echo e($city->city_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    
                        <!-- Phone and Email -->
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label class="form-label font-weight-bold">Phone No</label>
                                <input class="form-control form-control-lg" type="text" name="contact" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="form-label font-weight-bold">Email</label>
                                <input class="form-control form-control-lg" type="email" name="email" required>
                            </div>
                        </div>
                    
                        <!-- Address and CNIC -->
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label class="form-label font-weight-bold">Address</label>
                                <input class="form-control form-control-lg" type="text" name="address" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="form-label font-weight-bold">CNIC</label>
                                <input class="form-control form-control-lg" type="text" name="cnic" required>
                            </div>
                        </div>
                    
                        <!-- Membership Type -->
                     
                    
                        <!-- Submit Button -->
                        <div class="row">
                            <div class="col-lg-2 text-center">
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
                        <h4>Membership</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
							<table id="example" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th> Name</th>
                                        <th>Date Of Birth</th>
										<th>City</th>
                                        <th>Phone No</th>
                                        <th>Email</th>
										<th>Address</th>
                                        <th>CNIC</th>
                                 
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $getmember; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($detail->id); ?></td>
                                        <td><?php echo e($detail->name); ?></td>
                                        <td><?php echo e($detail->date_of_birth); ?></td>
                                        <td><?php echo e($detail->city_name); ?></td>
                                        <td><?php echo e($detail->email); ?></td>
                                        <td><?php echo e($detail->address); ?></td>
                                        <td><?php echo e($detail->cnic); ?></td>
                                        <td><?php echo e($detail->name); ?></td>
                                      
                                   <td>
                                    <form
                                    action=""
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this irrigator?');"
                                    style="display: inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-sm btn-primary"
                                        type="submit">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                                <a href="" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit"></i> Edit</a> 
                        </td>
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
 
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\durshal_cfp\ngo\resources\views/membership.blade.php ENDPATH**/ ?>