<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if (isset($_POST['submit'])) {
	$docid = $_SESSION['id'];
	$patname = $_POST['patname'];
	$patcontact = $_POST['patcontact'];
	$patemail = $_POST['patemail'];
	$gender = $_POST['gender'];
	$pataddress = $_POST['pataddress'];
	$patage = $_POST['patage'];
	$medhis = $_POST['medhis'];
	$sql = mysqli_query($con, "insert into tblpatient(Docid,PatientName,PatientContno,PatientEmail,PatientGender,PatientAdd,PatientAge,PatientMedhis) values('$docid','$patname','$patcontact','$patemail','$gender','$pataddress','$patage','$medhis')");
	if ($sql) {
		echo "<script>alert('تمت إضافة معلومات المريض بنجاح');</script>";
		header('location:add-patient.php');
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>اضافة مريض</title>
	<!-- bootstrap  -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<!-- fontawesome  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- google font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital@1&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="../../css/style2.css">
	<script>
		function userAvailability() {
			$("#loaderIcon").show();
			jQuery.ajax({
				url: "check_availability.php",
				data: 'email=' + $("#patemail").val(),
				type: "POST",
				success: function(data) {
					$("#user-availability-status1").html(data);
					$("#loaderIcon").hide();
				},
				error: function() {}
			});
		}
	</script>
</head>

<body>
	<div id="app">
		<?php include('include/sidebar.php'); ?>
		<?php include('include/header.php'); ?>

		<div class="main">
			<div class="container" id="container">
				<div>
					<form role="form" name="" method="post" class="theform2">
						<h3 class="mainTitle">اضافة مريض </h3>
						<div class="form-group">
							<label for="doctorname">
								اسم المريض
							</label>
							<input type="text" name="patname" class="form-control" placeholder="ادخل اسم المريض" required="true">
						</div>
						<div class="form-group">
							<label for="fess">
								رقم هاتف المريض
							</label>
							<input type="text" name="patcontact" class="form-control" placeholder=" رقم هاتف المريض " required="true" maxlength="10" pattern="[0-9]+">
						</div>
						<div class="form-group">
							<label for="fess">
								البريد الالكتروني
							</label>
							<input type="email" id="patemail" name="patemail" class="form-control" placeholder="اكتب بريد المريض حتى يتم ارسال التقرير له" required="true" onBlur="userAvailability()">
							<span id="user-availability-status1" style="font-size:12px;"></span>
						</div>
						<div class="form-group">
							<label class="block">
								جنس المريض
							</label>
							<div class="clip-radio radio-primary">
								<input type="radio" id="rg-female" name="gender" value="انثى">
								<label for="rg-female">
									<span></span>
									انثى
								</label>
								<input type="radio" id="rg-male" name="gender" value="ذكر">
								<label for="rg-male">
									<span></span>
									ذكر
								</label>
							</div>
						</div>
						<div class="form-group">
							<label for="address">
								عنوان المريض
							</label>
							<textarea name="pataddress" class="form-control" placeholder="اكتب عنوان المريض " required="true"></textarea>
						</div>
						<div class="form-group">
							<label for="fess">
								عمر المريض
							</label>
							<input type="text" name="patage" class="form-control" placeholder="اكتب عمر المريض" required="true">
						</div>
						<div class="form-group">
							<label for="fess">
								تقرير حول حالة المريض
							</label>
							<textarea type="text" name="medhis" class="form-control" placeholder="اكتب تقرير حول حالة المريض الان" required="true"></textarea>
						</div>

						<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
							ارسال
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