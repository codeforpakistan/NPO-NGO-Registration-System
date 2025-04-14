









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authorization to Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            width: 400px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
        }
        .header img {
            width: 80px;
        }
        .header h5 {
            margin-top: 10px;
            font-weight: bold;
        }
        .btn-custom {
            background-color: green;
            color: white;
        }
    </style>
</head>
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
<body>
    <div class="card">
        <div class="header">
			<img src="<?php echo e(asset('assets/img/avatar/KP-Logo.png')); ?>" alt="Logo">
			<h2>Social Welfare Department<br>Govt of Khyber Pakhtunkhwa</h2>
            <h6 class="text-success">AUTHORIZATION TO REGISTER</h6>
        </div>
		<form class="form-horizontal" action="<?php echo e(url('register/add')); ?>"
		method="POST">
		<?php echo csrf_field(); ?>
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>
           
          
            <div class="mb-3">
                <label class="form-label">Phone No.</label>
                <input type="text" class="form-control" name="phone_number" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-custom">Sign Up</button>
               
            </div>
        </form>
    </div>
</body>
</html>
<?php /**PATH D:\xampp\htdocs\durshal_cfp\ngo\resources\views/register.blade.php ENDPATH**/ ?>