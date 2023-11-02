<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fas fa-file-medical"></i>
        </div>
        <div class="sidebar-brand-text mx-3 text-left small">
            Berkas Pasien
        </div>
    </a>
    <hr class="sidebar-divider my-0" />
    <li class="nav-item active">
        <a class="nav-link" href="?page=dashboard">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <?php
    $status = session_status();

    if ($status === PHP_SESSION_NONE) {
        session_start();
    }

    if ($_SESSION['level'] == 'Administrator') {
        echo '
 <li class="nav-item">
 <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#user" aria-expanded="true"
 aria-controls="user">
 <i class="fas fa-fw fa-user"></i>
 <span>User</span>
 </a>
 <div id="user" class="collapse" aria-labelledby="user" data-parent="#accordionSidebar">
 <div class="bg-white py-2 collapse-inner rounded">
 <a class="collapse-item" href="?page=user-show">Data User</a>
 <a class="collapse-item" href="?page=user-add">Input User</a>
 </div>
 </div>
 </li>
 ';
    }
    ?>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dataPasien" aria-expanded="true" aria-controls="dataPasien">
            <i class="fas fa-fw fa-user"></i>
            <span>Pasien</span>
        </a>
        <div id="dataPasien" class="collapse" aria-labelledby="dataPasien" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="?page=pasien-show">Data Pasien</a>
                <a class="collapse-item" href="?page=pasien-add">Input Pasien</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dataAsesmen" aria-expanded="true" aria-controls="dataAsesmen">
            <i class="fas fa-fw fa-file-pdf"></i>
            <span>Asesmen</span>
        </a>
        <div id="dataAsesmen" class="collapse" aria-labelledby="dataAsesmen" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="?page=asesmen-show">Data Asesmen</a>
                <a class="collapse-item" href="?page=asesmen-add">Input Asesmen</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dataRekmed" aria-expanded="true" aria-controls="dataRekmed">
            <i class="fas fa-fw fa-file"></i>
            <span>Rekam Medis</span>
        </a>
        <div id="dataRekmed" class="collapse" aria-labelledby="dataRekmed" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="?page=rekmed-show">Data Rekmed</a>
                <a class="collapse-item" href="?page=rekmed-add">Input Rekmed</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider d-none d-md-block" />
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>