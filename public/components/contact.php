<?php
// get var conponents
$name = getPOST('ten');
$email = getPOST('email');
$msg = getPOST('loi-nhan');
$today = date('Y-m-d H:i:s');

if ($name && $email && $msg) {
    $sqlInsertMessage = "INSERT INTO `loinhan` ( `tennguoigui`, `email`, `loinhan`, `ngaygui`, `show_loinhan`) VALUES ( '$name', '$email', '$msg', '$today', 1  )";
    execute($sqlInsertMessage);

    echo '<script>
        window.location.href = "?page=";
        alert("Lời nhắn của bạn đã được gửi đi, xin cảm ơn");
    </script>';
}

?>


<div class="contact-container">
    <link rel="stylesheet" href="../access/css/contact.css">
    <p> Để lại lời nhắn cho chúng tôi</p>
    <form class="form" method="post">
        <div class="form-row">
            <div class="col-md-6">
                <label for="">Tên của bạn: </label>
                <input type="text" class="form-control" name="ten">
            </div>
            <div class="col-md-6">
                <label for="">Địa chỉ email: </label>
                <input type="mail" class="form-control" name="email">
            </div>
        </div>
        <div class="form-group">
            <label for="">Lời nhắn: </label>
            <textarea class="form-control" name="loi-nhan" rows="5"></textarea>
        </div>
        <div class="form-group text-center">
            <button class="btn btn-success px-5  ">Gửi</button>
        </div>
    </form>
    <p>Hoặc liên hệ trực tiếp qua:
    <ul>
        <li>Email: lienhe@abc.info</li>
        <li>SDT: 9090909090</li>
        <li>Địa chỉ: 9, ngõ 7, thnafh phố BAC, NSN</li>
    </ul>
    </p>
</div>