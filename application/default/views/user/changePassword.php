<?php 
$row1 = [
    [
        'label' => FormFrontEnd::labelRow('user_password', 'Mật khẩu cũ', true),
        'input' => FormFrontEnd::inputRow('password', 'user_password', '', true)
    ]
];
$row2 = [
    [
        'label' => FormFrontEnd::labelRow('newPass', 'Mật khẩu mới', true),
        'input' => FormFrontEnd::inputRow('password', 'newPass', '', true)
    ]
];
$row3 = [
    [
        'label' => FormFrontEnd::labelRow('confirmPass', 'Nhập lại mật khẩu mới', true),
        'input' => FormFrontEnd::inputRow('password', 'confirmPass', '', true)
    ]
];

$oldPass        = FormFrontEnd::showForm($row1, 2);
$newPass        = FormFrontEnd::showForm($row2, 2);
$confirmPass    = FormFrontEnd::showForm($row3, 2);
?>

<div class="container">
    <div style="margin-top: 6rem;">
        <div class="row">
            <?php require_once "sidebar.php" ?>
            <div class="col-md-9 mt-3" style="min-height: 700px;">
                <div class="col-12">
                    <form method="post" action="" id="change-user-password">
                        <p class="fw-bold h5 mb-3 ms-3">Đổi mật khẩu</p>
                        <?= $oldPass?>
                        <?= $newPass?>
                        <?= $confirmPass?>
                    
                        <div class="form-group mx-3 mb-4">
                            <input type="hidden" name="token" value="1697523">
                            <input type="button" name="change_password" id="change_password" class="btn bg-purple mt-4" value="Đổi mật khẩu">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>