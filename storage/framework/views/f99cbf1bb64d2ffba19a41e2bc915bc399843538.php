<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authorization to Register</title>
    <link rel="icon" type="image/png" href="<?php echo e(asset('assets/img/avatar/KP-Logo.png')); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .login-container {
            width: 100%;
            max-width: 800px;
            background: #fff;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border: 2px solid #28a745;
            margin-bottom: 2rem;
        }
        .login-container h2 {
            text-align: center;
            font-weight: bold;
            color: black;
            font-size: 16px;
        }
        .login-container img {
            display: block;
            margin: 0 auto 10px;
            width: 80px;
        }
        .custom-btn {
            background-color: #065d2e;
            color: white;
            font-weight: bold;
            padding: 8px;
            border-radius: 6px;
            width: 100%;
            border: none;
        }
        .custom-btn:hover {
            background-color: #054d26;
        }
        .footer {
            width: 100%;
            background: #065d2e;
            color: white;
            padding: 10px;
            text-align: center;
            font-size: 14px;
            margin-top: auto;
        }
        #link {
            text-decoration: none;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <!-- Signup Container -->
    <div class="login-container mt-3">
        <img src="<?php echo e(asset('assets/img/avatar/KP-Logo.png')); ?>" alt="Logo">
        <h2>Social Welfare Department<br>Government of Khyber Pakhtunkhwa</h2>
        <h5 class="text-success text-center">AUTHORIZATION TO REGISTER</h5>
        <form action="<?php echo e(url('register/add')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-6">
                <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control" name="name" placeholder="Type Name Here, e.g Muhammad" value="<?php echo e(old('name')); ?>" required>
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
                </div>
                <div class="col-6">
                <div class="mb-3">
                <label class="form-label">Phone No.</label>
                <input type="text" class="form-control" placeholder="Type Contact #, e.g 03xxxxxxxxx" name="phone_number" value="<?php echo e(old('phone_number')); ?>" required>
                <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" class="form-control" name="email" placeholder="Type Email, e.g name@gmail.com" value="<?php echo e(old('email')); ?>" required>
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
                </div>
                <div class="col-6">
                <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Type Your Password Here" name="password" required>
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
                </div>
            </div>

            <div class="row">
            <div class="col-6">
            <div class="mb-3"> 
            <label class="form-label">Select District</label>
            <select name="district_id" id="district_id" class="form-control" required>
                 <option value="">Choose District</option>
                 <?php $__currentLoopData = $listofdistricts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <option value="<?php echo e($district->id); ?>"><?php echo e($district->name); ?></option>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </select>
            </div>
            </div>

            <div class="col-6">
            <div class="mb-3"> 
            <label class="form-label">Date & Time</label>
            <input type="datetime-local" class="form-control" readonly name="date_time" value="<?= date('Y-m-d\TH:i'); ?>">
            </div>
            </div>
            </div>
            
            <div class="row">
            <div class="d-flex justify-content-between">
                <button type="submit" class="custom-btn">Sign Up</button>
            </div>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <div class="footer">
        Directorate of Social Welfare, Special Education & Women Empowerment, 
        <a id="link" href="https://swkpk.gov.pk/">Govt. of Khyber Pakhtunkhwa</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <?php if(session('success')): ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "<?php echo e(session('success')); ?>",
                showConfirmButton: false,
                timer: 2000
            });

            setTimeout(() => {
                window.location.href = "<?php echo e(route('login')); ?>";
            }, 3000);
        });
    </script>
<?php elseif(session()->has('error')): ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Try again",
                showConfirmButton: false,
                timer: 3000
            });
        });
    </script>
<?php endif; ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\durshal_cfp\ngo\resources\views/register.blade.php ENDPATH**/ ?>