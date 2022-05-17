<div class="card" style="border-radius: 1rem;">
    <div class="row g-0">
        <div class="col-md-6 col-lg-5 d-flex justify-content-center">
            <img src="<?= $this->_dirImg ?>/logoLogin.jpg" alt="login-form-image" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
        </div>
        <div class="col-md-6 col-lg-7 d-flex align-items-center">
            <div class="card-body p-4 p-lg-5 text-black">
                <form method="post" id="login_form_employer">
                    <div class="d-flex align-items-center mb-3 pb-1">
                        <i class="fas fa-cubes fa-2x mr-3" style="color: #ff6219;"></i>
                        <span class="h1 font-weight-bold mb-0">JobHT</span>
                    </div>

                    <h5 class="font-weight-normal mb-3 pb-3" style="letter-spacing: 1px;">Đăng nhập tài khoản nhà tuyển dụng</h5>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="emp_user">Tên tài khoản</label>
                        <input type="text" id="emp_user" name="emp_user" class="form-control form-control-lg" placeholder="Nhập tên tài khoản" autocomplete="off" />
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="emp_password">Mật khẩu</label>
                        <input type="password" id="emp_password" name="emp_password" class="form-control form-control-lg" placeholder="Nhập mật khẩu" autocomplete="off" />
                    </div>

                    <div class="pt-1 mb-4">
                        <a class="btn btn-dark btn-lg btn-block" id="loginForm" href="javascript:loginForm('<?= URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'loginAccount')?>', '<?= URL::addLink('admin', 'post', 'index')?>')"  type="submit">Đăng nhập</a>
                    </div>

                    <a class="small text-muted" href="#!">Quên mật khẩu?</a>
                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Chưa có tài khoản? <a href="#!" class="text-muted">Đăng ký ngay</a></p>
                    <a href="#!" class="small text-muted">Terms of use.</a>
                    <a href="#!" class="small text-muted">Privacy policy</a>
                </form>

            </div>
        </div>
    </div>
</div>