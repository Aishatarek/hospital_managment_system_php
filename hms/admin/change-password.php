<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
date_default_timezone_set('Asia/Kolkata'); // change according timezone
$currentTime = date('d-m-Y h:i:s A', time());
if (isset($_POST['submit'])) {
	$sql = mysqli_query($con, "SELECT password FROM  admin where password='" . $_POST['cpass'] . "' && username='" . $_SESSION['login'] . "'");
	$num = mysqli_fetch_array($sql);
	if ($num > 0) {
		$con = mysqli_query($con, "update admin set password='" . $_POST['npass'] . "', updationDate='$currentTime' where username='" . $_SESSION['login'] . "'");
		$_SESSION['msg1'] = "تم تغير كلمة المرور بنجاح ";
	} else {
		$_SESSION['msg1'] = "كلمة المرور القديمة غير متطابقة !!";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>تغير كلمة المرور</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta content="" name="description" />
	<meta content="" name="author" />
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
			if (document.chngpwd.cpass.value == "") {
				alert("Current Password Filed is Empty !!");
				document.chngpwd.cpass.focus();
				return false;
			} else if (document.chngpwd.npass.value == "") {
				alert("New Password Filed is Empty !!");
				document.chngpwd.npass.focus();
				return false;
			} else if (document.chngpwd.cfpass.value == "") {
				alert("Confirm Password Filed is Empty !!");
				document.chngpwd.cfpass.focus();
				return false;
			} else if (document.chngpwd.npass.value != document.chngpwd.cfpass.value) {
				alert("Password and Confirm Password Field do not match  !!");
				document.chngpwd.cfpass.focus();
				return false;
			}
			return true;
		}
	</script>

</head>

<body>
	<div id="app">
		<?php include('include/sidebar.php'); ?>
		<div class="app-content">

			<?php include('include/header.php'); ?>

			<!-- end: TOP NAVBAR -->
			<div class="main">
				<div class="container" id="container">
					<?php echo htmlentities($_SESSION['msg1'] = ""); ?></p>
					<form class="theform2" role="form" name="chngpwd" method="post" onSubmit="return valid();">
						<p style="color:red;"><?php echo htmlentities($_SESSION['msg1']); ?>
						<h3 class="panel-title">تغير كلمة المرور</h3>
						<div class="form-group">
							<label for="exampleInputEmail1">
								كلمة المرور الحالية
							</label>
							<input type="password" name="cpass" class="form-control" placeholder="كلمة المرور الحالية">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">
								كلمة المرور الجديدة
							</label>
							<input type="password" name="npass" class="form-control" placeholder="كلمة المرور الجديدة">
						</div>

						<div class="form-group">
							<label for="exampleInputPassword1">
								تاكيد كلمة المرور الجديدة
							</label>
							<input type="password" name="cfpass" class="form-control" placeholder="تاكيد كلمة المرور الجديدة">
						</div>



						<button type="submit" name="submit" class="btn btn-o btn-primary">
							تغير
						</button>
					</form>
				</div>
			</div>
		</div>

		<!-- start: FOOTER -->
		<?php include('include/footer.php'); ?>
		<!-- end: FOOTER -->

	</div>
	<!-- start: MAIN JAVASCRIPTS -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
	<script src="vendor/modernizr/modernizr.js"></script>
	<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="vendor/switchery/switchery.min.js"></script>
	<!-- end: MAIN JAVASCRIPTS -->
	<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
	<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
	<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
	<script src="vendor/autosize/autosize.min.js"></script>
	<script src="vendor/selectFx/classie.js"></script>
	<script src="vendor/selectFx/selectFx.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
	<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
	<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
	<!-- start: CLIP-TWO JAVASCRIPTS -->
	<script src="assets/js/main.js"></script>
	<!-- start: JavaScript Event Handlers for this page -->
	<script src="assets/js/form-elements.js"></script>
	<script>
		jQuery(document).ready(function() {
			Main.init();
			FormElements.init();
		});
	</script>
	<!-- end: JavaScript Event Handlers for this page -->
	<!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>