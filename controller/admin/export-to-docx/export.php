<?php
require_once '../../../database/dbFunc.php';

$id = getGET('id');
$ind = 1;


$sqlGetEvaluatedByID  = "SELECT * FROM donhang, taikhoan,trangthaidonhang WHERE trangthaidonhang.id_trangthaidonhang = donhang.id_trangthaidonhang && taikhoan.id_taikhoan = donhang.id_taikhoan && donhang.id_donhang = '$id'";
$listEvaluatedByID = executeResult($sqlGetEvaluatedByID);

// get products in billing
$sqlGetFullProductsInPurchase = "SELECT * FROM chitietdonhang, sanpham WHERE sanpham.id_sanpham = chitietdonhang.id_sanpham && chitietdonhang.id_donhang = '$id'";
$listFullProductsInPurchase = executeResult($sqlGetFullProductsInPurchase);

// Load library 
include_once 'export-to-docx.php';

// Initialize class 
$htd = new HTML_TO_DOC();

$htmlContent .= '';

if ($listEvaluatedByID) {
    $item = $listEvaluatedByID[0];
    $htmlContent .= '  
    <div class="evaluated-right_form">
            <h4 class="text-center">ĐƠN HÀNG</h4>
            <p>Mã đơn hàng: <span>' . $item['id_donhang'] . '</span></p>
<p>Tổng tiền đơn hàng: <span>' . number_format($item['tongtien']) . 'đ</span></p>
<p>Tài khoản đặt hàng: <a href="">' . $item['tentaikhoan'] . '</a></p>
<p>Người nhận hàng: ' . $item['tennguoinhan'] . '</p>
<p>Số điện thoại: ' . $item['sodienthoai'] . '</p>
<p>Địa chỉ: ' . $item['diachi'] . '</p>


<p>Ngày đặt đơn: <span>' . $item['ngaydathang'] . '</span></p>
<p>Trạng thái đơn hàng: <span>' . $item['tentrangthaidonhang'] . '</span>
';
    if ($item['id_trangthaidonhang'] == 1) {
        $htmlContent .= '<a class="btn btn-primary" href="../controller/admin/change-status-evaluated.php?id=' . $item['id_donhang'] . '&st=2">Giao đơn này</a> 
        <a class="btn btn-warning" href="../controller/admin/change-status-evaluated.php?id=' . $item['id_donhang'] . '&st=4">Hủy đơn</a> ';
    } else if ($item['id_trangthaidonhang'] == 2) {
        $htmlContent .= '<a class="btn btn-success" href="../controller/admin/change-status-evaluated.php?id=' . $item['id_donhang'] . '&st=3">Hoàn thành</a>
        <a class="btn btn-warning" href="../controller/admin/change-status-evaluated.php?id=' . $item['id_donhang'] . '&st=4">Hủy đơn</a> 
        ';
    }
    $htmlContent .= '
</p>

<table class="table table-striped">
    <thead>
        <tr>
            <th width="20px">STT</th>
            <th>Tên sản phẩm</th>
            <th width="100px">Hình ảnh</th>
            <th>Size</th>
            <th>Giá</th>
            <th></th>
        </tr>
    </thead>
<tbody>
';
    foreach ($listFullProductsInPurchase as $pr) {
        $htmlContent .= '
        <tr>
            <th >' . $ind++ . '</th>
            <td>' . $pr['tensanpham'] . '</td>
            <td><img src="' . $targetDir . $pr['anhsanpham1'] . '" alt=""> </td>
            <td>' . $pr['size'] . '</td>
            <td>' . number_format($pr['giamoi']) . 'đ</td>
        </tr>
        ';
    }
    $htmlContent .= '
    </tbody>
</table>  
</div>';
}
$htd->createDoc($htmlContent, "Don-hang-$id", 1);