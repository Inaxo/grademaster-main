<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
session_start();
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require_once "mysqldataprovider.php";
if(!isset($_SESSION['logged'])) {
    if (isset($_POST['Register'])) {
        $username = $_POST['username'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmpass = $_POST['confirmpass'];
        $verificationCode = substr(md5(rand()), 0, 7);
        $to = $email;
        require 'vendor/autoload.php';
        if (empty($username)) {
            $_SESSION['error'] = "Pole imię jest wymagane";
            header("Location: register.php");
            exit();
        }

        if (empty($surname)) {
            $_SESSION['error'] = "Pole nazwisko jest wymagane";
            header("Location: register.php");
            exit();
        }

        if (empty($email)) {
            $errors['email'] = "Pole email jest wymagane";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = "Nieprawidłowy format emaila";
            header("Location: register.php");
            exit();
        }

        if (empty($password)) {
            $_SESSION['error'] = "Pole hasło jest wymagane";
            header("Location: register.php");
            exit();
        } else if ($password != $confirmpass) {
            $_SESSION['error'] = "Hasła nie są takie same";
            header("Location: register.php");
            exit();
        }
        $stmt = $db->prepare("SELECT COUNT(*) AS count FROM teacher WHERE email = ?");
        $stmt->execute(array($email));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row['count'] > 0) {
            $_SESSION['error'] = "Ten adres e-mail jest już w użyciu.";
            header("Location: register");
            exit();
        }

        try {
            $mail = new PHPMailer();

            $mail->isSMTP();
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->CharSet = 'UTF-8';
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 465;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->SMTPAuth = true;
            $mail->SMTPDebug = 0;
            $mail->Username = 'oliwierglowala123@gmail.com';
            $mail->Password = 'mkbpcdcnltrdqusr';

            $mail->setFrom('oliwierglowala123@gmail.com', 'Oliwier Głowala');
            $mail->addAddress($to);

            $mail->isHTML(true);
            $mail->Subject = 'Potwierdzenie rejestracji';
            $mail->Body    = 'Twój kod weryfikacyjny to: '.$verificationCode;


            $mail->send();

        } catch (Exception $e) {
            echo 'Wiadomość nie mogła zostać wysłana. Błąd: ', $mail->ErrorInfo;
        }

    }
}else{
    header('Location: /grademaster');
}

require_once 'mysqldataprovider.php';
require_once "config.php";

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
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="icon" type="image/x-icon" href="/img/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div class="container py-5 h-100 vh-100">
    <form method="POST" action="registerexecute.php">
        <div class="row h-100 d-flex align-items-center justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5 col-12">
                <div class="window bg-light text-dark card">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-5 mt-md-3 pb-5">
                            <img src="assets/img/logo.png">
                            <hr>
                            <input type="hidden" name="username" value="<?php  echo $username;?>">
                            <input type="hidden" name="surname" value="<?php  echo $surname;?>">
                            <input type="hidden" name="password" value="<?php  echo $password;?>">
                            <input type="hidden" name="email" value="<?php  echo $email;?>">
                            <input type="hidden" name="confirmpass" value="<?php  echo $confirmpass;?>">
                            <input type="hidden" name="verifycode" value="<?php  echo $verificationCode;?>">
                            <h4 class="fw-bold mb-2 text-uppercase mt-5 mb-3">Weryfikacja</h4>
                            <h6 class="fw-bold mb-2 text-uppercase mt-5 mb-3">Wprowadź kod, który wysłaliśmy Ci na e-mail</h6>
                            <div class="form-outline form-black mb-2">
                                <input type="text" id="code" placeholder="Kod" class="form-control form-control-lg" name="code" />
                            </div>
                            </br>
                            <button class="loginbutton" type="submit" name="Register">Zarejestruj się</button>
                        </div>
                        <div class="register">
                            <p class="mb-0">Nie posiadasz konta? <a href="register.php" class="text-black-50 fw-bold">Zarejestruj się</a></p>
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
<script src="https://code.jquery.com/jquery-3.6.3.slim.js" integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/three-obj-loader@2.1.5/dist/three-obj-loader.min.js"></script>
<script async src="https://unpkg.com/es-module-shims@1.3.6/dist/es-module-shims.js"></script>
</body>



