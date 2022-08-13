<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if (isset($_POST['submit'])) {
	$specilization = $_POST['Doctorspecialization'];
	$doctorid = $_POST['doctor'];
	$userid = $_SESSION['id'];
	$fees = $_POST['fees'];
	$appdate = $_POST['appdate'];
	$time = $_POST['apptime'];
	$userstatus = 1;
	$docstatus = 1;
	$query = mysqli_query($con, "insert into appointment(doctorSpecialization,doctorId,userId,consultancyFees,appointmentDate,appointmentTime,userStatus,doctorStatus) values('$specilization','$doctorid','$userid','$fees','$appdate','$time','$userstatus','$docstatus')");
	if ($query) {
		echo "<script>alert('تم حجز موعدك بنجاح');</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>حجز موعد للمريض</title>


	<!-- bootstrap  -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<!-- fontawesome  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- google font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital@1&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="../css/style2.css">
	<script>
		function getdoctor(val) {
			$.ajax({
				type: "POST",
				url: "get_doctor.php",
				data: 'specilizationid=' + val,
				success: function(data) {
					$("#doctor").html(data);
				}
			});
		}
	</script>


	<script>
		function getfee(val) {
			$.ajax({
				type: "POST",
				url: "get_doctor.php",
				data: 'doctor=' + val,
				success: function(data) {
					$("#fees").html(data);
				}
			});
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
					<!-- start: PAGE TITLE -->
					<div>
						<h3>حجز موعد للمريض</h3>
						<p style="color:red;"><?php echo htmlentities($_SESSION['msg1']); ?>
							<?php echo htmlentities($_SESSION['msg1'] = ""); ?></p>
						<form role="form" name="book" method="post" class="theform2">
							<div class="form-group">
								<label for="DoctorSpecialization">
									الاختصاص المطلوب
								</label>
								<select name="Doctorspecialization" class="form-control" onChange="getdoctor(this.value);" required="required">
									<option value="">اختر اختصار</option>
									<?php $ret = mysqli_query($con, "select * from doctorspecilization");
									while ($row = mysqli_fetch_array($ret)) {
									?>
										<option value="<?php echo htmlentities($row['specilization']); ?>">
											<?php echo htmlentities($row['specilization']); ?>
										</option>
									<?php } ?>

								</select>
							</div>




							<div class="form-group">
								<label for="doctor">
									الدكاترة
								</label>
								<select name="doctor" class="form-control" id="doctor" onChange="getfee(this.value);" required="required">
									<option value="">اختر دكتور</option>
								</select>
							</div>





							<div class="form-group">
								<label for="consultancyfees">
									رسوم الاستشارة
								</label>
								<select name="fees" class="form-control" id="fees" readonly>

								</select>
							</div>

							<div class="form-group">
								<label for="AppointmentDate">
									التاريخ
								</label>
								<input class="form-control datepicker" name="appdate" required="required" data-date-format="yyyy-mm-dd">

							</div>

							<div class="form-group">
								<label for="Appointmenttime">

									الوقت

								</label>
								<input class="form-control" name="apptime" id="timepicker1" required="required">eg : 10:00 PM
							</div>

							<button type="submit" name="submit" class="btn btn-o btn-primary">
								حجز
							</button>
						</form>
					</div>
				</div>
			</div>

		</div>
	</div>

	

	<!-- end: BASIC EXAMPLE -->






	<!-- end: SELECT BOXES -->

	</div>
	</div>
	</div>
	<!-- start: FOOTER -->
	<?php include('include/footer.php'); ?>
	<!-- end: FOOTER -->

	<!-- start: SETTINGS -->
	<?php include('include/setting.php'); ?>

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

		$('.datepicker').datepicker({
			format: 'yyyy-mm-dd',
			startDate: '-3d'
		});
	</script>
	<script type="text/javascript">
		$('#timepicker1').timepicker();
	</script>
	<!-- end: JavaScript Event Handlers for this page -->
	<!-- end: CLIP-TWO JAVASCRIPTS -->

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

</body>

</html>