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
            timer: 3000
        });
    </script>
<?php endif; ?>

    <section class="section">
        <!--page-header open-->
        <div class="page-header pt-0">
            <h4 class="page-title font-weight-bold">Bank Details </h4>
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
                    <h4 class="font-weight-bold">Financial Details</h4>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(route('financial-detail.add')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="user_id" value="<?php echo e(session('id')); ?>">
     
                        <!-- Checkbox for Yes/No -->
                        <div class="form-group col-lg-12">
                            <label class="form-label font-weight-bold">Do you want to provide all details?</label>
                            <div>
                                <input type="radio" name="details_option" id="details_yes" value="yes" onchange="toggleForm('yes')" required>
                                <label for="details_yes">Yes</label>
                                
                                <input type="radio" name="details_option" id="details_no" value="no" onchange="toggleForm('no')">
                                <label for="details_no">No</label>
                            </div>
                        </div>
                    





                        
                        <!-- Agency Name (Always Visible) -->
                        <div class="form-group col-lg-6">
                            <label class="form-label font-weight-bold" for="basic_info_id">Select Name Agency</label>
                            <select name="basic_info_id" id="basic_info_id" class="form-control" required>
                                <option value="">Choose Name Agency</option>
                                <?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    
                        <!-- Form Section (Hidden when No is selected) -->
                        <div id="full-form">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="form-label font-weight-bold" for="bank_id">Select Bank</label>
                                    <select name="bank_id" id="bank_id" class="form-control">
                                        <option value="">Choose Bank</option>
                                        <?php $__currentLoopData = $bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="form-label font-weight-bold">Bank Branch Name</label>
                                    <input class="form-control form-control-lg" type="text" name="branch_name">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="form-label font-weight-bold">Bank Branch Code</label>
                                    <input class="form-control form-control-lg" type="text" name="branch_code">
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="form-label font-weight-bold">Income & Expenditure Statement</label>
                                    <input class="form-control form-control-lg" type="file" name="income_expenditure_file">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="form-label font-weight-bold" for="prop_finan_id">Select Financing Method</label>
                                    <select name="prop_finan_id" id="prop_finan_id" class="form-control">
                                        <option value="">Choose Financing Method</option>
                                        <?php $__currentLoopData = $proposed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Last File Section -->
                        <div id="last-file-section" style="display: none;">
                            <div class="form-group col-lg-12">
                                <label class="form-label font-weight-bold">Income & Expenditure Statement</label>
                                <input class="form-control form-control-lg" type="file" name="income_expenditure_file">
                            </div>
                        </div>
                    
                        <!-- Submit Button -->
                        <div class="row">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </div>
                    </form>
                    
                    <script>
                        function toggleForm(option) {
                            if (option === 'no') {
                                document.getElementById('full-form').style.display = 'none';
                                document.getElementById('last-file-section').style.display = 'block';
                            } else if (option === 'yes') {
                                document.getElementById('full-form').style.display = 'block';
                                document.getElementById('last-file-section').style.display = 'none';
                            }
                        }
                    </script>
                    

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card export-database">
                    <div class="card-header">
                        <h4>Financial Detail</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
							<table id="example" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Bank Branch Name</th>
                                        <th>Bank  Name</th>
                                        <th>Bank Branch Code</th>
										<th>Income & Expenditure</th>
                                        <th> Proposed to be financed</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                
                                    <tbody>
                                        <?php $__currentLoopData = $financial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $financial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($financial->id); ?></td>
                                      
                                        <td><?php echo e($financial->bank ? $financial->bank->name : 'N/A'); ?></td>
                                      
                                 
                                            <td><?php echo e($financial->branch_name); ?></td>
                                            <td><?php echo e($financial->branch_code); ?></td>
                                            <td>
                                                <?php if($financial->income_expenditure_file): ?>
                                                    <a href="<?php echo e(asset('storage/' . $financial->income_expenditure_file)); ?>" target="_blank" rel="noopener noreferrer">View File</a>
                                                <?php else: ?>
                                                    N/A
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($financial->proposedFinance ? $financial->proposedFinance->name : 'N/A'); ?></td>

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
        </div>
    </section>
</div>


              
 <?php $__env->stopSection(); ?>
 
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\durshal_cfp\ngo\resources\views/financial-detail.blade.php ENDPATH**/ ?>