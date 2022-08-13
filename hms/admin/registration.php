<?php
include_once('include/config.php');
if (isset($_POST['submit'])) {
	$fname = $_POST['full_name'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$query = mysqli_query($con, "insert into users(fullname,address,city,gender,email,password) values('$fname','$address','$city','$gender','$email','$password')");
	if ($query) {
		echo "<script>alert('سجلت بنجاح. يمكنك تسجيل الدخول الآن');</script>";
	}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>تسجيل المستخدم</title>

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
	<!-- start: REGISTRATION -->

	<!-- start: REGISTER BOX -->
	<div class="formdiv">
		<form name="registration" id="registration" method="post">
			<h3>
				تسجيل دخول
			</h3>
			<p>
				أدخل بياناتك الشخصية أدناه:
			</p>
			<div class="form-group">
				<input type="text" class="form-control" name="full_name" placeholder="Full Name" required>
			</div>
			<div class="form-group">
				<input type="text" class="form-control" name="address" placeholder="Address" required>
			</div>
			<div class="form-group">
				<input type="text" class="form-control" name="city" placeholder="City" required>
			</div>
			<div class="form-group">
				<label class="block">
					الجنس
				</label>
				<div class="clip-radio radio-primary">
					<input type="radio" id="rg-female" name="gender" value="female">
					<label for="rg-female">
						<span></span>
						انثى
					</label>
					<input type="radio" id="rg-male" name="gender" value="male">
					<label for="rg-male">
						<span></span>
						ذكر
					</label>
				</div>
			</div>
			<p>
				أدخل تفاصيل حسابك أدناه:
			</p>
			<div class="form-group">
				<input type="email" class="form-control" name="email" id="email" onBlur="userAvailability()" placeholder="Email" required>
				<span id="user-availability-status1" style="font-size:12px;"></span>
			</div>
			<div class="form-group">
				<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
			</div>
			<div class="form-group">
				<input type="password" class="form-control" name="password_again" placeholder="Password Again" required>
			</div>
			<div class="form-group">
				<div class="checkbox clip-check check-primary">
					<input type="checkbox" id="agree" value="agree">
					<label for="agree">
						العمر
					</label>
				</div>
			</div>
			<div class="form-actions">
				<p>
					هل لديك حساب
					<a href="user-login.php">
						تسجيل الدخول
					</a>
				</p>
				<button type="submit" class="btn btn-primary pull-right" id="submit" name="submit">
					ارسال <i class="fa fa-arrow-circle-right"></i>
				</button>
			</div>
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

	<script>
		function userAvailability() {
			$("#loaderIcon").show();
			jQuery.ajax({
				url: "check_availability.php",
				data: 'email=' + $("#email").val(),
				type: "POST",
				success: function(data) {
					$("#user-availability-status1").html(data);
					$("#loaderIcon").hide();
				},
				error: function() {}
			});
		}
	</script>

</body>
<!-- end: BODY -->

</html>