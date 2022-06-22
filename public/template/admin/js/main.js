$(document).ready(function () {

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

  $('#career_search, #workplace_search, #degree_search, #gender_search, #exp_search, #typework_search').on('change',function () {
    $('#formSearch').submit();
  })

  $('.btnViewCV').click(function (e) {
    e.preventDefault();
    $('#modalViewCV').modal('show');
  })

  $('#btnContactMail').click(function (e) {
    e.preventDefault();
    $('#modalContact').modal('show');
  })

  $('input[name=btnUpdateStatusProfile]').click(function(e){
    if(!$('input[name=statusApply]').is(':checked')){
      e.preventDefault();
      toastMsg('warning', 'Vui lòng chọn trạng thái !')
    }else{
      $('#form-update-status-profile').submit();
    }
  })

  $('#btnContact_candidate').click(function(e){
    e.preventDefault();
    let textareaData = CKEDITOR.instances.contactEmail.getData();
    if(!textareaData || !$('#titleEmail').val()){
      toastMsg('warning', 'Vui lòng nhập tiêu đề và nội dung liên hệ');
    }else{
      $('body').css('pointer-events', 'none');
      $('#modalContact').modal('hide');
      $('#modalSpinner').modal('show');
      $('#form_contact_candidate').submit();
    }
  })

});

function updateStatusProfile(applyID) {
  $('#modalUpdateStatus input[name=apply_id]').attr('value', applyID);
  let link = 'index.php?module=admin&controller=candidate&action=updateStatusApplyAjax&idApply=' + applyID;

  // let valStatusRadio = $('input[name=statusApply]').attr('value');
  let elementTextArea = $('textarea#introduction');
  let elementRadio = $('input[name=statusApply]');
  
  $.post(link, function (data) {
    elementRadio.attr('data-name', data['action']);
    elementTextArea.val(data['introduction']);
  }, 'json')

  $('#modalUpdateStatus').modal('show');
}
