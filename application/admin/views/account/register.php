<?php
$arrRegAccount = [
    [
        'label'     => Form::labelAccount('emp_user', 'Tên tài khoản', true),
        'input'     => Form::inputAccount('text', 'emp_user', 'Nhập tên tài khoản', @$this->arrParam['emp_user'], true)
    ],
    [
        'label'     => Form::labelAccount('emp_password', 'Mật khẩu', true),
        'input'     => Form::inputAccount('password', 'emp_password', 'Nhập mật khẩu', @$this->arrParam['emp_password'], true)
    ],
];

$arrRegContact = [
    [
        'label'     => Form::labelAccount('emp_fullname', 'Họ và tên', true),
        'input'     => Form::inputAccount('text', 'emp_fullname', 'Nhập họ tên', @$this->arrParam['emp_fullname'], true)
    ],
    [
        'label'     => Form::labelAccount('emp_email', 'Email', true),
        'input'     => Form::inputAccount('email', 'emp_email', 'Nhập email', @$this->arrParam['emp_email'], true)
    ],
    [
        'label'     => Form::labelAccount('emp_address', 'Địa chỉ'),
        'input'     => Form::inputAccount('text', 'emp_address', 'Nhập địa chỉ', @$this->arrParam['emp_address'])
    ],
    [
        'label'     => Form::labelAccount('emp_phone', 'Số điện thoại', true),
        'input'     => Form::inputAccount('text', 'emp_phone', 'Nhập điện thoại liên hệ', @$this->arrParam['emp_phone'], true)
    ],
];

$arrLocation    = $this->listLocation;
$arrSize        = $this->listSize;
$arrField       = $this->listField;
$arrRegCompany  = [
    [
        'label'     => Form::labelAccount('comp_name', 'Tên công ty', true),
        'input'     => Form::inputAccount('text', 'comp_name', 'Nhập tên công ty', @$this->arrParam['comp_name'], true)
    ],
    [
        'label'     => Form::labelAccount('comp_tax_id', 'Mã số thuế'),
        'input'     => Form::inputAccount('text', 'comp_tax_id', 'Nhập mã số thuế theo giấy phép kinh doanh', @$this->arrParam['comp_tax_id'])
    ],
    [
        'label'     => Form::labelAccount('comp_size', 'Quy mô nhân sự', true),
        'input'     => Form::selectBoxAccount('comp_size', $arrSize, @$this->arrParam['comp_size'], true)
    ],
    [
        'label'     => Form::labelAccount('comp_location', 'Địa điểm công ty', true),
        'input'     => Form::selectBoxAccount('comp_location', $arrLocation, @$this->arrParam['comp_location'], true)
    ],
    [
        'label'     => Form::labelAccount('comp_address', 'Địa chỉ công ty', true),
        'input'     => Form::inputAccount('text', 'comp_address', 'Nhập địa chỉ công ty', @$this->arrParam['comp_address'], true)
    ],
    [
        'label'     => Form::labelAccount('comp_field', 'Lĩnh vực hoạt động', true), //selectbox
        'input'     => Form::selectBoxAccount('comp_field', $arrField, @$this->arrParam['comp_field'], true)
    ]
];

$formAccount = Form::showFormAccount($arrRegAccount);
$formContact = Form::showFormAccount($arrRegContact);
$formCompany = Form::showFormAccount($arrRegCompany);

?>

<div class="col col-xl-7">
    <div class="card" style="border-radius: 1rem;">
        <div class="row g-0">
            <div class="col-md-12 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
                    <form method="post" id="register_form_employer">
                        <div class="d-flex align-items-center mb-3 pb-1">
                            <i class="fas fa-cubes fa-2x mr-3" style="color: #ff6219;"></i>
                            <span class="h1 font-weight-bold mb-0">JobHT</span>
                        </div>

                        <h5 class="font-weight-normal mb-3 pb-3" style="letter-spacing: 1px;">Đăng ký tài khoản nhà tuyển dụng</h5>

                        <p class="h5 pb-1"><b>Thông tin tài khoản</b></p>
                        <?= $formAccount ?>

                        <p class="h5 pt-2 pb-1"><b>Thông tin liên hệ</b></p>
                        <?= $formContact ?>

                        <p class="h5 pt-2 pb-1"><b>Thông tin công ty</b></p>
                        <?= $formCompany ?>

                        <div class="pt-1 mb-4">
                            <input type="hidden" name="token" value="123456789">
                            <input type="submit" class="btn bg-gradient-dark btn-lg btn-block" id="registerForm" name="btn_register" value="Đăng ký">
                        </div>

                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Đã có tài khoản ? <a href="<?= URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'login') ?>" class="text-muted">Đăng nhập</a></p>

                        <a href="https://www.facebook.com/darkelixir.cocq" class="small text-muted">Terms of use.</a>
                        <a href="https://www.facebook.com/darkelixir.cocq" class="small text-muted">Privacy policy</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>