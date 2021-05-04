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

    $sql = "update member set pass='$pass', name='$name' , nickname='$nickname' , email='$email', tel='$tel', phone='$phone', birth='$birth'";
    $sql .= "where id='$id'";
    $value = mysqli_query($con, $sql) or die('error : ' . mysqli_error($con));
    if ($value) {
        session_start();
        $_SESSION["username"] = $name;
    } else {
        echo "<script>
                    alert('정보 수정 실패');
                    history.go(-1);
              </script>";
    }

    mysqli_close($con);


    echo "
	      <script>
	      alert('수정 완료');
	          location.href = 'http://{$_SERVER['HTTP_HOST']}/myproject_homepage/index.php';
	      </script>
	  ";
?>

   
