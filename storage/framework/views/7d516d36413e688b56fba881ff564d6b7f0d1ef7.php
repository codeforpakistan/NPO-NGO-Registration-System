<?php $__env->startSection('content'); ?>
<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
.tb_style th, 
.tb_style td {
    vertical-align: middle !important;
    text-align: center;
}
</style>
</head>
<div class="app-content">
    <?php if(session('success')): ?>
    <script>
        Swal.fire({
            position: "center",
            icon: "success",
            title: "<?php echo e(session('success')); ?>",
            showConfirmButton: false,
            timer: 3000
        });
    </script>
    <?php endif; ?>
    <section class="section">
        <!--page-header open-->
        <div class="page-header pt-0">
            <h4 class="page-title font-weight-bold">Basic Information Form</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-light-color">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Agency Form</li>
            </ol>
        </div>
        <!--page-header closed-->

        <!--row open-->
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(url('basic-information/add')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="user_id" value="<?php echo e(session('id')); ?>">
                        <input type="hidden" name="district_id" value="<?php echo e(session('district_id')); ?>">
                        <!-- First Row (Name and CNIC) -->
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label class="form-label font-weight-bold">Name of the Agency <span style="color:red;">*</span></label>
                                <input class="form-control" type="text"
                                    name="name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label class="form-label font-weight-bold">Contact No <span style="color:red;">*</span></label>
                                <input class="form-control" type="text"
                                    name="contact" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="form-label font-weight-bold">Address <span style="color:red;">*</span></label>
                                <input class="form-control" type="text"
                                    name="address" required>
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label class="form-label font-weight-bold">Constitution <span style="color:red;">*</span></label>
                                <input class="form-control" type="file"
                                    name="constitution_file" required>
                            </div>
                        </div>
                        <hr>
                        <h6><strong>Aims & Objectives <span style="color:red;">*</span></strong></h6>
                        <div class="row">
    <?php $__currentLoopData = $objective; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objective): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="form-group col-lg-6 d-flex align-items-center">
            <input type="checkbox" name="objectives[]" value="<?php echo e($objective->id); ?>" class="mr-1 mt-2">
            <label class="form-label mb-0"><?php echo e($objective->name); ?></label>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
                        <!-- Submit Button -->
                        <div class="row mt-2">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
                            <table class="table table-bordered border-t0 key-buttons text-nowrap w-100 tb_style">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name Of The Agency</th>
                                        <th>Contact</th>
                                        <th>Address</th>
                                        <th>Aim Objective</th>
                                        <th>Constitution File</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            
                                <tbody>
                                    <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                    <tr>
                                        <td><?php echo e($record->id); ?></td>
                                        <td><?php echo e($record->name); ?></td>
                                        <td><?php echo e($record->contact); ?></td>
                                        <td><?php echo e($record->address); ?></td>
                            
                                        <td>
                                            <?php if($record->aims->isNotEmpty()): ?>
                                                <?php $__currentLoopData = $record->aims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <button type="button" class="btn btn-outline-primary btn-sm mt-1"><?php echo e($aim->name); ?></button><br>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                N/A
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if(!empty($record->constitution_file)): ?>
                                                <a href="<?php echo e(asset('storage/' . $record->constitution_file)); ?>" target="_blank" rel="noopener noreferrer">View File</a>
                                            <?php else: ?>
                                                N/A
                                            <?php endif; ?>
                                        </td>
                            
                                        <td>
                                            <button class="btn btn-sm btn-primary btn-sm" type="submit">
                                                <i class="fa fa-trash">&nbsp;Delete</i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination Links -->
                      <div class="d-flex justify-content-center">
                          <?php echo e($records->links()); ?>

                      </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
</div>
 <?php $__env->stopSection(); ?>
 
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\durshal_cfp\ngo\resources\views/basic-information.blade.php ENDPATH**/ ?>