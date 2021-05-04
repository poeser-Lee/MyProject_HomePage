<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>서전주 중학교 > 로그인</title>
        <link rel="stylesheet" href="http://<?=$_SERVER["HTTP_HOST"]?>/myproject_homepage/login/css/login.css?">
        <link rel="stylesheet" href="css/login.css">
	    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="js/login.js" defer></script>
	    <script src="http://<?=$_SERVER["HTTP_HOST"]?>/myproject_homepage/login/js/login.js" defer></script>
    </head>
    <body>
        <header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/header.php"; ?>
        </header>
        <section>
            <div class="main_content">
                <div id="login_box">
                    <div id="login_title">
                        <span>로그인</span>
                    </div>
                    <div class="login_form">
                        <form  name="login_form" method="post" action="login.php">
                            <ul>
                                <li><input class = "login" type="text" id="id" name="id" placeholder="아이디" ></li>
                                <li><input class = "login" type="password" id="pass" name="pass" placeholder="비밀번호" ></li> <!-- pass -->
                            </ul>
                            <ul>
                                <li><input class = "autologin" type = "checkbox" name = "checkbox">자동로그인</input></li> 
                            </ul>
                            <div class="login_btn">
                                <input  class = "btn"type = "button" name = "login" onclick="check_input()" value = "로그인"></input>
                                <h4>아이디/비밀번호 찾기</h4>
                            </div>
                        </form>
                    </div> <!-- login_form -->
                </div> <!-- login_box -->
            </div> <!-- main_content -->
        </section>
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/footer.php"; ?>
        </footer>
    </body>
</html>

