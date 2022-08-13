<?php error_reporting(0); ?>
<header class="navbar navbar-expand-lg navbar-light bg-light">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
					<i class="fa-solid fa-hospital-user navicon"></i>
					<?php $query = mysqli_query($con, "select fullName from users where id='" . $_SESSION['id'] . "'");
					while ($row = mysqli_fetch_array($query)) {
						echo $row['fullName'];
					}
					?>
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="edit-profile.php">ملفي الشخصي</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="change-password.php"> تغير كلمة المرور</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="logout.php">تسجيل الخروج</a>
				</div>
			</li>
		</ul>
	</div>
</header>