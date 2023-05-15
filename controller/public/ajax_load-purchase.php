<?php
require_once('../../database/dbFunc.php');
$us = getPOST('us');
$st = getPOST('st');
$id = getPOST('id');
$html = '';

$sqlGetFullPurchase = "SELECT * FROM donhang, trangthaidonhang WHERE donhang.id_trangthaidonhang = trangthaidonhang.id_trangthaidonhang && donhang.id_taikhoan = $us  && donhang.id_donhang LIKE '%$id%' ";
if ($st != 'all') {
    $sqlGetFullPurchase .= " && donhang.id_trangthaidonhang = $st";
}
// echo $sqlGetFullPurchase;
$listFullPurchase = executeResult($sqlGetFullPurchase);
if ($listFullPurchase) {
    foreach ($listFullPurchase as $data) {
        $html .= '
        <div class="purchase-item">
            <div class="purchase-item_image">
                <img src="http://localhost/rent-code/quan-ao/access/image/logo_main.png" alt="">
            </div>
            <div class="purchase-item_details">
                <h5><a href="?page=order&id=' . $data['id_donhang'] . '">Mã đơn: ' . $data['id_donhang'] . '</a></h5>
                <p>Tổng tiền: ' . number_format($data['tongtien']) . 'đ</p>
                <p>Ngày đặt đơn: ' . $data['ngaydathang'] . '</p>
            </div>
            <div class="purchase-item_control">
                <p>Trạng thái: ' . $data['tentrangthaidonhang'] . '</p>
                <p>
                    <a href="" class="btn btn-primary">Xem đơn hàng</a>
                </p>
            </div>
        </div>
        ';
    }
} else {
    $html .= '<div class="text-center py-5">
    <p>Bạn chưa có đơn hàng nào. <a href="?page=products">Mua sắm ngay!</a></p>
</div>';
}
echo $html;