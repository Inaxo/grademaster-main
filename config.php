<?php
@session_start();
require_once "vendor/autoload.php";
$google_client = new Google_Client();

$google_client->setClientId('786389520486-9mdl6362o970tgabu28a5510v1bljqvq.apps.googleusercontent.com');
$google_client->setClientSecret('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');
$google_client->setRedirectUri('http://localhost/grademaster/googleapiprovider.php');
$google_client->addScope('email');
$google_client->addScope('profile');

return [
    'host' => 'localhost',
    'user' => 'root',
    'pass' => '',
    'database' => 'grademaster'
];
