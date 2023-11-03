<?php
include('../logincheck.php');
$status = session_status();

if ($status === PHP_SESSION_NONE) {
    session_start();
}

include '../template/header.php';
?>

<body id="page-top">
    <div id="wrapper">
        <?php include 'sidebar.php'; ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <strong>Halo, </strong>
                                    <?php if (isset($_SESSION['user']) != '') : echo
                                        $_SESSION['user'];
                                    endif; ?>
                                </span>
                                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">
                    <?php
                    include '../connection.php';
                    error_reporting(0);
                    switch ($_GET['page']) {
                        case 'dashboard':
                            $title = 'Dashboard';
                            include 'dashboard.php';
                            break;
                        case 'asesmen-show':
                            $title = 'Data Asesmen';
                            include '../asesmen/show.php';
                            break;
                        case 'asesmen-add':
                            $title = 'Input Data Asesmen';
                            include '../asesmen/add.php';
                            break;
                        case 'asesmen-edit':
                            $title = 'Edit Data Asesmen';
                            include '../asesmen/edit.php';
                            break;
                        case 'asesmen-delete':
                            include '../asesmen/delete.php';
                            break;
                        case 'pasien-show':
                            $title = 'Data Pasien';
                            include '../pasien/show.php';
                            break;
                        case 'pasien-add':
                            $title = 'Input Data Pasien';
                            include '../pasien/add.php';
                            break;
                        case 'pasien-edit':
                            $title = 'Edit Data Pasien';
                            include '../pasien/edit.php';
                            break;
                        case 'pasien-delete':
                            include '../pasien/delete.php';
                            break;
                        case 'user-show':
                            $title = 'Data User';
                            include '../user/show.php';
                            break;
                        case 'user-add':
                            $title = 'Input Data User';
                            include '../user/add.php';
                            break;
                        case 'user-edit':
                            $title = 'Edit Data User';
                            include '../user/edit.php';
                            break;
                        case 'user-delete':
                            include '../user/delete.php';
                            break;
                        case 'admin-logout':
                            include 'logout.php';
                            break;
                        default:
                            $title = 'Dashboard';
                            include 'dashboard.php';
                            break;
                    }
                    ?>
                </div>
                <?php include '../template/footer.php'; ?>
</body>

</html>