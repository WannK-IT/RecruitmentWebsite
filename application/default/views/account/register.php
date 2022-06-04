
<div class="container-fluid pt-5">
    <div class="row">
        <div class="col-sm-6 login-section-wrapper">
            <div class="login-wrapper ms-5">
                <h1 class="login-title">Đăng ký tài khoản<br>người tìm việc</h1>
                <form action="" method="post" id="form-user-register">

                    <div class="form-group mb-3">
                        <div class="error-element">
                            <label for="user_fullname">Họ và tên</label>
                            <input type="text" name="user_fullname" id="user_fullname" class="form-control fs-6" placeholder="Nhập họ và tên" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <div class="error-element">
                            <label for="user_email">Email</label>
                            <input type="email" name="user_email" id="user_email" class="form-control fs-6" placeholder="Nhập Email" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <div class="error-element">
                            <label for="user_username">Tên tài khoản</label>
                            <input type="text" name="user_username" id="user_username" class="form-control fs-6" placeholder="Nhập tên tài khoản" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <div class="error-element">
                            <label for="user_password">Mật khẩu</label>
                            <input type="password" name="user_password" id="user_password" class="form-control fs-6" placeholder="Nhập mật khẩu" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <div class="error-element">
                            <label for="user_repassword">Nhập lại mật khẩu</label>
                            <input type="password" name="user_repassword" id="user_repassword" class="form-control fs-6" placeholder="Nhập lại mật khẩu" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <div class="error-element">
                            <label for="user_phone">Điện thoại</label>
                            <input type="text" name="user_phone" id="user_phone" class="form-control fs-6" placeholder="Nhập số điện thoại" autocomplete="off" required>
                        </div>
                    </div>
                    <input type="hidden" name="token" value="564236985">
                    <input name="registerUser" id="registerUser" class="btn btn-block login-btn" type="submit" value="Đăng ký">
                </form>
                <a href="#!" class="forgot-password-link">Forgot password?</a>
                <p class="login-wrapper-footer-text">Bạn đã có tài khoản ? <a href="<?= URL::addLink($this->arrParam['module'], $this->arrParam['controller'], 'login') ?>" class="text-reset">Đăng nhập</a></p>
            </div>
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
            <img src="<?= $this->_dirImg ?>login.jpg" alt="login image" class="login-img">
        </div>
    </div>
</div>