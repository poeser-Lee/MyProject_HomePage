<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>서전주 중학교>알림 마당</title>
      <link rel="stylesheet" type="text/css"
            href="http://<?= $_SERVER['HTTP_HOST'] ?>/myproject_homepage/invitation/board_list.css">
      <script src="http://<?= $_SERVER['HTTP_HOST'] ?>/myproject_homepage/invitation/board_list.js" defer></script>
      <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
      <script src="https://kit.fontawesome.com/5bc9c3ab86.js" crossorigin="anonymous"></script>
      <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@1,200&display=swap" rel="stylesheet">
   </head>
   <body>
      <header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/header.php"; ?>
      </header>
      <div class ="banner">
                <a href="#"><img src="../img/banner1.png" alt="banner1"></a>
            </div>
      <section>
         <div id="board_box">
            <h3>
               게시판 >알림 마당
            </h3>
            <ul id="board_list">
               <li class = "menu">
                  <span class="col1">번호</span>
                  <span class="col2">제목</span>
                  <span class="col3">글쓴이</span>
                  <span class="col4">첨부</span>
                  <span class="col5">등록일</span>
                  <span class="col6">조회</span>
               </li>
                    <?php

                        include_once $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/db/db_connect.php";

                        // $_GET["page"]가 없으면 첫페이지를 보여줘라
                        if (isset($_GET["page"]))
                            $page = $_GET["page"];
                        else
                            $page = 1;

                        $sql = "select * from invitation order by num desc";
                        $result = mysqli_query($con, $sql); //레코드 셋
                        $total_record = mysqli_num_rows($result); // 레코드셋 개수가 총 몇개인가
                        
                        //한 개시판에서 보여줘야할 레코드 개수 // 10개 항목 이후엔 다음페이지에서 보여주는 것
                        $scale = 5;  // define(SCCALE,10); //상수는 이렇게 적어야해

                        // 전체 페이지 수($total_page) 계산
                        if ($total_record % $scale == 0)
                            $total_page = floor($total_record / $scale);
                        else
                            $total_page = floor($total_record / $scale) + 1;

                        // 표시할 페이지($page)에 따라 $start 계산
                        $start = ($page - 1) * $scale;

                        $number = $total_record - $start;

                        //게시판에서 보여줘야할 개수를 
                        for ($i = $start; $i < $start + $scale && $i < $total_record; $i++) {
                            mysqli_data_seek($result, $i);
                            // 가져올 레코드로 위치(포인터) 이동
                            $row = mysqli_fetch_array($result);
                            // 하나의 레코드 가져오기
                            $num = $row["num"];
                            $id = $row["subject"];
                            $id = $row["id"];
                            $name = $row["name"];
                            $subject = $row["subject"];
                            $regist_day = $row["regist_day"];
                            $hit = $row["hit"];
                            if ($row["file_name"])
                                $file_image = "<img src='./img/file.gif'>";
                            else
                                $file_image = " ";
                            ?>
                     <li>
                        <span class="col1"><?= $number ?></span>
                        <span class="col2"><a
                                 href="board_view.php?num=<?= $num ?>&page=<?= $page ?>"><?= $subject ?></a></span>
                        <span class="col3"><?= $name ?></span>
                        <span class="col4"><?= $file_image ?></span>
                        <span class="col5"><?= $regist_day ?></span>
                        <span class="col6"><?= $hit ?></span>
                     </li>
                            <?php
                            $number--;
                        }
                        //디비 닫기
                        mysqli_close($con);

                    ?>
            </ul>

                <!-- 페이지 넘버를 보여주는 영역 하단에 표시 -->
            <ul id="page_num">
                    <?php
                        if ($total_page >= 2 && $page >= 2) {
                            $new_page = $page - 1;
                            echo "<li><a href='board_list.php?page=$new_page'>◀ 이전</a> </li>";
                        } else
                            echo "<li>&nbsp;</li>";

                        // 게시판 목록 하단에 페이지 링크 번호 출력
                        for ($i = 1; $i <= $total_page; $i++) {
                            if ($page == $i)     // 현재 페이지 번호 링크 안함
                            {
                                echo "<li><b> $i </b></li>";
                            } else {
                                echo "<li><a href='board_list.php?page=$i'> $i </a><li>";
                            }
                        }
                        if ($total_page >= 2 && $page != $total_page) {
                            $new_page = $page + 1;
                            echo "<li> <a href='board_list.php?page=$new_page'>다음 ▶</a> </li>";
                        } else
                            echo "<li>&nbsp;</li>";
                    ?>
            </ul> <!-- page -->
            <ul class="buttons">
               <li>
                  <button onclick="location.href='board_list.php'">목록</button>
               </li>
               <li>
                        <?php
                            //권한은 헤더에서 물어보고 아이디가 있으면 글쓰기 권한을 줌.
                            if ($userid) {
                                ?>
                        <button onclick="location.href='board_form.php'">글쓰기</button>
                                <?php
                            } else {
                                ?>
                        <a href="javascript:alert('로그인 후 이용해 주세요!')"> <!-- 인라인 자바스크립트 -->
                           <button>글쓰기</button>
                        </a>
                                <?php
                            }
                        ?>
               </li>
            </ul>
         </div> <!-- board_box -->
      </section>
      <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/footer.php"; ?>
      </footer>
   </body>
</html>