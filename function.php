<?php 
function alert_back($message){
    echo("
        <script>
        alert('$message');
        history.go(-1)
        </script>
        ");
}
//잘못된 입력을 방어하기 위한 함수
function input_set($data){
    $data = trim($data); // 공백 삭제
    $data = stripslashes($data); // /들어가면 삭제
    $data = htmlspecialchars($data); 
    return $data;
}
?>