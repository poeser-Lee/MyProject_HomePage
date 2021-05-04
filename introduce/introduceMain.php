<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name = "viewport" content="width=device-width, initial-scal=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@1,200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://<?=$_SERVER["HTTP_HOST"]?>/myproject_homepage/introduce/introduceMain.css?">
    <!-- <script src="./js/member.js"></script> -->
	<title>서전주 중학교 > 학교 소개</title>
</head>
<body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/header.php"; ?>
    </header>
    <div class = "main">
        <ul>
             <h2>학교 소개</h2>
        </ul>
        <ul class = "home">
            <h4>홈 > 학교 소개</h4>
        </ul>
        <ul>
            <h1 class = "mainfont">서전주 중학교 홈페이지 방문을 진심으로 환영합니다.</h1>
        </ul>
        <ul class = "picture">
           <a href="#"><img src="./introduceMain.png" alt="introduceMain"></a>
        </ul>
        <ul>
            <ui><h3 class = "font">우리 학교는 자강(自彊), 정직(正直), 보은(報恩)의 교훈 아래 바른 인성과 실력을 갖추고 미래를 지향하는 창의적 인재 육성을 
                위해 노력하고 있으며, 학생은 배움을 싫어하지 않고 교사는 가르침을 게을리 하지 않으며, 교육공동체가 소통하고 협력하는 행
                복한 학교입니다.

                학생에게는 자신을 소중히 여기고 꿈을 키워 나가는 ‘배움의 장’, 교사에게는 가르침이 행복하며 보람과 긍지를 갖게 하는 ‘교육
                의 장’, 학부모에게는 자녀를 안심하고 맡기고 함께 참여하는 ‘신뢰의 장’이 되도록 서전주교육공동체는 최선을 다 하겠습니다.

                본교 홈페이지가 교육가족이 서로 소통하고 협력하는 징검다리가 되기를 희망하며
                누구든지 방문하여 지혜를 모아주시기 바랍니다.</h3>
            </ui>
        </ul>
        <ul>
            <ui><h3>서전주 중학교 교육공동체 일동</h3></ui>
        </ul>
    </div>       
</body>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/footer.php";?>  
    </footer>
</html>