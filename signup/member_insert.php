<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/myproject_homepage/db/db_connect.php";

    $id = $_POST["id"];
    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $nickname = $_POST["nickname"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];
    $phone = $_POST["phone"];
    $birth = $_POST["birth"];
    $address1 = $_POST["address1"];
    $address2 = $_POST["address2"];
    $address3 = $_POST["address3"];

    $address = $address1 . $address2 . $address3;

    
    $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

    $sql = "INSERT INTO member(id, pass, name, nickname, email , tel, phone, birth, address , regist_day) ";
    $sql .= "values('$id', '$pass', '$name', '$nickname', '$email' , '$tel', '$phone', '$birth', '$address', '$regist_day')";

    mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    mysqli_close($con);

    echo "
	      <script>
	           location.href = 'http://{$_SERVER['HTTP_HOST']}/myproject_homepage/index.php';
	      </script>
	  ";
?>


