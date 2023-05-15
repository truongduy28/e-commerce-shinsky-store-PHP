<?php
if ($checkTokenAccount) {
    $sqlGetAccount = "SELECT * FROM taikhoan WHERE id_taikhoan = " . $checkTokenAccount['id_taikhoan'];
    $account = executeResult($sqlGetAccount);
    if ($account) {
        $data = $account[0];
        // change pass
        $pass = getPOST('pass');
        $newPass = getPOST('new-pass');
        $rePass = getPOST('re-pass');
        if ($rePass && $newPass && $pass) {
            $passVerify = getPwdSecurity($pass);
            $sqlCheckPass = "SELECT * FROM taikhoan WHERE matkhau = '$passVerify' && id_taikhoan = " . $checkTokenAccount['id_taikhoan'];
            $checkPass = executeResult($sqlCheckPass);
            if ($checkPass) {
                if ($rePass == $newPass) {
                    $passHash = getPwdSecurity($rePass);
                    $sqlUpdatePass = "UPDATE taikhoan SET matkhau = '$passHash' WHERE id_taikhoan = " . $checkTokenAccount['id_taikhoan'];
                    execute($sqlUpdatePass);
                    echo " <script>
                    alert('Mật khẩu mới đã cập nhật')</script>";
                    header('Refresh:0');
                    // echo $sqlUpdatePass;
                } else {
                    echo " <script>
                    alert('Mật khẩu mới không khớp')</script>";
                }
            } else {
                echo " <script>
                alert('Mật khẩu không đúng')</script>";
            }
        }
    } else {
        header('Location: ?page=');
    }
} else {
    header('Location: ?page=');
}

?>


<div class="account-container">
    <link rel="stylesheet" href="../access/css/account.css">
    <div class="account-details">
        <img src="https://zen-kare-67757d.000webhostapp.com/access/image/logo_main.png" alt="">
        <p>Tài khoản: <?= $data['tentaikhoan'] ?></p>
        <p>Email: <?= $data['email'] ?></p>
    </div>
    <div class="account-pass">
        <div class="account-pass_title">
            <hr>
            <h4>ĐỔI MẬT KHẨU</h4>
            <hr>
        </div>
        <div class="account-pass_form">
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Mật khẩu cũ: </label>
                    <input class="form-control" type=" text" name="pass" id="">
                </div>
                <div class="form-group">
                    <label for="">Mật khẩu mới: </label>
                    <input class="form-control mb-2" type=" text" name="new-pass" id="">
                    <input class="form-control" type=" text" name="re-pass" id="">
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-success">Đổi mật khẩu</button>
                </div>
            </form>
        </div>
    </div>
</div>