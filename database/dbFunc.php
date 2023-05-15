<?php
ob_start();
require_once('config.php');

// function insert, update data
function execute($sql)
{
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_query($conn, $sql);

    mysqli_close($conn);
}

// func get data form sql
function executeResult($sql)
{
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    $result = mysqli_query($conn, $sql);

    if (mysqli_errno($conn)) {
        // echo 'Cant connect database';
    }
    if ($result != null) {
        $data = [];
        while ($row = mysqli_fetch_array($result, 1)) {
            $data[] = $row;
        }
        mysqli_close($conn);
        return $data;
    } else {
        // echo ' Không thấy dữ liệu';  
    }
}

// func password security MD5 2 Class
function getPwdSecurity($pwd)
{
    return md5(md5($pwd));
}

// func get token user
function validateToken()
{
    $token = '';
    if (isset($_COOKIE['e_token'])) {
        $token = $_COOKIE['e_token'];
        $sql   = "select * from tokens, taikhoan where taikhoan.id_taikhoan = tokens.id_taikhoan && tokens.token = '$token'";
        // echo $sql;
        $data  = executeResult($sql);
        if ($data != null && count($data) > 0) {
            return $data[0];
        }
    }
    return null;
}

// func get vars with get method
function getGET($key)
{
    $value = '';
    if (isset($_GET[$key])) {
        $value = $_GET[$key];
    }
    $value = fixSqlInjection($value);
    return $value;
}

// func get vars with post method
function getPOST($key)
{
    $value = '';
    if (isset($_POST[$key])) {
        $value = $_POST[$key];
    }
    $value = fixSqlInjection($value);
    return $value;
}




// catch SqlInjection Error can make bad data system
function fixSqlInjection($str)
{
    $str = str_replace("\\", "\\\\", $str);
    $str = str_replace("'", "\'", $str);
    return $str;
}
function totalDateStartToEnd($start, $end)
{
    $diff = abs(strtotime($end) - strtotime($start));

    $years = floor($diff / (365 * 60 * 60 * 24));
    $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
    $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
    $total_days = ($days + ($months * 30) + ($years * 365) + 1);
    return $total_days;
}
function getDatesFromRange($start, $end)
{
    $dates = array($start);
    // print_r($dates);
    while (end($dates) < $end) {
        $dates[] = date('Y-m-d', strtotime(end($dates) . ' +1 day'));
    }
    return ($dates);
}


function changeNameFile($file)
{
    $extension = pathinfo($file, PATHINFO_EXTENSION);
    $rename = 'Upload' . date('ymdhms') . rand(0, 99999);
    $newname = $rename . '.' . $extension;
    return $newname;
}