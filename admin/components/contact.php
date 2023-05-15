<?php
$sqlGetContact  = 'SELECT * FROM loinhan WHERE show_loinhan = 1';
$listContact = executeResult($sqlGetContact);

// get contact information
$id = getGET('id');
if ($id) {
    $sqlDeleteContact = "UPDATE loinhan SET show_loinhan = 0 WHERE id_loinhan = $id";
    execute($sqlDeleteContact);
    header("Location: ?page=contact");
}
?>

<div class="contact-container">
    <div class="contact-table">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" width="20px">#</th>
                    <th scope="col">Tên người gửi</th>
                    <th scope="col">Email</th>
                    <th scope="col">Lời nhắn</th>
                    <th>Ngày gửi</th>
                    <th width="20px"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($listContact) {
                    $index = 1;
                    foreach ($listContact as $data) {
                        echo '
                        <tr>
                            <th scope="row">' . $index++ . '</th>
                            <td>' . $data['tennguoigui'] . '</td>
                            <td>' . $data['email'] . '</td>
                            <td>' . $data['loinhan'] . '</td>
                            <td>' . $data['ngaygui'] . '</td>
                            <td><a href="?page=contact&id=' . $data['id_loinhan'] . '" class="btn btn-primary">Xóa</a></td>
                        </tr>
                        ';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

</div>