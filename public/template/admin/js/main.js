$(document).ready(function () {

  // // prevent submit by Enter key
  // $(window).keydown(function (event) {
  //   if (event.keyCode == 13) {
  //     event.preventDefault();
  //     return false;
  //   }
  // });


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