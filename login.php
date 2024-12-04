<?php session_start(); ?>
<div class="container3 d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-sm p-4" style="width: 100%; max-width: 400px; border-radius: 10px;">
        <div class="text-center mb-4">
            <img src="img/logo.jpg" alt="Login Logo" class="img-fluid" style="width: 80px; border-radius: 50%;">
            <h3 class="text-primary mt-3">Login</h3>
        </div>
        <form action="" id="login-frm" novalidate>
            <!-- Email Field -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="username" class="form-control" placeholder="Enter your email" required>
            </div>
            <!-- Password Field -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                <div class="mt-2">
                    <small>
                        <a href="index.php?page=signup" id="new_account" class="text-decoration-none text-primary">Register Account</a>
                    </small>
                </div>
            </div>
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</div>

<style>
/* General Styling */
body {
    background: #f8f9fa;
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
}

.container3 {
    padding: 1rem;
}

/* Card Styling */
.card {
    border: none;
    background: #fff;
    box-shadow: 0px 10px 12px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
		animation: fadeIn 1s ease-out;
}

/* Logo Styling */
.card img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 50%;
    box-shadow: 0px 10px 8px rgba(0, 0, 0, 0.2);
		animation: bounceIn 1.2s ease-out;
}

/* Form Styling */
.form-label {
    font-size: 14px;
    color: #555;
    font-weight: 500;
}

.form-control {
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 10px 12px;
    font-size: 14px;
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

/* Button Styling */
.btn-primary {
    background-color: #007bff;
    border: none;
    padding: 10px 15px;
    font-size: 16px;
    font-weight: 600;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background-color: #0056b3;
}

/* Link Styling */
.text-primary {
    color: #007bff;
    font-weight: 500;
}

.text-primary:hover {
    text-decoration: underline;
}
/* Fade-In Animation */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Bounce-In Animation */
@keyframes bounceIn {
    0% {
        transform: scale(0.9);
        opacity: 0;
    }
    50% {
        transform: scale(1.1);
        opacity: 0.5;
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}

/* Mobile Responsiveness */
@media (max-width: 576px) {
    .card {
        padding: 20px;
    }

    .card img {
        width: 60px;
        height: 60px;
    }
}
</style>


<script>
	$('#login-frm').submit(function(e){
		e.preventDefault()
		$('#login-frm button[type="submit"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'admin/ajax.php?action=login2',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php?page=home' ?>';
				}else if(resp == 2){
					$('#login-frm').prepend('<div class="alert alert-danger">Your account is not yet verified.</div>')
					$('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');
				}else{
					$('#login-frm').prepend('<div class="alert alert-danger">Email or password is incorrect.</div>')
					$('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>