<?php
$sqlGetProductsDiscount = "SELECT * FROM sanpham WHERE show_sanpham = 1 && giacu != '' ORDER BY RAND() LIMIT 6";
$listProductsDistcont = executeResult($sqlGetProductsDiscount);
?>

<div class="product-highlight-container">
    <link rel="stylesheet" href="../access/css/product-highlight.css">
    <div class="product-highlight_title">
        <hr>
        <h3>GIẢM GIÁ SHOCK</h3>
        <hr>
    </div>
    <div class="products-highlight_flex">
        <?php
        if ($listProductsDistcont) {
            foreach ($listProductsDistcont as $data) {
                echo '
                <div class="product-highlight_item">
                    <div class="product-highlight_image">
                        <a href="?page=product&id=' . $data['id_sanpham'] . '"">
                            <img src="' . $targetDir . $data['anhsanpham1'] . '" alt="">
                            <img src="' . $targetDir . $data['anhsanpham2'] . '" alt="">
                        </a>
                    </div>
                    <div class="product-highlight_des">
                        <h6><a href="?page=product&id=' . $data['id_sanpham'] . '"">' . $data['tensanpham'] . '</a></h6>
                        <div class="product-highlight_discount">
                            <p class="discount">' . number_format($data['giacu']) . 'đ</p>
                            <p>' . number_format($data['giamoi']) . 'đ</p>
                        </div>
                    </div>
                </div>
                ';
            }
        }
        ?>
    </div>
    <div class="product-highlight_all">
        <a href="">Xem nhiều hơn các sản phẩm...</a>
    </div>
</div>