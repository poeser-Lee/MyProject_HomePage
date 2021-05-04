<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    include_once $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/function.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/db/db_connect.php";
    //파일을 업로드 했을 때 서버에서 가져오는 구조
    // echo var_dump($_POST);
    // echo var_dump($_FILES['upfile']); //업로드 파일은 post로 하면 안되고 flies로 받아야함. 내역이 다 나옴/
    // array(5) { 
    //     ["name"]=> string(9) "cat_1.png" 
    //     ["type"]=> string(9) "image/png"
    //     ["tmp_name"]=> string(27) "C:\Windows\Temp\php78A5.tmp" //임시 저장소(운영체제의 임시 저장소) 
    //     //안가져가면 지워버림
    //     ["error"]=> int(0) 
    //     ["size"]=> int(1441828) }
        

    if (isset($_POST["mode"]) && $_POST["mode"] === "delete") {
        $num = $_POST["num"];
        $page = $_POST["page"];
        $sql = "select * from boardsupport where num = $num";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        $writer = $row["id"];
        if (!isset($userid) || ($userid !== $writer && $userlevel !== '1')) {
            alert_back('수정권한이 없습니다.');
            exit;
        }
        $copied_name = $row["file_copied"];

        if ($copied_name) {
            $file_path = "./data/" . $copied_name;
            unlink($file_path);
        }

        $sql = "delete from boardsupport where num = $num";
        mysqli_query($con, $sql);
        mysqli_close($con);

        echo "
        <script>
            location.href = 'board_list.php?page=$page';
        </script>
      ";
    } elseif (isset($_POST["mode"]) && $_POST["mode"] === "insert") {
        
     //   include_once $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/db/db_connect.php";
        include_once $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/db/create_table.php";

        create_table($con, 'boardsupport');

        //세션값확인


        if (!$userid) {
            echo("
      <script>
      alert('게시판 글쓰기는 로그인 후 이용해 주세요!');
      history.go(-1)
      </script>    
        ");
            exit;
        }

        $subject = input_set($_POST["subject"]); // 
        $content = input_set($_POST["content"]);

        $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

        $upload_dir = "./data/";

        $upfile_name = $_FILES["upfile"]["name"];
        $upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
        $upfile_type = $_FILES["upfile"]["type"];
        $upfile_size = $_FILES["upfile"]["size"];  // 안되면 php init 에서 최대 크기 수정!
        $upfile_error = $_FILES["upfile"]["error"];

        if ($upfile_name && !$upfile_error) { // 업로드가 잘되었는지 판단
            $file = explode(".", $upfile_name); //"."배열로 분리시킨다 (you).jpg)
            $file_name = $file[0]; //(you)
            $file_ext = $file[1]; //(jpg)

            $new_file_name = date("Y_m_d_H_i_s");
            $new_file_name = $new_file_name . "_" . $file_name; // 2021_04_26_11~ 
            $copied_file_name = $new_file_name . "." . $file_ext; // 2020_09_23_11_10_20_memo.sql
            $uploaded_file = $upload_dir . $copied_file_name; // ./data/2020_09_23_11_10_20_you.jpg 문자열을 다 합친것

            if ($upfile_size > 2000000) { //최대용향은 1000kbte
                echo("
                        <script>
                        alert('업로드 파일 크기가 지정된 용량(1MB)을 초과합니다!');
                        history.go(-1)
                        </script>
                        ");
                exit;
            }

            //중요 운영체제 임시폴더에 저장된 파일을 서버가 지정한 파일 위치로 복사한다.
            //"C:\Windows\Temp\php78A5.tmp"  --> ./data/2020_09_23_11_10_20_you.jpg 복사한다.
            if (!move_uploaded_file($upfile_tmp_name, $uploaded_file)) {
                echo("
               <script>
               alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
               history.go(-1)
               </script>
            ");
                exit;
            }
        } else {
            $upfile_name = "";
            $upfile_type = "";
            $copied_file_name = "";
        }

        //    $con = mysqli_connect("localhost", "user1", "12345", "sample");

        $sql = "insert into boardsupport (id, name, subject, content, regist_day, hit,  file_name, file_type, file_copied) ";
        $sql .= "values('$userid', '$username', '$subject', '$content', '$regist_day', 0, ";
        $sql .= "'$upfile_name', '$upfile_type', '$copied_file_name')";
        mysqli_query($con, $sql) or die('error : ' . mysqli_error($con));  // $sql 에 저장된 명령 실행

        mysqli_close($con);                // DB 연결 끊기

        echo "
      <script>
        alert('게시판입력이 성공');
       location.href = 'board_list.php';
      </script>
   ";

    } elseif (isset($_POST["mode"]) && $_POST["mode"] === "modify") {
        $num = $_POST["num"];
        $page = $_POST["page"];

        $subject = $_POST["subject"];
        $content = $_POST["content"];
        $file_delete = (isset($_POST["file_delete"])) ? $_POST["file_delete"] : 'no';

        $sql = "select * from boardsupport where num = $num";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);

        $copied_name = $row["file_copied"];

        $upfile_name = $row["file_name"];
        $upfile_type = $row["file_type"];
        $copied_file_name = $row["file_copied"];
        if ($file_delete === "yes") {
            if ($copied_name) {
                $file_path = "./data/" . $copied_name;
                unlink($file_path);
            }
            $upfile_name = "";
            $upfile_type = "";
            $copied_file_name = "";

        } else {
            if (isset($_FILES["upfile"])) {
                if ($copied_name) {
                    $file_path = "./data/" . $copied_name;
                    unlink($file_path);
                }

                $upload_dir = "./data/";

                $upfile_name = $_FILES["upfile"]["name"];
                $upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
                $upfile_type = $_FILES["upfile"]["type"];
                $upfile_size = $_FILES["upfile"]["size"];  // 안되면 php init 에서 최대 크기 수정!
                $upfile_error = $_FILES["upfile"]["error"];
                if ($upfile_name && !$upfile_error) { // 업로드가 잘되었는지 판단
                    $file = explode(".", $upfile_name); // trim과 같다. (memo.sql)
                    $file_name = $file[0]; //(memo)
                    $file_ext = $file[1]; //(sql)

                    $new_file_name = date("Y_m_d_H_i_s");
                    $new_file_name = $new_file_name . "_" . $file_name;
                    $copied_file_name = $new_file_name . "." . $file_ext; // 2020_09_23_11_10_20_memo.sql
                    $uploaded_file = $upload_dir . $copied_file_name; // ./data/2020_09_23_11_10_20_memo.sql 다 합친것

                    if ($upfile_size > 2000000) {
                        echo("
                                <script>
                                alert('업로드 파일 크기가 지정된 용량(1MB)을 초과합니다!');
                                history.go(-1)
                                </script>
                                ");
                        exit;
                    }

                    if (!move_uploaded_file($upfile_tmp_name, $uploaded_file)) {
                        echo("
               <script>
               alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
               history.go(-1)
               </script>
            ");
                        exit;
                    }
                } else {
                    $upfile_name = $row["file_name"];
                    $upfile_type = $row["file_type"];
                    $copied_file_name = $row["file_copied"];
                }
            }

        }
        $sql = "update boardsupport set subject='$subject', content='$content',  file_name='$upfile_name', file_type='$upfile_type', file_copied= '$copied_file_name'";
        $sql .= " where num=$num";
        mysqli_query($con, $sql);

        mysqli_close($con);
        echo "
         <script>
             location.href = 'board_list.php?page=$page';
         </script>
     ";
    }

?>
