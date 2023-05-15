<?php
require_once '../../database/dbFunc.php';

// var global
$html = '';
$targetDir = '../source/';
$productsNumber = 12;

// get var components
$pagination = getGET('indexPagination');
$text = getGET('txtSearchTop');
$selFilterPrice = getGET('selFilterPrice');

// var limit from in SQL
$fromLimitOfSQL = ($pagination - 1) * $productsNumber;

// Get products 
$sqlGetFullProducts = 'SELECT * FROM sanpham, danhmuc WHERE danhmuc.id_danhmuc= sanpham.id_danhmuc && danhmuc.show_danhmuc = 1 && sanpham.show_sanpham = 1 ';
if ($text) $sqlGetFullProducts .= " && sanpham.tensanpham LIKE '%$text%' ";
// $sqlGetFullProducts .= "ORDER BY sanpham.ngaytao DESC LIMIT $fromLimitOfSQL, $productsNumber";

if ($selFilterPrice == 1) {
    $sqlGetFullProducts .= "ORDER BY sanpham.giamoi ASC ";
} elseif ($selFilterPrice == 2) {
    $sqlGetFullProducts .= "ORDER BY sanpham.giamoi DESC ";
} else {
    $sqlGetFullProducts .= "ORDER BY sanpham.ngaytao DESC
    ";
}
$sqlGetFullProducts .= " LIMIT $fromLimitOfSQL, $productsNumber";

$listFullProduct = executeResult($sqlGetFullProducts);

if ($listFullProduct) {
    foreach ($listFullProduct as $data) {
        $html .= ' 
        <div class="product-all_item">
            <div class="product-all_image">
                <a href="?page=product&id=' . $data['id_sanpham'] . '">
                    <img src="' . $targetDir . $data['anhsanpham1'] . '" alt="">
                    <img src="' . $targetDir . $data['anhsanpham2'] . '" alt="">
                </a>
            </div>
            <div class="product-all_des">
                <h6><a href="?page=product&id=' . $data['id_sanpham'] . '">' . $data['tensanpham'] . '</a></h6>
                <div class="product-all_discount">
                    ';
        if ($data['giacu']) {
            $html .= '<p class="discount">' . $data['giacu'] . 'đ   </p>';
        }
        $html .= '
                    <p>' . number_format($data['giamoi']) . 'đ</p>
                </div>
            </div>
        </div>';
    }
}
echo $html;