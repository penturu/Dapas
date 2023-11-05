<?php
if (isset($_POST['submit'])) {
    $noRm = $_POST['no_rm1'] . "." . $_POST['no_rm2'] . "." . $_POST['no_rm3'];
    $nama = $_POST['nama'];
    $tglLahir = $_POST['tgl_lahir'];
    $gender = $_POST['gender'];
    $noWa = $_POST['no_wa'];
    $noBpjs = $_POST['no_bpjs'];
    $insert = mysqli_query($con, "INSERT INTO pasien (no_rm, nama, tgl_lahir, gender, no_wa, no_bpjs) VALUES ('$noRm','$nama','$tglLahir','$gender','$noWa','$noBpjs')");
    if ($insert) {
        echo "<script>window.location.href = '?page=pasien-show';</script>";
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
                <form method="POST">
                    <div class="row mb-3">
                        <label for="rekmed" class="col-sm-2 col-form-label">No. Rekam Medis</label>
                        <div class="col-sm-1 mr-none">
                            <input name="no_rm1" type="number" class="form-control" id="rekmed" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="2" max="99" required>
                        </div>
                        <p>.</p>
                        <div class="col-sm-1">
                            <input name="no_rm2" type="number" class="form-control" id="rekmed" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="2" max="99" required>
                        </div>
                        <p>.</p>
                        <div class="col-sm-1">
                            <input name="no_rm3" type="number" class="form-control" id="rekmed" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="2" max="99" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tglLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input type="date" name="tgl_lahir" id="tglLahir" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="jenisKelamin" class="col-sm-2 col-form-label">Jenis
                            Kelamin</label>
                        <div class="col-sm-10">
                            <select name="gender" id="jenisKelamin" class="form-control" required>
                                <option value="-" selected disabled>- Pilih -</option>
                                <option value="Laki - laki">Laki - laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="noWa" class="col-sm-2 col-form-label">No. WhatsApp</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="noWa" name="no_wa">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="noBpjs" class="col-sm-2 col-form-label">No. BPJS</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="noBpjs" name="no_bpjs">
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