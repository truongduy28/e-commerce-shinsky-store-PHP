<?php
// var global
if ($checkTokenAccount) {
    $us = $checkTokenAccount['id_taikhoan'];
}

// var conponents
$pr = getGET('pr');
$ev = getGET('ev');
// $des = $_FILES('noi-dung-danh-gia');
if (isset($_FILES['noi-dung-danh-gia'])) {
    $imageTemp = $_FILES['noi-dung-danh-gia']['name'];
    $imageUpload = changeNameFile($imageTemp);
    $targetFiles = $targetDir . $imageUpload;
}
$today = date('Y-m-d H:i:s');

// show product
$sqlGetProductEvaluate = "SELECT * FROM chitietdonhang, sanpham, danhgia, donhang WHERE donhang.id_donhang = danhgia.id_donhang && danhgia.id_donhang = chitietdonhang.id_donhang && danhgia.size = chitietdonhang.size && danhgia.id_sanpham = sanpham.id_sanpham && sanpham.id_sanpham = chitietdonhang.id_sanpham && danhgia.id_danhgia = '$ev'";
$productEvaluate = executeResult($sqlGetProductEvaluate);
if ($productEvaluate) {
    $data = $productEvaluate[0];
    $od = $data['id_donhang'];
} else {
    header('Location: ?page=error');
}

// submit evaluated
if ($_FILES['noi-dung-danh-gia']['name'] != '') {
    $sqlCreateEvaluate = "UPDATE danhgia SET chitietdanhgia = '$imageUpload' WHERE id_danhgia = $ev && id_taikhoan = $us && id_donhang = '$od'";
    execute($sqlCreateEvaluate);
    header("Location: ?page=order&id=$od");
}
if (isset($_FILES['noi-dung-danh-gia'])) {
    move_uploaded_file($_FILES["noi-dung-danh-gia"]["tmp_name"], $targetFiles);
}

// props value evaluate
$sqlGetEvaluate = "SELECT * FROM danhgia where id_danhgia  = '$ev'";
$evaluated = executeResult($sqlGetEvaluate);
?>


<div class="evaluate-container">
    <link rel="stylesheet" href="../access/css/evaluate.css">
    <div class="evaluate-product">
        <div class="evaluate-product_image">
            <img src="<?= $targetDir . $data['anhsanpham1'] ?>" alt="">
        </div>
        <div class="evaluate-product_title">
            <?= $data['tensanpham'] ?>
        </div>
        <div class="evaluate-product_properties">
            <p>SIZE <?= $data['size'] ?></p>
            <span>
                <?= number_format($data['giamoi']) ?>đ
            </span>
        </div>
    </div>
    <div class="evaluate-product_rate my-4">
        <div class="evaluate-product_rate-title">
            <hr>
            <h4>ĐÁNH GIÁ</h4>
            <hr>
        </div>
        <form action="" method="post" enctype="multipart/form-data" class="row text-center justify-content-center"
            style="gap: 10px">
            <input class="form-control col-md-10" type="file" name="noi-dung-danh-gia" id="">
            <button type="submit" class="btn btn-primary col-md-1 ">
                Gửi
            </button>
        </form>

    </div>
</div>
<?php
if (($_POST)) {
    if ($des == '') {
        $sqlCreateEvaluate = "UPDATE danhgia SET chitietdanhgia = '' WHERE id_danhgia = $ev && id_taikhoan = $us && id_donhang = '$od'";
        // echo $sqlCreateEvaluate;
        execute($sqlCreateEvaluate);
        header("Location: ?page=order&id=$od");
    }
}

?>