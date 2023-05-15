<?php
// var global
$today = date('Y-m-d H:i:s');

// var in container
$userName = getPOST('tai-khoan');
$password = getPOST('mat-khau');
$email = getPOST('email');

$event = $_POST;


// check isset username input form FROM to SQL BE
function DangKy($userName, $password, $email)
{
    $today = date('Y-m-d H:i:s');
    if ($userName != '' && $password != '' && $email != '') {
        $sqlCheckUsername = "SELECT * FROM taikhoan WHERE tentaikhoan = '$userName'";
        $listSqlCheckUsername = executeResult($sqlCheckUsername);
        if ($listSqlCheckUsername) {
            echo "<script>
            alert('Tài khoản đã tồn tại trên hệ thống!')</script>
            ";
        } else {
            $passwordSecurity = getPwdSecurity($password);
            $sqlCreateUser = "INSERT INTO `taikhoan` ( `tentaikhoan`, `matkhau`,`email`, `lv`, `ngaytao`, `show_taikhoan`) VALUES ( '$userName', '$passwordSecurity','$email', '1', '$today', 1)";
            execute($sqlCreateUser);
            echo "<script>
                    alert('Đăng kí thành công! Bạn sẽ được chuyển sang trang đăng nhập')
                    window.location.href = '?page=login'
               </script>";
        }
    }
}


if ($event) {
    DangKy($userName, $password, $email);
}

?>


<div class="register-container">
    <link rel="stylesheet" href="../access/css/register.css">
    <form method="post">
        <h4 class="text-center">ĐĂNG KÍ TÀI KHOẢN</h4>
        <div class="form-group ">
            <label class="text-left" for="">Tên đăng nhập:</label>
            <input type="text" class=" btn-block" name="tai-khoan">
        </div>
        <div class="form-group ">
            <label class="text-left" for="">Mật khẩu:</label>
            <input type="text" class=" btn-block" name="mat-khau">
        </div>
        <div class="form-group ">
            <label class="text-left" for="">Email:</label>
            <input type="text" class=" btn-block" name="email">
        </div>
        <button class="btn btn-block">
            ĐĂNG KÝ
        </button>
        <br>
        <div class="form-group text-center ">
            <p>Bạn đã có tài khoản? <a href="?page=login">Đăng nhập ngay!</a></p>
        </div>
    </form>
</div>