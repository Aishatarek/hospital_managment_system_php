<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if (isset($_POST['submit'])) {
	$fname = $_POST['fname'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$gender = $_POST['gender'];

	$sql = mysqli_query($con, "Update users set fullName='$fname',address='$address',city='$city',gender='$gender' where id='" . $_SESSION['id'] . "'");
	if ($sql) {
		$msg = "تم تحديث الحساب بنجاح";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>تحرير الحساب</title>

	<!-- bootstrap  -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<!-- fontawesome  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- google font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital@1&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="../css/style2.css">


</head>

<body>
	<div id="app">
		<?php include('include/sidebar.php'); ?>
		<div class="app-content">

			<?php include('include/header.php'); ?>

			<!-- end: TOP NAVBAR -->
			<div class="main">
				<div class="container" id="container">
					<div>
						<h3 class="panel-title">تحرير الحساب</h3>

						<h3 style="color: green; font-size:18px; text-align: center;">
							<?php if ($msg) {
								echo htmlentities($msg);
							} ?>
						</h3>

						<form role="form" name="edit" method="post" class="theform2">

							<?php
							$sql = mysqli_query($con, "select * from users where id='" . $_SESSION['id'] . "'");
							while ($data = mysqli_fetch_array($sql)) {
							?>
								<h3><?php echo htmlentities($data['fullName']); ?> </h3>

								<p><b>تاريخ انشاء الحساب: </b><?php echo htmlentities($data['regDate']); ?></p>
								<?php if ($data['updationDate']) { ?>
									<p><b>تاريخ آخر تحديث للحساب: </b><?php echo htmlentities($data['updationDate']); ?></p>
								<?php } ?>
								<hr />
								<div class="form-group">
									<label for="fname">
										اسم المستخدم
									</label>
									<input type="text" name="fname" class="form-control" value="<?php echo htmlentities($data['fullName']); ?>">
								</div>


								<div class="form-group">
									<label for="address">
										العنوان
									</label>
									<textarea name="address" class="form-control"><?php echo htmlentities($data['address']); ?></textarea>
								</div>
								<div class="form-group">
									<label for="city">
										المدينة
									</label>
									<input type="text" name="city" class="form-control" required="required" value="<?php echo htmlentities($data['city']); ?>">
								</div>

								<div class="form-group">
									<label for="gender">
										الجنس
									</label>

									<select name="gender" class="form-control" required="required">
										<option value="<?php echo htmlentities($data['gender']); ?>"><?php echo htmlentities($data['gender']); ?></option>
										<option value="male">ذكر</option>
										<option value="female">انثى</option>
										<option value="other">اخر</option>
									</select>

								</div>

								<div class="form-group">
									<label for="fess">
										البريد الالكتروني
									</label>
									<input type="email" name="uemail" class="form-control" readonly="readonly" value="<?php echo htmlentities($data['email']); ?>">
									<a href="change-emaild.php">تحديث البريد الالكتروني</a>
								</div>







								<button type="submit" name="submit" class="btn btn-o btn-primary">
									تحديث
								</button>
						</form>
					<?php } ?>
					</div>
				</div>
			</div>
		</div>




		<!-- end: BASIC EXAMPLE -->






		<!-- end: SELECT BOXES -->

		<!-- start: FOOTER -->
		<?php include('include/footer.php'); ?>
		<!-- end: FOOTER -->


		<!-- end: SETTINGS -->
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