<?php
if (isset($_POST['submit'])) {
    $kodeAsesmen = $_POST['kode_asesmen'];
    $kategori = $_POST['kategori'];
    $noRm = $_POST['no_rm'];

    if ($kategori == "Inap") {
        $targetDir = "../uploads/Asesmen Inap/";
    } else {
        $targetDir = "../uploads/Asesmen Jalan/";
    }

    


    $fileName = basename($_FILES['file_asesmen']['name']);
    $targetPath = $targetDir.$fileName;

    move_uploaded_file($_FILES['file_asesmen']['tmp_name'], $targetPath);

    // $fileName = DateTime::createFromFormat('U.u', microtime(TRUE));
    // $fileName = $date->format('Y-m-d H:i:s:u');
    // $fileName = $fileName . ".pdf";
    // $targetPath = $targetDir.$fileName;


    // rename($_FILES['file_asesmen']['tmp_name'], $fileName);

    $insert = mysqli_query($con, "INSERT INTO asesmen (kode_asesmen, nama_asesmen, path_asesmen, kategori, no_rm) VALUES ('$kodeAsesmen','$fileName','$targetPath','$kategori','$noRm')");

    if ($insert) {
        echo "<script>window.location.href = '?page=asesmen-show';</script>";
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
                        <label for="kodeAsesmen" class="col-sm-2 col-form-label">Kode Asesmen</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="kodeAsesmen" name="kode_asesmen" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="fileAsesmen" class="col-sm-2 col-form-label">File Asesmen (.pdf)</label>
                        <div class="col-sm-10">
                            <input type="file" name="file_asesmen" id="fileAsesmen" class="form-control" accept="application/pdf" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-10">
                            <select name="kategori" id="kategori" class="form-control" required>
                                <option value="-" selected disabled>- Pilih Kategori -</option>
                                <option value="Inap">Inap</option>
                                <option value="Jalan">Jalan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="noWa" class="col-sm-2 col-form-label">Pasien</label>
                        <div class="col-sm-10">
                            <input list="listPasien" name="no_rm" class="custom-select" required>
                            <datalist id="listPasien">
                                <option value="-" selected disabled>- Pilih Pasien -</option>
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
                </form>
            </div>
        </div>
    </div>
</div>