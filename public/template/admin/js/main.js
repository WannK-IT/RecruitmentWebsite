$(document).ready(function () {

  // prevent submit by Enter key
  $(window).keydown(function (event) {
    if (event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });

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

  $('.btn_avatar_emp').click(function(){
    $('#form-emp-account').submit();
  })
    
  


  // Disable past days in input[type=date]
  var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0');
  var yyyy = today.getFullYear();

  today = yyyy + '-' + mm + '-' + dd;
  $('#post-expired').attr('min', today);

  // Check if validate success => submit form
  $("#submit_post").click(function (e) {
    if ($("#form-add-job").valid()) {
      $("#form-add-job").submit();

    } else {
      e.preventDefault();
    }
  });


});