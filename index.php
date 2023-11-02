<?php

include 'connection.php';
$result = mysqli_query($con, "SELECT * FROM user");
$cek = mysqli_num_rows($result);
if ($cek === 0) {
    echo "
    <script>
    alert('Belum ada data User, silahkan buat user baru.');
    window.location.href = 'admin/index.php?page=user-add';
    </script>";
}

?>

<?php

if (isset($_POST['login'])) {
    $user = $_POST['user'];
    $inputpass = md5($_POST['pass']);

    include 'connection.php';
    $result = mysqli_query($con, "SELECT * FROM user WHERE user='$user'");
    $cek = mysqli_num_rows($result);
    if ($cek > 0) {
        $data = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['user'] = $data['user'];
        $_SESSION['level'] = $data['level'];
        $_SESSION['status'] = 'login';
        $pass = $data['pass'];
        if ($pass == $inputpass) {
            header('location:admin/index.php');
            exit;
        } else {
            $error = true;
        }
    } else {
        $error = true;
    }
}

?>

<title>Dapas - Home</title>
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600
,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
<link href="css/sb-admin-2.min.css" rel="stylesheet" />
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login User</h1>
                                        <hr>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="user" placeholder="Username" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="pass" placeholder="Password" required>
                                        </div>
                                        <input type="submit" name="login" value="login" class="btn btn-primary btn-user btn-block">
                                        <hr>
                                        <?php if (isset($error)) : ?>
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>Login gagal</strong> Periksa kembali Username dan
                                                Password
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
                </div>
            </div>
        </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 5000);
    </script>
</body>

</html>