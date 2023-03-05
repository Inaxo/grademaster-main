<?php
require_once "mysqldataprovider.php";
session_start();
if(!isset($_SESSION['logged'])){
    if(isset($_POST['Login'])){

        $email = $_POST['email'];
        $password = $_POST['password'];

        if($stmt = $db->prepare("SELECT * FROM teacher WHERE email=:email LIMIT 1")){
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['userId'] = $user['id'];
                $_SESSION['userEmail'] = $user['email'];
                $_SESSION['userName'] = $user['name'];
                $_SESSION['logged'] = true;
                header('Location: /grademaster');
                $_SESSION['alert'] = true;
            } else {
                $_SESSION['error'] = "Nieprawidłowy login lub hasło";
                header("Location: login");
                exit();
            }
        } else {
            echo "Błąd przygotowania zapytania SQL";
        }

    }
}else{
    header('Location: /grademaster');
}
