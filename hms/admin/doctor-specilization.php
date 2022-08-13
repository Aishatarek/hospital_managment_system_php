<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if (isset($_POST['submit'])) {
	$sql = mysqli_query($con, "insert into doctorSpecilization(specilization) values('" . $_POST['doctorspecilization'] . "')");
	$_SESSION['msg'] = "تمت إضافة تخصص الطبيب بنجاح !!";
}

if (isset($_GET['del'])) {
	mysqli_query($con, "delete from doctorSpecilization where id = '" . $_GET['id'] . "'");
	$_SESSION['msg'] = "تم الحذف بنجاح";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>التخصصات</title>
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
		<div class="main">
			<!-- start: BASIC EXAMPLE -->
			<div class="container">
				<form role="form" name="dcotorspcl" method="post" class="theform2">
					<h3 class="panel-title">تخصصات الاطباء الموجودة لديك
					</h3>
					<p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
						<?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
					<div class="form-group">
						<label for="exampleInputEmail1">
							اضافة تخصص جديد
						</label>
						<input type="text" name="doctorspecilization" class="form-control" placeholder="اكتب تخصص جديد تريد اضافته">
					</div>
					<button type="submit" name="submit" class="btn btn-o btn-primary">
						اضافة
					</button>
				</form>

				<div class="tablediv">
					<h3 class="over-title margin-bottom-15">ادارة <span class="text-bold">تخصصات الاطباء</span></h3>

					<table class="table" id="sample-table-1">
						<thead>
							<tr>
								<th class="center">التسلسل</th>
								<th>الاختصاص</th>
								<th class="hidden-xs">تاريخ الانشاء</th>
								<th>تاريخ اخر تحديث</th>
								<th>الحالة</th>

							</tr>
						</thead>
						<tbody>
							<?php
							$sql = mysqli_query($con, "select * from doctorSpecilization");
							$cnt = 1;
							while ($row = mysqli_fetch_array($sql)) {
							?>

								<tr>
									<td class="center"><?php echo $cnt; ?>.</td>
									<td class="hidden-xs"><?php echo $row['specilization']; ?></td>
									<td><?php echo $row['creationDate']; ?></td>
									<td><?php echo $row['updationDate']; ?>
									</td>

									<td>
										<div class="visible-md visible-lg hidden-sm hidden-xs">
											<a href="edit-doctor-specialization.php?id=<?php echo $row['id']; ?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa-solid fa-edit tableicon"></i></a>

											<a href="doctor-specilization.php?id=<?php echo $row['id'] ?>&del=delete" onClick="return confirm('هل أنت متأكد أنك تريد حذف التخصص؟')" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa-solid fa-trash tableicon"></i></a>
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
	</script>
	<!-- end: JavaScript Event Handlers for this page -->
	<!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>