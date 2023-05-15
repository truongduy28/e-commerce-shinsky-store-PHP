<?php
// var global container
$id = getGET('id');
$del = getGET('del');

// var get from FORM UPDATE data
$categoryName = getPOST('ten-danh-muc');
if (isset($_FILES['hinh-anh-danh-muc'])) {
    $imageTemp = $_FILES['hinh-anh-danh-muc']['name'];
    $imageUpload = changeNameFile($imageTemp);
    $targetFiles = $targetDir . $imageUpload;
}

// Interactive between data backend <=> frontend   
if (isset($_FILES['hinh-anh-danh-muc'])) {
    move_uploaded_file($_FILES["hinh-anh-danh-muc"]["tmp_name"], $targetFiles);
}
if ($categoryName) {
    if ($id) {
        $sql = "UPDATE danhmuc SET tendanhmuc = '$categoryName' ";
        if (isset($_FILES['hinh-anh-danh-muc']) && $_FILES['hinh-anh-danh-muc']['name'] != '') {
            $sql .= ", anhdanhmuc =  '$imageUpload'";
        }
        $sql .= " WHERE id_danhmuc = '$id'";
    } else {
        $sql = "INSERT INTO `danhmuc` ( `tendanhmuc`, `anhdanhmuc`, `show_danhmuc`) VALUES ('$categoryName', ";
        if (isset($_FILES['hinh-anh-danh-muc']) && $_FILES['hinh-anh-danh-muc']['name'] != '') {
            $sql .= " '$imageUpload'";
        } else {
            $sql .= "'logo_main.png'";
        }
        $sql  .= " , 1)";
    }

    echo $sql;
    execute($sql);
    header("Refresh:0");
}

// get full data form sql
$sqlGetFullData = "SELECT * FROM danhmuc WHERE show_danhmuc = 1";
// echo $sqlGetFullData;
$listFullData = executeResult($sqlGetFullData);

// get categoryName by id
$sqlCategoryByID = "SELECT * FROM danhmuc WHERE id_danhmuc = '$id'";
$categoryById = executeResult($sqlCategoryByID);
if ($categoryById) $item = $categoryById[0];

// delete category and product of category hidden
if ($del) {
    XoaDanhMuc($del);
}
function XoaDanhMuc($del)
{
    $sqlHiddenCategoryByID = "UPDATE danhmuc SET show_danhmuc = 0 WHERE id_danhmuc = '$del'";
    // $sqlHiddenProductsOfCategoryByID = "UPDATE sanpham SET show_sanpham = 0 WHERE id_sanpham = '$del'";
    execute($sqlHiddenCategoryByID);
    // execute($sqlHiddenProductsOfCategoryByID);
    header("Location: ?page=category");
}
?>

<div class="category-container row">
    <link rel="stylesheet" href="./access/css/category.css">
    <div class="category_left col-sm-8">
        <h5>Danh sách</h5>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" width='50px'>STT</th>
                    <th scope="col">Tên danh mục</th>
                    <th scope="col" style="max-width: 100px">Hình ảnh</th>
                    <th scope="col" width="50px"></th>
                    <th scope="col" width="50px"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($listFullData) {
                    $index = 0;
                    foreach ($listFullData as $data) {
                        echo '<tr>
                                <td>' . $index++ . '</td>
                                <td>' . $data['tendanhmuc'] . '</td>
                                <td><img src="' . $targetDir . $data['anhdanhmuc'] . '" alt="" srcset=""></td>
                                <td><a class="btn btn-warning" href="?page=category&id=' . $data['id_danhmuc'] . '">Sửa</a></td>
                                <td><a class="btn btn-danger" href="#" onclick="deleteRow(' . $data['id_danhmuc'] . ')">Xóa</a></td>
                            </tr>';
                    }
                } else {
                    echo 's';
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="category_right col-sm-4">
        <form method="post" enctype="multipart/form-data">
            <h5>Cập nhật</h5>
            <div class=" form-group">
                <label for="">Tên danh mục</label>
                <input type="text" class="form-control" name="ten-danh-muc"
                    value="<?php if ($categoryById) echo $item['tendanhmuc'] ?>">
            </div>
            <div class="form-group">
                <label for="">Hình ảnh</label>
                <input type="file" name="hinh-anh-danh-muc">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block">CẬP NHẬT</button>
            </div>
        </form>
    </div>
</div>

<script>
const deleteRow = (id) => {
    const comfirmer = confirm(
        'Xóa danh mục này đồng nghĩa với việc các sản phẩm trong danh mục cũng sẽ mất toàn bộ!');
    if (comfirmer) {
        return window.location.href = `?page=category&del=${id}`;
    } else {
        return false;
    }

}
</script>