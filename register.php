<?php
session_start();
require_once 'mysqldataprovider.php';
if (isset($_SESSION['logged'])) {
    header('Location: /grademaster');
}

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="GradeMaster"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="https://grademaster.pl"/>
    <title>GradeMaster - Rejestracja</title>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/331273e086.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/three@0.117.0/build/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three-obj-loader@2.1.5/dist/three-obj-loader.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="icon" type="image/x-icon" href="/img/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div class="container py-5 h-100 vh-100">
    <form method="POST" action="verification">
    <div class="row h-100 d-flex align-items-center justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5 col-12">
            <div class="window bg-light text-dark card">
                <div class="card-body p-5 text-center">
                    <div class="mb-md-1 mt-md-3 pb-5">
                        <a href="/grademaster"><img src="assets/img/logo.png"></a>
                        <hr>
                        <h4 class="fw-bold mb-2 text-uppercase mt-5 mb-3">Rejestracja</h4>
                        <div class="form-outline form-black mb-3">
                            <input type="text" id="name" placeholder="Imie" name="username" class="form-control form-control-lg"/>
                        </div>
                        <div class="form-outline form-black mb-3">
                            <input type="text" name="surname" id="surname" placeholder="Nazwisko"
                                   class="form-control form-control-lg"/>
                        </div>
                        <div class="form-outline form-black mb-3">
                            <input type="email" name="email" id="email" placeholder="Email" class="form-control form-control-lg"/>
                        </div>
                        <div class="form-outline form-black mb-3">
                            <input type="password" name="password" id="pass" placeholder="Has??o" class="form-control form-control-lg"/>
                        </div>
                        <div class="form-outline form-black mb-5">
                            <input type="password" name="confirmpass" id="pass2" placeholder="Potwierd?? has??o"
                                   class="form-control form-control-lg"/>
                        </div>
                        <?php if (isset($_SESSION['error'])) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $_SESSION['error']; ?>
                            </div>
                            <?php unset($_SESSION['error']); ?>
                        <?php endif; ?>
                        <button class="loginbutton" type="submit" name="Register">Zarejestruj si??</button>
                    </div>
                    <div class="register">
                        <p class="mb-0">Posiadasz ju?? konto? <a href="login" class="text-black-50 fw-bold">Zaloguj
                                si??</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>

<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="assets/js/app.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.slim.js"
        integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/three-obj-loader@2.1.5/dist/three-obj-loader.min.js"></script>
<script async src="https://unpkg.com/es-module-shims@1.3.6/dist/es-module-shims.js"></script>
</body>
</html>