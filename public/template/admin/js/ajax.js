$(document).ready(function () {

    // change password
    $('#changePassword').click(function () {
        $('#changePass').dialog('open');
    });

    $('#changePass').dialog({
        modal: true,
        autoOpen: false,
        width: 400,
        resizable: false,
        position: {
            my: "bottom",
            at: "center",
            of: window
        },
        show: {
            effect: 'fade',
            duration: 250
        },
        buttons: [{
                text: "Hủy",
                'class': 'btn bg-gradient-danger',
                id: "btnCancel",
                click: function () {
                    $(this).dialog("close")
                }
            },
            {
                text: "Thay đổi",
                'class': 'btn bg-gradient-info',
                id: "btnChangePassword",

                click: function () {

                    // kiểm tra nếu password và repassword trùng khớp
                    if (!$('#new_password').val() || !$('#re_password').val()) {
                        toastMsg('error', 'Mật khẩu không được bỏ trống !');
                    } else if ($('#new_password').val() != $('#re_password').val()) {
                        toastMsg('error', 'Mật khẩu không trùng khớp !');
                    } else {
                        let link = 'index.php?module=admin&controller=employer&action=changePassword'
                        let valueNewPassword = $('#new_password').val();
                        $.ajax({
                            type: 'post',
                            url: link,
                            data: {
                                new_password: valueNewPassword
                            },
                            success: function (data) {
                                toastMsg('success', 'Đổi mật khẩu thành công !');
                            }
                        });
                    }
                }
            }
        ]
    });

    $('.btn_avatar_emp').click(function () {
        $('#form-emp-account').submit();
    })

    // show total post
    $.ajax({
        type: 'post',
        dataType: 'json',
        url: 'index.php?module=admin&controller=post&action=totalPost',
        success: function (data) {
            $('#totalPostRow h3').html(data)

        }
    })
});

//============================ END JQUERY READY ====================================

// delete Ajax
function ajaxDelete(link, option) {
    if(option == 'post'){
        Swal.fire({
            title: 'Bạn có chắc chắn ?',
            text: "Tin đăng tuyển dụng của bạn sẽ không thể khôi phục",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy bỏ',
            focusCancel: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.get(link, function (data) {
                    $('#post-' + data).hide("slow");
                }, 'json');
    
                Swal.fire(
                    'Thành công !',
                    'Tin đăng tuyển dụng của bạn đã được xóa',
                    'success'
                ).then(function(){
                    location.reload();
                })
            }
        })
    }else if(option == 'news'){
        Swal.fire({
            title: 'Bạn có chắc chắn ?',
            text: "Bài viết của bạn sẽ không thể khôi phục",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy bỏ',
            focusCancel: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.get(link, function (data) {
                    $('#news-' + data).hide("slow");
                }, 'json');
    
                Swal.fire(
                    'Thành công !',
                    'Bài viết của bạn đã được xóa',
                    'success'
                ).then(function(){
                    location.reload();
                })
            }
        })
    }
}


// ajax Status
function ajaxStatus(link, option) {
    console.log(option);
    if(option == 'post'){
        $.get(link, function (data) {
            let anchorTag = 'a#status-post-' + data[0];
            let classActive = 'fa-check text-success';
            let classInactive = 'fa-minus text-danger';
            if (data[1] == 'active') {
                classInactive = 'fa-check text-success';
                classActive = 'fa-minus text-danger';
            }
            $(anchorTag).attr('href', "javascript:ajaxStatus('" + data[2] + "', 'post')");
            $(anchorTag + ' span').removeClass(classActive).addClass(classInactive);
            Toast.fire({
                icon: 'success',
                title: 'Trạng thái đã được thay đổi !'
            })
        }, 'json')
    }else{
        $.get(link, function (data) {
            let anchorTag = 'a#status-news-' + data[0];
            let classActive = 'fa-check text-success';
            let classInactive = 'fa-minus text-danger';
            if (data[1] == 'active') {
                classInactive = 'fa-check text-success';
                classActive = 'fa-minus text-danger';
            }
            $(anchorTag).attr('href', "javascript:ajaxStatus('" + data[2] + "', 'news')");
            $(anchorTag + ' span').removeClass(classActive).addClass(classInactive);
            Toast.fire({
                icon: 'success',
                title: 'Trạng thái đã được thay đổi !'
            })
        }, 'json')
    }
}

function loginForm(link, direct) {
    // Check empty input field
    if (!$('#emp_user').val() || !$('#emp_password').val()) {
        toastMsg('warning', 'Vui lòng nhập tên tài khoản và mật khẩu !');
    } else {
        $.ajax({
            type: 'post',
            url: link,
            data: $('#login_form_employer').serialize(),
            success: function (data) {
                if (data == 'failed') {
                    toastMsg('error', 'Tên tài khoản và mật khẩu chưa chính xác !');
                } else {
                    location.href = direct;
                }
            }
        })
    }
}

// register account
$('#registerForm').click(function (event) {
    event.preventDefault();
    if ($('#emp_user').val()) {
        let link = 'index.php?module=admin&controller=account&action=checkExistAccount'
        $.ajax({
            type: 'post',
            url: link,
            data: $('#register_form_employer').serialize(),
            success: function (data) {
                if (data == 'exist') {
                    toastMsg('warning', 'Tên tài khoản đã được sử dụng !')
                } else {
                    $('#register_form_employer').submit();
                }
            }
        })
    } else {
        $('#register_form_employer').submit();
    }

});

// update account
function updateAccount(link) {
    $.post(link, $('#form-emp-account').serialize(), function (data) {
        toastMsg('success', 'Cập nhật thông tin tài khoản thành công !');
    })
}

// update company
function updateCompany(link) {
    if(!$('#comp_location').val() || !$('#comp_address').val() || !$('#comp_field').val() || !$('#comp_website').val() || !$('#comp_email').val()){
        toastMsg('warning', 'Vui lòng nhập các thông tin công ty');
    }else{
        $.post(link, $('#form-emp-company').serialize(), function (data) {
            toastMsg('success', 'Cập nhật thông tin công ty thành công !');
        })
    }
    
}

$('#form-emp-image').on('change', function () {
    $('#form-emp-image').submit();
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