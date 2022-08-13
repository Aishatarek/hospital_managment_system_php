<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if (isset($_GET['cancel'])) {
	mysqli_query($con, "update appointment set doctorStatus='0' where id ='" . $_GET['id'] . "'");
	$_SESSION['msg'] = "تم الغاء الموعد بنجاح";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>مواعيدي</title>

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
		<div class="app-content">


			<?php include('include/header.php'); ?>
			<!-- end: TOP NAVBAR -->
			<div class="main">
				<div class="container" id="container">

					<!-- start: BASIC EXAMPLE -->
					<div class="tablediv">

						<h3>مواعيد المرضى
						</h3>
						<p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
							<?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
						<table class="table table-hover" id="sample-table-1">
							<thead>
								<tr>
									<th class="center">التسلسل</th>
									<th class="hidden-xs">اسم المريض</th>
									<th>التخصص</th>
									<th>رسوم الاستشارة</th>
									<th>وقت الموعد </th>
									<th>تاريخ انشاء الموعد </th>
									<th>حالة الموعد</th>
									<th>تعديل</th>

								</tr>
							</thead>
							<tbody>
								<?php
								$sql = mysqli_query($con, "select users.fullName as fname,appointment.*  from appointment join users on users.id=appointment.userId where appointment.doctorId='" . $_SESSION['id'] . "'");
								$cnt = 1;
								while ($row = mysqli_fetch_array($sql)) {
								?>

									<tr>
										<td class="center"><?php echo $cnt; ?>.</td>
										<td class="hidden-xs"><?php echo $row['fname']; ?></td>
										<td><?php echo $row['doctorSpecialization']; ?></td>
										<td><?php echo $row['consultancyFees']; ?></td>
										<td><?php echo $row['appointmentDate']; ?> / <?php echo
																						$row['appointmentTime']; ?>
										</td>
										<td><?php echo $row['postingDate']; ?></td>
										<td>
											<?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) {
												echo "نشط";
											}
											if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 1)) {
												echo "تم الغاءالموعد بواسطة المريض";
											}

											if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 0)) {
												echo " تم الغاء الموعد بواسطتك انت";
											}



											?></td>
										<td>
											<div class="visible-md visible-lg hidden-sm hidden-xs">
												<?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) { ?>


													<a href="appointment-history.php?id=<?php echo $row['id'] ?>&cancel=update" onClick="return confirm('هل انت متاكد من الغاء موعد المريض ?')" class="btn btn-transparent btn-xs tooltips" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove">الغاء الموعد</a>
												<?php } else {

													echo "الغيت";
												} ?>
											</div>
										</td>
									</tr>

								<?php
									$cnt = $cnt + 1;
								} ?>


							</tbody>
						</table>
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