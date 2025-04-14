<?php $__env->startSection('content'); ?>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>

    
    
<div class="app-content">
  
    <section class="section">
        <!--page-header open-->
        <div class="page-header pt-0">
            <h4 class="page-title font-weight-bold">Application List</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home<a href="#" class="text-light-color"></a></li>
                <li class="breadcrumb-item active" aria-current="page">Applications</li>
            </ol>
        </div>
        <!--page-header closed-->
        <div class="row">
            <div class="col-md-12">
                <div class="card export-database">
                    <div class="card-header">
                        <h4>Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered border-t0 key-buttons text-nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name Of The Agency</th>
                                        <th>Contact</th>
                                        <th>Address</th>
                                        <th>Aim Objective</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            
                                <tbody>
                                    <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                    <tr>
                                        <td class="text-center align-middle"><strong><?php echo e($record->id); ?></strong></td>
                                        <td class="text-center align-middle"><?php echo e($record->name); ?></td>
                                        <td class="text-center align-middle"><?php echo e($record->contact); ?></td>
                                        <td class="text-center align-middle"><?php echo e($record->address); ?></td>
                            
                                        <td>
                                            <?php if($record->aims->isNotEmpty()): ?>
                                                <?php $__currentLoopData = $record->aims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <button class="btn btn-sm btn-primary mb-1"><?php echo e($aim->name); ?></button><br>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                N/A
                                            <?php endif; ?>
                                        </td>
                            
                                        <td class="text-center align-middle">
                                            <?php if($record->status==2): ?>
                                            <a href="<?php echo e(url('application/directorate/view')); ?>/<?php echo e($record->id); ?>"><button
                                                class="btn btn-primary"
                                                data-target="#user-form-modal" data-toggle="modal"
                                                type="button">View</button>
                                            </a>
                                            <?php elseif($record->status==3): ?>
                                            <strong>Accepted</strong>
                                            <?php endif; ?>
                                    </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


              
 <?php $__env->stopSection(); ?>
 
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\durshal_cfp\ngo\resources\views/summary_directorate.blade.php ENDPATH**/ ?>