<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login Ke Perpustakaan Digital</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body style="background-image: url(assets/img/bg-perpus-2.jpg); background-size: cover;">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4"><strong>Login <br> Perpustakaan Digital</strong></h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    if (isset($_POST['login'])) {
                                        $username = $_POST['username'];
                                        $password = md5($_POST['password']);

                                        $data = mysqli_query($koneksi, "SELECT*FROM user where username='$username' and password='$password'");
                                        $cek = mysqli_num_rows($data);
                                        if ($cek > 0) {
                                            $_SESSION['user'] = mysqli_fetch_array($data);
                                            echo '<script>alert("Selamat datang, Login Berhasil"); location.href="index.php";</script>';
                                        } else {
                                            echo '<script>alert("Maaf, Username/Password salah")</script>';
                                        }
                                    }
                                    ?>
                                    <form method="post">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Username</label>
                                            <input class="form-control py-4" id="inputEmailAddress" type="text" name="username" placeholder="Masukkan Username" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Password</label>
                                            <input class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="Masukkan Password" />
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-center mt-3 mb-2">
                                            <button class="btn btn-primary" type="submit" name="login" value="login">Login</button>
                                        </div>
                                        <p class="text-center mb-0" style="font-size: smaller;">Belum punya akun? <a class="" href="register.php">Buat Akun</a></p>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small">
                                        &copy; 2024 Perpustakaan Digital
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
</body>

</html>