<?php
// Load the database configuration file 
include_once '../../../database/dbFunc.php';

$fileName = 'ab.xls';
$sql = "SELECT * FROM donhang, taikhoan,trangthaidonhang WHERE trangthaidonhang.id_trangthaidonhang = donhang.id_trangthaidonhang && taikhoan.id_taikhoan = donhang.id_taikhoan && ngaydathang >= '$dateFrom' && ngaydathang <= '$dateTo'";
if ($status == 'default') {
    $sql .= " && trangthaidonhang.id_trangthaidonhang != 4";
} else {
    $sql .= " && trangthaidonhang.id_trangthaidonhang = $status";
}
$sql .= " ORDER BY ngaydathang DESC";
$listStatistics = executeResult($sql);
if ($listStatistics) {
    $index = 1;
    foreach ($listStatistics as $data) {
        $excelData .= '
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
}

// Headers for download 
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$fileName\"");

// Render excel data 
echo $excelData;

exit;