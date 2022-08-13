<nav class="sidebar sidebarclose">
	<header>
		<div class="image-text">
			<div class="text logo-text">
				<span class="name">المسؤول</span>
			</div>
		</div>
		<i class="fa-solid fa-circle-right toggle"></i>
	</header>
	<div class="menu-bar">
		<div class="menu">
			<ul class="menu-links">
				<li class="nav-link">
					<a href="dashboard.php">
						<p class="hovertext">لوحه التحكم</p>
						<i class='fa-solid fa-home icon'></i>
						<span class="text nav-text">لوحه التحكم</span>
					</a>
				</li>
				<li>
					<div class="dropdown" id="dropdown">
						<div class="navdrop dropmain">
							<p class="hovertext">الاطباء</p>
							<i class="fa-solid fa-user-doctor icon"></i>
							<span class="text nav-text">الاطباء</span>
						</div>
						<div class="dropdetail" id="dropdownmenu">
							<a href="doctor-specilization.php">
								<span class="navdrop">
									<p class="hovertext">اختصاصات الاطباء</p>
									<i class="fa-solid fa-user-doctor icon"></i>
									<p class="text"> اختصاصات الاطباء</p>
								</span>
							</a>
							<br>
							<a href="add-doctor.php">
								<span class="navdrop">
									<p class="hovertext">اضافة دكتور جديد</p>
									<i class="fa-solid fa-user-doctor icon"></i>
									<p class="text"> اضافة دكتور جديد</p>
								</span>
							</a>
							<br>
							<a href="Manage-doctors.php">
								<span class="navdrop">
									<p class="hovertext">ادارة الاطباء</p>
									<i class="fa-solid fa-user-doctor icon"></i>
									<p class="text"> ادارة الاطباء</p>
								</span>
							</a>
						</div>
					</div>
				</li>
				<li>
					<div class="dropdown" id="dropdown">
						<div class="dropmain navdrop">
							<p class="hovertext">المستخدمين</p>
							<i class="fa-solid fa-users icon"></i>
							<span class="text">المستخدمين</span>
						</div>
						<div class="dropdetail" id="dropdownmenu">
							<a href="manage-users.php">
								<span class="navdrop">
									<p class="hovertext">ادارة المستخدمين</p>
									<i class="fa-solid fa-users icon"></i>
									<p class="text">ادارة المستخدمين</p>
								</span>
							</a>
						</div>
					</div>
				</li>
				<li>
					<div class="dropdown" id="dropdown">
						<div class="dropmain navdrop">
							<p class="hovertext">المرضى</p>
							<i class="fa-solid fa-hospital-user icon"></i>
							<span class="text nav-text">المرضى</span>
						</div>
						<div class="dropdetail" id="dropdownmenu">
							<a href="manage-patient.php">
								<span class="navdrop">
									<p class="hovertext">ادارة المرضى</p>
									<i class="fa-solid fa-hospital-user icon"></i>
									<span class="text nav-text">ادارة المرضى</span>
								</span>
							</a>
						</div>
					</div>
				</li>
				<li class="nav-link">
					<a href="appointment-history.php">
						<p class="hovertext">المواعيد</p>
						<i class='fa-solid fa-list-check icon'></i>
						<span class="text nav-text"> المواعيد</span>
					</a>
				</li>
				<li>
					<div class="dropdown" id="dropdown">
						<div class="dropmain navdrop">
							<p class="hovertext">الاستشارات</p>
							<i class="fa-solid fa-file icon"></i>
							<span class="text">الاستشارات</span>
						</div>
						<div class="dropdetail" id="dropdownmenu">
							<a href="read-query.php">
								<span class="navdrop">
									<p class="hovertext">الاستشارات التي تم قرائتها</p>
									<i class="fa-solid fa-file icon"></i>
									<span class="text">الاستشارات التي تم قرائتها</span>
								</span>
							</a>
							<br>
							<a href="unread-queries.php">
								<span class="navdrop">
									<p class="hovertext">الاستشارات التي لم تتم قرائتها</p>
									<i class="fa-solid fa-file icon"></i>
									<span class="text">الاستشارات التي لم تتم قرائتها</span>
								</span>
							</a>
						</div>
					</div>
				</li>
				<li class="nav-link">
					<a href="doctor-logs.php">
						<p class="hovertext">جلسات الاطباء</p>
						<i class="fa-solid fa-user-doctor icon"></i>
						<span class="text nav-text">
							جلسات الاطباء
						</span>
					</a>
				</li>
				<li class="nav-link">
					<a href="user-logs.php">
						<p class="hovertext">جلسات المستخدمين</p>
						<i class='fa-solid fa-users icon'></i>
						<span class="text nav-text">
							جلسات المستخدمين
						</span>
					</a>
				</li>
				<li>
					<div class="dropdown" id="dropdown">
						<div class="dropmain navdrop">
							<p class="hovertext">التقرير</p>
							<i class="fa-solid fa-file icon"></i>
							<span class="text nav-text">التقرير</span>
						</div>
						<div class="dropdetail" id="dropdownmenu">
							<a href="between-dates-reports.php">
								<span class="navdrop">
									<p class="hovertext"> البحث عن تقرير مريض</p>
									<i class="fa-solid fa-file icon"></i>
									<span class="text">البحث عن تقرير مريض</span>
								</span>
							</a>

						</div>
					</div>
				</li>
				<li class="nav-link">
					<a href="patient-search.php">
						<p class="hovertext">البحث عن تقرير مريض</p>
						<i class='fa-solid fa-search icon'></i>
						<span class="text nav-text">
							البحث عن تقرير مريض
						</span>
					</a>
				</li>
			</ul>
		</div>

		<div class="bottom-content">
			<li class="">
				<a href="logout.php">
					<i class="fa-solid fa-arrow-right-from-bracket icon"></i>
					<span class="text nav-text">Logout</span>
				</a>
			</li>

		</div>
	</div>
</nav>