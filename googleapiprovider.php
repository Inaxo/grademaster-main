<?php
session_start();
if(!isset($_SESSION['logged'])){
    require_once "config.php";
    require_once "vendor/autoload.php";
    if(isset($_GET['code'])){

        $token = $google_client->fetchAccessTokenWithAuthCode($_GET['code']);
        $_SESSION['token'] = $token;
        $google_client->setAccessToken($token);

    }
    $gauth = new Google_Service_Oauth2($google_client);
    $data = $gauth->userinfo_v2_me->get();

    $userData = array(
        'email' => $data['email'],
        'name' => $data['givenName'],
        'surname' => $data['familyName']
    );
    $_SESSION['userData'] = $userData;
    $_SESSION['logged'] = true;
    $_SESSION['alert'] = true;
    header('Location: /grademaster');

}
