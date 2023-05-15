<?php
$sqlGetBanner = 'SELECT * FROM banner WHERE id_banner = 1';
$listBanner = executeResult($sqlGetBanner);
if ($listBanner) {
    $banner = $listBanner[0];
}


?>

<div class="carousel-index-container">
    <link rel="stylesheet" href="../access/css/carousel-index.css">
    <script src="../script/layout/carousel-index.js"></script>
    <div class="container">
        <div class="carousel">
            <div class="slider">
                <section><img src="<?= $targetDir . $banner['hinhanhbanner1'] ?>" alt=""></section>
                <section><img src="<?= $targetDir . $banner['hinhanhbanner2'] ?>" alt=""></section>
                <section><img src="<?= $targetDir . $banner['hinhanhbanner3'] ?>" alt=""></section>
                <section><img src="<?= $targetDir . $banner['hinhanhbanner4'] ?>" alt=""></section>
                <section><img src="<?= $targetDir . $banner['hinhanhbanner5'] ?>" alt=""></section>
            </div>
            <div class="controls">
                <button class="next"><i class="fas fa-chevron-right"></i></button>
                <button class="prev"><i class="fas fa-chevron-left"></i></button>
            </div>
        </div>
    </div>
</div>