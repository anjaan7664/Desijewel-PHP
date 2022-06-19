<?php
    session_start();
    session_destroy();
    if(isset($_COOKIE["username"]) && isset($_COOKIE["password"])){
    setcookie("username",'',strtotime('-5 days'), '/' );
    setcookie("password",'',strtotime('-5 days'), '/');
    }
    header("location:../index.php");
?>