$(document).ready(function () {
    $(".btn-delete").click(function () {
        return confirm("Bạn có chắc chắn muốn xóa dữ liệu này ?");
    });

    // create search input field by select2 library
    $("#post-career").select2({
        dropdownCssClass: "fs-input"
    });
    $("#post-type-work").select2({
        dropdownCssClass: "fs-input"
    });
    $("#post-address-work").select2({
        dropdownCssClass: "fs-input"
    });
    $("#post-level").select2({
        dropdownCssClass: "fs-input"
    });
    $("#post-degree").select2({
        dropdownCssClass: "fs-input"
    });
    $("#post-exp").select2({
        dropdownCssClass: "fs-input"
    });
    $("#post-gender").select2({
        dropdownCssClass: "fs-input"
    });
    $("#post-salary").select2({
        dropdownCssClass: "fs-input"
    });

    // jQueryUI datepicker
    $("#post-expired").datepicker({
        dateFormat: 'dd/mm/yy'
    });

    //ckeditor 4.18.0
    CKEDITOR.replace('post-description');
    CKEDITOR.replace('post-work-required');
    CKEDITOR.replace('post-work-benefit');
    CKEDITOR.replace('post-work-apply');

    // Button add more phone
    $("#add-more-phone").show();
    var max_append_phone = 3;
    var start = 1;
    $(document).on('click', '#add-more-phone', function (e) {
       
        let html = "";
        if (start < max_append_phone) {
            
            start ++;
            html += '<div id="form-append-phone" class="input-group my-2">';
            html += '<input type="text" class="form-control fs-input border-right-0 border" autocomplete="off" id="post-contact-phone" placeholder="Vui lòng nhập">';
            html += '<span class="input-group-append">';
            html += '<button type="button" class="input-group-text bg-transparent" id="remove-phone">';
            html += '<i class="fas fa-times"></i>';
            html += '</button></span></div>';
            html += '';
            $(".append-phone").append(html);
        }else{
               alert("Chỉ được thêm tối đa 2 số điện thoại !");
               e.preventDefault();
        }
    });

    // Button remove phone
    $(document).on('click', '#remove-phone', function () {
        $(this).closest('#form-append-phone').remove();
        start --;
    });
    
});