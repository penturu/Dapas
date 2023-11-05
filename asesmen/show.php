<?php session_start(); ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
</div>
<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Asesmen</h6>
            </div>
            <div class="card-body">
                <a href="?page=asesmen-add" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Tambah Data</a>
                <hr>
                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-hover" id="viewPasien" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nama Asesmen</th>
                                <th>Path Asesmen</th>
                                <th>Kategori</th>
                                <th>No. Rekam Medis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../connection.php';
                            $query = mysqli_query($con, "SELECT a.*, p.no_rm FROM asesmen AS a JOIN pasien AS p ON a.id_pasien = p.id");
                            while ($data = mysqli_fetch_array($query)) { ?>
                                <tr>
                                    <td><?php echo $data['id']; ?></td>
                                    <td><?php echo $data['nama_asesmen']; ?></td>
                                    <td><?php echo $data['path_asesmen']; ?></td>
                                    <td><?php echo $data['kategori']; ?></td>
                                    <td><?php echo $data['no_rm']; ?></td>
                                    <td>
                                        <a class="btn text-primary" href="?page=asesmen-edit&id=<?php echo $data['id']; ?>"><i class="fas fa-edit"></i>
                                        </a>
                                        <a class="btn text-danger" href="?page=asesmen-delete&id=<?php echo $data['id']; ?>" onclick="return confirm('Yakin ingin hapus ?')"><i class="fas fa-trash"></i>
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