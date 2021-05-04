<?php
    date_default_timezone_set("Asia/Seoul");
    $server_name = "127.0.0.1";
    $user_name = "root";
    $pass = "123456";
    $db_name = "sample";

    $con = mysqli_connect($server_name, $user_name, $pass);
    $query = "create database if not exists sample";
    $result = $con->query($query) or die($con->error);

    $con->select_db($db_name) or die($con->error);
?>
