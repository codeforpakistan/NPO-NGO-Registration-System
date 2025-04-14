<?php $__env->startSection('content'); ?>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>

    
    
<div class="app-content">
  
    <section class="section">
        <!--page-header open-->
        <div class="page-header pt-0">
            <h4 class="page-title font-weight-bold">Bank Form</h4>
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
                    <h4 class="font-weight-bold">Proposed  Detail</h4>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(url('addproposed/add')); ?>"
                    method="POST">
                    <?php echo csrf_field(); ?>

                    <!-- First Row (Name and CNIC) -->
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label class="form-label font-weight-bold"> Bank Name </label>
                            <input class="form-control form-control-lg" type="text"
                                name="name" required>
                        </div>
                      

                    </div>


                 

                 
                    <!-- Submit Button -->
                    <div class="row">
                        <div class="col-lg-0">
                            <button type="submit"
                                class="btn btn-primary btn-lg">Submit</button>
                        </div>
                                                                                   <div class="col-lg-2 text-center">
    <a href="<?php echo e(url('executive-member')); ?>" class="btn btn-primary btn-lg">Next</a>
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
                                        <th>Name Of Bank</th>
                                    
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
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
 
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\durshal_cfp\ngo\resources\views/sitting/proposed.blade.php ENDPATH**/ ?>