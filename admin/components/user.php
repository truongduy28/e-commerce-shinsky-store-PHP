<?php
// var global
$block = getGET('lo');
$up = getGET('up');


// block-unblock user
if ($block) {
    XoaKhachHang($block);
}

function XoaKhachHang($block)
{
    $sqlCheckStatusUser = "SELECT * FROM taikhoan WHERE id_taikhoan = '$block'";
    $checkStatusUser = executeResult($sqlCheckStatusUser);
    if ($checkStatusUser) {
        if ($checkStatusUser[0]['show_taikhoan'] == 1) {
            $sqlBlockUser = "UPDATE taikhoan SET show_taikhoan = 0 WHERE id_taikhoan = '$block'";
        } else {
            $sqlBlockUser = "UPDATE taikhoan SET show_taikhoan = 1 WHERE id_taikhoan = '$block'";
        }
        execute($sqlBlockUser);
        echo $sqlBlockUser;
        header("Location: ?page=user");
    }
}


// up/un - level user 
if ($up) {
    $sqlCheckLeverUser = "SELECT * FROM taikhoan WHERE id_taikhoan = '$up'";
    $checkLeverUser = executeResult($sqlCheckLeverUser);
    if ($checkLeverUser) {
        if ($checkLeverUser[0]['lv'] == 1) {
            $sqlLevelUser = "UPDATE taikhoan SET lv = 2 WHERE id_taikhoan = '$up'";
        } else {
            $sqlLevelUser = "UPDATE taikhoan SET lv = 1 WHERE id_taikhoan = '$up'";
        }
        execute($sqlLevelUser);
        echo $sqlLevelUser;
        header("Location: ?page=user");
    }
}




// get full user
$sqlGetFullUserOfSystem = "SELECT * FROM taikhoan ORDER BY ngaytao DESC;";
$listFullUserOfSystem = executeResult($sqlGetFullUserOfSystem);


?>


<div class="user-container">
    <div class="user-filter py-3">
        <form action="" class="form-row justify-content-center">
            <div class="col-sm-3">
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>
            <div class="col-sm-5">
                <input type="text" name="" id="" class="form-control">
            </div>
            <div class="col-sm-2">
                <button class="btn btn-primary">Tìm kiếm</button>
            </div>
        </form>
    </div>
    <div class="user-results">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" width="20px">#</th>
                    <th scope="col">Tên tài khoản</th>
                    <th scope="col">Ngày tạo</th>
                    <th scope="col">Phân quyền</th>
                    <th></th>
                    <th width="200px"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($listFullUserOfSystem) {
                    $index = 1;
                    foreach ($listFullUserOfSystem as $data) {
                        echo '
                        <tr>
                            <th scope="row">' . $index++ . '</th>
                            <td>' . $data['tentaikhoan'] . '</td>
                            <td>' . $data['ngaytao'] . '</td>
                            <td>';
                        if ($data['lv'] == 1) {
                            echo 'Người dùng';
                        } elseif ($data['lv'] == 2) {
                            echo 'Quản trị';
                        }
                        echo '</td>
                            <td> ';
                        if ($data['show_taikhoan'] == 1) {
                            echo '<p class="text-info">Đang hoạt động</p>';
                        } elseif ($data['show_taikhoan'] == 0) {
                            echo '<p class="text-danger">Bị Khóa</p>';
                        }
                        echo '</td>
                            <td><a class="btn btn-danger" href="?page=user&lo=' . $data['id_taikhoan'] . '">
                            ';
                        if ($data['show_taikhoan'] == 1) {
                            echo 'Khóa';
                        } elseif ($data['show_taikhoan'] == 0) {
                            echo 'Mở khóa';
                        }
                        echo '
                            </a></td>
                            <td><a class="btn btn-warning" href="?page=user&up=' . $data['id_taikhoan'] . '">
                            ';
                        if ($data['lv'] == 1) {
                            echo 'Cấp quyền quản trị';
                        } elseif ($data['lv'] == 2) {
                            echo 'Xóa quyền quản trị';
                        }

                        echo '
                            </a></td>
                        </tr>
                        ';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>