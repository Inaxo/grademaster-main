<?php
require_once 'mysqldataprovider.php';
@session_start();

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
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/331273e086.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/three@0.117.0/build/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three-obj-loader@2.1.5/dist/three-obj-loader.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="assets/css/home.css">
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
                    <a class="nav-link active" aria-current="page" href="#">Strona główna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Zastosowanie</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="cennik">Cennik</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">O nas</a>
                </li>
            </ul>
            <?php
            if(!isset($_SESSION['logged'])){
                echo '            <button class="login-btn" onclick="window.location.href=\'login\'">Zaloguj się</button>
            <button class="register-btn" onclick="window.location.href=\'register\'">Zarejestruj się</button>';
            }else{
                echo '<button class="panel-btn" onclick="window.location.href="temp"">Panel</button>';
                echo '<button class="logout-btn" onclick="window.location.href=\'logout\'">Wyloguj się</button>';
            }
            ?>

        </div>
    </div>
</nav>
<div class="alert hide">
    <span class="fas fa-circle-check"></span>
    <span class="msg">Udało Ci się zalogować! Miłej pracy!</span>
    <div class="close-btn">
        <span class="fas fa-times"></span>
    </div>
</div>

<?php
if (isset($_SESSION['alert']) && $_SESSION['alert'] == true) {
    echo '<script>
        
           
        $(document).ready(function(){
            $(".alert").addClass("show");
             $(".msg").text("Udało Ci się zalogować! Miłej pracy!");
            $(".alert").removeClass("hide");
            $(".alert").addClass("showAlert");
            setTimeout(function(){
                $(".alert").removeClass("show");
                $(".alert").addClass("hide");
            },5000);
        });
        $(".close-btn").click(function(){
            $(".alert").removeClass("show");
            $(".alert").addClass("hide");
        });
    </script>';
    unset($_SESSION['alert']);
}else if(isset($_SESSION['alert2']) && $_SESSION['alert2'] == true){
    echo '<script>
        $(document).ready(function(){
            $(".alert").addClass("show");
             $(".msg").text("Pomyślnie zarejestrowano konto. Możesz się zalogować!");
            $(".alert").removeClass("hide");
            $(".alert").addClass("showAlert");
            setTimeout(function(){
                $(".alert").removeClass("show");
                $(".alert").addClass("hide");
            },5000);
        });
        $(".close-btn").click(function(){
            $(".alert").removeClass("show");
            $(".alert").addClass("hide");
        });
        
</script>';
    unset($_SESSION['alert2']);
}

?>
<div id="container">

    <div class="row justify-content-center text-center" style="margin-top: 20px; border-bottom: 1px solid gray"><div class="col-lg-5 col-md-12 mx-auto" style="margin-top: 80px; ">
            <p class="section-text" style="margin-left: 100px;" >
                Twórz spersonalizowane <span style="color:
