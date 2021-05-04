<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>서전주 중학교 > 관리자 권한</title>
		<link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/myproject_homepage/admin/css/admin.css">
	</head>
	<body>
		<header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/header.php"; ?>
		</header>
		<section>
			<div id="admin_box">
				<h3 id="member_title">
					관리자 모드 > 회원 관리
				</h3>
				<ul id="member_list">
					<li>
						<span class="col1">번호</span>
						<span class="col2">아이디</span>
						<span class="col3">이름</span>
						<span class="col4">가입일</span>
						<span class="col5">삭제</span>
					</li>
                    <?php
                        include_once $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/db/db_connect.php";

                        if ($_SESSION['num'] != '1' ) {
                            echo("
						            <script>
						            alert('관리자만 접근가능합니다');
						            history.go(-1)
						            </script>
						        ");
                            exit;
                        }

                        $sql = "select * from member order by num desc";
                        $result = mysqli_query($con, $sql);
                        $total_record = mysqli_num_rows($result); // 전체 회원 수

                        $number = $total_record;

                        while ($row = mysqli_fetch_array($result)) {
							$num = $row["num"];
                            $id = $row["id"];
                            $name = $row["name"];
							$regist_day = $row["regist_day"];
                            ?>

							<li>
								<form method="post" action="admin_member_update.php">
									<input type="hidden" name="num" value="<?= $num ?>">
									<span class="col1"><?= $number ?></span>
									<span class="col2"><?= $id ?></a></span>
									<span class="col3"><?= $name ?></span>
									<span class="col4"><?= $regist_day ?></span>
									<span class="col5"><button type="button"
									         onclick="location.href='admin_member_delete.php?num=<?= $num ?>'">삭제</button></span>
								</form>
							</li>

                            <?php
                            $number--;
                        }
                    ?>
				</ul>
				<h3 id="member_title">
					관리자 모드 > 게시판 관리
				</h3>
				<?php
					include_once $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/admin/activities.php";
				?>
				<?php
					include $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/db/db_connect.php";
					include_once $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/admin/invitation.php";
				?>
				<?php
					include $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/db/db_connect.php";
					include_once $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/admin/parent`s yard.php";
				?>
				<?php
					include $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/db/db_connect.php";
					include_once $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/admin/student`s yard.php";
				?>
				<?php
					include $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/db/db_connect.php";
					include_once $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/admin/support.php";
				?>
				<?php
					include $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/db/db_connect.php";
					include_once $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/admin/school_album.php";
				?>
				<?php
					include_once $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/admin/chart.php";
				?>
						
			</div> <!-- admin_box -->
		</section>
		<footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/footer.php"; ?>
		</footer>
	</body>
</html>
