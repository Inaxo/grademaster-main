<?php
session_start();
if(isset($_SESSION['logged'])){
    session_destroy();
    session_unset();
    header('Location: /grademaster');
}