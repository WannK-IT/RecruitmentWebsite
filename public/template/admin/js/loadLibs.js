$(document).ready(function () {
    /* ----- Ckeditor 4.18.0 ----- */
    CKEDITOR.replace('post_description');
    CKEDITOR.replace('post_work_required');
    CKEDITOR.replace('post_work_benefit');
    CKEDITOR.replace('post_work_apply');

    /* ----- Select2 library load select box ----- */
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

    /* ----- jQuery Validation ----- */
    // Validate form add recruitment form
    $("#form-add-job").validate({
        ignore: [],
        debug: false,
        rules: {
            post_position: {
                required: true,
                minlength: 5,
                lettersonly: true
            },
            post_amount: {
                required: true,
                number: true,
                min: 1,
                max: 1000
            },
            post_description: {
                required: function(){
                    CKEDITOR.instances.post_description.updateElement();
                }
            },
            post_work_required: {
                required: function(){
                    CKEDITOR.instances.post_work_required.updateElement();
                }
            },
            post_work_benefit: {
                required: function(){
                    CKEDITOR.instances.post_work_benefit.updateElement();
                }
            },
            post_work_apply: {
                required: function(){
                    CKEDITOR.instances.post_work_apply.updateElement();
                }
            },
            post_contact_name: {
                required: true,
                minlength: 5,
                lettersonly: true
            },
            post_contact_email: {
                required: true,
                email: true
            },
            post_contact_phone: {
                required: true,
                number: true,
                rangelength: [10, 11]
            },
            post_contact_address: {
                required: true,
                minlength: 5,
            }
            
        },
        
        messages: {
            post_position: {
                required: "Vui lòng nhập chức danh",
                minlength: "Tối thiểu 5 ký tự",
                lettersonly: "Chức danh không được chứa ký tự đặc biệt"
            },
            post_career: "Vui lòng chọn ngành nghề",
            post_type_work: "Vui lòng chọn hình thức làm việc",
            post_address_work: "Vui lòng chọn nơi làm việc",
            post_level: "Vui lòng chọn cấp bậc",
            post_amount: {
                required: "Vui lòng nhập số lượng tuyển dụng",
                number: "Chỉ được nhập số",
                min: "Vui lòng nhập số lượng lớn hơn 0",
                max: "Vui lòng nhập số lượng nhỏ hơn 1000"
            },
            post_expired: "Vui lòng chọn hạn nộp hồ sơ",

            post_description: {
                required: "Vui lòng nhập mô tả công việc",
                minlength: "Vui lòng nhập tối thiểu 50 ký tự"
            },
            post_work_required: {
                required: "Vui lòng nhập yêu cầu công việc",
                minlength: "Vui lòng nhập tối thiểu 50 ký tự"
            },
            post_work_benefit: {
                required: "Vui lòng nhập quyền lợi của ứng viên",
                minlength: "Vui lòng nhập tối thiểu 50 ký tự"
            },
            post_work_apply: {
                required: "Vui lòng nhập cách thức ứng tuyển",
                minlength: "Vui lòng nhập tối thiểu 50 ký tự"
            },

            post_contact_name: {
                required: "Vui lòng nhập họ tên",
                minlength: "Tối thiểu 5 ký tự",
                lettersonly: "Họ tên không được chứa ký tự đặc biệt"
            },
            post_contact_email: {
                required: "Vui lòng nhập email",
                email: "Sai định dạng email"
            },
            post_contact_phone: {
                required: "Vui lòng nhập số điện thoại",
                number: "Chỉ được nhập số",
                rangelength: "Số điện thoại phải từ 10-11 số theo đầu số mới",
            },
            post_contact_address: {
                required: "Vui lòng nhập địa chỉ liên hệ",
                minlength: "Tối thiểu 5 ký tự"
            }
        },

        // Method Error
        errorElement: "span",
        errorClass: 'error',
        errorPlacement: function (error, element) {
            error.insertAfter(element.parent("div"));
        },
    });

    // Check if validate success => submit form
    $("#submit_post").click( function() {
        if($("#form-add-job").valid()){
            $("#form-add-job").submit();
        }
    });

});