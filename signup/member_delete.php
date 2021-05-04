<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/myproject_homepage/db/db_connect.php";
    $id = $_POST["id"];

    $sql = "delete from member  where id='$id'";
    $value = mysqli_query($con, $sql) or die('error : ' . mysqli_error($con));
    include_once $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/login/logout.php";
?>






