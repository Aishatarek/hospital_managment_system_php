<?php
session_start();
include("include/config.php");
error_reporting(0);
if (isset($_POST['submit'])) {
	$ret = mysqli_query($con, "SELECT * FROM doctors WHERE docEmail='" . $_POST['username'] . "' and password='" . md5($_POST['password']) . "'");
	$num = mysqli_fetch_array($ret);
	if ($num > 0) {
		$extra = "dashboard.php";
		$_SESSION['dlogin'] = $_POST['username'];
		$_SESSION['id'] = $num['id'];
		$uip = $_SERVER['REMOTE_ADDR'];
		$status = 1;
		$log = mysqli_query($con, "insert into doctorslog(uid,username,userip,status) values('" . $_SESSION['id'] . "','" . $_SESSION['dlogin'] . "','$uip','$status')");
		$host = $_SERVER['HTTP_HOST'];
		$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		header("location:http://$host$uri/$extra");
		exit();
	} else {
		$host  = $_SERVER['HTTP_HOST'];
		$_SESSION['dlogin'] = $_POST['username'];
		$uip = $_SERVER['REMOTE_ADDR'];
		$status = 0;
		mysqli_query($con, "insert into doctorslog(username,userip,status) values('" . $_SESSION['dlogin'] . "','$uip','$status')");
		$_SESSION['errmsg'] = "Invalid username or password";
		$extra = "index.php";
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		header("location:http://$host$uri/$extra");
		exit();
	}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>تسجيل دخول دكتور</title>
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
			<h3>تسجيل دخول الاطباء</h3>

			<p>
				الرجاء إدخال البريد الالكتروني وكلمة المرور لتسجيل الدخول..<br />
				<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg'] = ""; ?></span>
			</p>
			<div class="form-group">
				<label>البريد الالكتروني</label>
					<input type="text" class="form-control" name="username" placeholder="البريد الالكتروني">
			</div>
			<div class="form-group form-actions">
				<label>كلمة المرور</label>
					<input type="password" class="form-control password" name="password" placeholder="كلمة المرور">
				<a href="forgot-password.php">
					نسيت كلمة المرور
				</a>
			</div>
			<div class="form-actions">
				<button type="submit" class="btn btn-primary pull-right" name="submit">
					دخول 
				</button>
			</div>


		</form>

		<img src="../../images/pexels-photo-2280547.webp" alt="">


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