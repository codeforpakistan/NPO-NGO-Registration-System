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
            <h4 class="page-title font-weight-bold">Founding Member Form</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-light-color"></a>Home</li>
                <li class="breadcrumb-item active" aria-current="page">Founding Member</li>
            </ol>
        </div>
        <!--page-header closed-->

        <!--row open-->
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(route('add.founding')); ?>"
                    method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                   
                    <input type="hidden" name="user_id" value="<?php echo e(session('id')); ?>">


                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="form-label font-weight-bold" for="id">Select Agency <span style="color:red;">*</span></label>
                            <select name="basic_info_id" id="basic_info_id" class="form-control" required>
                                <?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="form-label font-weight-bold">Select Membership Type <span style="color:red;">*</span></label>
                            <select name="member_type_id" class="form-control" required>
                             
                                <?php $__currentLoopData = $membershipTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($type->id); ?>"><?php echo e($type->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        
                    </div>



                    <!-- First Row (Name and CNIC) -->
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="form-label font-weight-bold">Name <span style="color:red;">*</span></label>
                            <input class="form-control" type="text"
                                name="name" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="form-label font-weight-bold">Occupation <span style="color:red;">*</span></label>
                            <input class="form-control" type="text"
                                name="occupation" required>
                        </div>
                        
                    </div>


                 

                  
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="form-label font-weight-bold">Upload CNIC<span style="color:red;">*</span></label>
                            <input class="form-control" type="file"
                                name="cnic" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="form-label font-weight-bold">Address <span style="color:red;">*</span></label>
                            <input class="form-control" type="text"
                                name="address" required>
                        </div>

                    </div>
                    <!-- Submit Button -->
                    <div class="row">
                        <div class="col-12">
                            <button type="submit"
                                class="btn btn-primary">Submit</button>
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
                        <h4>Founding Member List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
							<table id="example" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Occupation</th>
										<th>Address</th>
                                        <th>CNIC</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <?php $__currentLoopData = $getfounding; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($detail->id); ?></td>
                                    <td><?php echo e($detail->name); ?></td>
                                    <td><?php echo e($detail->occupation); ?></td>
                                    <td><?php echo e($detail->address); ?></td>
                                  
                                    <td>
                                        <?php if($detail->cnic): ?>
                                            <a href="<?php echo e(asset('storage/' . $detail->cnic)); ?>" target="_blank">View CNIC</a>
                                        <?php else: ?>
                                            No CNIC
                                        <?php endif; ?>
                                    </td>
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
                                <tbody>

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
 
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\durshal_cfp\ngo\resources\views/founding-body-member.blade.php ENDPATH**/ ?>