#c7b52e;"> testy</span>, </br>udostępniaj je oraz kontroluj wyniki. Wszystko dzięki naszej platformie Grade<span style="color: #f6b839">Master </span>!
            </p>
            <p class="section-undertext" style="margin-left: 100px;" >
                Opracowana przez nas platforma umożliwi Ci łatwą weryfikację wiedzy, </br> w każdym zakresie naukowym. Nasze autorskie algorytmy zapewnią tobie bezpieczeństwo i komfort w opracowywaniu i rozwiązywaniu testów online.
            </p>
            <?php

            if(!isset($_SESSION['logged'])){
                echo '            <button class="register-section-btn" style="margin-left: 100px; onclick="window.location.href=\'register\'"">Załóż darmowe konto</button>';
            }else{
                echo '            <button class="register-section-btn" style="margin-left: 100px; onclick="window.location.href=\'register\'"">Przejdź do panelu</button>';
            }
            ?>

            </div>


        <div class="col-md-7 mx-auto"><img src="assets/img/section-fluid.png" width="650px" height="600px" class="section-img"> </div> </div>

    <div class="row justify-content-center" style="margin-top: 30px;" ><div class="col-md-12  text-center" ><h4>Zastosowanie</h4></div> </div>
    <div class="row justify-content-center sec-row" style="padding-left: 200px; padding-right: 200px;"  ><div class="col-md-12  text-center "><p>Weryfikacja zdobytej wiedzy to bardzo ważny aspekt edukacji. Ma miejsce na etapie szkolnym, a później w czasie rozwoju zawodowego. Większości osób testy sprawdzające nie kojarzą się najlepiej. Przypominają szkolne kartkówki lub sprawdziany. Nastawienie do testowania swojej wiedzy jest bardzo ważne, testy przeprowadzane za pomocą formularzy online to nowoczesna forma weryfikacji wiedzy. Nie kojarzą się z klasycznymi papierowymi testami, są przyjaźniejsze i bardziej angażujące. Ponadto mają wiele zalet takich jak szybka dystrybucja i natychmiastowy wynik.

            Testy online mają bardzo szerokie zastosowanie. Dwa najpopularniejsze obszary, to testy pracownicze i testy szkolne.</p></div> </div>

    <div class="row justify-content-center" style="margin-top: 50px; ">
        <div class="col-md-3 text-center for-col mx-2"><i class="fa-solid fa-user for-icon"></i></br><h4 style="margin-top: 5px; color: #21262b">Rekrutacja</h4>Znajdź zdolnych pracowników dzięki naszej platformie </br></br></br> <a href="#" class="for-link">Czytaj więcej <i class="fa-solid fa-arrow-right"></i></a> </div>
        <div class="col-md-3 text-center for-col mx-2"><i class="fa-solid fa-school for-icon"></i></br><h4 style="margin-top: 5px; color: #21262b">Zadania domowe</h4>Znajdź zdolnych pracowników dzięki naszej platformie </br></br></br> <a href="#" class="for-link">Czytaj więcej <i class="fa-solid fa-arrow-right"></i></a> </div>
        <div class="col-md-3 text-center for-col mx-2"><i class="fa-regular fa-comment for-icon"></i></br><h4 style="margin-top: 5px; color: #21262b">Interakcja z klientami</h4>Znajdź zdolnych pracowników dzięki naszej platformie </br></br></br> <a href="#" class="for-link">Czytaj więcej <i class="fa-solid fa-arrow-right"></i></a> </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-3 text-center for-col mx-2"><i class="fa-brands fa-artstation for-icon"></i></br><h4 style="margin-top: 5px; color: #21262b">Szkolenia</h4>Znajdź zdolnych pracowników dzięki naszej platformie </br></br></br> <a href="#" class="for-link">Czytaj więcej <i class="fa-solid fa-arrow-right"></i></a> </div>
        <div class="col-md-3 text-center for-col mx-2"><i class="fa-solid fa-scroll for-icon"></i></br><h4 style="margin-top: 5px; color: #21262b">Testy i kartkówki</h4>Znajdź zdolnych pracowników dzięki naszej platformie </br></br></br> <a href="#" class="for-link">Czytaj więcej <i class="fa-solid fa-arrow-right"></i></a> </div>
        <div class="col-md-3 text-center for-col mx-2"><i class="fa-solid fa-graduation-cap for-icon"></i></br><h4 style="margin-top: 5px; color: #21262b">Rekrutacja</h4>Znajdź zdolnych pracowników dzięki naszej platformie </br></br></br> <a href="#" class="for-link">Czytaj więcej <i class="fa-solid fa-arrow-right"></i></a> </div>
    </div>


</div>

<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script src="assets/js/main.js"></script>

<script src="https://cdn.jsdelivr.net/npm/three-obj-loader@2.1.5/dist/three-obj-loader.min.js"></script>
<script async src="https://unpkg.com/es-module-shims@1.3.6/dist/es-module-shims.js"></script>
</body>
</html>