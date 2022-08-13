<?php
session_start();
//error_reporting(0);
include("include/config.php");
// Code for updating Password
if (isset($_POST['change'])) {
	$cno = $_SESSION['cnumber'];
	$email = $_SESSION['email'];
	$newpassword = md5($_POST['password']);
	$query = mysqli_query($con, "update doctors set password='$newpassword' where contactno='$cno' and docEmail='$email'");
	if ($query) {
		echo "<script>alert('تم تغير كلمة المرور بنجاح.');</script>";
		echo "<script>window.location.href ='index.php'</script>";
	}
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>إعادة تعيين كلمة المرور</title>
	<!-- bootstrap  -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<!-- fontawesome  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- google font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital@1&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="../../css/style2.css">

	<script type="text/javascript">
		function valid() {
			if (document.passwordreset.password.value != document.passwordreset.password_again.value) {
				alert("Password and Confirm Password Field do not match  !!");
				document.passwordreset.password_again.focus();
				return false;
			}
			return true;
		}
	</script>
</head>

<body class="login">

	<div class="formdiv">
		<form name="passwordreset" method="post" onSubmit="return valid();">
			<h3>
				إعادة تعيين كلمة مرور الدكتور
			</h3>
			<p>
				يرجى تعيين كلمة المرور الجديدة الخاصة بك.<br />
				<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg'] = ""; ?></span>
			</p>

			<div class="form-group">
				<input type="password" class="form-control" id="password" name="password" placeholder="كلمة المرور الجديدة" required>
			</div>


			<div class="form-group">
				<input type="password" class="form-control" id="password_again" name="password_again" placeholder="تاكيد كلمة المرور" required>
			</div>


			<div class="form-actions">

				<button type="submit" class="btn btn-primary pull-right" name="change">
					تغير
				</button>
			</div>
			<p class="new-account">
				هل لديك حساب؟
				<a href="index.php">
					سجل دخول
				</a>
			</p>
		</form>
		<img src="../../images/pexels-photo-2280547.webp" alt="">

	</div>
	<div class="copyright">
		&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> </span><span>جميع الحقوق محفوظة</span>
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