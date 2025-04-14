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
            <h4 class="page-title font-weight-bold">Operation Form</h4>
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
                    <h4 class="font-weight-bold">Operation Detail</h4>
                </div>
                <div class="card-body">
<form class="form-horizontal" action="<?php echo e(route('addoperation.add')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="user_id" value="<?php echo e(session('id')); ?>">

    <div class="row">
        <div class="form-group col-lg-6">
            <label class="form-label font-weight-bold" for="id">Select Operation Area</label>
            <select name="area_of_operation_id" id="area_of_operation_id" class="form-control" required>
                <option class="form-label font-weight-bold" value="">Choose Operation Area</option>
                <?php $__currentLoopData = $area; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
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

    <!-- File Uploads -->
    <div class="row">
        <div class="form-group col-lg-6">
            <label class="form-label font-weight-bold">Future Plan</label>
            <input class="form-control form-control-lg" type="file" name="future_plan_file" required>
        </div>
        <div class="form-group col-lg-6">
            <label class="form-label font-weight-bold">Plan Of Operation</label>
            <input class="form-control form-control-lg" type="file" name="plan_operation_file" required>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-lg-6">
            <label class="form-label font-weight-bold">Progress Report of Previous Activities</label>
            <input class="form-control form-control-lg" type="file" name="progress_report_file" required>
        </div>
        <div class="form-group col-lg-6">
            <label class="form-label font-weight-bold">1st Meeting Minutes</label>
            <input class="form-control form-control-lg" type="file" name="first_meeting_file" required>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-lg-6">
            <label class="form-label font-weight-bold">Last Meeting Minutes</label>
            <input class="form-control form-control-lg" type="file" name="last_meeting_file" required>
        </div>
      
    </div>
   
    <!-- Submit Button -->
    <div class="row">
        <div class="col-lg-12">
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
                        <h4>Operation Table</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
							<table id="example" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Area Operation</th>
                                        <th>Future Planess</th>
										<th>Plan Of Operation</th>
                                        <th>Progress Report</th>
                                        <th>1st meeting minutes Report</th>
                                           <th>Last meeting minutes Report</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $operations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $operation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($operation->id); ?></td>
                                  
                                        <td><?php echo e(optional($operation->areaOfOperation)->name ?? 'N/A'); ?></td>

                                  
                                
                                        <td>
                                            <?php if($operation->future_plan_file): ?>
                                                <a href="<?php echo e(asset('storage/' . $operation->future_plan_file)); ?>" target="_blank">View CNIC</a>
                                            <?php else: ?>
                                                No file
                                            <?php endif; ?>
                                        </td>
                                       

                                        <td>
                                            <?php if($operation->plan_operation_file): ?>
                                                <a href="<?php echo e(asset('storage/' . $operation->plan_operation_file)); ?>" target="_blank">View CNIC</a>
                                            <?php else: ?>
                                                No file
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($operation->progress_report_file): ?>
                                                <a href="<?php echo e(asset('storage/' . $operation->progress_report_file)); ?>" target="_blank">View CNIC</a>
                                            <?php else: ?>
                                                No file
                                            <?php endif; ?>
                                        </td>
                                    
                                        <td>
                                            <?php if($operation->first_meeting_file): ?>
                                                <a href="<?php echo e(asset('storage/' . $operation->first_meeting_file)); ?>" target="_blank">View CNIC</a>
                                            <?php else: ?>
                                                No file
                                            <?php endif; ?>
                                        </td>
                                    
                                        <td>
                                            <?php if($operation->last_meeting_file): ?>
                                                <a href="<?php echo e(asset('storage/' . $operation->last_meeting_file)); ?>" target="_blank">View CNIC</a>
                                            <?php else: ?>
                                                No file
                                            <?php endif; ?>
                                        </td>
                                    
                               
                                   
                                        <td>
                                            <button class="btn btn-sm btn-primary badge" type="submit">
                                                <i class="fa fa-trash"></i>
                                            </button>
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
 
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\durshal_cfp\ngo\resources\views/operation.blade.php ENDPATH**/ ?>