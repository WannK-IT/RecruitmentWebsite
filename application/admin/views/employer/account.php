<?php

if (!empty($this->employer)) {
    $dataEmp = $this->employer;
}

$arrAccount = [
    [
        'label'     => Form::labelRow('emp_user', 'Tên tài khoản', 4, true),
        'input'     => Form::inputRow('text', 'emp_user', 8, $dataEmp['emp_user'], false, true)
    ],
    [
        'label'     => Form::labelRow('emp_password', 'Mật khẩu', 4, true),
        'input'     => Form::inputRow('password', 'emp_password', 8, $dataEmp['emp_password'], false, true)
    ],
];

$arrContact = [
    [
        'label'     => Form::labelRow('emp_fullname', 'Họ và tên', 4, true),
        'input'     => Form::inputRow('text', 'emp_fullname', 8, $dataEmp['emp_fullname'], true)
    ],
    [
        'label'     => Form::labelRow('emp_phone', 'Số điện thoại', 4, true),
        'input'     => Form::inputRow('text', 'emp_phone', 8, $dataEmp['emp_phone'], true)
    ],
    [
        'label'     => Form::labelRow('emp_email', 'Email', 4, true),
        'input'     => Form::inputRow('email', 'emp_email', 8, $dataEmp['emp_email'], true)
    ],
    [
        'label'     => Form::labelRow('emp_address', 'Địa chỉ', 4),
        'input'     => Form::inputRow('text', 'emp_address', 8, $dataEmp['emp_address'])
    ]
];

$account = Form::showForm($arrAccount);
$contact = Form::showForm($arrContact);
?>

<div class="row">
    <div class="col-12">
        <div class="mt-4">
            <div class="list-inline-item font-weight-bold border-bottom border-info"><a href="" class="text-info">Thông tin tài khoản</a></div>
            <div class="list-inline-item font-weight-bold"><a class="text-dark" href="<?= URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'company') ?>">Thông tin công ty</a></div>
        </div>
        <div class="card card-default my-3">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">Thông tin tài khoản</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>

            <form class="form-horizontal" method="post" id="form-emp-account" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="card-body p-0">
                                <p class="text-muted font-weight-bold h6 mb-3">Thông tin đăng nhập</p>
                                <?= $account ?>
                                <div id="changePassword" style="cursor: pointer" class="text-info float-right">
                                    <p>Thay đổi mật khẩu</p>
                                </div>

                                <div id="changePass" title="Đổi mật khẩu">
                                    <form method="post" id="formChangePassword">
                                        <label for="new_password">Nhập mật khẩu mới</label>
                                        <input type="text" id="new_password" class="form-control mb-3" name="new_password">
                                        <label for="re_password">Nhập lại mật khẩu</label>
                                        <input type="text" id="re_password" class="form-control mb-3">
                                        <!-- <input type="submit" id="changePassword" class="btn bg-gradient-info float-right" value="Thay đổi"> -->
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6 pl-5">
                            <div class="card-body p-0">
                                <p class="text-muted font-weight-bold h6 mb-3">Ảnh đại diện</p>
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="<?= $this->_dirImg ?>admin.png" width="150" height="200" class="card-img" alt="Image_account_employer">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <input type="file" name="comp_logo" id="logo_employer" style="display: none;">
                                            <label role="button" class="border border-2 p-2 text-info font-weight-normal" for="logo_employer">Thay đổi hình ảnh</label>
                                            <p class="card-text"><small class="text-muted">Dạng file .jpg, .jpeg, .png,</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-body p-0">
                                <p class="text-muted font-weight-bold h6 mb-3">Thông tin liên hệ</p>
                                <?= $contact ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="javascript:updateAccount('<?= URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'updateAccount') ?>')" id="updateAccount" name="update_account" class="btn bg-gradient-info float-right">Cập nhật</a>
                </div>
            </form>
        </div>
    </div>
</div>