<?php $__env->startSection('content'); ?>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f4f7f6;
			margin: 0;
			padding: 0;
		}
		.container {
			width: 100%;
			margin: auto;
			background: white;
			padding: 10px;
			border: 2px solid #27ae60;
			box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
			border-radius: 10px;
			margin-top: 20px;
		}
		.logo {
			text-align: center;
			margin-bottom: 20px;
		}
		.logo img {
			width: 120px;
			height: auto;
		}
		h2 {
			text-align: center;
			color: #2c3e50;
		}
		table {
			width: 100%;
			border-collapse: collapse;
			margin-top: 20px;
		}
		table, th, td {
			border: 1px solid #ddd;
		}
		th, td {
			padding: 10px;
			text-align: left;
		}
		th {
			background-color: #27ae60;
			color: white;
		}
	</style>
</head>

    
    
<div class="app-content">
  
    <section class="section">
        <!--page-header open-->
        <div class="page-header pt-0">
            <h4 class="page-title font-weight-bold">Application Summary</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-light-color">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Application Summary</li>
            </ol>
        </div>
        <!--page-header closed-->

        <!--row open-->
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card shadow-sm">
                <div class="card-body">
				
					<div class="container">
						<!--<div class="logo">
							<img src="<?php echo e(asset('assets/img/avatar/KP-Logo.png')); ?>" alt="Agency Logo" style="width:50px; height:50px;">
						</div> -->
						<h2>Application</h2>
						<input type="hidden" name="user_id" value="<?php echo e(session('id')); ?>">
						<p><strong>Name of the Agency:</strong> <?php echo e($later['name']); ?> </p>
						<p style="margin-bottom:0px;"><strong>Aims and Objectives:</strong></p> 
							<?php if($later->aims->isNotEmpty()): ?>
								<?php $__currentLoopData = $later->aims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<button class="btn btn-outline-primary btn-sm mt-1"><?php echo e($aim->name); ?></button>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php else: ?>
							<button class="btn btn-primary btn-sm">N/A</button>
							<?php endif; ?>
						
					
						<p><strong>Address:</strong> <?php echo e($later['address']); ?> </p>
						<p><strong>Contact No.:</strong> <?php echo e($later['contact']); ?> </p>
					    <hr>
						<!--*************************************************************************** -->
						<?php $__currentLoopData = $groupedDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $membershipType => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <h5><strong>Names, Occupations & Addresses of the <?php echo e($membershipType); ?></strong></h5>

    <?php if($membershipType == 'General Body'): ?>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>F Name</th>
                    <th>Qualification</th>
                    <th>Occupation</th>
                    <th>Contact</th>
					<th>CNIC</th>
                </tr>
            </thead>
            <tbody>
                <?php $sr = 1; ?>
                <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($sr++); ?></td>
                        <td><?php echo e($detail->name); ?></td>
                        <td><?php echo e($detail->father_name); ?></td>
                        <td><?php echo e($detail->qualification); ?></td>
                        <td><?php echo e($detail->occupation); ?></td>
                        <td><?php echo e($detail->contact); ?></td>
						<td>
							<?php if($detail->cnic): ?>
								<a href="<?php echo e(asset('storage/' . $detail->cnic)); ?>" target="_blank" rel="noopener noreferrer">View CNIC</a>
							<?php else: ?>
								No CNIC
							<?php endif; ?>
						</td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <hr>

    <?php elseif($membershipType == 'Executive Member'): ?>
	<table>
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>F Name</th>
				<th>Qualification</th>
				<th>Designation</th>
				<th>Contact</th>
				<th>Address</th>
				<th>CV</th>
				<th>CNIC</th>
				<th>Police Verification</th>
			</tr>
		</thead>
		<tbody>
			<?php $sr = 1; ?>
			<?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($sr++); ?></td>
					<td><?php echo e($detail->name); ?></td>
					<td><?php echo e($detail->father_name); ?></td>
					<td><?php echo e($detail->qualification); ?></td>
					<td><?php echo e($detail->designation); ?></td>
					<td><?php echo e($detail->contact); ?></td>
					<td><?php echo e($detail->address); ?></td>
					<td>
						<?php if($detail->cv): ?>
							<a href="<?php echo e(asset('storage/' . $detail->cv)); ?>" target="_blank" rel="noopener noreferrer">View CV</a>
						<?php else: ?>
							N/A
						<?php endif; ?>
					</td>
					<td>
						<?php if($detail->cnic): ?>
							<a href="<?php echo e(asset('storage/' . $detail->cnic)); ?>" target="_blank" rel="noopener noreferrer">View CNIC</a>
						<?php else: ?>
							N/A
						<?php endif; ?>
					</td>
					<td>
						<?php if($detail->police_verficaton): ?>
							<a href="<?php echo e(asset('storage/' . $detail->police_verficaton)); ?>" target="_blank" rel="noopener noreferrer">View File</a>
						<?php else: ?>
							N/A
						<?php endif; ?>
					</td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<hr>

	<?php elseif($membershipType == 'Founding Member'): ?>
	<table>
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Occupation</th>
				<th>Address</th>
				<th>CNIC</th>
			</tr>
		</thead>
		<tbody>
			<?php $sr = 1; ?>
			<?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($sr++); ?></td>
					<td><?php echo e($detail->name); ?></td>
					<td><?php echo e($detail->occupation); ?></td>
					<td><?php echo e($detail->address); ?></td>
					<td>
						<?php if($detail->cnic): ?>
							<a href="<?php echo e(asset('storage/' . $detail->cnic)); ?>" target="_blank" rel="noopener noreferrer">View CNIC</a>
						<?php else: ?>
							N/A
						<?php endif; ?>
					</td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<hr>

    <?php elseif($membershipType == 'Member'): ?>
	<table>
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>DOB</th>
				<th>Gender</th>
				<th>Contact</th>
				<th>Email</th>
				<th>CNIC</th>
				<th>Address</th>
			</tr>
		</thead>
		<tbody>
			<?php $sr = 1; ?>
			<?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($sr++); ?></td>
					<td><?php echo e($detail->name); ?></td>
					<td><?php echo e($detail->date_of_birth); ?></td>
					<td><?php echo e($detail->gender); ?></td>
					<td><?php echo e($detail->contact); ?></td>
					<td><?php echo e($detail->email); ?></td>
					<td><?php echo e($detail->cnic); ?></td>
					<td><?php echo e($detail->address); ?></td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<hr>

    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<!-- *********************************************************-->
