$(document).ready(function () {
    $(".btn-delete").click(function () {
        return confirm("Bạn có chắc chắn muốn xóa dữ liệu này ?");
    });
    
    // Button add more phone
    $("#add-more-phone").show();
    var max_append_phone = 3;
    var start = 1;
    $(document).on('click', '#add-more-phone', function (e) {

        let html = "";
        if (start < max_append_phone) {
            start+=1;
            html += '<div id="form-append-phone" class="input-group my-2">';
            html += '<input type="text" class="form-control fs-input border-right-0 border" autocomplete="off" id="post-contact-phone' + start + '" name="post_contact_phone' + start + '" placeholder="Vui lòng nhập">';
            html += '<span class="input-group-append">';
            html += '<button type="button" class="input-group-text bg-transparent" id="remove-phone">';
            html += '<i class="fas fa-times"></i>';
            html += '</button></span></div>';
            html += '';
            
            $(".append-phone").append(html);
        } else {
            alert("Chỉ được thêm tối đa 2 số điện thoại !");
            e.preventDefault();
        }
    });

    // Button remove phone
    $(document).on('click', '#remove-phone', function () {
        $(this).closest('#form-append-phone').remove();
        start-=1;
    });

    // Disable past days in input[type=date]
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    $('#post-expired').attr('min', today);

});