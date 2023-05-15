<?php
require_once "../../database/dbFunc.php";
$id = getGET('id');
// echo $id;
$checkTokenAccount = validateToken();
if ($checkTokenAccount) {
    $sql = "SELECT * FROM donhang WHERE id_donhang = '$id' && id_taikhoan = " . $checkTokenAccount['id_taikhoan'];
    $check = executeResult($sql);
    if ($check) {
        $sqlCancel = "Update donhang SET id_trangthaidonhang = 4 where id_donhang = '$id'";
        execute($sqlCancel);
        header("Location: ../../public/?page=order&id=$id");
    } else {
    }
}