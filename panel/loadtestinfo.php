<?php
session_start();
require_once "../mysqldataprovider.php";
if(!isset($_SESSION['logged'])){
    header('Location: /grademaster');
}

?>

<!DOCTYPE html>

<html lang="en">
<head>
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

        <link rel="icon" type="image/x-icon" href="/img/favicon.png">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&display=swap" rel="stylesheet">
        <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>

        <link rel="stylesheet" href="../assets/css/panel.css">


        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>


    </head>
<body>
<body>
<nav class="sidebar close">
    <header>
        <div class="image-text">
                <span class="image">
                <img src="../assets/img/logo.png">
                </span>


        </div>

        <i class='bx bx-chevron-right toggle'></i>
    </header>

    <div class="menu-bar">
        <div class="menu">

            <li class="search-box">
                <i class='bx bx-search icon'></i>
                <input type="text" placeholder="Wyszukaj" disabled>
            </li>

            <ul class="menu-links">
                <li class="nav-link">
                    <a href="#">
                        <i class='bx bx-home-alt icon' ></i>
                        <span class="text nav-text">Moje testy</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="#">
                        <i class='bx bxs-bar-chart-alt-2 icon'></i>
                        <span class="text nav-text">Baza wyników</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="#">
                        <i class='bx bxs-book icon' ></i>
                        <span class="text nav-text">Rozwiązujący</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="#">
                        <i class='bx bx-news icon' ></i>
                        <span class="text nav-text">Ogłoszenia</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="#">
                        <i class='bx bx-help-circle icon' ></i>
                        <span class="text nav-text">Pomoc</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="#">
                        <i class='bx bx-cog icon' ></i>
                        <span class="text nav-text">Ustawienia</span>
                    </a>
                </li>

            </ul>
        </div>

        <div class="bottom-content">
            <li class="">
                <a href="logout.php">
                    <i class='bx bx-log-out icon' ></i>
                    <span class="text nav-text">Wyloguj się</span>
                </a>
            </li>

            <li class="mode">
                <div class="sun-moon">
                    <i class='bx bx-moon icon moon'></i>
                    <i class='bx bx-sun icon sun'></i>
                </div>
                <span class="mode-text text">Dark mode</span>

                <div class="toggle-switch">
                    <span class="switch"></span>
                </div>
            </li>

        </div>
    </div>

</nav>
<script>
    const body = document.querySelector('body'),
        sidebar = body.querySelector('nav'),
        toggle = body.querySelector(".toggle"),
        searchBtn = body.querySelector(".search-box"),
        modeSwitch = body.querySelector(".toggle-switch"),
        modeText = body.querySelector(".mode-text");

    const bgImage = document.querySelector('.image img');
    console.log(bgImage)
    toggle.addEventListener("click" , () =>{
        sidebar.classList.toggle("close");

    })

    searchBtn.addEventListener("click" , () =>{
        sidebar.classList.remove("close");
    })

    modeSwitch.addEventListener("click" , () =>{
        body.classList.toggle("dark");

        if(body.classList.contains("dark")){
            modeText.innerText = "Light mode";
            bgImage.src = "../assets/img/logo-dark.png";
        }else{
            modeText.innerText = "Dark mode";
            bgImage.src = "../assets/img/logo.png";


        }
    });
</script>
</body>