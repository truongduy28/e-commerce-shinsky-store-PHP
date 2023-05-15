<div class="header-container text-center bg-light py-2">
    <h3>QUẢN TRỊ
        <span class="pc-hidden" id="icon-nav-bar"><i class="fa-solid fa-bars"></i></span>
    </h3>
    <link rel="stylesheet" href="./access/css/header.css">

    <ul class="nav-bar_bottom">
        <li> <a href="../">VỀ TRANG CHỦ</a></li>
        <li> <a href="?page=banner">BANNER</a></li>
        <li> <a href="?page=category">DANH MỤC</a></li>
        <li><a href="?page=products">SẢN PHẨM</a></li>
        <li><a href="?page=evaluated">ĐƠN HÀNG</a></li>
        <li><a href="?page=statistic">THỐNG KÊ DOANH THU</a></li>
        <li><a href="?page=contact">LIÊN HỆ</a></li>
        <li><a href="?page=user">TÀI KHOẢN</a></li>
    </ul>
</div>
<script>
const iconNavBar = $('#icon-nav-bar');
iconNavBar.on('click', function() {
    $('.nav-bar_bottom').toggleClass("show_nav");
})
</script>