<h5><strong>Financial Details & List</strong></h5>
<table>
	<thead>
		<tr>
			<th>#</th>
			<th>Bank</th>
			<th>Branch</th>
			<th>Br Code</th>
			<th>Income & Expenditure Statement</th>
			<th>Financing Method</th>
		</tr>
	</thead>
	<tbody>
		<?php $sr = 1; ?>
		<?php $__currentLoopData = $financial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $financial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($sr++); ?></td>
				<td><?php echo e($financial->bank->name ?? 'N/A'); ?></td>
				<td><?php echo e($financial->branch_name ?? 'N/A'); ?></td>
				<td><?php echo e($financial->branch_code ?? 'N/A'); ?></td>
				<td>
					<?php if(!empty($financial->income_expenditure_file)): ?>
						<a href="<?php echo e(asset('storage/' . $financial->income_expenditure_file)); ?>" target="_blank" rel="noopener noreferrer">View File</a>
					<?php else: ?>
						N/A
					<?php endif; ?>
				</td>
				<td><?php echo e($financial->proposedFinance->name ?? 'N/A'); ?></td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</tbody>
</table>
<hr>
<h5><strong>List of Area of Operation & Details</strong></h5>
<table>
	<thead>
		<tr>
			<th>#</th>
			<th>Area</th>
			<th>Future Plan</th>
			<th>Plan Of Operation</th>
			<th>Previous Activities Report</th>
			<th>1st Meeting Minutes</th>
			<th>Last Meeting Minutes</th>
		</tr>
	</thead>
	<tbody>
		<?php $sr = 1; ?>
		<?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $operation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($sr++); ?></td>
				<td><?php echo e($operation->areaOfOperation->name ?? 'N/A'); ?></td>
				<td>
					<?php if($operation->future_plan_file): ?>
						<a href="<?php echo e(asset('storage/' . $operation->future_plan_file)); ?>" target="_blank" rel="noopener noreferrer">View File</a>
					<?php else: ?>
						N/A
					<?php endif; ?>
				</td>
				<td>
					<?php if($operation->plan_operation_file): ?>
						<a href="<?php echo e(asset('storage/' . $operation->plan_operation_file)); ?>" target="_blank" rel="noopener noreferrer">View File</a>
					<?php else: ?>
						N/A
					<?php endif; ?>
				</td>
				<td>
					<?php if($operation->progress_report_file): ?>
						<a href="<?php echo e(asset('storage/' . $operation->progress_report_file)); ?>" target="_blank" rel="noopener noreferrer">View File</a>
					<?php else: ?>
						N/A
					<?php endif; ?>
				</td>
				<td>
					<?php if($operation->first_meeting_file): ?>
						<a href="<?php echo e(asset('storage/' . $operation->first_meeting_file)); ?>" target="_blank" rel="noopener noreferrer">View File</a>
					<?php else: ?>
						N/A
					<?php endif; ?>
				</td>
				<td>
					<?php if($operation->last_meeting_file): ?>
						<a href="<?php echo e(asset('storage/' . $operation->last_meeting_file)); ?>" target="_blank" rel="noopener noreferrer">View File</a>
					<?php else: ?>
						N/A
					<?php endif; ?>
				</td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</tbody>
