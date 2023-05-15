<?php
if ($checkTokenAccount) {
    header('Location: ?page=');
    die();
}

// var in container
$userName = getPOST('ten-dang-nhap');
$password = getPOST('mat-khau');
$event = $_POST;
// handle login
function DangNhap($userName, $password)
{
    if ($userName != '' && $password != '') {
        $passwordHash = getPwdSecurity($password);
        $sqlCheckAccount = "SELECT * FROM taikhoan WHERE tentaikhoan = '$userName' && matkhau = '$passwordHash'";
        $checkAccount = executeResult($sqlCheckAccount);
        if ($checkAccount) {
            if ($checkAccount[0]['show_taikhoan'] == 0) {
                echo '<script>
                alert("Tài khoản vô hiệu hóa!");
             </script>';
                return;
            }
            $user = $checkAccount[0]['id_taikhoan'];
            $token = getPwdSecurity($userName . time() . rand(1, 99999));
            setcookie('e_token', $token, time() + 7 * 24 * 60 * 60, '/');
            $sqlCreateToken = "INSERT INTO `tokens` ( `id_taikhoan`, `token`) VALUES ( '$user', '$token')";
            execute($sqlCreateToken);
            header('Location: ?page=');
        } else {
            echo '<script>
                    alert("Tài khoản hoặc mật khẩu không chính xác");
                 </script>';
        }
    }
};

if ($event) {
    DangNhap($userName, $password);
}


?>
<div class="login-container">
    <link rel="stylesheet" href="../access/css/login.css">
    <form method="post">
        <h4 class="text-center">ĐĂNG NHẬP</h4>
        <div class="form-group">
            <label for="">Tên đăng nhập:</label>
            <input class="btn-block" type="text" name="ten-dang-nhap">
        </div>
        <div class="form-group">
            <label for="">Mật khẩu:</label>
            <input class="btn-block" type="password" name="mat-khau">
        </div>
        <button class="btn btn-block">ĐĂNG NHẬP</button>
        <br>
        <div class="form-group text-center ">
            <p>Bạn chưa có tài khoản? <a href="?page=register">Đăng ký ngay!</a></p>
        </div>
    </form>
</div>