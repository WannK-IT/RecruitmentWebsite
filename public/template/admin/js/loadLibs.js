$(document).ready(function () {

    /* ----- Select2 library load select box ----- */
    $("#post-career, #post-type-work, #post-address-work, #post-rank, #post-degree, #post-exp, #post-gender, #post-salary, #comp_location, #comp_size, #comp_field, #career_search, #workplace_search, #degree_search, #gender_search, #exp_search").select2();

    /* ----- jQuery Validation ----- */
    // Validate form add recruitment form
    $("#form-add-job, #form-emp-account, #form-emp-company, #register_form_employer").validate({
        ignore: [],
        debug: false,
        rules: {
            // add rules to validate
            post_position: {
                minlength: 5,
                maxlength: 200,
            },
            post_amount: {
                number: true,
                min: 1,
                max: 1000
            },
            post_test_work: {
                maxlength: 100
            },

            post_work_description: {
                required: function () {
                    CKEDITOR.instances.post_work_description.updateElement();
                }
            },
            post_work_required: {
                required: function () {
                    CKEDITOR.instances.post_work_required.updateElement();
                }
            },
            post_work_benefit: {
                required: function () {
                    CKEDITOR.instances.post_work_benefit.updateElement();
                }
            },
            post_work_apply: {
                required: function () {
                    CKEDITOR.instances.post_work_apply.updateElement();
                }
            },

            
            // Validate if error
            emp_fullname: {
                minlength: 5,
                maxlength: 100,

            },
            emp_email: {
                maxlength: 100,
                email: true
            },
            emp_phone: {
                number: true,
                rangelength: [10, 11]
            },
            emp_address: {
                minlength: 5,
                maxlength: 200
            },
            comp_tax_id: {
                number: true,
            },
            comp_email: {
                email: true,
            }

        },

        // -------- SHOW ERROR MESSAGE --------
        messages: {
            post_position: {
                required: "Vui lòng nhập chức danh",
                minlength: "Tối thiểu 5 ký tự",
                maxlength: "Tối đa 200 ký tự",

            },
            post_career: "Vui lòng chọn ngành nghề",
            post_type_work: "Vui lòng chọn hình thức làm việc",
            post_address_work: "Vui lòng chọn nơi làm việc",
            post_rank: "Vui lòng chọn cấp bậc",
            post_amount: {
                required: "Vui lòng nhập số lượng tuyển dụng",
                number: "Chỉ được nhập số",
                min: "Số lượng tối thiểu là 1",
                max: "Số lượng tối đa 1000"
            },
            post_expired: "Vui lòng chọn hạn nộp hồ sơ",
            post_test_work: {
                maxlength: "Tối đa 100 ký tự"
            },

            post_work_description: {
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


            emp_fullname: {
                required: "Vui lòng nhập họ tên",
                minlength: "Tối thiểu 5 ký tự",
                maxlength: "Tối đa 100 ký tự",

            },
            emp_email: {
                required: "Vui lòng nhập email",
                email: "Sai định dạng email",
                maxlength: "Tối đa 100 ký tự"
            },
            emp_phone: {
                required: "Vui lòng nhập số điện thoại",
                number: "Chỉ được nhập số",
                rangelength: "Số điện thoại phải từ 10-11 số theo đầu số mới",
            },
            emp_address: {
                required: "Vui lòng nhập địa chỉ liên hệ",
                minlength: "Tối thiểu 5 ký tự",
                maxlength: "Tối đa 200 ký tự"
            },
            emp_user:{
                required: "Vui lòng nhập tên tài khoản Nhà tuyển dụng"
            },
            emp_password:{
                required: "Vui lòng nhập mật khẩu Nhà tuyển dụng"
            },


            comp_name: {
                required : "Vui lòng nhập tên công ty"
            },
            comp_tax_id: {
                required : "Vui lòng nhập mã số thuế"
            },
            comp_size: {
                required : "Vui lòng chọn quy mô nhân sự"
            },
            comp_location: {
                required : "Vui lòng nhập địa điểm công ty. Vd: TPHCM, Hà Nội, ... "
            },
            comp_address: {
                required : "Vui lòng nhập địa chỉ công ty. Vd: Số 3x, Đường A, TPHCM, ... "
            },
            comp_field: {
                required : "Vui lòng chọn lĩnh vực hoạt động"
            },
            comp_size: {
                required : "Vui lòng chọn quy mô nhân sự"
            },
            comp_tax_id: {
                number: "MST chứa kí tự không hợp lệ !"
            },
            comp_website: {
                required : "Vui lòng nhập tên website công ty"
            },
            comp_email: {
                required: "Vui lòng nhập email công ty",
                email: 'Sai định dạng email !'
            }
        },

        // Method Error
        errorElement: "span",
        errorClass: 'error',
        errorPlacement: function (error, element) {
            error.insertAfter(element.parent("div"));
        },
    });

});