<div class="container-fluid pt-5">
    <div class="row">
        <div class="col-sm-6 login-section-wrapper">
            <div class="login-wrapper ms-5">
                <h1 class="login-title">Đăng nhập tài khoản</h1>
                <form action="" method="post" id="form-user-login">

                    <div class="form-group mb-3">
                        <label for="user_username">Tên tài khoản</label>
                        <input type="text" name="user_username" id="user_username" class="form-control fs-6" placeholder="Nhập tên tài khoản" autocomplete="off">
                    </div>

                    <div class="form-group mb-3">
                        <label for="user_password">Password</label>
                        <input type="password" name="user_password" id="user_password" class="form-control fs-6" placeholder="Nhập mật khẩu" autocomplete="off">
                    </div>

                    <a class="btn btn-block login-btn" name="loginUser" id="loginUser" href="javascript:loginUser('<?= URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'loginUser')?>', '<?= URL::addLink('default', 'index', 'index')?>')">Đăng nhập</a>
                    <!-- <input name="loginUser" id="loginUser" class="btn btn-block login-btn" type="button" value="Đăng nhập"> -->
                </form>
                <a href="#!" class="forgot-password-link">Forgot password?</a>
                <p class="login-wrapper-footer-text">Bạn chưa có tài khoản ? <a href="<?= URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'register')?>" class="text-reset">Đăng ký</a></p>
            </div>
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
            <img src="<?= $this->_dirImg?>login.jpg" alt="login image" class="login-img">
        </div>
    </div>
</div>