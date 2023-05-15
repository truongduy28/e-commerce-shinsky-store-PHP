<?php
if (isset($_FILES['img-1']) && $_FILES['img-1']['name'] != '') {
    $imageTemp = $_FILES['img-1']['name'];
    $imageUpload1 = changeNameFile($imageTemp);
    $targetFiles1 = $targetDir . $imageUpload1;
}
if (isset($_FILES['img-2']) && $_FILES['img-2']['name'] != '') {
    $imageTemp = $_FILES['img-2']['name'];
    $imageUpload2 = changeNameFile($imageTemp);
    $targetFiles2 = $targetDir . $imageUpload2;
}
if (isset($_FILES['img-3']) && $_FILES['img-3']['name'] != '') {
    $imageTemp = $_FILES['img-3']['name'];
    $imageUpload3 = changeNameFile($imageTemp);
    $targetFiles3 = $targetDir . $imageUpload3;
}
if (isset($_FILES['img-4']) && $_FILES['img-4']['name'] != '') {
    $imageTemp = $_FILES['img-4']['name'];
    $imageUpload4 = changeNameFile($imageTemp);
    $targetFiles4 = $targetDir . $imageUpload4;
}
if (isset($_FILES['img-5']) && $_FILES['img-5']['name'] != '') {
    $imageTemp = $_FILES['img-5']['name'];
    $imageUpload5 = changeNameFile($imageTemp);
    $targetFiles5 = $targetDir . $imageUpload5;
}


if ($_FILES) {
    if ($_FILES['img-5']['name'] != '' || $_FILES['img-4']['name'] != '' || $_FILES['img-3']['name'] != '' || $_FILES['img-2']['name'] != '' || $_FILES['img-1']['name'] != '') {
        $sqlUpdateBanner = "UPDATE banner SET id_banner = 1 ";
        if (isset($_FILES['img-1']) && $_FILES['img-1']['name'] != '') {
            $sqlUpdateBanner .= ", hinhanhbanner1 = '$imageUpload1'";
        }
        if (isset($_FILES['img-2']) && $_FILES['img-2']['name'] != '') {
            $sqlUpdateBanner .= ", hinhanhbanner2 = '$imageUpload2'";
        }
        if (isset($_FILES['img-3']) && $_FILES['img-3']['name'] != '') {
            $sqlUpdateBanner .= ", hinhanhbanner3 = '$imageUpload3'";
        }
        if (isset($_FILES['img-4']) && $_FILES['img-4']['name'] != '') {
            $sqlUpdateBanner .= ", hinhanhbanner4 = '$imageUpload4'";
        }
        if (isset($_FILES['img-5']) && $_FILES['img-5']['name'] != '') {
            $sqlUpdateBanner .= ", hinhanhbanner5 = '$imageUpload5'";
        }
        $sqlUpdateBanner .= " WHERE id_banner = 1";
        execute($sqlUpdateBanner);
        echo $sqlUpdateBanner;
        header("Location: ?page=banner");
    }
}

if (isset($_FILES['img-1']) && $_FILES['img-1']['name'] != '') {
    move_uploaded_file($_FILES["img-1"]["tmp_name"], $targetFiles1);
}
if (isset($_FILES['img-2']) && $_FILES['img-2']['name'] != '') {
    move_uploaded_file($_FILES["img-2"]["tmp_name"], $targetFiles2);
}
if (isset($_FILES['img-3']) && $_FILES['img-3']['name'] != '') {
    move_uploaded_file($_FILES["img-3"]["tmp_name"], $targetFiles3);
}
if (isset($_FILES['img-4']) && $_FILES['img-4']['name'] != '') {
    move_uploaded_file($_FILES["img-4"]["tmp_name"], $targetFiles4);
}
if (isset($_FILES['img-5']) && $_FILES['img-5']['name'] != '') {
    move_uploaded_file($_FILES["img-5"]["tmp_name"], $targetFiles5);
}
?>

<div class="banner-container d-flex justify-content-center align-content-center">
    <form method="post" class="border rounded px-3 py-3 my-5" enctype="multipart/form-data">
        <h3>BANNER CHO TRANG WEB</h3>
        <div class="form-group">
            <label for="">Hình 1</label>
            <input type="file" name="img-1">
        </div>
        <div class="form-group">
            <label for="">Hình 2</label>
            <input type="file" name="img-2">
        </div>
        <div class="form-group">
            <label for="">Hình 3</label>
            <input type="file" name="img-3">
        </div>
        <div class="form-group">
            <label for="">Hình 4</label>
            <input type="file" name="img-4">
        </div>
        <div class="form-group">
            <label for="">Hình 5</label>
            <input type="file" name="img-5">
        </div>
        <button class="btn btn-primary btn-block">Cập nhật</button>
    </form>
</div>