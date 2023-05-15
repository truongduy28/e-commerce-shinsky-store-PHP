<?php
// var global 
// - price ship and policy ship
$ship = 30000;
$total = 0;

$recipientName = getPOST('ten-nguoi-nhan');
$phoneContact = getPOST('so-dien-thoai');
$addressContact = getPOST('dia-chi');


if ($checkTokenAccount) {
    $us = $checkTokenAccount['id_taikhoan'];
    $sqlGetFullProductsInCart = 'SELECT * FROM giohang, sanpham WHERE sanpham.id_sanpham = giohang.id_sanpham && giohang.id_taikhoan = ' . $us;
    $listFullProductsInCart = executeResult($sqlGetFullProductsInCart);

    // update cart
    //   - get var
    $cartUpdate = getPOST('cap-nhat-gio-hang');
    if ($cartUpdate) {
        // - execute
        for ($i = 0; $i < count($_POST['sl']); $i++) {
            $user = $_POST['id-tai-khoan'][$i];
            $product = $_POST['id-san-pham'][$i];
            $size = $_POST['size'][$i];
            $quality = $_POST['sl'][$i];
            if ($user != "" && $product != "" && $quality != "") {
                $sqlUpdateCart = "UPDATE giohang set sl = $quality where id_taikhoan = $user && id_sanpham = $product && size = '$size';";
                execute($sqlUpdateCart);
            }
            header("Refresh:0");
        }
    }
    // ccomfirm cart -> insert cart database into order database and orderDetails 
    $orderComfirm = getPOST('xac-nhan-dat-hang');
    if ($orderComfirm) {
        TaoDonHang($us, $recipientName, $phoneContact, $addressContact);
    }
} else {
    header('Location: ?page=login');
}
// 
function TaoDonHang($us, $recipientName, $phoneContact, $addressContact)
{
    $today = date('Y-m-d H:i:s');
    $id_order = uniqid();
    $priceTotal = getPOST('tong-tien-cuoi-cung');

    if ($recipientName != "" && $phoneContact != "" && $addressContact != "") {
        $sqlCreateOrder = "INSERT INTO `donhang` (`id_donhang`, `id_taikhoan`, `tennguoinhan`, `sodienthoai`, `diachi`, `id_trangthaidonhang`, `tongtien`, `ngaydathang`) VALUES ('$id_order', $us, '$recipientName', '$phoneContact', '$addressContact', 1, $priceTotal, '$today');";
        execute($sqlCreateOrder);

        for ($i = 0; $i < count($_POST['sl']); $i++) {
            $product = $_POST['id-san-pham'][$i];
            $size = $_POST['size'][$i];
            $quality = $_POST['sl'][$i];
            if ($product != '' && $size != '' && $quality != '') {
                $sqlAddOrderDetails = "INSERT INTO `chitietdonhang` (`id_donhang`, `id_sanpham`, `size`, `sl`) VALUES ('$id_order', $product, '$size', '$quality'); ";
                execute($sqlAddOrderDetails);
                $sqlCreateEvaluate = "INSERT INTO `danhgia` (`id_taikhoan`, `id_donhang`, `id_sanpham`, `size`, `chitietdanhgia`, `show_danhgia`, `ngaydanhgia`) VALUES ( $us, '$id_order', '$product', '$size',  NULL, '1', '$today'); ";
                execute($sqlCreateEvaluate);
            }
        }
        $sqlDeleteCarts = "DELETE FROM giohang WHERE id_taikhoan = $us";
        execute($sqlDeleteCarts);
        header('Location: ?page=purchase');
    } else {
        echo "<script>
                    alert('Không được để trống các dữ liệu liên hệ');
                </script>";
    }
}

?>

