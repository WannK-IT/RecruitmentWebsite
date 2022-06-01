<?php

$arrFormLogin = [
    [
        'label'     => FormBackEnd::labelAccount('emp_user', 'Tên tài khoản'),
        'input'     => FormBackEnd::inputAccount('text', 'emp_user', 'Nhập tên tài khoản', '')
    ],
    [
        'label'     => FormBackEnd::labelAccount('emp_password', 'Mật khẩu'),
        'input'     => FormBackEnd::inputAccount('password', 'emp_password', 'Nhập mật khẩu', '')
    ],
];

$formLogin = FormBackEnd::showFormAccount($arrFormLogin);

?>

<div class="col col-xl-9">
    <div class="card mt-4" style="border-radius: 1rem;">
        <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-flex justify-content-center">
                <img src="<?= $this->_dirImg ?>/bg-login.jpg" alt="login-form-image" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
                    <form method="post" id="login_form_employer">
                        <div class="d-flex align-items-center mb-3 pb-1">
                            <img class="img-fluid pr-1" style="height: 50px;" src="<?= UPLOAD_URL . 'favicon-bg-remove.png'?>">
                            <span class="h2 font-weight-bold mb-0">JobHT</span>
                        </div>

                        <h5 class="font-weight-normal mb-3 pb-3" style="letter-spacing: 1px;">Đăng nhập tài khoản nhà tuyển dụng</h5>

                        <?= $formLogin?>

                        <div class="pt-1 mb-4">
                            <a class="btn bg-gradient-dark btn-lg btn-block" id="loginForm" href="javascript:loginForm('<?= URL::addLink($this->arrParam['module'], 'account', 'loginAccount') ?>', '<?= URL::addLink('admin', 'post', 'index') ?>')">Đăng nhập</a>
                        </div>

                        <a class="small text-muted" href="#!">Quên mật khẩu?</a>
                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Chưa có tài khoản? <a href="<?= URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'register') ?>" class="text-muted">Đăng ký ngay</a></p>
                        <!-- <a href="#!" class="small text-muted">Terms of use.</a>
                        <a href="#!" class="small text-muted">Privacy policy</a> -->
                        <a class="small text-muted" href="<?= URL::addLink('default', 'index', 'index') ?>" class="text-muted">Quay về trang tìm việc</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>