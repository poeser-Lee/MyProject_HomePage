<!DOCTYPE html>
<html>

   <head>
      <meta charset="utf-8">
      <title>게시판> 교육활동 마당>글쓰기</title>
      <link rel="stylesheet" type="text/css"
            href="http://<?= $_SERVER['HTTP_HOST'] ?>/myproject_homepage/activities/board_list.css">
      <script src="http://<?= $_SERVER['HTTP_HOST'] ?>/myproject_homepage/activities/board_list.js" defer></script>
   </head>

   <body>
      <header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/header.php"; ?>
      </header>
        <?php
            if (empty($userid)) {
                echo("<script>
            alert('로그인 후 이용해주세요!');
            history.go(-1);
            </script>
         ");
                exit;
            }
        ?>
      <section>
            <?php
                include_once $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/db/db_connect.php"; // 두가지 기능을 넣음 1.수정하기 폼 2.입력하기 폼
            //$_POST["mode"]값이 세팅되어있지않으면 삽입 해당폼을 이용하겟다
            // 기본값으로 insert가 세팅되어있음.
                $mode = isset($_POST["mode"])?$_POST["mode"]:"insert"; //삼항 연산자로 물어봄.
                $subject = "";
                $content = "";
                $file_name = "";

            //수정하기
                if (isset($_POST["mode"]) && $_POST["mode"] === "modify") {
                    $num = $_POST["num"];
                    $page = $_POST["page"];

                    $sql = "select * from activities where num=$num";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($result);
                    $writer = $row["id"];
                    if (!isset($userid) || ($userid !== $writer && $userlevel !== '1')) {
                        alert_back('수정권한이 없습니다.');
                        exit;
                    }
                    $name = $row["name"];
                    $subject = $row["subject"];
                    $content = $row["content"];
                    $file_name = $row["file_name"];
                    if (empty($file_name)) $file_name = "없음";
                }
            ?>

         <div id="board_box">
            <h3 id="board_title">
                    <?php if ($mode === "modify"): ?> <!-- 중괄호 대신 :을  씀 -->
                  게시판 > 수정 하기
                    <?php else: ?>
                  게시판 > 글 쓰기
                    <?php endif; ?>
            </h3>
            <!-- 파일을 첨부할 때는 post방식으로 enctype="multipart/form-data"를 반드시 폼태그에 입력해야한다. -->
            <form name="board_form" method="post" action="dmi_board.php" enctype="multipart/form-data">
                    <!-- $mode === "modify" 수정모드이면 number와 page를 히든으로 전송하겠다.
                  $mode === "insert"이면 이문장을 실행하지 않겠다. -->
               <?php if ($mode === "modify"): ?>
                       <input type="hidden" name="num" value=<?= $num ?>>
                       <input type="hidden" name="page" value=<?= $page ?>>
                    <?php endif; ?>

               <!-- $mode가 "modify"이든  "insert"이든 히든으로 모든값을 전송하겠다 -->
               <input type="hidden" name="mode" value=<?= $mode ?>>
               <ul id="board_form">
                  <li>
                  
                     <!-- subject로 넘어감  -->
                     <span class="col1">이름 : </span>
                     <span class="col2"><?= $username ?></span>
                  </li>
                  <li>
                      
                     <!-- subject로 넘어감  -->
                     <span class="col1">제목 : </span>
                     <span class="col2"><input name="subject" type="text" value=<?= $subject ?>></span>
                  </li>
                  <li id="text_area">
                     <!-- content로 넘어감  -->
                     <span class="col1">내용 : </span>
                     <span class="col2">
                     <textarea name="content"><?= $content ?></textarea>
                  </span>
                  </li>
                  <li>
                  
                     <!-- upfile로 넘어감  -->
                     <span class="col1"> 첨부 파일 : </span>
                     <span class="col2"><input type="file" name="upfile">
                     <?php if ($mode === "modify"): ?>
                        <input type="checkbox" value="yes"
                               name="file_delete">&nbsp;파일 삭제하기
                        <br>현재 파일 : <?= $file_name ?>
                            <?php endif; ?>
                      </span>
                  </li>
                  <!--총 7개가 넘어가 modify3개 insert 4개 -->
               </ul>
               <ul class="buttons">
                  <li>
                     <button type="submit" onclick="check_input()">완료</button>
                  </li>
                  <li>
                     <button type="button" onclick="location.href='board_list.php'">목록</button>
                  </li>
               </ul>
            </form>
         </div> <!-- board_box -->
      </section>
      <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/footer.php"; ?>
      </footer>
   </body>

</html>