<div class="cart-container">
    <form action="" method="post">
        <link rel="stylesheet" href="../access/css/cart.css">
        <!-- <div class="cart-banner">
            <img src="https://www.tamimi.com/wp-content/uploads/2020/08/Main-Banner-LU-JUL-2020-11.jpg" alt="">
            <div class="cart-banner_text">
                <h3>GIỎ HÀNG</h3>
            </div>
        </div> -->
        <div class="cart-table">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" class="mobile-hidden" width="20px">STT</th>
                        <th scope="col">Sản phẩm</th>
                        <th width="50px">Hình ảnh</th>
                        <th scope="col">Size</th>
                        <th scope="col" width="50px">Số lượng</th>
                        <th scope="col" width="20px">Giá</th>
                        <th width="10px"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($listFullProductsInCart) {
                        $index = 1;
                        foreach ($listFullProductsInCart as $data) {
                            echo '<tr>
                                <th class="mobile-hidden">' . $index++ . '</th>
                                <td>' . $data['tensanpham'] . '</td>
                                <td><img src="' . $targetDir . $data['anhsanpham1'] . '" alt=""></td>
                                <td>' . $data['size'] . '</td>
                                <td>
                                    <input hidden type="text" value="' . $data['id_taikhoan'] . '" name="id-tai-khoan[]">
                                    <input hidden type="text" value="' . $data['id_sanpham'] . '" name="id-san-pham[]">
                                    <input hidden type="text" value="' . $data['size'] . '" name="size[]">
                                    <input style="width: 40px" type="number" value="' . $data['sl'] . '"name="sl[]" >
                                </td>
                                <td>' . number_format($data['giamoi']) . 'đ</td>
                                <td><a href="../controller/public/delete-product-out-cart.php?pr=' . $data['id_sanpham'] . '&us=' . $us . '&si=' . $data['size'] . '"><i class="fa-solid fa-xmark"></i></a></td>
                            </tr>';
                            $total += $data['giamoi'] * $data['sl'];
                        }
                    }
                    ?>
                    <tr>
                        <td colspan="7" align="center" valign="center">Tổng tiền: <?= number_format($total) ?>đ</td>
                    </tr>
                    <tr>
                        <td colspan="7" align="center" valign="center"><input type="submit" name="cap-nhat-gio-hang"
                                class="btn btn-dark" value="Cập nhật giỏ hàng"></input>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="cart-user">
            <div class="cart-user_title">
                <hr>
                <h4>THÔNG TIN NHẬN HÀNG</h4>
                <hr>
            </div>
            <div class="cart-user_form">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="">Tên người nhận: <span>(*)</span></label>
                        <input class="form-control" type="text" name="ten-nguoi-nhan" style="border-radius: 0px;">
                    </div>
                    <div class="col-sm-6">
                        <label for="">Số điện thoại <span>(*)</span></label>
                        <input class="form-control" type="text" name="so-dien-thoai" style="border-radius: 0px;">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ: <span>(*)</span></label>
                    <input class="form-control" type="text" name="dia-chi" style="border-radius: 0px;">
                </div>
                <div class="cart-user_form__description">
                    <div class="cart-user_form__description-item cart-user_form__description-price">
                        <hr>
                        <span>Tiền sản phẩm: <?= number_format($total) ?>đ</span>
                        <hr>
                    </div>
                    <div class="cart-user_form__description-item cart-user_form__description-ship">
                        <hr>
                        <span>Phí vận chuyển: <?php
                                                if ($total >= 200000) {
                                                    $ship = 0;
                                                }
                                                echo
                                                number_format($ship) ?>đ</span>
                        <hr>
                    </div>
                    <div class="cart-user_form__description-item cart-user_form__description-total">
                        <hr>
                        <span>Tổng tiền: <?php $fullTotal = $total + $ship;
                                            echo
                                            number_format($fullTotal) ?>đ</span>
                        <hr>
                    </div>
                </div>
                <div class="form-group text-center">
                    <input type="number" hidden name="tong-tien-cuoi-cung" value="<?= $fullTotal ?>">
                    <input type="submit" value="Xác nhận đặt hàng" class="btn btn-success px-5"
                        name="xac-nhan-dat-hang">
                </div>
            </div>
        </div>
    </form>
</div>