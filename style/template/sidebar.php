<?php ob_start() ?> <!-- partial:partials/_navbar.html -->

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <!-- <a class="navbar-brand brand-logo" href="admin.php"><img src="../assets/images/logo.jpg" alt="logo" /></a> -->
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>

        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <!-- <div class="nav-profile-img">
                        <img src="../assets/images/user.jpg" alt="image">
                        <span class="availability-status online"></span>
                    </div> -->
                    <div class="nav-profile-text">
                        <p class="mb-1 text-black"><?php echo $_SESSION['nama_petugas']; ?> </p>
                    </div>
                </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                    <!-- <a class="dropdown-item" href="">
                        <i class="mdi mdi-cached me-2 text-success"></i> Laporan </a> -->
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="?url=logout">
                        <i class="mdi mdi-logout me-2 text-primary"></i> Logout </a>
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
                    <span class="font-weight-bold mb-2 animate__animated animate__backInDown"><?php echo "Selamat Datang, " . $_SESSION['nama_petugas']; ?></span>
                    <span class="text-secondary text-small"><?php echo $_SESSION['level']; ?></span>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="admin.php">
                    <span class="menu-title ">Dashboard</span>
                    <i class="mdi mdi-home menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?url=spp">
                    <span class="menu-title">SPP</span>
                    <i class="mdi mdi-contacts menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?url=kelas">
                    <span class="menu-title">Kelas</span>
                    <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?url=siswa">
                    <span class="menu-title">Siswa</span>
                    <i class="mdi mdi-chart-bar menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?url=petugas">
                    <span class="menu-title">Petugas</span>
                    <i class="mdi mdi-table-large menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?url=pembayaran">
                    <span class="menu-title">Pembayaran</span>
                    <i class="mdi mdi-table-large menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?url=laporan">
                    <span class="menu-title">Laporan</span>
                    <i class="mdi mdi-table-large menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?url=logout">
                    <span class="menu-title">Logout</span>
                    <i class="mdi mdi-table-large menu-icon"></i>
                </a>
            </li>


        </ul>
    </nav>