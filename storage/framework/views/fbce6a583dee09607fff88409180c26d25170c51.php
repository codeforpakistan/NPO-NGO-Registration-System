<?php $__env->startSection('content'); ?>
<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
.modal {
    z-index: 1050 !important;
}
.modal-backdrop {
    z-index: 1040 !important;
}
</style>  
</head> 
<div class="app-content">

<div class="modal fade" id="basicInfoModal" tabindex="-1" role="dialog" aria-labelledby="basicInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Application Timeline</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Stage</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody id="modal-data">
                        <!-- Data will be injected here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

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
                                       <!-- <th>Aim Objective</th>-->
                                        <th>Action</th>
                                        <th>Timeline</th>
                                    </tr>
                                </thead>
                            
                                <tbody>
                                    <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                    <tr>
                                        <td class="text-center align-middle"><strong><?php echo e($record->id); ?></strong></td>
                                        <td class="text-center align-middle"><?php echo e($record->name); ?></td>
                                        <td class="text-center align-middle"><?php echo e($record->contact); ?></td>
                                        <td class="text-center align-middle"><?php echo e($record->address); ?></td>
                            
                                       <!-- <td>
                                            <?php if($record->aims->isNotEmpty()): ?>
                                                <?php $__currentLoopData = $record->aims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <button class="btn btn-sm btn-primary mb-1"><?php echo e($aim->name); ?></button><br>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                N/A
                                            <?php endif; ?>
                                        </td> -->
                            
                                        <td class="text-center align-middle">
                                            <?php if($record->status==1): ?>
                                            <a href="<?php echo e(url('application/district/view')); ?>/<?php echo e($record->id); ?>"><button
                                                class="btn btn-primary"
                                                data-target="#user-form-modal" data-toggle="modal"
                                                type="button">View</button>
                                            </a>
                                            <?php else: ?>
                                            <strong>Forwarded</strong>
                                            <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                    <button class="btn btn-outline-primary btn-sm view-basic-info" 
                                     data-user-id="<?php echo e(session('id')); ?>" 
                                     data-basic-info-id="<?php echo e($record->id); ?>" 
                                     data-toggle="modal" 
                                     data-target="#basicInfoModal">
                                     View
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
<!-- jQuery AJAX Script -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".view-basic-info").forEach(function (button) {
        button.addEventListener("click", function () {
            var basic_info_id = this.getAttribute("data-basic-info-id");
            var user_id = this.getAttribute("data-user-id");

            fetch("<?php echo e(route('loadNGOtimeline')); ?>?basic_info_id=" + basic_info_id + "&user_id=" + user_id, {
                method: "GET",
                headers: {
                    "X-Requested-With": "XMLHttpRequest"
                }
            })
            .then(response => response.json())
            .then(data => {
            if (data.data && data.data.length > 0) {
               var html = '';
               data.data.forEach(info => {
                   var createdAt = new Date(info.created_at).toLocaleString("en-US", {
                       year: "numeric",
                       month: "2-digit",
                       day: "2-digit",
                       hour: "2-digit",
                       minute: "2-digit",
                       hour12: true
                   });
       
                   html += `
                       <tr>
                           <td>${info.id}</td>
                           <td>${info.stage}</td>
                           <td><button class="btn btn-primary btn-sm">${info.status}</button></td>
                           <td>${createdAt}</td>
                       </tr>
                   `;
               });
       
               document.getElementById("modal-data").innerHTML = html;
           } else {
                    alert("No data found");
                }
            })
            .catch(error => {
                console.error("Error fetching data:", error);
                alert("Error fetching data");
            });
        });
    });
});
</script>         
 <?php $__env->stopSection(); ?>
 
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\durshal_cfp\ngo\resources\views/ad_forwarded_apps.blade.php ENDPATH**/ ?>