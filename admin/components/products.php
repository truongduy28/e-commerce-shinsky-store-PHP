<?php

// var global
$today = date("Y-m-d H:i:s");
$id = getGET('id'); // (1)
$del = getGET('del'); // ()

// delete products 
if ($del) {
    XoaSanPham($del);
}

function XoaSanPham($del)
{
    $sqlDeleteProductByID = "UPDATE sanpham SET show_sanpham = 0 WHERE id_sanpham = '$del'";
    execute($sqlDeleteProductByID);
    echo $sqlDeleteProductByID;
    header("Location: ?page=products");
}

// get category -> show to form update
$sqlGetFullCategory = "SELECT * FROM danhmuc WHERE show_danhmuc = 1";
$listFullCategory = executeResult($sqlGetFullCategory);

// update - insert product to sql data -> get value from form update

// get full size -> show to form update


// get var update/insert from form -> to backend
$productCategory = getPOST('danh-muc-san-pham');
$productName = getPOST('ten-san-pham');
$discount = getPOST('gia-cu');
$price = getPOST('gia-moi');
$size1 = getPOST('size-1');
$size2 = getPOST('size-2');
$size3 = getPOST('size-3');
$size4 = getPOST('size-4');
$size5 = getPOST('size-5');
$size6 = getPOST('size-6');
$productDetails = getPOST('chi-tiet-san-pham');
if (isset($_FILES['anh-1']) && $_FILES['anh-1']['name'] != '') {
    $imageTemp = $_FILES['anh-1']['name'];
    $imageUpload1 = changeNameFile($imageTemp);
    $targetFiles1 = $targetDir . $imageUpload1;
}
if (isset($_FILES['anh-2']) && $_FILES['anh-2']['name'] != '') {
    $imageTemp = $_FILES['anh-2']['name'];
    $imageUpload2 = changeNameFile($imageTemp);
    $targetFiles2 = $targetDir . $imageUpload2;
}
if (isset($_FILES['anh-3']) && $_FILES['anh-3']['name'] != '') {
    $imageTemp = $_FILES['anh-3']['name'];
    $imageUpload3 = changeNameFile($imageTemp);
    $targetFiles3 = $targetDir . $imageUpload3;
}
if (isset($_FILES['anh-sizechart'])) {
    $imageTemp = $_FILES['anh-sizechart']['name'];
    $imageSizeChart = changeNameFile($imageTemp);
    $targetFilesSizeChart = $targetDir . $imageSizeChart;
}

if ($productName != '' && $price != '') {
    if ($id) {
        $sql = "UPDATE sanpham SET id_danhmuc = $productCategory, giacu = '$discount', giamoi = '$price', tensanpham = '$productName', size_1 = '$size1',  size_2 = '$size2',  size_3 = '$size3',  size_4 = '$size4',  size_5 = '$size5',  size_6 = '$size6', chitietsanpham = '$productDetails'  ";
        if (isset($_FILES['anh-1']) && $_FILES['anh-1']['name'] != '') {
            $sql .= ", anhsanpham1 = '$imageUpload1'";
        }
        if (isset($_FILES['anh-2']) && $_FILES['anh-2']['name'] != '') {
            $sql .= ", anhsanpham2 = '$imageUpload2'";
        }
        if (isset($_FILES['anh-3']) && $_FILES['anh-3']['name'] != '') {
            $sql .= ", anhsanpham3 = '$imageUpload3'";
        }
        if (isset($_FILES['anh-sizechart']) && $_FILES['anh-sizechart']['name'] != '') {
            $sql .= ", anhsizechart = '$imageSizeChart'";
        }
        $sql .= "WHERE sanpham.id_sanpham = $id";
    } else {
        $sql = "INSERT INTO `sanpham` ( `id_danhmuc`, `id_nguoitao`, `tensanpham`, `giacu`, `giamoi`, `anhsanpham1`,`anhsanpham2`, `anhsanpham3`,`anhsizechart`, `size_1`, `size_2`, `size_3`, `size_4`, `size_5`, `size_6`, `chitietsanpham`, `ngaytao`, `show_sanpham`) VALUES ( $productCategory, 1, '$productName', '$discount', '$price',";
        if (isset($_FILES['anh-1']) && $_FILES['anh-1']['name'] != '') {
            $sql .= " '$imageUpload1', ";
        } else {
            $sql .= "'logo_main.png', ";
        }
        if (isset($_FILES['anh-2']) && $_FILES['anh-2']['name'] != '') {
            $sql .= "'$imageUpload2', ";
        } else {
            $sql .= "'logo_main.png', ";
        }
        if (isset($_FILES['anh-3']) && $_FILES['anh-3']['name'] != '') {
            $sql .= "'$imageUpload3', ";
        } else {
            $sql .= "'logo_main.png', ";
        }
        if (isset($_FILES['anh-sizechart']) && $_FILES['anh-sizechart']['name'] != '') {
            $sql .= " '$imageSizeChart',";
        } else {
            $sql .= "'logo_main.png', ";
        }
        $sql .= " '$size1', '$size2', '$size3', '$size4', '$size5', '$size6', '$productDetails', '$today', 1)
    ";
    }
    execute($sql);

    if (isset($_FILES['anh-1']) && $_FILES['anh-1']['name'] != '') {
        move_uploaded_file($_FILES["anh-1"]["tmp_name"], $targetFiles1);
    }
    if (isset($_FILES['anh-2']) && $_FILES['anh-2']['name'] != '') {
        move_uploaded_file($_FILES["anh-2"]["tmp_name"], $targetFiles2);
    }
    if (isset($_FILES['anh-3']) && $_FILES['anh-3']['name'] != '') {
        move_uploaded_file($_FILES["anh-3"]["tmp_name"], $targetFiles3);
    }
    if (isset($_FILES['anh-sizechart']) && $_FILES['anh-sizechart']['name'] != '') {
        move_uploaded_file($_FILES["anh-sizechart"]["tmp_name"], $targetFilesSizeChart);
    }
    // echo $sql;
    header('Refresh:0');
}

