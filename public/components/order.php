<?php


// var
$id = getGET('id');
$sqlGetPurchased = "SELECT * FROM donhang, chitietdonhang, trangthaidonhang WHERE donhang.id_donhang = chitietdonhang.id_donhang && trangthaidonhang.id_trangthaidonhang = donhang.id_trangthaidonhang && donhang.id_donhang = '$id'";
$purchased = executeResult($sqlGetPurchased);
// echo $sqlGetPurchased;
if ($purchased) $data = $purchased[0];

// get product in purchase
$sqlGetFullProductsInPurchase = "SELECT * FROM chitietdonhang, sanpham, danhgia WHERE danhgia.id_donhang = chitietdonhang.id_donhang && danhgia.size = chitietdonhang.size && danhgia.id_sanpham = sanpham.id_sanpham && sanpham.id_sanpham = chitietdonhang.id_sanpham && chitietdonhang.id_donhang = '$id'";
// echo $sqlGetFullProductsInPurchase;  
$listFullProductsInPurchase = executeResult($sqlGetFullProductsInPurchase);
?>

<div class="order-container text-center py-4 px-1">
    <link rel="stylesheet" href="../access/css/order.css">
    <h4>ĐƠN HÀNG</h4>
    <p>Mã đơn hàng: <span><?= $data['id_donhang'] ?></span></p>
    <p>Tổng tiền đơn hàng: <span><?= number_format($data['tongtien']) ?>đ</span></p>
    <p>Ngày đặt đơn: <span><?= $data['ngaydathang'] ?></span></p>
    <p>Trạng thái đơn hàng: <span><?= $data['tentrangthaidonhang'] ?></span></p>

    <table class="table table-striped w-100">
        <thead>
            <tr>
                <th width="20px" class="mobile-hidden">STT</th>
                <th>Tên sản phẩm</th>
                <th width="50px">Hình ảnh</th>
                <th>Size</th>
                <th>Giá</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($listFullProductsInPurchase) {
                $index = 1;
                foreach ($listFullProductsInPurchase as $item) {
                    echo '
                    <tr>
                        <th class="mobile-hidden" >' . $index++ . '</th>
                        <td>' . $item['tensanpham'] . '</td>
                        <td><img src="' . $targetDir . $item['anhsanpham1'] . '" alt=""> </td>
                        <td>' . $item['size'] . '</td>
                        <td>' . number_format($item['giamoi']) . 'đ</td>
                        <td> <a ';
                    if ($data['id_trangthaidonhang'] == 3) {
                        echo ' class = "btn btn-success"  href="?page=evaluate&pr=' . $item['id_sanpham'] . '&ev=' . $item['id_danhgia'] . '" ';
                    } else {
                        echo ' class = "btn btn-secondary" ';
                    }
                    echo '>Đánh giá</a> </td>
                    </tr>
                    ';
                }
            }
            ?>
        </tbody>
    </table>

    <!-- <div class="order-control text-center">
        <?php
        if ($data['id_trangthaidonhang'] == 1) {
            echo '
            <a class="btn btn-warning " href="' . $data['id_trangthaidonhang'] . '">Hủy đơn hàng</a>
        ';
        }
        ?>
    </div> -->
    <div class="order-control text-center">
        <?php
        if ($data['id_trangthaidonhang'] == 1) {
            echo '
            <a class="btn btn-warning " href="../controller/public/calcel-purchase.php?id=' . $data['id_donhang'] . '">Hủy đơn hàng</a>
        ';
        }
        ?>
    </div>

</div>