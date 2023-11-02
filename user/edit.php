<?php
$id = $_GET['id'];
include '../connection.php';
$result = mysqli_query($con, "SELECT * FROM user WHERE id=$id");
while ($data = mysqli_fetch_array($result)) {
    $u = $data['user'];
    $p = $data['pass'];
    $l = $data['level'];
}
if (isset($_POST['submitLevel'])) {
    $l = $_POST['level'];
    $update = mysqli_query($con, "UPDATE user SET level='$l' WHERE id=$id");
    echo "<script>window.location.href = '?page=user-show';</script>";
}
if (isset($_POST['submitUsername'])) {
    $u = $_POST['user'];
    $update = mysqli_query($con, "UPDATE user SET user='$u' WHERE id=$id");
    echo "<script>window.location.href = '?page=user-show';</script>";
}
if (isset($_POST['submitPassword'])) {
    $passLama = md5($_POST['passwordLama']);
    $passBaru = md5($_POST['passwordBaru']);
    if ($passLama != $p) {
        echo "<script>alert('Password tidak sesuai')</script>";
    } else {
        $update = mysqli_query($con, "UPDATE user SET pass='$passBaru' WHERE
id=$id");
        echo "<script>alert('Password berhasil diganti')</script>";
        echo "<script>window.location.href = '?page=user-show';</script>";
    }
}
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
</div>
<div class="row">
    <div class="col-md-10">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">User</h6>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="row mb-3">
                        <label for="user" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input name="user" type="text" class="form-control text-lowercase" id="user" value="<?php echo $u; ?>" required>
                        </div>
                        <div class="col offset-sm-2">
                            <button type="submit" class="btn btn-sm btn-primary mt-2" name="submitUsername"><i class="fas fa-save"></i>
                                Simpan</button>
                        </div>
                    </div>
                    <hr>
                </form>
                <form method="post">
                    <div class="row mb-3">
                        <label for="level" class="col-sm-2 col-form-label">Level</label>
                        <div class="col-sm-10">
                            <select name="level" id="level" class="form-control" name="level" required>
                                <option value="-" disabled>- Pilih -</option>
                                <option value="Administrator" <?php if ($l == 'Administrator') echo 'selected'; ?>>Administrator</option>
                                <option value="Dokter" <?php if ($l == 'Dokter') echo 'selected'; ?>>Dokter</option>
                                <option value="Rekam Medis" <?php if ($l == 'Rekam Medis') echo 'selected'; ?>>Rekam Medis</option>
                            </select>
                        </div>
                        <div class="col offset-sm-2">
                            <button type="submit" class="btn btn-sm btn-primary mt-2" name="submitLevel"><i class="fas fa-save"></i>
                                Simpan</button>
                        </div>
                    </div>
                </form>
                <hr>
                <form method="post">
                    <div class="row mb-3">
                        <label for="password" class="col-sm-2 col-form-label">Password
                            Lama</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="passwordLama" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-sm-2 col-form-label">Password
                            Baru</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="passwordBaru" required>
                        </div>
                        <div class="col offset-sm-2">
                            <button type="submit" class="btn btn-sm btn-primary mt-2" name="submitPassword"><i class="fas fa-save"></i>
                                Simpan</button>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="row">
                    <div class="col offset-sm-2">
                        <a href="?page=user-show" class="btn btn-danger"><i class="fas fa-chevron-left"></i>
                            Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>