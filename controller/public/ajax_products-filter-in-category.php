<?php
require_once '../../database/dbFunc.php';
$targetDir = '../source/';


// get var components
$selFilterPrice = getGET('selFilterPrice');
$id = getGET('idCategory');
// get product of category
$sqlGetFullProductFromCategoryAccessID = "SELECT * FROM sanpham, danhmuc WHERE sanpham.id_danhmuc = danhmuc.id_danhmuc &&danhmuc.id_danhmuc = $id && sanpham.show_sanpham = 1 && danhmuc.show_danhmuc = 1 ";
if ($selFilterPrice == 0) {
    $sqlGetFullProductFromCategoryAccessID .= " ORDER BY ngaytao DESC";
} elseif ($selFilterPrice == 1) {
    $sqlGetFullProductFromCategoryAccessID .= " ORDER BY giamoi ASC";
} elseif ($selFilterPrice == 2) {
    $sqlGetFullProductFromCategoryAccessID .= " ORDER BY giamoi DESC";
}
$listFullProductFromCategoryAccessID = executeResult($sqlGetFullProductFromCategoryAccessID);
$html = '';
if ($listFullProductFromCategoryAccessID) {
    foreach ($listFullProductFromCategoryAccessID as $data) {
        $html .= '
        <div class="product-category_item">
            <div class="product-category_image">
                <a href="?page=product&id=' . $data['id_sanpham'] . '">
                    <img src="' . $targetDir . $data['anhsanpham1'] . '" alt="">
                    <img src="' . $targetDir . $data['anhsanpham2'] . '" alt="">
                </a>
            </div>
            <div class="product-category_des">
                <h6><a href="?page=product&id=' . $data['id_sanpham'] . '">' . $data['tensanpham'] . '</a></h6>
                <div class="product-category_discount">
                ';
        if ($data['giacu']) {
            $html .= '
                    <p class="discount">' . number_format($data['giacu']) . 'đ</p>
                    ';
        }
        $html .= '
                    
                    <p>' . number_format($data['giamoi']) . 'đ</p>
                </div>
            </div>
        </div>
        ';
    }
}
echo   $html;