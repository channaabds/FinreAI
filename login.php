<?php
@ob_start();
session_start();
if (isset($_POST['proses'])) {
	require 'config.php';

	$user = strip_tags($_POST['user']);
	$pass = strip_tags($_POST['pass']);

	$sql = 'SELECT member.*, login.user, login.pass
            FROM member
            INNER JOIN login ON member.id_member = login.id_member
            WHERE user = ? AND pass = md5(?)';
	$row = $config->prepare($sql);
	$row->execute([$user, $pass]);
	$jum = $row->rowCount();
	if ($jum > 0) {
		$hasil = $row->fetch();
		$_SESSION['admin'] = $hasil;

		// Outputkan JavaScript untuk SweetAlert
		echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: "success",
                    title: "Login Berhasil",
                    text: "Selamat datang kembali!",
                    confirmButtonText: "OK"
                }).then(() => {
                    window.location = "index.php";
                });
            });
        </script>';
	} else {
		// Outputkan JavaScript untuk SweetAlert
		echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: "error",
                    title: "Login Gagal",
                    text: "User ID atau Password salah!",
                    confirmButtonText: "Coba Lagi"
                }).then(() => {
                    history.go(-1);
                });
            });
        </script>';
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Login - FinreAI</title>
	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900"
		rel="stylesheet">
	<!-- Custom styles for this template-->
	<link href="sb-admin/css/sb-admin-2.min.css" rel="stylesheet">
	<!-- sweetalert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<style>
		body {
			background: linear-gradient(to right, #6a11cb, #2575fc);
			font-family: 'Nunito', sans-serif;
		}

		.card {
			border-radius: 15px;
			box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
		}

		.btn-primary {
			background: linear-gradient(to right, #4e54c8, #8f94fb);
			border: none;
		}

		.btn-primary:hover {
			background: linear-gradient(to right, #3a3fcb, #7178fb);
		}

		.form-control-user {
			border-radius: 20px;
			padding: 15px;
		}

		.login-illustration {
			max-width: 50%;
			height: auto;
			margin-bottom: 20px;
		}

		.welcome-text {
			color: #6a11cb;
			font-weight: 700;
		}

		.text-gray-900 {
			color: #2e2e2e !important;
		}
	</style>
</head>

<body>
	<div class="container">
		<!-- Outer Row -->
		<div class="row justify-content-center align-items-center min-vh-100">
			<div class="col-md-6">
				<div class="card o-hidden border-0 shadow-lg">
					<div class="card-body p-5">
						<!-- Nested Row within Card Body -->
						<div class="text-center">
							<img src="illustration-login.svg" alt="Login Illustration" class="login-illustration">
							<h4 class="h4 welcome-text mb-4">Welcome Back to <span style="color: #2575fc;">FinreAI</span></h4>
						</div>
						<form class="form-login" method="POST">
							<div class="form-group">
								<input type="text" class="form-control form-control-user" name="user"
									placeholder="User ID" autofocus>
							</div>
							<div class="form-group">
								<input type="password" class="form-control form-control-user" name="pass"
									placeholder="Password">
							</div>
							<button class="btn btn-primary btn-block btn-lg" name="proses" type="submit">
								<i class="fa fa-lock"></i> SIGN IN
							</button>
						</form>
						<hr>
						<div class="text-center">
							<a class="small" href="#">Forgot Password?</a>
						</div>
						<div class="text-center">
							<a class="small" href="#">Create an Account!</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="sb-admin/vendor/jquery/jquery.min.js"></script>
	<script src="sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Core plugin JavaScript-->
	<script src="sb-admin/vendor/jquery-easing/jquery.easing.min.js"></script>
	<!-- Custom scripts for all pages-->
	<script src="sb-admin/js/sb-admin-2.min.js"></script>
</body>

</html>