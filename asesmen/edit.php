<?php
$id = $_GET['id'];
$result = mysqli_query($con, "SELECT a.*, p.no_rm FROM asesmen AS a JOIN pasien AS p ON a.id_pasien = p.id WHERE a.id=$id");
while ($data = mysqli_fetch_array($result)) {
    $id  = $data['id'];
    $namaAsesmen = $data['nama_asesmen'];
    $pathAsesmen = $data['path_asesmen'];
    $kategori = $data['kategori'];
    $idPasien = $data['id_pasien'];
    $noRm = $data['no_rm'];
}
if (isset($_POST['submit'])) {
    $noRm = $_POST['no_rm'];
    $kategori = $_POST['kategori'];
    $getId = mysqli_query($con, "SELECT id FROM pasien WHERE no_rm='$noRm'");
    $data = mysqli_fetch_array($getId);
    $idPasien = $data['id'];

    if ($kategori == "Inap") {
        $targetDir = "../uploads/Asesmen Inap/";
    } else {
        $targetDir = "../uploads/Asesmen Jalan/";
    }

    $fileExtension = pathinfo($_FILES['file_asesmen']['name'], PATHINFO_EXTENSION);

    if ($fileExtension == "") {
        $date = DateTime::createFromFormat('U.u', microtime(TRUE));

        $fileName = $date->format('Y-m-d,H.i.s.u');
        $fileName = $noRm . "," . $fileName . ".pdf";
        $targetPath = $targetDir . $fileName;

        rename($pathAsesmen, $targetPath);

        $update = mysqli_query($con, "UPDATE asesmen SET nama_asesmen='$fileName', path_asesmen='$targetPath', kategori='$kategori', id_pasien=$idPasien WHERE id=$id");

        if ($update) {
            echo "<script>window.location.href = '?page=asesmen-show';</script>";
        }
    } else if ($fileExtension == "pdf") {

        $date = DateTime::createFromFormat('U.u', microtime(TRUE));

        $fileName = $date->format('Y-m-d,H.i.s.u');
        $fileName = $noRm . "," . $fileName . "." . $fileExtension;
        $targetPath = $targetDir . $fileName;

        move_uploaded_file($_FILES['file_asesmen']['tmp_name'], $targetPath);

        $update = mysqli_query($con, "UPDATE asesmen SET nama_asesmen='$fileName', path_asesmen='$targetPath', kategori='$kategori', id_pasien=$idPasien WHERE id=$id");

        if ($update) {

            if (file_exists($pathAsesmen)) {
                unlink($pathAsesmen);
            }
            echo "<script>window.location.href = '?page=asesmen-show';</script>";
        } else {
            echo "Gagal menghapus file";
        }
    } else {
        $error = true;
    }
}

?>

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
                <form method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="fileAsesmen" class="col-sm-2 col-form-label">File Asesmen (.pdf)</label>
                        <div class="col-sm-10">
                            <input type="file" name="file_asesmen" id="fileAsesmen" class="form-file" accept="application/pdf">
                        </div>
                        <div class="col offset-sm-2">
                            <P> File Sebelumnya: <a class="btn btn-danger" target="_blank" href="<?php echo $pathAsesmen; ?>"><i class="fas fa-fw fa-file-pdf"></i><?php echo $namaAsesmen; ?></a>
                            </P>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-10">
                            <select name="kategori" id="kategori" class="form-select" required>
                                <option value="-" selected disabled>- Pilih Kategori -</option>
                                <option value="Inap" <?php if ($kategori == 'Inap') echo 'selected'; ?>>Inap</option>
                                <option value="Jalan" <?php if ($kategori == 'Jalan') echo 'selected'; ?>>Jalan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="noWa" class="col-sm-2 col-form-label">Pasien</label>
                        <div class="col-sm-10">
                            <input list="listPasien" name="no_rm" class="form-list" value="<?php echo $noRm; ?>" required>
                            <datalist id="listPasien">
                                <?php
                                $query1 = mysqli_query($con, "SELECT no_rm, nama FROM pasien;");
                                while ($data1 = mysqli_fetch_array($query1)) {
                                ?>
                                    <option value="<?php echo $data1['no_rm']; ?>"><?php echo $data1['nama']; ?></option>
                                <?php
                                }
                                ?>
                            </datalist>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col offset-sm-2">
                            <button type="submit" class="btn btn-primary" name="submit"><i class="fas fa-save"></i>
                                Simpan</button>
                            <a href="?page=mahasiswa-show" class="btn btn-danger"><i class="fas fa-chevron-left"></i>
                                Kembali</a>
                        </div>
                    </div>

                    <hr>
                    <?php if (isset($error)) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Tambah data gagal</strong> Silahkan masukkan file dengan format pdf
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</div>