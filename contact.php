<?php
include_once('hms/include/config.php');
if (isset($_POST['submit'])) {
	$name = $_POST['fullname'];
	$email = $_POST['emailid'];
	$mobileno = $_POST['mobileno'];
	$dscrption = $_POST['description'];
	$query = mysqli_query($con, "insert into tblcontactus(fullname,email,contactno,message) value('$name','$email','$mobileno','$dscrption')");
	echo "<script>alert('تم ارسال الاستشارة بنجاح سوف يتم الرد عليك باقرب وقت');</script>";
	echo "<script>window.location.href ='contact.php'</script>";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- bootstrap  -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<!-- fontawesome  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- google font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital@1&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/style2.css">
	<title>Document</title>
</head>

<body>
	<!--start-nav-->

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">
			<img src="./images/kisspng-physician-medicine-computer-icons-hospital-health-cropped-icon-png-physician-senior-services-5d05236ae760a0.7278499315606178349477.png" alt="" width="50px">
			نظام اداره مستشفى</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="index.html">الصفحه الرئيسيه</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="contact.php">استشاره طبيه</a>
				</li>
			</ul>
		</div>
	</nav>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-sm-12">
					<form class="theform" name="contactus" method="post">
						<h3>اكتب استشارتك</h3>
						<div class="form-group">
							<label>الاسم</label>
							<input type="text" class="form-control" name="fullname" required="true" value="">
						</div>
						<div class="form-group">
							<label>البريد الالكتروني</label>
							<input type="email" class="form-control" aria-describedby="emailHelp" name="emailid" required="ture" value="">
						</div>
						<div class="form-group">
							<label>رقم الهاتف</label>
							<input type="tel" class="form-control" name="mobileno" required="true" value="">
						</div>
						<div class="form-group">
							<label>الاستشارة</label>
							<textarea name="description" required="true" class="form-control"></textarea>
						</div>
						<button type="submit" name="submit">ارسال</button>
					</form>
				</div>
				<div class="col-md-3 col-sm-12">
					<div class="detaildiv">
						<div>
							<h3>الموقع</h3>
							<p>العراق/ بغداد , مدينة الطب العراق</p>
						</div>
						<i class="fa-solid fa-map"></i>

					</div>
					<div class="detaildiv">
						<div>
							<h3>التليفون</h3>
							<p>(00) 222 666 444</p>
						</div>
						<i class="fa-solid fa-phone"></i>

					</div>
					<div class="detaildiv">
						<div>
							<h3>البريد الإلكترونى</h3>
							<p>info@mycompany.com</p>
						</div>
						<i class="fa-solid fa-envelope"></i>

					</div>
				</div>
			</div>
		</div>
	</section>
	<footer>
		<div class="container">
			<div class="row">

				<div class="col-md-3 col-sm-12">
					<h3>معلومات الاتصال</h3>
					<p>
						+10 367 467 8934 <br>
						docmed@contact.com</p>
				</div>
				<div class="col-md-3 col-sm-12">
					<h3>ساعات العمل</h3>
					<p> نحن نعمل 24/7</p>
				</div>
				<div class="col-md-3 col-sm-12">
					<ul>
						<li>
							<h3>الاقسام</h3>
						</li>
						<li><a href="#">العناية بالعيون</a></li>
						<li><a href="#">عناية بالجلد</a></li>
						<li><a href="#">علم الأمراض</a></li>
						<li><a href="#">طب</a></li>
						<li><a href="#">طب الأسنان</a></li>
					</ul>
				</div>
				<div class="col-md-3 col-sm-12">
					<ul>
						<li>
							<h3>لينكات</h3>
						</li>
						<li><a href="#">من نحن</a></li>
						<li><a href="#">مقالات</a></li>
						<li><a href="#">للتواصل</a></li>
						<li><a href="#">حجز موعد</a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!-- bootstrap  -->

	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
</body>

</html>