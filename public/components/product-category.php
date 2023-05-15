<?php
// var golobal cate
$targetDir = '../source/';

// get id category
$id = getGET('id');

// get category > id  -> from data sql 
$sqlGetFullProductFromCategory = "SELECT * FROM danhmuc WHERE id_danhmuc = $id && show_danhmuc = 1 ";
$listFullProductFromCategory = executeResult($sqlGetFullProductFromCategory);
if (!$listFullProductFromCategory) {
    header('Location: ?page=error');
}
// get product of category
$sqlGetFullProductFromCategoryAccessID = "SELECT * FROM sanpham, danhmuc WHERE danhmuc.id_danhmuc = sanpham.id_danhmuc && sanpham.id_danhmuc = $id && sanpham.show_sanpham = 1 && danhmuc.show_danhmuc = 1";
$listFullProductFromCategoryAccessID = executeResult($sqlGetFullProductFromCategoryAccessID);

?>

<input type="hidden" name="" id="id-category" value="<?= $id ?>">
<div class="product-category-container">
    <link rel="stylesheet" href="../access/css/product-category.css">
    <div class="product-category_banner">
        <img src="<?= $targetDir . $listFullProductFromCategory[0]['anhdanhmuc'] ?>" alt="">
        <div class="product-category_title">
            <h2><?= $listFullProductFromCategory[0]['tendanhmuc'] ?></h2>
        </div>
    </div>
    <div class="product-category_filter">
        <hr>
        <h4>
            <?= $listFullProductFromCategory[0]['tendanhmuc'] ?>
        </h4>
        <hr>
        <form action="">
            <select class="custom-select mr-sm-2" id="filter-price">
                <option selected value="0">Sắp xếp giá</option>
                <option value="1">Từ thấp đến cao</option>
                <option value="2">Từ cao đến thấp</option>
            </select>
        </form>
        <hr>
    </div>
    <div class="products-category_flex">
        <?php
        if ($listFullProductFromCategoryAccessID) {
            foreach ($listFullProductFromCategoryAccessID as $data) {
                echo '
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
                    echo '
                            <p class="discount">' . number_format($data['giacu']) . 'đ</p>
                            ';
                }
                echo '
                            
                            <p>' . number_format($data['giamoi']) . 'đ</p>
                        </div>
                    </div>
                </div>
                ';
            }
        }
        ?>
    </div>

    <script>
    $(document).ready(function() {
        $('#filter-price').change(function() {
            console.log($('#filter-price').val());
            $.get({
                url: '../controller/public/ajax_products-filter-in-category.php',
                data: {
                    selFilterPrice: $('#filter-price').val(),
                    idCategory: $('#id-category').val()
                },
                beforeSend: function() {
                    const loader = `<div class="d-flex justify-content-center">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    </div>`;
                    $('center').append(loader);
                },
                success: function(data) {
                    $('.products-category_flex').html(data)
                }
            });
        })
    })
    </script>