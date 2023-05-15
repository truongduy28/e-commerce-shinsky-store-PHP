<?php
require_once('../database/dbFunc.php');
$page = getGET('page');
$key = getGET('keywords');
if ($key) {
    header("Location: ?page=products&kw=$key");
}

$targetDir = '../source/';
$checkTokenAccount = validateToken();
// echo json_encode($checkTokenAccount);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../access/css/bootstrap.css">
    <link rel="stylesheet" href="../access/css/public.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../script/jquery.js"></script>

</head>

<body>
    <div class="container-full ">
        <section class="header-container">
            <?php
            include('./components/top-bar.php');
            include('./components/nav-bar.php')
            ?>
        </section>
        <div class="content">
            <?php
            if ($page == '' || $page == '/' || $page == 'home') {
                echo '
                <div class="carousel">';
                include('./components/carousel-index.php');
                echo  '</div>';
                echo ' <div class="highlight-product">';
                include('./components/product-highlight.php');
                echo '</div>';
            } elseif ($page == 'products') {
                echo '<div class="all-products">';
                include('./components/product-all.php');
                echo '</div>';
            } elseif ($page == 'category') {
                echo '<div class="category-products">';
                include('./components/product-category.php');
                echo '</div>';
            } elseif ($page == 'product') {
                echo '<div class="one-product">';
                include('./components/product.php');
                echo '</div>';
            } elseif ($page == 'register') {
                echo '<div class="sign-up">';
                include('./components/register.php');
                echo '</div>';
            } elseif ($page == 'login') {
                echo '<div class="sign-in">';
                include('./components/login.php');
                echo '</div>';
            } elseif ($page == 'cart') {
                echo '<div class="cart-products">';
                include('./components/cart.php');
                echo '</div>';
            } elseif ($page == 'purchase') {
                echo '<div class="purchase-products">';
                include('./components/purchase.php');
                echo '</div>';
            } elseif ($page == 'order') {
                echo '<div class="order-products">';
                include('./components/order.php');
                echo '</div>';
            } elseif ($page == 'evaluate') {
                echo '<div class="evaluate-products">';
                include('./components/evaluate.php');
                echo '</div>';
            } elseif ($page == 'account') {
                echo '<div class="account-products">';
                include('./components/account.php');
                echo '</div>';
            } elseif ($page == 'contact') {
                echo '<div class="contact-products">';
                include('./components/contact.php');
                echo '</div>';
            } elseif ($key == '' || $key != '') {
                echo '<div class="all-products">';
                include('./components/product-all.php');
                echo '</div>';
            } else {
            }
            ?>
            <div class="wallpaper">
                <?php
                include('./components/wallpaper-extra.php')
                ?>
            </div>
            <div class="discount-product">
                <?php
                include('./components/product-discount.php');
                ?>
            </div>
        </div>
        <section class="footer-container_full">
            <?php
            include('./components/footer.php');
            ?>
        </section>
    </div>

</body>

</html>