<?php
// get
$id = getGET('id');
$ind = 1;
$q = getGET('q');

// get full evaluated
$sqlGetFullEvaluated = "SELECT * FROM donhang, taikhoan,trangthaidonhang WHERE trangthaidonhang.id_trangthaidonhang = donhang.id_trangthaidonhang && taikhoan.id_taikhoan = donhang.id_taikhoan ";
if ($q) {
    $sqlGetFullEvaluated .= " && donhang.id_donhang = '$q'";
}
$sqlGetFullEvaluated .= " ORDER BY ngaydathang DESC";
// echo $sqlGetFullEvaluated;
$listFullEvaluated = executeResult($sqlGetFullEvaluated);

// get evaluated access id
$sqlGetEvaluatedByID  = "SELECT * FROM donhang, taikhoan,trangthaidonhang WHERE trangthaidonhang.id_trangthaidonhang = donhang.id_trangthaidonhang && taikhoan.id_taikhoan = donhang.id_taikhoan && donhang.id_donhang = '$id'";
$listEvaluatedByID = executeResult($sqlGetEvaluatedByID);

// get products in billing
$sqlGetFullProductsInPurchase = "SELECT * FROM chitietdonhang, sanpham WHERE sanpham.id_sanpham = chitietdonhang.id_sanpham && chitietdonhang.id_donhang = '$id'";
$listFullProductsInPurchase = executeResult($sqlGetFullProductsInPurchase);
?>

<div class="evaluated-container">
    <link rel="stylesheet" href="./access/css/evaluated.css">

    <div class="row">
        <div class="evaluated-left col-md-8">
            <div>
                <form method="get">
                    <input type="text" name="q">
                    <button>Tìm kiếm </button>
                </form>
            </div>
            <h4>Danh sách đơn hàng</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Đơn hàng</th>
                        <th scope="col">Khách</th>
                        <th scope="col">Tổng bill</th>
                        <th>Ngày đặt</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($listFullEvaluated) {
                        $index = 1;
                        foreach ($listFullEvaluated as $data) {
                            echo '
                            <tr>
                                <th >' . $index++ . '</th>
                                <td><a href="?page=evaluated&id=' . $data['id_donhang'] . '">' . $data['id_donhang'] . '</a></td>
                                <td><a href="?page=accounts&id=' . $data['id_taikhoan'] . '">' . $data['tentaikhoan'] . '</a></td>
                                <td>' . number_format($data['tongtien']) . 'đ</td>
                                <td>' . $data['ngaydathang'] . '</td>
                                <td>' . $data['tentrangthaidonhang'] . '</td>
                            </tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="evaluated-right col-md-4">
            <?php
            if ($listEvaluatedByID) {
                $item = $listEvaluatedByID[0];
                echo '  
                <div class="evaluated-right_form">
                        <h4 class="text-center">ĐƠN HÀNG</h4>
                        <p>Mã đơn hàng: <span>' . $item['id_donhang'] . '</span></p>
            <p>Tổng tiền đơn hàng: <span>' . number_format($item['tongtien']) . 'đ</span></p>
            <p>Tài khoản đặt hàng: <a href="">' . $item['tentaikhoan'] . '</a></p>
            <p>Người nhận hàng: ' . $item['tennguoinhan'] . '</p>
            <p>Số điện thoại: ' . $item['sodienthoai'] . '</p>
            <p>Địa chỉ: ' . $item['diachi'] . '</p>


            <p>Ngày đặt đơn: <span>' . $item['ngaydathang'] . '</span></p>
            <p>Trạng thái đơn hàng: <span>' . $item['tentrangthaidonhang'] . '</span>
            ';
                if ($item['id_trangthaidonhang'] == 1) {
                    echo '<a class="btn btn-primary" href="../controller/admin/change-status-evaluated.php?id=' . $item['id_donhang'] . '&st=2">Giao đơn này</a> 
                    <a class="btn btn-warning" href="../controller/admin/change-status-evaluated.php?id=' . $item['id_donhang'] . '&st=4">Hủy đơn</a> ';
                } else if ($item['id_trangthaidonhang'] == 2) {
                    echo '<a class="btn btn-success" href="../controller/admin/change-status-evaluated.php?id=' . $item['id_donhang'] . '&st=3">Hoàn thành</a>
                    <a class="btn btn-warning" href="../controller/admin/change-status-evaluated.php?id=' . $item['id_donhang'] . '&st=4">Hủy đơn</a> 
                    ';
                }
                echo '
            </p>
            
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th width="20px">STT</th>
                        <th>Tên sản phẩm</th>
                        <th width="100px">Hình ảnh</th>
                        <th>Size</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                    </tr>
                </thead>
            <tbody>
            ';
                foreach ($listFullProductsInPurchase as $pr) {
                    echo '
                    <tr>
                        <th >' . $ind++ . '</th>
                        <td>' . $pr['tensanpham'] . '</td>
                        <td><img src="' . $targetDir . $pr['anhsanpham1'] . '" alt=""> </td>
                        <td>' . $pr['size'] . '</td>
                        <td>' . number_format($pr['giamoi']) . 'đ</td>
                        <td>' . $pr['sl'] . '</td>

                    </tr>
                    ';
                }
                echo '
                </tbody>
            </table>  
            <a href="../controller/admin/export-to-docx/export.php?id=' . $item['id_donhang'] . '">Xuất hóa đơn</a>
        </div>';
            }
            ?>

        </div>
    </div>
</div>