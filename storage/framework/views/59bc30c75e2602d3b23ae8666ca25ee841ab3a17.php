<!DOCTYPE html>
<html lang="en">
<head>
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login - Social Welfare Department</title>
    <link rel="icon" type="image/jpg" href="<?php echo e(asset('assets/img/avatar/logo.png')); ?>">
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
    max-width: 400px;
    background: #fff;
    padding: 1rem;
    border-radius: 12px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    border: 2px solid #28a745;
} 
.login-container h2 {
    text-align: center;
    font-weight: bold;
    color: black; /* Set text color to black */
    font-size: 16px; /* Reduce font size */
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
        .signup-link {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }
        .signup-link a {
            font-weight: bold;
            text-decoration: none;
            color: #0d6efd;
        }
        .signup-link a:hover {
            text-decoration: underline;
        }
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background: #065d2e;
            color: white;
            padding: 10px;
            text-align: center;
            font-size: 14px;
        }

#link{
    text-decoration:none;
    color:#ffffff;
}
    </style>
</head>
<body>

<!-- Login Form -->
<div class="login-container">
    <img src="<?php echo e(asset('assets/img/avatar/KP-Logo.png')); ?>" alt="Logo">
    <h2>Social Welfare Department<br>Government of Khyber Pakhtunkhwa</h2>

    
    <form action="<?php echo e(url('signin')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password">
        </div>
     
        <button type="submit" class="custom-btn">SIGN IN</button>
    </form>
    
    <!-- Sign Up Section -->
    <div class="signup-link">
        <p>Not Registered yet? <a href="<?php echo e(url('register')); ?>">Create an account</a></p>
    </div>

   
</div>

<!-- Footer -->
<div class="footer">
    Directorate of Social Welfare, Special Education & Women Empowerment, <a id="link" href="https://swkpk.gov.pk/">Govt. of Khyber Pakhtunkhwa</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\durshal_cfp\ngo\resources\views/login.blade.php ENDPATH**/ ?>