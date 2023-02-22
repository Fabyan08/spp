<?php ob_start() ?> <!-- partial:partials/_navbar.html -->
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <!-- <a class="navbar-brand brand-logo" href=""><img src="../assets/images/logo.svg" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href=""><img src="../assets/images/logo-mini.svg" alt="logo" /></a> -->
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <!-- <div class="nav-profile-img">
                        <img src="../assets/images/logo.svg">
                        <span class="availability-status online"></span>
                    </div> -->

                    <div class="nav-profile-text">
                        <p class="mb-1 text-black"><?php echo $_SESSION['nama']; ?></p>
                    </div>
                </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="?url=history-pembayaran">
                        <i class="mdi mdi-cached me-2 text-success"></i>History Pembayaran</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="?url=logout">
                        <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
                </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
                <a class="nav-link">
                    <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                </a>
            </li>

            <li class="nav-item nav-settings d-none d-lg-block">
                <a class="nav-link" href="#">
                    <i class="mdi mdi-format-line-spacing"></i>
                </a>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item nav-profile">
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2"><?php echo $_SESSION['nama']; ?></span>
                    <span class="text-secondary text-small"><?php echo $_SESSION['nisn']; ?></span>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="siswa.php">
                    <span class="menu-title">Dashboard</span>
                    <i class="mdi mdi-home menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="siswa.php?url=history-pembayaran">
                    <span class="menu-title">History</span>
                    <i class="mdi mdi-home menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="siswa.php?url=logout">
                    <span class="menu-title">Logout</span>
                    <i class="mdi mdi-table-large menu-icon"></i>
                </a>
            </li>


        </ul>
    </nav>