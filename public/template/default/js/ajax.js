$('#registerUser').click(function (e) {
    e.preventDefault();
    if ($('#user_username').val()) {
        let linkCheckUsername = 'index.php?module=default&controller=account&action=checkExistUsername';
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: linkCheckUsername,
            data: $('#form-user-register').serialize(),
            success: function (data) {
                if (data == 'exist username') {
                    toastMsg('warning', 'Tên tài khoản đã được sử dụng')
                } else {
                    $('#form-user-register').submit();
                }
            }
        });
    } else {
        $('#form-user-register').submit();
    }

    if ($('#user_email').val()) {
        let linkCheckEmail = 'index.php?module=default&controller=account&action=checkExistEmail'
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: linkCheckEmail,
            data: $('#form-user-register').serialize(),
            success: function (data) {
                if (data == 'exist email') {
                    toastMsg('warning', 'Email đã được sử dụng')
                } else {
                    $('#form-user-register').submit();
                }
            }
        })
    } else {
        $('#form-user-register').submit();
    }
})

function loginUser(link, direct) {
    // Check empty input field
    if (!$('#user_username').val() || !$('#user_password').val()) {
        toastMsg('warning', 'Vui lòng nhập tên tài khoản và mật khẩu');
    } else {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: link,
            data: $('#form-user-login').serialize(),
            success: function (data) {
                if (data == 'failed') {
                    toastMsg('error', 'Tên tài khoản và mật khẩu chưa chính xác');
                } else {
                    location.href = direct;
                }
            }
        })
    }
}

$('#update_info_user').click(function () {
    if (!$('#user_phone').val() || !$('#user_fullname').val()) {
        $('#update-user-form').submit();
    } else {
        let linkUpdateInfoBasic = 'index.php?module=default&controller=user&action=updateBasicInfo';
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: linkUpdateInfoBasic,
            data: $('#update-user-form').serialize(),
            success: function () {

            }
        })
        toastMsg('success', 'Cập nhật thông tin cá nhân thành công!')
    }

})

$('#change_password').click(function () {
    let linkCheckPassword = 'index.php?module=default&controller=user&action=checkExistPassword'
    let linkChangePassword = 'index.php?module=default&controller=user&action=updatePassword'
    if (!$('#user_password').val() || !$('#newPass').val() || !$('#confirmPass').val()) {
        toastMsg('warning', 'Vui lòng nhập đầy đủ thông tin')
    } else if ($('#confirmPass').val() != $('#newPass').val()) {
        toastMsg('warning', 'Xác nhận mật khẩu<br>không khớp')
    } else if ($('#user_password').val().length < 8 || $('#newPass').val().length < 8 || $('#confirmPass').val().length < 8) {
        toastMsg('warning', 'Mật khẩu phải từ<br>8 - 50 ký tự !')
    } else {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: linkCheckPassword,
            data: $('#change-user-password').serialize(),
            success: function (data) {
                if (data == 'not match') {
                    toastMsg('error', 'Mật khẩu cũ không trùng khớp');
                } else {
                    $.ajax({
                        type: 'post',
                        url: linkChangePassword,
                        data: $('#change-user-password').serialize(),
                        success: function (data) {
                            toastMsg('success', 'Thay đổi mật khẩu<br>thành công');
                        }
                    })
                }
            }
        })
    }
})

function toastMsg(icon, message) {
    Toast.fire({
        icon: icon,
        title: message
    })
}

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
})