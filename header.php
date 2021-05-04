<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/function.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/5bc9c3ab86.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@1,200&display=swap" rel="stylesheet">
    
    <title>서전주 중학교</title>
</head>
<body>
    <nav class="navbar">
        <div class="navbar_logo"> 
            <i class="fas fa-school"></i>
            <a class = "header" href="http://192.168.112.26/myproject_homepage/">서전주 중학교</a>
        </div>
        <ul class="navbar_menu">
            <li><a class = "header" href="http://<?=$_SERVER['HTTP_HOST'];?>/myproject_homepage/introduce/introduceMain.php">학교 소개</a></li>
            <li><a class = "header" href="http://<?=$_SERVER['HTTP_HOST'];?>/myproject_homepage/invitation/board_list.php">알림 마당</a></li>
            <li><a class = "header" href="http://<?=$_SERVER['HTTP_HOST'];?>/myproject_homepage/student`s yard/board_list.php">학생 마당</a></li>
            <li><a class = "header" href="http://<?=$_SERVER['HTTP_HOST'];?>/myproject_homepage/parent`s yard/board_list.php">학부모 마당</a></li>
            <li><a class = "header" href="http://<?=$_SERVER['HTTP_HOST'];?>/myproject_homepage/support/board_list.php">교단 지원 마당</a></li>
            <li><a class = "header" href="http://<?=$_SERVER['HTTP_HOST'];?>/myproject_homepage/activities/board_list.php">교육 활동 마당</a></li>
            <li><a class = "header" href="http://<?=$_SERVER['HTTP_HOST'];?>/myproject_homepage/school_album/board_list.php">학교 앨범</a></li>
            <li><a class = "header" href="http://<?=$_SERVER['HTTP_HOST'];?>/myproject_homepage/load/load.php">오시는 길</a></li>
        </ul>
        <ul class="navbar_icons">
        <?php
            if(!$userid) {
                ?>
                <li><a class = "header2" href="http://<?=$_SERVER['HTTP_HOST'];?>/myproject_homepage/signup/member_form.php">회원 가입</a> </li>
                <li> | </li>
                <li><a class = "header2" href="http://<?=$_SERVER['HTTP_HOST'];?>/myproject_homepage/login/login_form.php">로그인</a></li>
                <?php
            } else {
                $logged = $username."(".$userid.")님";
                ?>
                <li><?=$logged?> </li>
                <li> | </li>
                <li><a class = "header2" href="http://<?=$_SERVER['HTTP_HOST'];?>/myproject_homepage/login/logout.php">로그아웃</a> </li>
                <li> | </li>
                <li><a class = "header2" href="http://<?=$_SERVER['HTTP_HOST'];?>/myproject_homepage/signup/member_modify_form.php">정보 수정</a>
                <li> | </li>
                <li><a class = "header2" href="http://<?=$_SERVER['HTTP_HOST'];?>/myproject_homepage/signup/member_delete_form.php">회원 탈퇴</a>
                <li> | </li>
                <li><a class = "header2" href="http://<?=$_SERVER['HTTP_HOST'];?>/myproject_homepage/admin/admin.php">관리자 권한</a>
            </li>
                <?php
            }
        ?>
        </ul>
        <a href="#" class="navbar_toggle"><i class="fas fa-bars"></i></a>
    </nav>
</body>
</html>