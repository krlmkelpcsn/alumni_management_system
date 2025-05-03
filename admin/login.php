<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('./db_connect.php');
ob_start();
if (!isset($_SESSION['system'])) {
	$system = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
	foreach ($system as $k => $v) {
		$_SESSION['system'][$k] = $v;
	}
}
ob_end_flush();
?>

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title><?php echo $_SESSION['system']['name'] ?></title>
	<?php include('./header.php'); ?>
	<?php
	if (isset($_SESSION['login_id']))
		header("location:/index.php?page=home");
	?>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

</head>
<style>
	body {
		height: 100vh;
		color: white;
		background: #1A535C;
		display: flex;
		justify-content: center;
		align-items: center;
		font-family: Arial, sans-serif;
	}

	#login-form {
		width: 25%;
		color: white;
		padding: 1em 2em;
		backdrop-filter: blur(16px) saturate(180%);
		-webkit-backdrop-filter: blur(16px) saturate(180%);
		background-color: rgba(17, 25, 40, 0.75);
		border-radius: 12px;
		box-shadow: 0 0 5px rgba(255, 255, 255, 0.725);
		animation: fadeIn 1s ease-out;
	}

	.head {
		display: flex;
		flex-direction: column;
		align-items: center;
		gap: 1rem;
	}

	.head img {
		width: 100px;
		border-radius: 50%;
		margin-bottom: 1rem;
		animation: bounceIn 1.2s ease-out;
	}

	h2 {
		text-align: center;
	}

	.form-group {
		margin-bottom: 1.9em;
	}

	.form-control {
		border: none;
		border-radius: 5px;
		padding: 10px;
		font-size: 14px;
	}

	#btn {
		box-shadow: 0 0 5px rgba(255, 255, 255, 0.225);
		transition: all 0.3s ease;
		font-size: 16px;
	}

	#btn:hover {
		background-color: #0056b3;
		box-shadow: 0 0 8px rgba(255, 255, 255, 0.5);
	}

	/* Animations */
	@keyframes fadeIn {
		0% {
			opacity: 0;
			transform: translateY(20px);
		}

		100% {
			opacity: 1;
			transform: translateY(0);
		}
	}

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
</style>

<body>
	<form id="login-form" class="animate__animated animate__fadeInDown">
		<div class="head">
			<img src="assets/img/logo.jpg" alt="login-logo" class="animate__animated animate__bounceIn">
			<h2>LOGIN</h2>
		</div>
		<div class="form-group">
			<label for="username" class="control-label">Username</label>
			<input type="text" id="username" name="username" class="form-control" placeholder="Enter your username...">
		</div>
		<div class="form-group">
			<label for="password" class="control-label">Password</label>
			<input type="password" id="password" name="password" class="form-control" placeholder="Enter your password...">
		</div>
		<center>
			<button id="btn" class="btn-sm btn-block btn-wave rounded p-2 mb-3 col-md-4 btn-primary">Login</button>
		</center>
	</form>

	<script>
		$('#login-form').submit(function(e) {
			e.preventDefault();
			$('#login-form button[type="button"]').attr('disabled', true).html('Logging in...');
			if ($(this).find('.alert-danger').length > 0)
				$(this).find('.alert-danger').remove();
			$.ajax({
				url: 'ajax.php?action=login',
				method: 'POST',
				data: $(this).serialize(),
				error: err => {
					console.log(err);
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				},
				success: function(resp) {
					if (resp == 1) {
						location.href = 'index.php?page=home';
					} else {
						$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>');
						$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
					}
				}
			});
		});
	</script>
</body>

</html>