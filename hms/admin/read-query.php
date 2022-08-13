<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();


if (isset($_GET['del'])) {
	mysqli_query($con, "delete from doctors where id = '" . $_GET['id'] . "'");
	$_SESSION['msg'] = "تم الحذف بنجاح";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>الاستشارات المقروءة</title>
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
						<h5 class="over-title margin-bottom-15">جميع <span class="text-bold">الاستشارات التي تم قرائتها</span></h5>
						<table class="table" id="sample-table-1">
							<thead>
								<tr>
									<th class="center">التسلسل</th>
									<th>الاسم</th>
									<th class="hidden-xs">البريد الالكتروني</th>
									<th>رقم الهاتف </th>
									<th>الاستشارة </th>
									<th>الحالة</th>

								</tr>
							</thead>
							<tbody>
								<?php
								$sql = mysqli_query($con, "select * from tblcontactus where IsRead is not null");
								$cnt = 1;
								while ($row = mysqli_fetch_array($sql)) {
								?>

									<tr>
										<td class="center"><?php echo $cnt; ?>.</td>
										<td class="hidden-xs"><?php echo $row['fullname']; ?></td>
										<td><?php echo $row['email']; ?></td>
										<td><?php echo $row['contactno']; ?></td>
										<td><?php echo $row['message']; ?></td>

										<td>
											<div class="visible-md visible-lg hidden-sm hidden-xs">
												<a href="query-details.php?id=<?php echo $row['id']; ?>" class="btn btn-transparent btn-lg" title="شاهد التفاصيل كاملة"><i class="fa-solid fa-file tableicon"></i></a>
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