<?php
require_once('../../database/dbFunc.php');
$s_token = "";

if (isset($_COOKIE['e_token'])) {
    $s_token = $_COOKIE['e_token'];
    $sql = "SELECT * FROM taikhoan, tokens where taikhoan.id_taikhoan = tokens.id_taikhoan && tokens.token = '$s_token'";
    $check_account = executeResult($sql);
    if ($check_account != null) {
        $sql = "update tokens set token = '' where token = '$s_token'";
        execute($sql);
        setcookie('e_token', '', time() - 10, '/');
        header("Location:../../public/?page=login");
    } else {
        header("Location:../../public/?page=");
    }
}