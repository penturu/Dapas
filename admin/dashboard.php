<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
</div>
<div class="row">
    <div class="col-xl-4 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Pasien Terdaftar
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                            include '../connection.php';
                            $count = "SELECT * FROM pasien";
                            if ($result = mysqli_query($con, $count)) {
                                $rowcount = mysqli_num_rows($result);
                                echo $rowcount;
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Berkas Rawat Inap
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                            include '../connection.php';
                            $count = "SELECT * FROM asesmen WHERE kategori = 'Inap'";
                            if ($result = mysqli_query($con, $count)) {
                                $rowcount = mysqli_num_rows($result);
                                echo $rowcount;
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Berkas Rawat Jalan
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                            include '../connection.php';
                            $count = "SELECT * FROM asesmen WHERE kategori = 'Jalan'";
                            if ($result = mysqli_query($con, $count)) {
                                $rowcount = mysqli_num_rows($result);
                                echo $rowcount;
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>