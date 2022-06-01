<?php
$info = $this->info;
?>
<div class="container">
    <div style="margin-top: 6rem;">
        <div class="row">
            <?php require_once "parts/sidebar.php" ?>
            <div class="col-md-9 mt-4" style="min-height: 700px;">
                <div class="col-12">
                    <form class="form-horizontal" method="post" id="form-user-image" enctype="multipart/form-data">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="card-body p-0">
                                    <div class="row no-gutters">
                                        <div class="col-md-4 ms-3">
                                            <img src="<?= $this->avatarLogo?>" width="150" height="200" class="img-fluid " alt="logo_user">
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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-4 mx-3">
                                    <div class="error-element">
                                        <label for="user_username">Tên tài khoản <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control fs-input" id="user_username" name="user_username" autocomplete="off" value="<?= $info['user_username'] ?>" disabled required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-4 mx-3">
                                    <div class="error-element">
                                        <label for="user_password">Mật khẩu <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control fs-input" id="user_password" name="user_password" autocomplete="off" value="<?= $info['user_password'] ?>" disabled required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-4 mx-3">
                                    <div class="error-element">
                                        <label for="user_email">Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control fs-input" id="user_email" name="user_email" value="<?= $info['user_email'] ?>" autocomplete="off" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-4 mx-3">
                                    <div class="error-element">
                                        <label for="user_fullname">Họ tên <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" style="font-size: 1rem;" id="user_fullname" name="user_fullname" autocomplete="off" value="<?= $info['user_fullname'] ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-4 mx-3">
                                    <div class="error-element">
                                        <label for="user_phone">Số điện thoại <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" style="font-size: 1rem;" id="user_phone" name="user_phone" autocomplete="off" value="<?= $info['user_phone'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group mx-3">
                                    <input type="button" name="update_info_user" id="update_info_user" class="btn bg-purple mt-4" value="Cập nhật">
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>