</table>
<hr>
<?php if($comments_attachments && $comments_attachments->count()): ?>
    <?php $__currentLoopData = $comments_attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment_attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-12 border p-2 mb-2">
            <div class="row">
                <div class="col-8">
                    <h6>Comment</h6>
                    <?php if($comment_attachment->comments): ?>
                        <?php echo e($comment_attachment->comments); ?>

                    <?php else: ?>
                        N/A
                    <?php endif; ?>
                </div>
                <div class="col-4">
                    <h6>Attachment</h6>
                    <?php if($comment_attachment->attachment): ?>
                        <a href="<?php echo e(asset('storage/' . $comment_attachment->attachment)); ?>" target="_blank">View File</a>
                    <?php else: ?>
                        N/A
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>


					<div class="row">
					
						<div class="col-12 text-center mt-3">
							<button id="submit_btn" class="btn btn-primary" data-user-id="<?php echo e(session('id')); ?>" data-basic-info-id="<?php echo e($detail->basic_info_id); ?>">Submit Application</button>
					</div>
						
					</div>
						
					</div>
                </div>
            </div>
        </div>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script>
			$(document).ready(function () {
				$("#submit_btn").click(function () {
					var basicInfoId = $(this).data("basic-info-id");
					var user_id = $(this).data("user-id");
		
					$.ajax({
						url: "<?php echo e(route('submit.first.app')); ?>",
						type: "POST",
						data: {
							basic_info_id: basicInfoId,
							user_id: user_id,
							_token: "<?php echo e(csrf_token()); ?>"
						},
						success: function (response) {
							if (response.success) {
								Swal.fire({
                                 title: "Success!",
                                 text: "Application has been submitted successfully.",
                                 icon: "success",
                                 timer: 2000,
                                 showConfirmButton: false
                             }).then(() => {
                                 window.location.href = "<?php echo e(route('summary')); ?>";
                             });
							} else {
								Swal.fire({
                                 title: "Error!",
                                 text: "Something Went Wrong! Try Again.",
                                 icon: "error",
                                 timer: 2000,
                                 showConfirmButton: false
                             }).then(() => {
                                 window.location.href = "<?php echo e(route('summary')); ?>";
                             });
							}
						},
						error: function () {
							alert("Error processing your request.");
						}
					});
				});
			});
		</script>   
 <?php $__env->stopSection(); ?>
 
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\durshal_cfp\ngo\resources\views/application.blade.php ENDPATH**/ ?>