// get full product BE -> to Table FE
$sqlGetFullProducts = "SELECT * FROM sanpham, danhmuc WHERE danhmuc.id_danhmuc = sanpham.id_danhmuc && danhmuc.show_danhmuc = 1 && sanpham.show_sanpham = 1";
$listFullProducts = executeResult($sqlGetFullProducts);

// get product sql to FE form
if ($id) {
    $sqlGetProduct = "SELECT * FROM sanpham WHERE id_sanpham =$id";
    $productTemp =  executeResult($sqlGetProduct);
    if ($productTemp) {
        $product = $productTemp[0];
    }
}

?>


<div class="products-container row">
    <link rel="stylesheet" href="./access/css/">
    <script src="../ckeditor/ckeditor.js"></script>
    <div class="products-left col-sm-8">
        <h2>Danh sách sản phẩm</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Sản phẩm</th>
                    <th>Danh mục</th>
                    <th width="100px"> Ảnh 1</th>
                    <th width="100px">Ảnh 2</th>
                    <th width="100px">Ảnh 3</th>
                    <th width="100px">Sizechart</th>
                    <th>Giá</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($listFullProducts) {
                    $index = 0;
                    foreach ($listFullProducts as $data) {
                        echo '<tr>
                                <th>' . $index++ . '</th>
                                <td>' . $data['tensanpham'] . '</td>
                                <td>' . $data['tendanhmuc'] . '</td>
                                <td><img src="' . $targetDir . $data['anhsanpham1'] . '" alt=""></td>
                                <td><img src="' . $targetDir . $data['anhsanpham2'] . '" alt=""></td>
                                <td><img src="' . $targetDir . $data['anhsanpham3'] . '" alt=""></td>
                                <td><img src="' . $targetDir . $data['anhsizechart'] . '" alt=""></td>
                                <td>' . $data['giamoi'] . '</td>
                                <td><a class="btn btn-primary "href="?page=products&id=' . $data['id_sanpham'] . '">Sửa</a></td>
                                <td><a class="btn btn-danger" href="#" onclick="deleteRow(' . $data['id_sanpham'] . ')">Xóa</a></td>
                            </tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="products-right col-sm-4">
        <h2>Cập nhật sản phẩm</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Danh mục sản phẩm</label>
                <select id="" class="form-control" name="danh-muc-san-pham">
                    <?php
                    if ($listFullCategory) {
                        foreach ($listFullCategory as $data) {
                            if ($data['id_sanpham'] == $id) {
                                echo '<option selected value="' . $data['id_danhmuc'] . '">' . $data['tendanhmuc'] . '</option>';
                            } else {
                                echo '<option value="' . $data['id_danhmuc'] . '">' . $data['tendanhmuc'] . '</option>';
                            }
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" class="form-control" id="" name="ten-san-pham"
                    value="<?php if ($id) echo $product['tensanpham'] ?>">
                <hr>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Giá cũ</label>
                    <input type="number" class="form-control" min="0" name="gia-cu"
                        value="<?php if ($productTemp) echo $product['giacu'] ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Giá mới</label>
                    <input type="number" class="form-control" min="0" name="gia-moi"
                        value="<?php if ($productTemp) echo $product['giamoi'] ?>">
                </div>
                <hr>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Ảnh 1</label>
                    <input type="file" class="form-control" name="anh-1">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Ảnh 2</label>
                    <input type="file" class="form-control" name="anh-2">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Ảnh 3</label>
                    <input type="file" class="form-control" name="anh-3">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Ảnh sizechart</label>
                    <input type="file" class="form-control" name="anh-sizechart">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="">Size 1</label>
                    <input type="text" class="form-control" name="size-1"
                        value="<?php if ($id) echo $product['size_1'] ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="">Size 2</label>
                    <input type="text" class="form-control" name="size-2"
                        value="<?php if ($id) echo $product['size_2'] ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="">Size 3</label>
                    <input type="text" class="form-control" name="size-3"
                        value="<?php if ($id) echo $product['size_3'] ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="">Size 4</label>
                    <input type="text" class="form-control" name="size-4"
                        value="<?php if ($id) echo $product['size_4'] ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="">Size 5</label>
                    <input type="text" class="form-control" name="size-5"
                        value="<?php if ($id) echo $product['size_5'] ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="">Size 6</label>
                    <input type="text" class="form-control" name="size-6"
                        value="<?php if ($id) echo $product['size_6'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="">Chi tiết sản phẩm</label>
                <textarea class="ckeditor" name="chi-tiet-san-pham" id="ckeditor" cols="30" rows="10"
                    name="chi-tiet-san-pham"><?php if ($id) echo $product['chitietsanpham'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">CẬP NHẬT SẢN PHẨM</button>
        </form>
    </div>
</div>

<script>
const deleteRow = (id) => {
    const comfirmer = confirm(
        'Xóa danh mục này đồng nghĩa với việc các sản phẩm trong danh mục cũng sẽ mất toàn bộ!');
    if (comfirmer) {
        return window.location.href = `?page=products&del=${id}`;
    } else {
        return false;
    }
}
</script>