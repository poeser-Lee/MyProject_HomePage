<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
        <title>서전주 중학교 > 회원 탈퇴</title>
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
		<section>
			<div id="main_content">
				<div id="join_box">
					<h2>정말로 회원탈퇴를 하시겠습니까?</h2>
					<form name="member_form" method="post" action="member_delete.php">
						<input type="hidden" name="id" value="<?=$userid?>">
						<br><br>
						<div>
							<input type="submit" value="확인">
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

