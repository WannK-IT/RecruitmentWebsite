<?php
$info = $this->info;
$row1 = [
    [
        'label' => FormFrontEnd::labelRow('user_username', 'Tên tài khoản', true),
        'input' => FormFrontEnd::inputRow('text', 'user_username', $info['user_username'], true, true)
    ],
    [
        'label' => FormFrontEnd::labelRow('user_password', 'Mật khẩu', true),
        'input' => FormFrontEnd::inputRow('password', 'user_password', $info['user_password'], true, true)
    ]
];
$row2 = [
    [
        'label' => FormFrontEnd::labelRow('user_email', 'Email', true),
        'input' => FormFrontEnd::inputRow('email', 'user_email', $info['user_email'], true, true)
    ],
    [
        'label' => FormFrontEnd::labelRow('user_fullname', 'Họ tên', true),
        'input' => FormFrontEnd::inputRow('text', 'user_fullname', $info['user_fullname'], true)
    ]
];
$row3 = [
    [
        'label' => FormFrontEnd::labelRow('user_phone', 'Số điện thoại', true),
        'input' => FormFrontEnd::inputRow('text', 'user_phone', $info['user_phone'], true)
    ]
];

$username_password  = FormFrontEnd::showForm($row1, 2);
$email_fullname     = FormFrontEnd::showForm($row2, 2);
$phone              = FormFrontEnd::showForm($row3, 2);
?>
<div class="container">
    <div style="margin-top: 6rem;">
        <div class="row">
            <?php require_once "sidebar.php" ?>
            <div class="col-md-9 mt-3" style="min-height: 700px;">
                <div class="col-12">
                <p class="fw-bold h5 mb-3 ms-3">Thông tin cá nhân</p>
                    <form class="form-horizontal" method="post" id="form-user-image" enctype="multipart/form-data">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="card-body p-0">
                                    <p class="ms-3 fw-bold">Avatar</p>
                                    <div class="row no-gutters">
                                        <div class="col-md-4 ms-3">
                                            <img src="<?= $this->avatarLogo ?>" width="150" height="200" class="img-fluid " alt="logo_user">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <label for="user_avatar" role="button" class="border border-2 p-2 text-purple font-weight-normal mt-3">Thay đổi hình ảnh</label>
                                                <input id="user_avatar" type="file" name="user_avatar" style="display:none">
                                                <p class="card-text"><small class="text-muted">Dạng file .jpg, .jpeg, .png</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form method="post" action="" id="update-user-form">

                        <?= $username_password ?>
                        <?= $email_fullname ?>
                        <?= $phone ?>

                        <div class="form-group mx-3">
                            <input type="button" name="update_info_user" id="update_info_user" class="btn bg-purple mt-4" value="Cập nhật">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>