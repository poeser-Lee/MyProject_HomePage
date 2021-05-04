<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/myproject_homepage/db/db_connect.php";

    function create_table($con, $table_name)
    {
        $flag = false;
        $query = "show tables from sample;";
        $result = mysqli_query($con, $query) or die('error : ' . mysqli_error($con));
        while ($row = mysqli_fetch_row($result)) {
            if ($row[0] === $table_name) {
                $flag = true;
                break;
            }
        }

        //해당 테이블명이 없으면 해당 테이블명을 찾아서 데이블 생성 쿼리문을 작성한다.
        if ($flag === false) {
            switch ($table_name) {
                case 'member':
                    $query = "CREATE TABLE `member` (
                             `num` int(11) NOT NULL AUTO_INCREMENT,
                              `id` char(20) NOT NULL,
                              `pass` char(20) NOT NULL,
                              `name` char(20) NOT NULL,
                              `nickname` char(200) NOT NULL,
                              `email` char(200) NOT NULL,
                              `tel` char(20) DEFAULT NULL,
                              `phone` char(20) DEFAULT NULL,
                              `birth` char(20) DEFAULT NULL,
                              `address` char(40) DEFAULT NULL,
                              `regist_day` char(20) DEFAULT NULL,
                              PRIMARY KEY (`num`)
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
                         break;

                case 'boardsupport':
                    $query = "CREATE TABLE `boardsupport` (
                             `num` int NOT NULL AUTO_INCREMENT,
                             `id` char(15) NOT NULL,
                             `name` char(10) NOT NULL,
                             `subject` char(200) NOT NULL,
                             `content` text NOT NULL,
                             `regist_day` char(20) NOT NULL,
                             `hit` int NOT NULL,
                             `file_name` char(40) DEFAULT NULL,
                             `file_type` char(40) DEFAULT NULL,
                             `file_copied` char(40) DEFAULT NULL,
                              PRIMARY KEY (`num`)
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
                        break;

                case 'boardstudent':
                    $query = "CREATE TABLE `boardstudent` (
                            `num` int NOT NULL AUTO_INCREMENT,
                            `id` char(15) NOT NULL,
                            `name` char(10) NOT NULL,
                            `subject` char(200) NOT NULL,
                            `content` text NOT NULL,
                            `regist_day` char(20) NOT NULL,
                            `hit` int NOT NULL,
                            `file_name` char(40) DEFAULT NULL,
                            `file_type` char(40) DEFAULT NULL,
                            `file_copied` char(40) DEFAULT NULL,
                             PRIMARY KEY (`num`)
                           ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
                        break;
                case 'boardparent':
                    $query = "CREATE TABLE `boardparent` (
                            `num` int NOT NULL AUTO_INCREMENT,
                            `id` char(15) NOT NULL,
                            `name` char(10) NOT NULL,
                            `subject` char(200) NOT NULL,
                            `content` text NOT NULL,
                            `regist_day` char(20) NOT NULL,
                            `hit` int NOT NULL,
                            `file_name` char(40) DEFAULT NULL,
                            `file_type` char(40) DEFAULT NULL,
                            `file_copied` char(40) DEFAULT NULL,
                             PRIMARY KEY (`num`)
                           ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
                        break;

                case 'invitation':
                   $query = "CREATE TABLE `invitation` (
                            `num` int NOT NULL AUTO_INCREMENT,
                            `id` char(15) NOT NULL,
                            `name` char(10) NOT NULL,
                            `subject` char(200) NOT NULL,
                            `content` text NOT NULL,
                            `regist_day` char(20) NOT NULL,
                            `hit` int NOT NULL,
                            `file_name` char(40) DEFAULT NULL,
                            `file_type` char(40) DEFAULT NULL,
                            `file_copied` char(40) DEFAULT NULL,
                             PRIMARY KEY (`num`)
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
                        break;

                case 'activities':
                    $query = "CREATE TABLE `activities` (
                            `num` int NOT NULL AUTO_INCREMENT,
                             `id` char(15) NOT NULL,
                             `name` char(10) NOT NULL,
                             `subject` char(200) NOT NULL,
                             `content` text NOT NULL,
                             `regist_day` char(20) NOT NULL,
                             `hit` int NOT NULL,
                             `file_name` char(40) DEFAULT NULL,
                             `file_type` char(40) DEFAULT NULL,
                             `file_copied` char(40) DEFAULT NULL,
                              PRIMARY KEY (`num`)
                              ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
                        break;
                case 'album':
                    $query = "CREATE TABLE `album` (
                            `num` int NOT NULL AUTO_INCREMENT,
                            `id` char(15) NOT NULL,
                            `name` char(10) NOT NULL,
                            `subject` char(200) NOT NULL,
                            `content` text NOT NULL,
                            `regist_day` char(20) NOT NULL,
                            `hit` int NOT NULL,
                            `file_name` char(40) DEFAULT NULL,
                            `file_type` char(40) DEFAULT NULL,
                            `file_copied` char(40) DEFAULT NULL,
                            PRIMARY KEY (`num`)
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
                        break;

                case 'album_ripple':
                    $query = "CREATE TABLE `album_ripple` (
                            `num` int(11) NOT NULL AUTO_INCREMENT,
                            `parent` int(11) NOT NULL,
                            `id` char(15) NOT NULL,
                            `name` char(10) NOT NULL,
                            `nick` char(10) NOT NULL,
                            `content` text NOT NULL,
                            `regist_day` char(20) DEFAULT NULL,
                            PRIMARY KEY (`num`)
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                            ";
                        break;        
        
                default :
                    echo "<script>alert('해당테이블명이 없습니다 . ')</script>";
                    break;

            }

            if (mysqli_query($con, $query)) {
                echo "<script>alert('{$table_name} 테이블이 생성되엇습니다. ');</script>";
            } else {
                echo "<script>alert('{$table_name} 테이블 생성 실패');</script>";
            }
        }

    }

?>