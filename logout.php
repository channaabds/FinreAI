<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Logout</title>
	<!-- SweetAlert2 -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			Swal.fire({
				icon: "success",
				title: "Logout Berhasil",
				text: "Anda telah keluar dari sistem.",
				confirmButtonText: "OK"
			}).then(() => {
				window.location = "login.php";
			});
		});
	</script>
</body>

</html>