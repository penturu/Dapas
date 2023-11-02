<?php session_start(); ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
</div>
<div class="row">
    <div class=" col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Informasi</h6>
            </div>
            <div class="card-body">
                <p>
                    Level User:
                    <ul>
                        <li>Administrator - Semua akses</li>
                        <li>Dokter - Hanya dapat mencari berkas</li>
                        <li>Rekam Medis - Cari dan Manage berkas</li>
                    </ul>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">User</h6>
            </div>
            <div class="card-body">
                <a href="?page=user-add" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Tambah Data</a>
                <hr>
                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-hover display" id="viewUser" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../connection.php';
                            $query = mysqli_query($con, 'SELECT * FROM user');
                            while ($data = mysqli_fetch_array($query)) { ?>
                                <tr>
                                    <td><?php echo $data['user']; ?></td>
                                    <td><?php echo $data['level']; ?></td>
                                    <?php
                                    $user = $data['user'];
                                    $useraktif = $_SESSION['user'];
                                    ?>
                                    <td>
                                        <a class="btn text-primary" href="?page=user-edit&id=<?php echo $data['id']; ?>">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a class="btn text-danger <?php if ($user == $useraktif) echo 'disabled'; ?>" href="?page=user-delete&id=<?php echo $data['id']; ?>" onclick="return confirm('Yakin ingin hapus ?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>