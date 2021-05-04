<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <title>서전주 중학교 > 정보수정</title>
        <link rel="stylesheet" href="http://<?=$_SERVER["HTTP_HOST"]?>/myproject_homepage/login/css/member_modify.css?">
        <link rel="stylesheet" href="css/member_modify.css">
	    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="js/login.js" defer></script>
	    <script src="http://<?=$_SERVER["HTTP_HOST"]?>/myproject_homepage/login/js/member_modify.js" defer></script>
	</head>
	<body>
		<header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/header.php"; ?>
		</header>
        <?php
			//반복이되더라도 한번만 포함시킴
            include_once $_SERVER['DOCUMENT_ROOT']."/myproject_homepage/db/db_connect.php";
            $sql = "select * from member where id='$userid'";
			//쿼리문을 실행 -> 실행결과 값을 레코드셋 저장
            $result = mysqli_query($con, $sql);
			//레코드셋에서 첫번째 레코드를 연관배열저장 ($row)
            $row = mysqli_fetch_array($result);

            $pass= $row["pass"];
            $name = $row["name"];
			$nickname = $row["nickname"];
			$email = $row["email"];
			$tel = $row["tel"];
			$phone = $row["phone"];
			$birth = $row["birth"];


            mysqli_close($con);
        ?>
		<section>
			<div id="main_content">
				<div id="join_box">

					<h2>회원 정보 수정</h2>
					<form name="member_form" method="post" action="member_modify.php">
						<table>
							<tr>
								<th>사용자 ID</th>
								<td><?= $userid ?>	<input type="hidden" name="id" value="<?=$userid?>">
							</tr>
							<tr>
								<th>비밀번호</th>
								<td><input type="password" name="pass" value="<?= $pass ?>">
									<!--4~12자리의 영문,숫자,특수문자(!, @, $, %, ^,&,*)만 가능-->
								</td>
							</tr>
							<tr>
								<th>비밀번호 확인</th>
								<td colspan="2"><input type="password" name="pass_confirm" value="<?= $pass ?>"></td>
							</tr>
							<tr>
								<th>성명</th>
								<td><input type="text" name="name" value="<?= $name ?>">
								</td>
							</tr>
							<tr>
								<th>닉네임</th>
								<td><input type="text" name="nickname" value="<?= $nickname ?>">
								</td>
							</tr>
							<tr>
								<th>E-mail</th>
								<td><input type="text" name="email" value="<?= $email ?>">
								</td>
							</tr>
							<tr>
								<th>전화번호</th>
								<td><input type="tel" name="tel" value="<?= $tel ?>">
								</td>
							</tr>
							<tr>
								<th>휴대폰 번호</th>
								<td><input type="tel" name="phone" value="<?= $phone ?>">
								</td>
							</tr>
							<tr>
								<th>생년월일</th>
								<td><input type="datetime-local" name="birth" value="<?= $birth ?>">
								</td>
							</tr>
						</table>
						<br>
						<div>
							<input type="submit" value="수정">
							<input type="button" value="취소" onclick="location.href='http://<?=$_SERVER['HTTP_HOST']?>/myproject_homepage/index.php'">
						</div>
					</form>
				</div> <!-- join_box -->
			</div> <!-- main_content -->
		</section>
		<footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/footer.php"; ?>
		</footer>
	</body>
</html>

