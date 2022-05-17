// delete Ajax
function ajaxDelete(link) {
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
            )
        }
    })
}

// show total Posts
function totalPost(link) {
    $.get(link, function (data) {
        let totalRows = countRowData(data)
        $('#totalPostRow .inner').find('h3').append(totalRows);
    })
}

function countRowData(data) {
    return $(data).find('#form-table-post tbody tr').length;
}

totalPost('index.php?module=admin&controller=post&action=index');

// ajax Status
function ajaxStatus(link) {
    $.get(link, function (data) {
        let anchorTag = 'a#status-post-' + data[0];
        let classActive = 'fa-check text-success';
        let classInactive = 'fa-minus text-danger';
        if (data[1] == 'active') {
            classInactive = 'fa-check text-success';
            classActive = 'fa-minus text-danger';
        }
        $(anchorTag).attr('href', "javascript:ajaxStatus('" + data[2] + "')");
        $(anchorTag + ' span').removeClass(classActive).addClass(classInactive);
        Toast.fire({
            icon: 'success',
            title: 'Trạng thái đã được thay đổi !'
        })
    }, 'json')
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
                    toastMsg('error', 'Tên tài khoản và mật khẩu chưa đúng !');
                }else{
                    location.href = direct;
                }
            }
        })
    }

}

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