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
            <h4 class="page-title font-weight-bold">Executive Member</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-light-color"></a></li>
                <li class="breadcrumb-item active" aria-current="page"></li>
            </ol>
        </div>
        <!--page-header closed-->

        <!--row open-->
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12" style="margin-top: 80px;">
          
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card export-database">
                    <div class="card-header">
                        <h4>Executive Member</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
							<table id="example" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Father Name</th>
										<th>Address</th>
                                        <th>Contact</th>
                                        <th>Designation</th>
                                        <th>CVs Of Executive</th>
                                        <th>Police Verfications</th>
                                         <th>CNIC</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $getexecutive; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                            <?php if($detail->cv): ?>
                                                <a href="<?php echo e(asset('storage/' . $detail->cv)); ?>" target="_blank">View CV</a>
                                            <?php else: ?>
                                                No CNIC
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($detail->police_information): ?>
                                                <a href="<?php echo e(asset('storage/' . $detail->police_information)); ?>" target="_blank">View CNIC</a>
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
 
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/LaravelAdminTemplete-main-2 3/resources/views/list-executive.blade.php ENDPATH**/ ?>