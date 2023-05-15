<?php


require_once('../../database/dbFunc.php');
$pr = getGET('id-san-pham');
$us = getGET('id-tai-khoan');
$si = getGET('size');

$checkTokenAccount = validateToken();
if (!$checkTokenAccount)
    header('Location: ../../public/?page=login');


// echo $pr . ' ' . $si . ' ' . $us;
if (!$si) {
    echo "
    <script>
        alert('Không được bỏ qua size');
        history.back()
    </script>
    ";
} else {
    if ($us) {
        $sqlCheckCart = "SELECT * FROM giohang, taikhoan WHERE giohang.id_taikhoan  = taikhoan.id_taikhoan && giohang.id_sanpham = $pr && giohang.id_taikhoan = $us && size = '$si'";
        echo $sqlCheckCart;
        $checkCart = executeResult($sqlCheckCart);
        if ($checkCart) {
            $quantily = $checkCart[0]['sl'] + 1;
            $sql = "UPDATE giohang SET sl = $quantily WHERE id_taikhoan = $us && id_sanpham = $pr";
            execute($sql);
        } else {
            $sql = "INSERT INTO `giohang` (`id_taikhoan`, `id_sanpham`, `size`, `sl`) VALUES ($us, $pr, '$si', 1)";
            execute($sql);
        }
        header('Location: ../../public/?page=cart');
    } else {
        header('Location: ../../public/?page=login');
        // echo 'k';
    }
}