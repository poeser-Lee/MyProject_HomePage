function idCheck(){
    var $idInput = document.getElementById("idInput");
    var $idCorrect = document.getElementById("idCorrect");
    var idExp = /^[0-9a-zA-z]{3,11}$/;
    if($idInput.value === ""){
        $idCorrect.innerHTML ="아이디를 입력해주세요.";
        return false;
    }else if($idInput.value.match(idExp)){
        $idCorrect.innerHTML ="사용가능한 아이디입니다.";
        return false;
    }else{
        $idCorrect.innerHTML ="사용할수 없는 아이디 입니다.";
        return true;
    }
}

function pwCheck(){   
    var $pass = document.getElementById("pass");
    var $pwCorrect = document.getElementById("pwCorrect");
    var pwExp = /^.*(?=^.{6,12}$)(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&+=]).*$/;
    if($pass.value === ""){
        $pwCorrect.innerHTML ="패스워드를 입력해주세요";
        return false;
    }else if($pass.value.match(pwExp)){
        $pwCorrect.innerHTML ="입력 완료";
        return false;
    }else{
        $pwCorrect.innerHTML ="조건에 맞지 않는 패스워드 입니다.";
        return true;
    }
}

function pwCheck2(){
    var $pass = document.getElementById("pass");
    var $password_ok = document.getElementById("password_ok");
    var $pwCorrect2 = document.getElementById("pwCorrect2");
    if($pass.value === $password_ok.value){
        $pwCorrect2.innerHTML ="패스워드가 일지합니다.";
        return true;
    }else{
        $pwCorrect2.innerHTML = "패스워드가 불일치합니다.";
        return false;
    }

}


function reset_form() {
    document.member_form.id.value = "";
    document.member_form.pass.value = "";
    document.member_form.pass_confirm.value = "";
    document.member_form.name.value = "";
    document.member_form.email1.value = "";
    document.member_form.email2.value = "";
    document.member_form.id.focus();
    return;
}

function check_input() {
    if (!document.member_form.id.value) {
        alert("아이디를 입력하세요!");
        document.member_form.id.focus();
        return;
    }

    if (!document.member_form.pass.value) {
        alert("비밀번호를 입력하세요!");
        document.member_form.pass.focus();
        return;
    }

    if (!document.member_form.pass_confirm.value) {
        alert("비밀번호확인을 입력하세요!");
        document.member_form.pass_confirm.focus();
        return;
    }

    if (!document.member_form.name.value) {
        alert("이름을 입력하세요!");
        document.member_form.name.focus();
        return;
    }

    if (!document.member_form.email1.value) {
        alert("이메일 주소를 입력하세요!");
        document.member_form.email1.focus();
        return;
    }

    if (!document.member_form.email2.value) {
        alert("이메일 주소를 입력하세요!");
        document.member_form.email2.focus();
        return;
    }

    if (document.member_form.pass.value !=
        document.member_form.pass_confirm.value) {
        alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
        document.member_form.pass.focus();
        document.member_form.pass.select();
        return;
    }

    document.member_form.submit();
}

function reset_form() {
    document.member_form.id.value = "";
    document.member_form.pass.value = "";
    document.member_form.pass_confirm.value = "";
    document.member_form.name.value = "";
    document.member_form.email1.value = "";
    document.member_form.email2.value = "";
    document.member_form.id.focus();
    return;
}

function check_id() {
    window.open("member_check_id.php?id=" + document.member_form.id.value,
        "IDcheck",
        "left=700,top=300,width=350,height=200,scrollbars=no,resizable=yes");
}
