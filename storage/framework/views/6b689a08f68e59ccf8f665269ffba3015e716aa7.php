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
            <h4 class="page-title font-weight-bold">General Form</h4>
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
                    <h4 class="font-weight-bold">General  Members</h4>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(route('add.general')); ?>" method="POST" enctype="multipart/form-data">
                    
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
                            <label class="form-label font-weight-bold">Name </label>
                            <input class="form-control form-control-lg" type="text"
                                name="name" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="form-label font-weight-bold">Father Name
                            </label>
                            <input class="form-control form-control-lg" type="text"
                                name="father_name" required>
                        </div>

                    </div>


                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label
                                class="form-label font-weight-bold">Qualification</label>
                            <input class="form-control form-control-lg" type="text"
                                name="qualification" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="form-label font-weight-bold">Occupation</label>
                            <input class="form-control form-control-lg" type="text"
                                name="occupation" required>
                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="form-label font-weight-bold">Contact
                                No</label>
                            <input class="form-control form-control-lg" type="text"
                                name="contact" required>
                        </div>
                       <div class="form-group col-lg-6">
                            <label class="form-label font-weight-bold">CNIC
                                Uploud</label>
                            <input class="form-control form-control-lg" type="file"
                                name="cnic" required>
                        </div>
                      
                    </div>
                    <div class="row">
                       
                    
                    <!-- Submit Button -->
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit"
                                class="btn btn-primary btn-lg">Submit</button>
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
                        <h4>General Member</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
						
                                <tbody>
                                    <table id="example" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Father Name</th>
                                                <th>Qualification</th>
                                                <th>Occupation</th>
                                                <th>Contact</th>
                                                <th>CNIC</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <?php $__currentLoopData = $getgernal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($detail->id); ?></td>
                                            <td><?php echo e($detail->name); ?></td>
                                            <td><?php echo e($detail->father_name); ?></td>
                                            <td><?php echo e($detail->qualification); ?></td>
                                            <td><?php echo e($detail->occupation); ?></td>
                                            <td><?php echo e($detail->contact); ?></td>
                                            <td>
                                                <?php if($detail->cnic): ?>
                                                    <a href="<?php echo e(asset('storage/' . $detail->cnic)); ?>" target="_blank">View CNIC</a>
                                                <?php else: ?>
                                                    No CNIC
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php 
                                                $check = $detail->cv;
                                                $isDisabled = ($check != null && $check != '') ? true : false;
                                                $disabled = $isDisabled ? 'disabled' : ''; 
                                                $buttonText = $isDisabled ? 'Shifted To Executive' : 'Shift To Executive';
                                            ?>
                                                                                        
                                            <a href="<?php echo e(url('executive-member')); ?>/<?php echo e($detail->id); ?>">
                                                <button class="btn btn-sm btn-primary" type="button" <?php echo e($disabled); ?>>
                                                    <?php if(!$isDisabled): ?>
                                                        <span><i class="fa fa-plus"></i></span>
                                                    <?php endif; ?>
                                                    <?php echo e($buttonText); ?>

                                                </button>
                                            </a>
                                            
                                            
                                        
                                            

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
                            </table>
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
 
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/LaravelAdminTemplete-main-2 3/resources/views/general-member.blade.php ENDPATH**/ ?>