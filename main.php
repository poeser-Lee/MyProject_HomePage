<?php include $_SERVER['DOCUMENT_ROOT']."/myproject_homepage/main_img_bar.php"; ?>
<div id="main_content">
	<!--최근 5개 게시물 View-->
	<div id="invitation">
		<h4>알림 마당</h4>
		<ul>
			<!-- 최근 게시 글 DB에서 불러오기 -->
            <?php
	            include_once "db/db_connect.php";

                $sql = "select * from invitation order by num desc limit 5";
                $result = mysqli_query($con, $sql);

                if (!$result)
                    echo "<li><span>아직 게시글이 없습니다!</span></li>";
                else {
					//result set에서 첫번째 포인트 레코드를 $row에 저장한다.
                    while ($row = mysqli_fetch_array($result)) {
                        $regist_day = substr($row["regist_day"], 0, 10);
                        ?>
						<li>
							<span id="subject"><?= $row["subject"] ?></span>
							<span id="name"><?= $row["name"] ?></span>
							<span id="day"><?= $regist_day ?></span>
						</li>
                        <?php
                    }
                }
            ?>
		</ul>
	</div>
	<div id="boardstudent">
		<h4>학생 마당</h4>
		<ul>
			<!-- 최근 게시 글 DB에서 불러오기 -->
            <?php
	            include_once "db/db_connect.php";
				//
                $sql = "select * from boardstudent order by num desc limit 5";
                $result = mysqli_query($con, $sql);

                if (!$result)
                    echo "<li><span>아직 게시글이 없습니다!</span></li>";
                else {
                    while ($row = mysqli_fetch_array($result)) {
                        $regist_day = substr($row["regist_day"], 0, 10);
                        ?>
						<li>
							<span><?= $row["subject"] ?></span>
							<span><?= $row["name"] ?></span>
							<span><?= $regist_day ?></span>
						</li>
                        <?php
                    }
                }
            ?>
		</ul>
	</div>	
	<div id="boardparent">
		<h4>학부모 마당</h4>
		<ul>
			<!-- 최근 게시 글 DB에서 불러오기 -->
            <?php
	            include_once "db/db_connect.php";
				//
                $sql = "select * from boardparent order by num desc limit 5";
                $result = mysqli_query($con, $sql);

                if (!$result)
                    echo "<li><span>아직 게시글이 없습니다!</span></li>";
                else {
                    while ($row = mysqli_fetch_array($result)) {
                        $regist_day = substr($row["regist_day"], 0, 10);
                        ?>
						<li>
							<span><?= $row["subject"] ?></span>
							<span><?= $row["name"] ?></span>
							<span><?= $regist_day ?></span>
						</li>
                        <?php
                    }
                }
            ?>
		</ul>
	</div>

</div>
