$(document).ready(function () {

    /* ----- Select2 library load select box ----- */
    $("#level, #gender, #exp, #marriage, #city, #career, #workplace, #rank, #salary, #type_work, #career_search, #city_search, #type_work_search").select2({
        theme: 'bootstrap-5',
    });

    /* ----- jQuery Validation ----- */
    // Validate form add recruitment form
    $("#form-user-register, #update-user-form, #update-profile-form, #form-apply-job").validate({
        ignore: [],
        debug: false,
        rules: {

            // add rules to validate
            profileApply: {
                required: true
            },
            user_fullname: {
                minlength: 5,
                maxlength: 100
            },
            user_email: {
                email: true
            },
            user_username: {
                alphanumeric: true
            },
            user_password: {
                minlength : 8,
                maxlength: 50
            },
            user_repassword: {
                equalTo: '#user_password'
            },
            user_phone: {
                number: true,
                rangelength: [10, 11]
            },
            hard_skl: {
                required: function () {
                    CKEDITOR.instances.hard_skl.updateElement();
                },
                minlength: 10
            },
            career_goals: {
                required: function () {
                    CKEDITOR.instances.career_goals.updateElement();
                },
                minlength: 10
            },
            exp_work: {
                required: function () {
                    CKEDITOR.instances.exp_work.updateElement();
                },
                minlength: 10
            }
            // =========================== FORM PROFILE CV ==========================

        },

        // -------- SHOW ERROR MESSAGE --------
        messages: {
            user_fullname: {
                required: 'Họ tên không được bỏ trống !',
                minlength: 'Tối thiểu 5 ký tự',
                maxlength: "Tối đa 100 ký tự",
            },
            user_email: {
                required: 'Email không được bỏ trống !',
                email: 'Email không hợp lệ !'
            },
            user_username: {
                required: 'Tên tài khoản không được bỏ trống !',
                alphanumeric: 'Tên tài khoản không được chứa ký tự đặc biệt !'
            },
            user_password: {
                required: 'Mật khẩu không được bỏ trống !',
                minlength: 'Mật khẩu phải từ 8 - 50 ký tự',
                maxlength: 'Mật khẩu phải từ 8 - 50 ký tự'
            },
            user_repassword: {
                required: 'Vui lòng nhập xác minh mật khẩu !',
                equalTo: 'Xác minh mật khẩu không khớp !'
            },
            user_phone: {
                required: 'Số điện thoại không được bỏ trống !',
                number: 'Số điện thoại không hợp lệ !',
                rangelength: 'Số điện thoại phải từ 10-11 số theo đầu số mới'
            },
            // =========================== FORM PROFILE CV ==========================
            position:{
                required: 'Vui lòng nhập vị trí cần ứng tuyển !'
            },
            level:{
                required: 'Vui lòng chọn trình độ học vấn !'
            },
            gender:{
                required: 'Vui lòng chọn giới tính !'
            },
            city: {
                required: 'Vui lòng chọn Tỉnh/Thành phố hiện tại !'
            },
            career: {
                required: 'Vui lòng chọn ngành nghề muốn ứng tuyển !'
            },
            workplace:{
                required: 'Vui lòng chọn nơi làm việc mong muốn !'
            },
            birthday:{
                required: 'Vui lòng nhập ngày sinh !'
            },
            address:{
                required: 'Vui lòng nhập địa chỉ nơi ở hiện tại !'
            },
            hard_skl:{
                required: 'Vui lòng nhập kỹ năng chuyên môn của bạn !',
                minlength: 'Tối thiểu 10 ký tự'
            },
            rank:{
                required: 'Vui lòng chọn cấp bậc muốn ứng tuyển !'
            },
            type_work:{
                required: 'Vui lòng chọn hình thức làm việc !'
            },
            career_goals:{
                required: 'Vui lòng nhập mục tiêu nghề nghiệp của bạn !',
                minlength: 'Tối thiểu 10 ký tự'
            },
            exp_work:{
                required: 'Vui lòng nhập kinh nghiệm làm việc của bạn !',
                minlength: 'Tối thiểu 10 ký tự'
            },
            profileApply:{
                required: 'Chọn hồ sơ ứng tuyển !'
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