<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name = "viewport" content="width=device-width, initial-scal=1.0">
    <link rel="stylesheet" href="http://<?=$_SERVER["HTTP_HOST"]?>/myproject_homepage/signup/css/member.css">
    <script src="./js/member.js" defer></script>
	<title>서전주 중학교 > 회원가입</title>
</head>
<body>
	<header><?php include $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/header.php"; ?></header>
    <h2>회원가입</h2>
    <form name="member_form" method="post" action="member_insert.php">
    <table>
        <tr>
            <th>아이디</th>
            <td>
                <span class="text1">영문자. 숫자만 입력 가능. 최소 3자이상 입력하세요.</span> <br>
                <input type="text" name="id" id="idInput" class="essential_form" size="12" value="">  <input type="button" onclick = "idCheck()" value="아이디 중복확인">
                <span id="idCorrect" class="idCorrect"></span>
            </td>
        </tr>
        <tr>
            <th>비밀번호</th>
            <td>
                <span class="text1">영문자,숫자,특수문자를 포함하여 6~12자를 입력하세요.</span> <br>
                <input type="password" name="pass" id="pass" class="essential_form" onkeyup = "pwCheck()">
                <span id="pwCorrect"></span> </td>
        </tr>
        <tr>
            <th>비밀번호 확인</th>
            <td><input type="password" name="password_ok" class="essential_form" id="password_ok"  size="20" onkeyup = "pwCheck2()"> 
            <span id="pwCorrect2"></span>          
        </td>
        </tr>
    </table>
        <h2>개인정보 입력</h2>
    <table>
        <tr>
            <th>이름</th>
            <td>
				<input type="text" name="name"></td>
        </tr>
        <tr>
            <th>닉네임</th>
            <td>
                <span class="text1">공백없이 한글,영문,숫자만 입력가능(한글2자,영문4자)</span> <br>
                <span class="text1">닉네임을 바꾸시면 앞으로 1일 이내에는 변경할 수 없습니다.</span> <br>
                <input type="text" name="nickname" class="essential_form" id="nicName"></td>
        </tr>
        <tr>
            <th>E-mail</th>
            <td><input type="email" name="email" id="email"><input type="checkbox" name="chectbox" id="chectbox"> 메일 수신여부
            </td> 
        </tr>
        <tr>
            <th>전화번호</th>
            <td><input type="tel" name="tel" class="essential_form" id="tel"></td>
        </tr>
        <tr>
            <th>휴대폰번호</th>
            <td><input type="tel" name="phone" class="essential_form" id="phone"><input type="checkbox" name="phoneMail" id="phoneMail"> 휴대폰 문자메세지를 받겠습니다.</td>
        </tr>
        <tr>
            <th>생년월일</th>
            <td><input type="datetime-local" class="essential_form" name="birth" id="birth"></td>
        </tr>
        <tr>
            <th>주소</th>
            <td><input type="search" class="essential_form" name="address" id="address">  <input type="button" value="주소검색"> <br>
            <input type="search" name="address1" id="address1" size="60"> 기본주소 <br>
            <input type="search" name="address2" id="address2" size="60"> 상세주소 <br>
            <input type="search" name="address3" id="address3" size="60"> 참고항목 <br> </td>

        </tr>
    </table>
    <table>
        <h2>기타 개인설정</h2>
        <tr>
            <th>카카오톡 메세지</th>
            <td><input type="checkbox" name="kakaoTalk" id="kakaoTalk"> 카카오톡 메세지를 받겠습니다.</td> 
        </tr>
        <tr>
            <th>정보공개</th>
            <td>
                <span class="text1">정보공개를 바꾸시면 앞으로 7일 이내에는 변경이 안됩니다.</span> <br>
                <input type="checkbox" name="kakaoTalk" id="kakaoTalk"> 다른분들이 나의 정보를 볼 수 있도록합니다.</td>
        </tr>
    </table>
    <table>
         <div>
             <input type="submit" value="회원가입">
        </div>
    </table>
  </body>
  <footer><?php include $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/footer.php"; ?></footer>
</html>
