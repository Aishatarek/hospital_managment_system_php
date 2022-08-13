<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

//updating Admin Remark
if (isset($_POST['update'])) {
	$qid = intval($_GET['id']);
	$adminremark = $_POST['adminremark'];
	$isread = 1;
	$query = mysqli_query($con, "update tblcontactus set  AdminRemark='$adminremark',IsRead='$isread' where id='$qid'");
	if ($query) {
		echo "<script>alert('تم تحديث بنجاح.');</script>";
		echo "<script>window.location.href ='read-query.php'</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>الاسشتارات</title>
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
						<h3 class="over-title margin-bottom-15">تفاصيل <span class="text-bold">طلب الاستشارة</span></h3>
						<table class="table medhistory" id="sample-table-1">
							<tbody>
								<?php
								$qid = intval($_GET['id']);
								$sql = mysqli_query($con, "select * from tblcontactus where id='$qid'");
								$cnt = 1;
								while ($row = mysqli_fetch_array($sql)) {
								?>

									<tr>
										<th>الاسم الكامل</th>
										<td><?php echo $row['fullname']; ?></td>
									</tr>

									<tr>
										<th>البريد الالكتروني</th>
										<td><?php echo $row['email']; ?></td>
									</tr>
									<tr>
										<th>رقم الهاتف</th>
										<td><?php echo $row['contactno']; ?></td>
									</tr>
									<tr>
										<th>الاستشارة</th>
										<td><?php echo $row['message']; ?></td>
									</tr>

									<?php if ($row['AdminRemark'] == "") { ?>
										<form name="query" method="post">
											<tr>
												<th>الرد على طلب الاستشارة</th>
												<td><textarea name="adminremark" class="form-control" required="true"></textarea></td>
											</tr>
											<tr>
												<td>&nbsp;</td>
												<td>
													<button type="submit" class="btn btn-primary pull-left addtotable" name="update">
														تحديث
													</button>

												</td>
											</tr>

										</form>
									<?php } else { ?>

										<tr>
											<th>الرد على طلب الاستشارة</th>
											<td><?php echo $row['AdminRemark']; ?></td>
										</tr>

										<tr>
											<th>تاريخ اخر تحديث</th>
											<td><?php echo $row['LastupdationDate']; ?></td>
										</tr>

								<?php
									}
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