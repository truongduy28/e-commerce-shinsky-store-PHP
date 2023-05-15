<?php
require_once('../../database/dbFunc.php');
$id = getGET('id');
$st = getGET('st');

ThayDoiTrangThaiDonHang($st, $id);


function ThayDoiTrangThaiDonHang($st, $id)
{
    $sql = "UPDATE donhang SET id_trangthaidonhang = $st WHERE id_donhang = '$id'";
    execute($sql);
    header("Location: ../../admin/?page=evaluated&id=$id");
}