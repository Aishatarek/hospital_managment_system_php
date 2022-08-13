<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>لوحة تحكم المسؤول</title>

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

<body>
	<div id="app">
		<?php include('include/sidebar.php'); ?>

		<?php include('include/header.php'); ?>
		<!-- end: TOP NAVBAR -->

		<section class="main">
			<h3>لوحة تحكم المسؤول</h3>
			<div class="container">
				<div class='row cardss' dir="rtl">
					<div class='col-lg-4 cardy col-md-4 col-sm-12'>
						<a class='linkuser' href='manage-users.php'>
							<div class='users'>
								<i class="fa-solid fa-users"></i>
								<p> ادارة المستخدمين </p>
								<h5>
									<?php $result = mysqli_query($con, "SELECT * FROM users ");
									$num_rows = mysqli_num_rows($result); {
									?>
										اجمالي المستخدمين :<?php echo htmlentities($num_rows);
														} ?>
								</h5>
							</div>
						</a>
					</div>

					<div class='col-lg-4 cardy col-md-4 col-sm-12'>
						<a class='linkuser' href='Manage-doctors.php'>
							<div class='users'>
								<i class="fa-solid fa-user-doctor"></i>
								<p>ادارة الاطباء</p>
								<h5>
									<?php $result1 = mysqli_query($con, "SELECT * FROM doctors ");
									$num_rows1 = mysqli_num_rows($result1); {
									?>
										اجمالي الاطباء :<?php echo htmlentities($num_rows1);
													} ?>
								</h5>
							</div>
						</a>
					</div>
					<div class='col-lg-4 cardy col-md-4 col-sm-12'>
						<a class='linkuser' href='appointment-history.php'>
							<div class='users'>
								<i class="fa-solid fa-list-check"></i>
								<p>المواعيد </p>
								<h5>
									<?php $sql = mysqli_query($con, "SELECT * FROM appointment");
									$num_rows2 = mysqli_num_rows($sql); {
									?>
										اجمالي المواعيد:<?php echo htmlentities($num_rows2);
													} ?>
								</h5>
							</div>
						</a>
					</div>
					<div class='col-lg-4 cardy col-md-4 col-sm-12'>
						<a class='linkuser' href='manage-patient.php'>
							<div class='users'>
								<i class="fa-solid fa-hospital-user"></i>
								<p>ادارة المرضى</p>
								<h5>
									<?php $result = mysqli_query($con, "SELECT * FROM tblpatient ");
									$num_rows = mysqli_num_rows($result); {
									?>
										اجمالي المرضى:<?php echo htmlentities($num_rows);
													} ?>
								</h5>
							</div>
						</a>
					</div>
					<div class='col-lg-4 cardy col-md-4 col-sm-12'>
						<a class='linkuser' href='unread-queries.php'>
							<div class='users'>
								<i class="fa-solid fa-file"></i>
								<p>الاستشارات</p>
								<h5>
									<?php
									$sql = mysqli_query($con, "SELECT * FROM tblcontactus where  IsRead is null");
									$num_rows22 = mysqli_num_rows($sql);
									?>
									اجمالي الاستشارات:<?php echo htmlentities($num_rows22);   ?>

								</h5>
							</div>
						</a>
					</div>
				</div>
			</div>
		</section>
		<!-- end: SELECT BOXES -->


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