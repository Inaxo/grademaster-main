<?php
session_start();
require_once "mysqldataprovider.php";


if(!isset($_SESSION['logged'])){
if (isset($_POST['Register'])) {
    $verifycode = $_POST['verifycode'];
    $code = $_POST['code'];
    $username = $_POST['username'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpass = $_POST['confirmpass'];
    $verificationCode = substr(md5(rand()), 0, 7);
    if (empty($username)) {
        $_SESSION['error'] = "Pole imię jest wymagane";
        header("Location: register");
        exit();
    }
        if($code != $verifycode){
            $_SESSION['error'] = "Wprowadzono niepoprawny kod weryfikacyjny ";
            header("Location: register");
            exit();
        }
    if (empty($surname)) {
        $_SESSION['error'] = "Pole nazwisko jest wymagane";
        header("Location: register");
        exit();
    }

    if (empty($email)) {
        $errors['email'] = "Pole email jest wymagane";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Nieprawidłowy format emaila";
        header("Location: register");
        exit();
    }

    if (empty($password)) {
        $_SESSION['error'] = "Pole hasło jest wymagane";
        header("Location: register");
        exit();
    } else if ($password != $confirmpass) {
        $_SESSION['error'] = "Hasła nie są takie same";
        header("Location: register");
        exit();
    }
    $stmt = $db->prepare("SELECT * FROM teacher WHERE email = ?");
    $stmt->execute(array($email));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($row['count'] > 0) {
        $_SESSION['error'] = "Ten adres e-mail jest już w użyciu.";
        header("Location: register");
        exit();
    }
    if (!isset($_SESSION['error'])) {
        require_once 'config.php';

        $username = htmlspecialchars(strip_tags($username));
        $surname = htmlspecialchars(strip_tags($surname));
        $email = htmlspecialchars(strip_tags($email));
        $password = htmlspecialchars(strip_tags($password));

        $password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $db->prepare("INSERT INTO teacher (name, surname, email, password) VALUES (:username, :surname, :email, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->execute([$username, $surname, $email, $password]);

        header('Location: /grademaster');
        $_SESSION['alert2'] = true;
        exit();
    } else {

        header("Location: register");
        exit();
    }
}
}else{
    header('Location: /grademaster');
}