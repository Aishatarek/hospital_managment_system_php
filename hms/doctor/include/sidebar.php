<nav class="sidebar sidebarclose">
    <header>
        <div class="image-text">
            <div class="text logo-text">
                <span class="name">المريض</span>
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
                <li class="nav-link">
                    <a href="appointment-history.php">
                        <p class="hovertext">المواعيد</p>
                        <i class="fa-solid fa-list-check icon"></i>
                        <span class="text nav-text">المواعيد</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="search.php">
                        <p class="hovertext">بحث</p>
                        <i class='fa-solid fa-search icon'></i>
                        <span class="text nav-text">بحث</span>
                    </a>
                </li>
                <li>
                    <div class="dropdown" id="dropdown">
                        <div class="navdrop dropmain ">
                            <p class="hovertext">المرضى</p>
                            <i class="fa-solid fa-hospital-user icon"></i>
                            <span class="text">المرضى</span>
                        </div>
                        <div class="dropdetail" id="dropdownmenu">
                            <a href="add-patient.php">
                                <span class="navdrop">
                                    <p class="hovertext">اضافه مريض</p>
                                    <i class="fa-solid fa-user-plus icon"></i>
                                    <p class="text"> اضافه مريض</p>
                                </span>
                            </a>
                            <br>
                            <a href="manage-patient.php">
                                <span class="navdrop">
                                    <p class="hovertext">جميع المرضى</p>
                                    <i class="fa-solid fa-list icon"></i>
                                    <p class="text">جميع المرضى</p>
                                </span>
                            </a>
                        </div>
                    </div>
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