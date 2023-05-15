<?php

require_once '../../database/dbFunc.php';

$pr = getGET('pr');
$us = getGET('us');
$si = getGET('si');

$checkTokenAccount = validateToken();
if ($checkTokenAccount['id_taikhoan'] == $us) {
    $sqlDeleteProductOutCart = "DELETE FROM giohang WHERE id_taikhoan = '$us' && id_sanpham = '$pr' && size = '$si'";
    execute($sqlDeleteProductOutCart);
    // echo $sqlDeleteProductOutCart;
    header("Location: ../../public/?page=cart");
} else {
    header("Location: ../../public/?page=error");
}