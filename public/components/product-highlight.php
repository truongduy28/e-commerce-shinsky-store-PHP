<?php
$sqlGetProductsHighlight = 'SELECT * FROM sanpham WHERE show_sanpham = 1 ORDER BY RAND() LIMIT 6';
$listProductsHighlight = executeResult($sqlGetProductsHighlight);
?>

<div class="product-highlight-container">
    <link rel="stylesheet" href="../access/css/product-highlight.css">
    <div class="product-highlight_title">
        <hr>
        <h3>SẢN PHẨM NỔI BẬT</h3>
        <hr>
    </div>
    <div class="products-highlight_flex">
        <?php
        if ($listProductsHighlight) {
            foreach ($listProductsHighlight as $data) {
                echo ' 
                <div class="product-highlight_item">
                    <div class="product-highlight_image">
                        <a href="?page=product&id=' . $data['id_sanpham'] . '">
                            <img src="' . $targetDir . $data['anhsanpham1'] . '" alt="">
                            <img src="' . $targetDir . $data['anhsanpham2'] . '" alt="">
                        </a>
                    </div>
                    <div class="product-highlight_des">
                        <h6><a href="?page=product&id=' . $data['id_sanpham'] . '">' . $data['tensanpham'] . '</a></h6>
                        <p>' . number_format($data['giamoi']) . 'đ</p>
                    </div>
                 </div>';
            }
        }
        ?>
    </div>
    <div class="product-highlight_all">
        <a href="">Xem nhiều hơn các sản phẩm...</a>
    </div>
</div>