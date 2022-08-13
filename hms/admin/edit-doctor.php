<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
$did = intval($_GET['id']); // get doctor id
if (isset($_POST['submit'])) {
	$docspecialization = $_POST['Doctorspecialization'];
	$docname = $_POST['docname'];
	$docaddress = $_POST['clinicaddress'];
	$docfees = $_POST['docfees'];
	$doccontactno = $_POST['doccontact'];
	$docemail = $_POST['docemail'];
	$sql = mysqli_query($con, "Update doctors set specilization='$docspecialization',doctorName='$docname',address='$docaddress',docFees='$docfees',contactno='$doccontactno',docEmail='$docemail' where id='$did'");
	if ($sql) {
		$msg = "تم تحديث الحساب بنجاح";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>تعديل بيانات الدكتور</title>
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
			<!-- start: MENU TOGGLER FOR MOBILE DEVICES -->

			<!-- end: TOP NAVBAR -->
			<div class="main">
				<div class="container" id="container">

					<!-- start: BASIC EXAMPLE -->
					<h3 style="color: green; font-size:18px; ">
						<?php if ($msg) {
							echo htmlentities($msg);
						} ?>
					</h3>

					<h3 class="panel-title">تحرير معلومات الدكتور</h3>

					<?php $sql = mysqli_query($con, "select * from doctors where id='$did'");
					while ($data = mysqli_fetch_array($sql)) {
					?>

						<form role="form" name="adddoc" method="post" onSubmit="return valid();" class="theform2">
							<h3><?php echo htmlentities($data['doctorName']); ?></h3>
							<p><b>تاريخ انشاء الحساب </b><?php echo htmlentities($data['creationDate']); ?></p>
							<?php if ($data['updationDate']) { ?>
								<p><b>تاريخ اخر تحديث للحساب </b><?php echo htmlentities($data['updationDate']); ?></p>
							<?php } ?>
							<hr />
							<div class="form-group">
								<label for="DoctorSpecialization">
									اختصاص الدكتور
								</label>
								<select name="Doctorspecialization" class="form-control" required="required">
									<option value="<?php echo htmlentities($data['specilization']); ?>">
										<?php echo htmlentities($data['specilization']); ?></option>
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
								<label for="doctorname">
									اسم الدكتور
								</label>
								<input type="text" name="docname" class="form-control" value="<?php echo htmlentities($data['doctorName']); ?>">
							</div>


							<div class="form-group">
								<label for="address">
									عنوان عيادة الدكتور
								</label>
								<textarea name="clinicaddress" class="form-control"><?php echo htmlentities($data['address']); ?></textarea>
							</div>
							<div class="form-group">
								<label for="fess">
									رسوم الاستشارة
								</label>
								<input type="text" name="docfees" class="form-control" required="required" value="<?php echo htmlentities($data['docFees']); ?>">
							</div>

							<div class="form-group">
								<label for="fess">
									رقم هاتف الدكتور
								</label>
								<input type="text" name="doccontact" class="form-control" required="required" value="<?php echo htmlentities($data['contactno']); ?>">
							</div>

							<div class="form-group">
								<label for="fess">
									البريد الالكتروني
								</label>
								<input type="email" name="docemail" class="form-control" readonly="readonly" value="<?php echo htmlentities($data['docEmail']); ?>">
							</div>




						<?php } ?>


						<button type="submit" name="submit" class="btn btn-o btn-primary">
							تحديث
						</button>
						</form>
				</div>
			</div>
		</div>

		<!-- end: BASIC EXAMPLE -->


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