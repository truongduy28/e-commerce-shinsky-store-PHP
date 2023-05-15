<?php
$id = getGET('id');
$sqlGetProductFromId = "SELECT * FROM sanpham, danhmuc WHERE danhmuc.id_danhmuc = sanpham.id_danhmuc && sanpham.id_sanpham = $id && danhmuc.show_danhmuc = 1 && sanpham.show_Sanpham = 1";
$productTemp = executeResult($sqlGetProductFromId);
if ($productTemp) {
    $product = $productTemp[0];
} else {
    header("Location: ?page=error");
}

// get evaluate
$sqlGetFullEvaluated  = "SELECT * FROM danhgia WHERE id_sanpham = '$id' && show_danhgia = 1 && chitietdanhgia !=  ''";
$listFullEvaluated =   executeResult($sqlGetFullEvaluated);

?>

<div class="product-container">
    <link rel="stylesheet" href="../access/css/product.css">
    <div class="product_links">
        <p>
            <a href="?page=">Trang chủ</a> /
            <a href="?page=category&&id=<?= $product['id_danhmuc'] ?>"><?= $product['tendanhmuc'] ?></a> /
            <a><?= $product['tensanpham'] ?></a>
        </p>
    </div>
    <hr>
    <div class="product-main">
        <div class="product-main_image  ">
            <div class="product-main_image__show">
                <img src="<?= $targetDir . $product['anhsanpham1'] ?>" alt="" id="fullImage">
            </div>
            <div class="product-main_image__mini">
                <div class="product-main_image__mini--item">
                    <img src="<?= $targetDir . $product['anhsanpham1'] ?>" alt=""
                        onclick="chooseImageGalleryProduct(this)">
                </div>
                <div class="product-main_image__mini--item">
                    <img src="<?= $targetDir . $product['anhsanpham2'] ?>" alt=""
                        onclick="chooseImageGalleryProduct(this)">
                </div>
                <div class="product-main_image__mini--item">
                    <img src="<?= $targetDir . $product['anhsanpham3'] ?>" alt=""
                        onclick="chooseImageGalleryProduct(this)">
                </div>
            </div>
            <script>
            const chooseImageGalleryProduct = (tagImgShowImage) => {
                const fullImage = document.querySelector('#fullImage');
                fullImage.src = tagImgShowImage.src;
            }
            </script>
        </div>
        <div class="product-main_desctription">
            <form action="../controller/public/add-cart.php" method="get">
                <h1><?= $product['tensanpham'] ?></h1>
                <div class="product-main_desctription__price">
                    <?php
                    if ($product['giacu']) {
                        echo '<p class="discount">' . number_format($product['giacu']) . 'đ</p>';
                    }
                    ?>
                    <p><?= number_format($product['giamoi']) ?>đ</p>
                </div>
                <div class="product-main_desctription__size">
                    <?php
                    if ($product['size_1']) {
                        echo ' 
                    <div class="            product-main_desctription__size-control">
                      
                        <input type="radio" onclick="activeProductSize(this)" name="size" id="size_1" value="' . $product['size_1'] . '">
                        <label onclick="activeProductSizes(this)" for="size_1">' . $product['size_1'] . '</label>
                    </div>';
                    }
                    if ($product['size_2']) {
                        echo ' 
                    <div class="            product-main_desctription__size-control">
                        
                        <input type="radio" onclick="activeProductSize(this)" name="size" id="size_2" value="' . $product['size_2'] . '">
                        <label onclick="activeProductSizes(this)" for="size_2">' . $product['size_2'] . '</label>
                    </div>';
                    }
                    if ($product['size_3']) {
                        echo ' 
                    <div class="            product-main_desctription__size-control">
                      
                        <input type="radio" onclick="activeProductSize(this)" name="size" id="size_3" value="' . $product['size_3'] . '">
                        <label onclick="activeProductSizes(this)" for="size_3">' . $product['size_3'] . '</label>
                    </div>';
                    }
                    if ($product['size_4']) {
                        echo ' 
                    <div class="            product-main_desctription__size-control">
                       
                        <input type="radio" onclick="activeProductSize(this)" name="size" id="size_4" value="' . $product['size_4'] . '">
                        <label onclick="activeProductSizes(this)" for="size_4">' . $product['size_4'] . '</label>
                    </div>';
                    }
                    if ($product['size_5']) {
                        echo ' 
                    <div class="            product-main_desctription__size-control">
                     
                        <input type="radio" onclick="activeProductSize(this)" name="size" id="size_5" value="' . $product['size_5'] . '">
                        <label onclick="activeProductSizes(this)" for="size_5">' . $product['size_5'] . '</label>
                    </div>';
                    }
                    if ($product['size_6']) {
                        echo ' 
                    <div class="            product-main_desctription__size-control">
                      
                        <input type="radio" onclick="activeProductSize(this)" name="size" id="size_6" value="' . $product['size_6'] . '">
                        <label onclick="activeProductSizes(this)" for="size_6">' . $product['size_6'] . '</label>
                    </div>';
                    }
                    ?>
                </div>
                <input type="text" hidden name="id-tai-khoan" value="<?= $checkTokenAccount['id_taikhoan'] ?>">
                <input type="text" hidden name="id-san-pham" value="<?= $id ?>">

                <div class="product-main_desctription__btn-booking">
                    <button class="btn-block">THÊM VÀO GIỎ HÀNG </button>
                </div>
                <div class="product-main_desctription__sizechart">
                    <div class="product-main_desctription__sizechart-title">
                        <hr>
                        <h5>SIZECHART</h5>
                        <hr>
                    </div>
                    <img src="<?= $targetDir . $product['anhsizechart'] ?>" alt="">
                </div>
            </form>

        </div>
    </div>
    <div class="product-description">
        <div class="product-description__title">
            <hr>
            <h4>CHI TIẾT SẢN PHẨM</h4>
            <hr>
        </div>
        <div class="product-description__note">
            <?= $product['chitietsanpham'] ?>
        </div>
    </div>
    <div class="product-rate">
        <div class="product-rate__title">
            <hr>
            <h4>FEEDBACK KHÁCH HÀNG</h4>
            <hr>
        </div>
        <div class="product-rate__description owl-carousel">
            <?php
            if ($listFullEvaluated) {
                foreach ($listFullEvaluated as $data) {
                    echo '
                    <section class=" product-rate__description-item " >
                        <img src="' . $targetDir . $data['chitietdanhgia'] . '" alt="">
                    </section>
                    ';
                }
            } else {
                echo 'Chưa có đánh giá nào cho sản phẩm này!';
            }
            ?>
        </div>
    </div>
</div>
<link rel="stylesheet" href="../script/dist/assets/owl.carousel.min.css">
<link rel="stylesheet" href="../script/dist/assets/owl.theme.default.min.css">
<script src="../script/dist/owl.carousel.min.js"></script>
<script>
// $('.owl-carousel').owlCarousel({
//     margin: 10,
//     loop: true,
//     autoWidth: true,
//     autoPlay: true,
// })
// $('.owl-carousel').owlCarousel({
//     loop: true,
//     margin: 10,
//     responsiveClass: true,
//     responsive: {
//         0: {
//             items: 1,
//             nav: true
//         },
//         600: {
//             items: 1,
//             nav: false
//         },
//         1000: {
//             items: 1,
//             nav: true,
//             loop: false
//         }
//     },
//     // autoplay: true,
//     autoplayTimeout: 1000,
//     autoPlay: true,
// })
var owl = $('.owl-carousel');
owl.owlCarousel({
    items: 1,
    loop: true,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 3000,
    // autoplayHoverPause: true
});

const activeProductSizes = (size) => {
    // size.classList.add('active_size');
}

console.log($('.product-main_desctription__size-control'));
</script>