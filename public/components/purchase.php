<?php
// var global
if ($checkTokenAccount) {
    $us = $checkTokenAccount['id_taikhoan'];
} else {
    header('Location: ?page=login');
}

// get full status purchase
$sqlGetFullStatusPurchase = "SELECT * FROM trangthaidonhang";
$listFullStatusPurchase = executeResult($sqlGetFullStatusPurchase);

// get Full purchase of user sign in
$sqlGetFullPurchase = "SELECT * FROM donhang, trangthaidonhang WHERE donhang.id_trangthaidonhang = trangthaidonhang.id_trangthaidonhang && donhang.id_taikhoan = $us ORDER BY donhang.ngaydathang DESC";
$listFullPurchase = executeResult($sqlGetFullPurchase);

?>

<div class="purchase-container">
    <link rel="stylesheet" href="../access/css/purchase.css">
    <div class="purchase-filter">
        <form action="" class="row">
            <input class="my-2" type="text" hidden value="<?= $us ?>" id="user">
            <div class="col-sm-4">
                <select class="form-control my-2 form-control-sm" id="status">
                    <option value="all">Chọn trạng thái...</option>
                    <?php
                    if ($listFullStatusPurchase) {
                        foreach ($listFullStatusPurchase as $status) {
                            echo '<option value="' . $status['id_trangthaidonhang'] . '">' . $status['tentrangthaidonhang'] . '</option>    ';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control form-control-sm" placeholder="Nhập mã đơn để tìm kiếm..."
                    id="id">
            </div>
            <div class="col-sm-2 text-center">
                <button class="btn btn-info my-2 btn-sm btn-block" id="submit">Tìm kiếm</button>
            </div>
        </form>
    </div>
    <div class="purchase-results">
        <?php
        if ($listFullPurchase) {
            foreach ($listFullPurchase as $data) {
                echo '
                <div class="purchase-item">
                    <div class="purchase-item_image">
                        <img src="../access/image/logo_main.png" alt="">
                    </div>
                    <div class="purchase-item_details">
                        <h5><a href="?page=order&id=' . $data['id_donhang'] . '">Mã đơn: ' . $data['id_donhang'] . '</a></h5>
                        <p>Tổng tiền: ' . number_format($data['tongtien']) . 'đ</p>
                        <p>Ngày đặt đơn: ' . $data['ngaydathang'] . '</p>
                    </div>
                    <div class="purchase-item_control">
                        <p>Trạng thái: ' . $data['tentrangthaidonhang'] . '</p>
                        <p>
                            <a href="?page=order&id=' . $data['id_donhang'] . '" class="btn btn-primary">Xem đơn hàng</a>
                        </p>
                    </div>
                </div>
                ';
            }
        }
        ?>
    </div>
</div>
<script>
const btnSubmit = $('#submit')
btnSubmit.click((e) => {
    e.preventDefault();
    const us = $('#user').val()
    const st = $('#status').val()
    const id = $('#id').val()
    req = {
        us,
        st,
        id
    }
    $.ajax({
        url: '../controller/public/ajax_load-purchase.php',
        type: 'POST',
        data: req,
        error: function() {
            $('.purchase-results').html('<p>An error has occurred</p>');
        },
        beforeSend: () => {
            $('.purchase-results').html(
                '<div class="text-center py-4"><div class="spinner-border text-center"></div></div>'
            )
        },
        success: function(data) {

            $('.purchase-results').html(data);
        },
    });
})
</script>