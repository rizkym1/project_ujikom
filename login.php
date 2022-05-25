<?php

session_start();
if (!empty($_SESSION['login'])) {
    if ($_SESSION['user']['id_level'] == 1) {
        echo "

    <script>
       window.location.replace('admin/index.php');
    </script>
 
 ";
    } else if ($_SESSION['user']['id_level'] == 2) {
        echo "

    <script>
       window.location.replace('resepsionis/index.php');
    </script>
 
 ";
    } else if ($_SESSION['user']['id_level'] == 3) {
        echo "

    <script>
       window.location.replace('level/tamu/index.php');
    </script>
 
 ";
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
    body {
        background-color: #1806b9;
    }

    .form-login {
        margin: 10% auto;
    }
    </style>
    <title>Login</title>
</head>

<body>
    <!-- Navbar -->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-primary p-4 shadow fixed-top">
            <div class="container">
                <a class="navbar-brand text-white fw-bold" href="index.php">Hotel Hebat</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto fw-bold">
                    </ul>
                    <ul class="navbar-nav ms-auto nav-kanan fw-bold">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="register.php">Daftar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- end navbar -->
    <div class="form-login">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <form action="proses/proses-login.php" method="post">
                                <h2 class="text-center my-4">Halaman Masuk</h2>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="pass" required>
                                </div>
                                <button type="submit" id="post-button" class="btn btn-primary w-100">Login</button>
                                <a class="nav-link" href="register.php">Daftar</a>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>