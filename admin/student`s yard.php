<ul id="board_list">
<h3>학생 마당</h3>
    <li class="title">
        <span class="col1">선택</span>
        <span class="col2">번호</span>
        <span class="col3">이름</span>
        <span class="col4">제목</span>
        <span class="col5">첨부파일명</span>
        <span class="col6">작성일</span>
    </li>
    <form method="post" action="admin_student`s yard_delete.php">
        <?php
            $sql = "select * from boardstudent order by num desc";
            $result = mysqli_query($con, $sql);
            $total_record = mysqli_num_rows($result); // 전체 글의 수

            $number = $total_record;

            while ($row = mysqli_fetch_array($result)) {
                $num = $row["num"];
                $name = $row["name"];
                $subject = $row["subject"];
                $file_name = $row["file_name"];
                $regist_day = $row["regist_day"];
                $regist_day = substr($regist_day, 0, 10)
                ?>
                <li>
                    <span class="col1"><input type="checkbox" name="item[]" value="<?= $num ?>"></span>
                    <span class="col2"><?= $number ?></span>
                    <span class="col3"><?= $name ?></span>
                    <span class="col4"><?= $subject ?></span>
                    <span class="col5"><?= $file_name ?></span>
                    <span class="col6"><?= $regist_day ?></span>
                </li>
                <?php
                $number--;
            }
            mysqli_close($con);
        ?>
        <button type="submit">선택된 글 삭제</button>
    </form>
</ul>