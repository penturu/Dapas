<?php session_start(); ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
</div>
<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Pasien</h6>
            </div>
            <div class="card-body">
                <a href="?page=pasien-add" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Tambah Data</a>
                <hr>
                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-hover" id="viewPasien" style="width: 100%">
                        <thead>
                            <tr>
                                <th>No. Rekam Medis</th>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>No. WhatsApp</th>
                                <th>No. BPJS</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../connection.php';
                            $query = mysqli_query($con, 'SELECT * FROM pasien');
                            while ($data = mysqli_fetch_array($query)) { ?>
                                <tr>
                                    <td><?php echo $data['no_rm']; ?></td>
                                    <td class="text-nowrap"><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['tgl_lahir']; ?></td>
                                    <td><?php echo $data['gender']; ?></td>
                                    <td><?php echo $data['no_wa']; ?></td>
                                    <td><?php echo $data['no_bpjs']; ?></td>
                                    <td>
                                        <a class="btn text-primary" href="?page=pasien-edit&no_rm=<?php echo $data['no_rm']; ?>"><i class="fas fa-edit"></i>
                                        </a>
                                        <a class="btn text-danger" href="?page=pasien-delete&no_rm=<?php echo $data['no_rm']; ?>" onclick="return confirm('Yakin ingin hapus ?')"><i class="fas fa-trash"></i>
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