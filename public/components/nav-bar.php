<?php
// var global 
$numberCountProductsInCart = 0;

// get category
$sqlGetFullCategory = 'SELECT * FROM danhmuc WHERE show_danhmuc = 1';
$listFullCategory = executeResult($sqlGetFullCategory);

// get number count products in cart
if ($checkTokenAccount) {
    $actor = $checkTokenAccount['id_taikhoan'];
    $sqlGetCountProductsInCart = 'SELECT * FROM giohang, sanpham WHERE giohang.id_sanpham = sanpham.id_sanpham && sanpham.show_sanpham = 1 && giohang.id_taikhoan = ' . $actor;
    $listNumberCountProductsInCart = executeResult($sqlGetCountProductsInCart);
    if ($listNumberCountProductsInCart) {
        foreach ($listNumberCountProductsInCart as $num) {
            $numberCountProductsInCart++;
        }
    }
}
?>

<div class="nav-bar-container">
    <link rel="stylesheet" href="../access/css/nav-bar.css">
    <script src="../script/layout/sticky-nav.js"></script>
    <div class="nav-bar_top">
        <div class="nav-bar_top-logo">
            <img src="../access/image/logo_main.png" alt="">
        </div>
        <div class="nav-bar_top-search">
            <form action="">
                <button><i class="fas fa-search"></i></button>

                <input type="text" name="keywords" value="<?php if (getGET('kw')) echo getGET('kw') ?>" id="search-top"
                    placeholder="Tìm kiếm">
            </form>
        </div>
        <div class="nav-bar_top-right">
            <ul>

                <?php
                if ($checkTokenAccount) {
                    if ($checkTokenAccount['lv'] == 2) {
                        echo '
                    <li class="mobile-hidden">
                        <a href="../admin">
                            QUẢN TRỊ 
                            <i class="fa-solid fa-users-gear"></i>
                        </a>
                    </li>
                    ';
                    } else {
                        echo '  
                    <li class="mobile-hidden">
                        <a href="?page=cart">
                            GIỎ HÀNG
                            <span>
                               ' . $numberCountProductsInCart . ' </span>
                               </a>
                </li>';
                    }
                }

                ?>

                <?php
                if ($checkTokenAccount) {
                    echo '
                     <li class="mobile-hidden">                        
                        <button>' . $checkTokenAccount['tentaikhoan'] . '</button>
                        <ul>';
                    if ($checkTokenAccount['lv'] == 1) {
                        echo '<li class="mobile-hidden">
                                <a href="?page=purchase">Đơn hàng của tôi</a>
                            </li>';
                    }
                    echo ' 
                             <li class="mobile-hidden">
                                <a href="?page=account">Thông tin tài khoản</a>
                            </li>
                           <li class="mobile-hidden">
                                <a href="../controller/public/logout.php">Đăng xuất</a>
                            </li>
                        </ul>
                    </li>';
                } else {
                    echo '
            <li class="mobile-hidden">
                <a href="?page=register">ĐĂNG KÝ</a>
            </li>
            <li class="mobile-hidden">
                <a href="?page=login">ĐĂNG NHẬP</a>
            </li>';
                }
                ?>
                <li class="pc-hidden" id="icon-nav-bar"><i class="fa-solid fa-bars"></i></li>
            </ul>
        </div>
    </div>
    <div class="nav-bar_bottom">
        <ul>
            <li>
                <a href="?page=">TRANG CHỦ</a>
            </li>
            <li>
                <button>DANH MỤC</button>
                <ul>
                    <?php
                    if ($listFullCategory) {
                        foreach ($listFullCategory as $data) {
                            echo '<li>
                            <a href="?page=category&id=' . $data['id_danhmuc'] . '">' . $data['tendanhmuc'] . '</a>
                        </li>';
                        }
                    }
                    ?>
                </ul>

            </li>
            <li>
                <a href="?page=products">SẢN PHẨM</a>
            </li>
            <li>
                <a href="?page=purchase">ĐƠN HÀNG CỦA TÔI</a>
            </li>
            <li>
                <a href="?page=contact">LIÊN HỆ</a>
            </li>
        </ul>
        <div class="pc-hidden">
            <hr>
            <ul>
                <?php
                if ($checkTokenAccount) {
                    if ($checkTokenAccount['lv'] == 2) {
                        echo '
                    <li class="">
                        <a href="../admin">
                            QUẢN TRỊ 
                            <i class="fa-solid fa-users-gear"></i>
                        </a>
                    </li>
                    ';
                    } else {
                        echo '  
                    <li class="">
                        <a href="?page=cart">
                            Giỏ hàng
                            <span>
                               ' . $numberCountProductsInCart . ' </span>
                               </a>
                </li>';
                    }
                }


                if ($checkTokenAccount) {
                    echo '
                     <li class="">                        
                        <button>Xin chào: ' . $checkTokenAccount['tentaikhoan'] . '</button>
                  ';

                    echo ' 
                             <li class="">
                                <a href="?page=account">Thông tin tài khoản</a>
                            </li>
                           <li class="">
                                <a href="../controller/public/logout.php">Đăng xuất</a>
                            </li>
                    
                    </li>';
                } else {
                    echo '
            <li class="">
                <a href="?page=register">ĐĂNG KÝ</a>
            </li>
            <li class="">
                <a href="?page=login">ĐĂNG NHẬP</a>
            </li>';
                }
                ?>
            </ul>
        </div>
    </div>
</div>
<script>
const iconNavBar = $('#icon-nav-bar');
iconNavBar.on('click', function() {
    $('.nav-bar_bottom').toggleClass("show_nav-menu");
})
</script>