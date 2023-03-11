<?php
require_once 'mysqldataprovider.php';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="GradeMaster" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://grademaster.pl" />
    <title>GradeMaster</title>
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
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/css/cennik.css">
    <link rel="icon" type="image/x-icon" href="/img/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-xxl bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="assets/img/logo.png" class="logo"> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-top: 9px;">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Strona główna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Zastosowanie</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link active" href="#">Cennik</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">O nas</a>
                </li>
            </ul>
            <button class="login-btn">Zaloguj się</button>
            <button class="register-btn">Zarejestruj się</button>
        </div>
    </div>
</nav>
<div id="container">
    <div class="row">
        <div class="col">
            <h4 class="text-center mt-4">Wybierz swój pakiet GradeMaster.<br> W każdej chwili możesz go zmienić na inny.</h4>
        </div>
    </div>
        <div class="row h-100 justify-content-center">
            <div class="card text-center mb-3" style="width: 18rem;">
                <div class="card-body">
                    <img src="assets/img/logo.png" width="225" style="margin-bottom: 20px" class="mt-2 p-3">
                    <h5 class="card-title">Pakiet Darmowy</h5>
                    <ul class="list-group mt-4 list-group-flush">
                        <li class="list-group-item">Możliwość tworzenia i udostępniania testów</li>
                        <li class="list-group-item">Limit testów - 40</li>
                    </ul>
                </div>
                <h3>Darmowy</h3>
                <button class="tier-btn m-auto mb-3 mt-3">Wybierz</button>
            </div><div class="card text-center mb-3" style="width: 18rem;">
                <div class="card-body">
                    <img src="assets/img/premium.png" width="225" class="mt-2 mb-2 p-3">
                    <h5 class="card-title">Pakiet Premium</h5>
                    <ul class="list-group mt-4 list-group-flush">
                        <li class="list-group-item">Możliwość tworzenia i udostępniania testów</li>
                        <li class="list-group-item">Limit testów - 100</li>
                        <li class="list-group-item">Brak reklam</li>
                        <li class="list-group-item">Raporty z dodatkowymi informacjami</li>
                    </ul>
                </div>
                <h3>39.99zł</h3><sub>na miesiąc</sub>
                <button class="tier-btn m-auto mb-3 mt-4">Wybierz</button>
            </div><div class="card text-center mb-3" style="width: 18rem;">
                <div class="card-body">
                    <img src="assets/img/edu.png" width="225" class="mt-2 mb-2 p-3">
                    <h5 class="card-title">Pakiet Dla Edukacji</h5>
                    <ul class="list-group mt-4 list-group-flush">
                        <li class="list-group-item">Możliwość tworzenia i udostępniania testów</li>
                        <li class="list-group-item">Limit testów - 500</li>
                        <li class="list-group-item">Brak reklam</li>
                        <li class="list-group-item">Raporty z dodatkowymi informacjami</li>
                    </ul>
                </div>
                <h3>49.99zł</h3><sub>na miesiąc</sub>
                <button class="tier-btn m-auto mb-3 mt-4">Wybierz</button>
            </div><div class="card text-center mb-3" style="width: 18rem;">
                <div class="card-body">
                    <img src="assets/img/firm.png" width="225" class="mt-2 mb-2 p-3">
                    <h5 class="card-title">Pakiet Dla Firm</h5>
                    <ul class="list-group mt-4 list-group-flush">
                        <li class="list-group-item">Możliwość tworzenia i udostępniania testów</li>
                        <li class="list-group-item">Limit testów - 1000</li>
                        <li class="list-group-item">Brak reklam</li>
                        <li class="list-group-item">Raporty z dodatkowymi informacjami</li>
                        <li class="list-group-item">Możliwość prowadzenia szkoleń</li>
                    </ul>
                </div>
                <h3>59.99zł</h3><sub>na miesiąc</sub>
                <button class="tier-btn m-auto mb-3 mt-4">Wybierz</button>
            </div>
        </div>

<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="assets/js/app.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.slim.js" integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/three-obj-loader@2.1.5/dist/three-obj-loader.min.js"></script>
<script async src="https://unpkg.com/es-module-shims@1.3.6/dist/es-module-shims.js"></script>
</body>
</html>