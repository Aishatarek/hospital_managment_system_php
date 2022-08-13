<?php
session_start();
error_reporting(0);
include("include/config.php");
//Checking Details for reset password
if (isset($_POST['submit'])) {
	$contactno = $_POST['contactno'];
	$email = $_POST['email'];
	$query = mysqli_query($con, "select id from  doctors where contactno='$contactno' and docEmail='$email'");
	$row = mysqli_num_rows($query);
	if ($row > 0) {

		$_SESSION['cnumber'] = $contactno;
		$_SESSION['email'] = $email;
		header('location:reset-password.php');
	} else {
		echo "<script>alert('تفاصيل غير صحيحة. يرجى المحاولة بتفاصيل صحيحة');</script>";
		echo "<script>window.location.href ='forgot-password.php'</script>";
	}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>نسيت كلمة المرور</title>

	<!-- bootstrap  -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<!-- fontawesome  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- google font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital@1&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="../../css/style2.css">
</head>

<body class="login">


	<div class="formdiv">
		<form class="form-login" method="post">
			<h3>
				استعادة كلمة مرور الدكتور
			</h3>
			<p>
				يرجى إدخال بريدك الإلكتروني وكلمة المرور لاستعادة كلمة المرور الخاصة بك.<br />

			</p>

			<div class="form-group form-actions">
				<label>رقم الاتصال المسجل</label>
				<input type="text" class="form-control" name="contactno" placeholder="رقم الاتصال المسجل">

			</div>

			<div class="form-group">
				<label>البريد الالكتروني المسجل</label>
				<input type="email" class="form-control" name="email" placeholder="البريد الالكتروني المسجل">
			</div>

			<div class="form-actions">

				<button type="submit" class="btn btn-primary pull-right" name="submit">
					تغيير
				</button>
			</div>
			<p class="new-account">
				هل لديك حساب؟
				<a href="index.php">
					تسجيل الدخول
				</a>
			</p>
		</form>


		<img src="../../images/pexels-photo-2280547.webp" alt="">

	</div>
	<div class="copyright">
		&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> </span>. <span>جميع الحقوق محفوظة</span>
	</div>
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
	<script src="vendor/modernizr/modernizr.js"></script>
	<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="vendor/switchery/switchery.min.js"></script>
	<script src="vendor/jquery-validation/jquery.validate.min.js"></script>

	<script src="assets/js/main.js"></script>

	<script src="assets/js/login.js"></script>
	<script>
		jQuery(document).ready(function() {
			Main.init();
			Login.init();
		});
	</script>

</body>
<!-- end: BODY -->

</html>