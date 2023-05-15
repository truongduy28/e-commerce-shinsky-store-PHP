<?php
// show status
$sqlGetFullStatusOfEvaluated = "SELECT * FROM trangthaidonhang ";
$listFullStatusOfEvaluated = executeResult($sqlGetFullStatusOfEvaluated);

//= 
$dateFrom = getPOST('date-from');
$dateTo = getPOST('date-to');
$status = getPOST('status');
$total = 0;
if ($_POST) {
    $sql = "SELECT * FROM donhang, taikhoan,trangthaidonhang WHERE trangthaidonhang.id_trangthaidonhang = donhang.id_trangthaidonhang && taikhoan.id_taikhoan = donhang.id_taikhoan && ngaydathang >= '$dateFrom' && ngaydathang <= '$dateTo'";
    if ($status == 'default') {
        $sql .= " && trangthaidonhang.id_trangthaidonhang != 4";
    } else {
        $sql .= " && trangthaidonhang.id_trangthaidonhang = $status";
    }
    $sql .= " ORDER BY ngaydathang DESC";
    $listStatistics = executeResult($sql);
    // echo $sql;
}
?>

<div class="statistic-container">
    <div class="statistic-filter my-2">
        <form action="" method="POST" class="form-row justify-content-around w-50 m-auto">
            <select class="custom-select col-md-3" id="inlineFormCustomSelect" name="status">
                <option selected value="default">Choose...</option>
                <?php
                foreach ($listFullStatusOfEvaluated as $st) {
                    echo '<option value="' . $st['id_trangthaidonhang'] . '">' . $st['tentrangthaidonhang'] . '</option> ';
                }
                ?>
            </select>
            <input type="date" class="form-control col-md-3" name="date-from" value="<?= date('Y-m-d') ?>">
            <input type="date" class="form-control col-md-3" name="date-to" value="<?= date('Y-m-d') ?>">
            <button type="submit" class="btn btn-primary px-4">Thống kê</button>
        </form>
    </div>
    <div class="statistic-results">
        <?php
        if ($_POST) {
            if ($status == 'default') {
                echo '  <p class="text-center"><i>Tìm được ' . count($listStatistics) . ' kết quả cho thống kê từ ngày ' . $dateTo . ' đến ngày ' . $dateTo . ' không bao gồm đơn hàng đã hủy</i></p>';
            } else {
                echo '  <p class="text-center"><i>Tìm được ' . count($listStatistics) . ' kết quả cho thống kê từ ngày ' . $dateTo . ' đến ngày ' . $dateTo . ' chỉ bao gồm các đơn mang trạng thái ';
                foreach ($listFullStatusOfEvaluated as $it) {
                    if ($it['id_trangthaidonhang'] == $status) echo $it['tentrangthaidonhang'];
                }
                echo '</i></p>';
            }
        }
        ?>

        <table class="table table-striped">
            <thead>
                <tr class="bg-primary text-white">
                    <th scope="col" width="10px">#</th>
                    <th scope="col">Đơn hàng</th>
                    <th scope="col">Khách hàng</th>
                    <th scope="col">Tổng tiền</th>
                    <th>Ngày đặt hàng</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $html = '';
                if (isset($listStatistics)) {
                    if ($listStatistics) {
                        $index = 1;
                        foreach ($listStatistics as $data) {
                            $html .= '
                        <tr>
                            <th >' . $index++ . '</th>
                            <td><a href="?page=evaluated&id=' . $data['id_donhang'] . '">' . $data['id_donhang'] . '</a></td>
                            <td><a href="?page=accounts&id=' . $data['id_taikhoan'] . '">' . $data['tentaikhoan'] . '</a></td>
                            <td>' . number_format($data['tongtien']) . 'đ</td>
                            <td>' . $data['ngaydathang'] . '</td>
                            <td>' . $data['tentrangthaidonhang'] . '</td>
                        </tr>';
                            $total += $data['tongtien'];
                        }
                        echo $html;
                    }
                }
                ?>
                <tr class="bg-light">
                    <td colspan="6" align="center" valign="middle"><b>Tổng doanh thu: <?= number_format($total) ?>đ</b>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</div>