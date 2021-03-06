$(document).ready(function () {

    /* ----- Select2 library load select box ----- */
    $("#post-career, #post-type-work, #post-address-work, #post-rank, #post-degree, #post-exp, #post-gender, #post-salary, #comp_location, #comp_size, #comp_field, #career_search, #workplace_search, #degree_search, #gender_search, #exp_search, #typework_search").select2();

    /* ----- jQuery Validation ----- */
    // Validate form add recruitment form
    $("#form-add-job, #form-emp-account, #form-emp-company, #register_form_employer, #form-add-news").validate({
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
            },

            // Validate News
            news_title:{
                required: true,
            },
            news_thumbnail:{
                extension: "png|jpeg|jpg",
            },
            news_description: {
                required: function () {
                    CKEDITOR.instances.news_description.updateElement();
                }
            },

        },

        // -------- SHOW ERROR MESSAGE --------
        messages: {
            post_position: {
                required: "Vui l??ng nh???p ch???c danh",
                minlength: "T???i thi???u 5 k?? t???",
                maxlength: "T???i ??a 200 k?? t???",

            },
            post_career: "Vui l??ng ch???n ng??nh ngh???",
            post_type_work: "Vui l??ng ch???n h??nh th???c l??m vi???c",
            post_address_work: "Vui l??ng ch???n n??i l??m vi???c",
            post_rank: "Vui l??ng ch???n c???p b???c",
            post_amount: {
                required: "Vui l??ng nh???p s??? l?????ng tuy???n d???ng",
                number: "Ch??? ???????c nh???p s???",
                min: "S??? l?????ng t???i thi???u l?? 1",
                max: "S??? l?????ng t???i ??a 1000"
            },
            post_expired: "Vui l??ng ch???n h???n n???p h??? s??",
            post_test_work: {
                maxlength: "T???i ??a 100 k?? t???"
            },

            post_work_description: {
                required: "Vui l??ng nh???p m?? t??? c??ng vi???c",
                minlength: "Vui l??ng nh???p t???i thi???u 20 k?? t???"
            },
            post_work_required: {
                required: "Vui l??ng nh???p y??u c???u c??ng vi???c",
                minlength: "Vui l??ng nh???p t???i thi???u 20 k?? t???"
            },
            post_work_benefit: {
                required: "Vui l??ng nh???p quy???n l???i c???a ???ng vi??n",
                minlength: "Vui l??ng nh???p t???i thi???u 20 k?? t???"
            },
            post_work_apply: {
                required: "Vui l??ng nh???p c??ch th???c ???ng tuy???n",
                minlength: "Vui l??ng nh???p t???i thi???u 20 k?? t???"
            },


            emp_fullname: {
                required: "Vui l??ng nh???p h??? t??n",
                minlength: "T???i thi???u 5 k?? t???",
                maxlength: "T???i ??a 100 k?? t???",

            },
            emp_email: {
                required: "Vui l??ng nh???p email",
                email: "Sai ?????nh d???ng email",
                maxlength: "T???i ??a 100 k?? t???"
            },
            emp_phone: {
                required: "Vui l??ng nh???p s??? ??i???n tho???i",
                number: "Ch??? ???????c nh???p s???",
                rangelength: "S??? ??i???n tho???i ph???i t??? 10-11 s??? theo ?????u s??? m???i",
            },
            emp_address: {
                required: "Vui l??ng nh???p ?????a ch??? li??n h???",
                minlength: "T???i thi???u 5 k?? t???",
                maxlength: "T???i ??a 200 k?? t???"
            },
            emp_user:{
                required: "Vui l??ng nh???p t??n t??i kho???n Nh?? tuy???n d???ng"
            },
            emp_password:{
                required: "Vui l??ng nh???p m???t kh???u Nh?? tuy???n d???ng"
            },


            comp_name: {
                required : "Vui l??ng nh???p t??n c??ng ty"
            },
            comp_tax_id: {
                required : "Vui l??ng nh???p m?? s??? thu???"
            },
            comp_size: {
                required : "Vui l??ng ch???n quy m?? nh??n s???"
            },
            comp_location: {
                required : "Vui l??ng nh???p ?????a ??i???m c??ng ty. Vd: TPHCM, H?? N???i, ... "
            },
            comp_address: {
                required : "Vui l??ng nh???p ?????a ch??? c??ng ty. Vd: S??? 3x, ???????ng A, TPHCM, ... "
            },
            comp_field: {
                required : "Vui l??ng ch???n l??nh v???c ho???t ?????ng"
            },
            comp_size: {
                required : "Vui l??ng ch???n quy m?? nh??n s???"
            },
            comp_tax_id: {
                number: "MST ch???a k?? t??? kh??ng h???p l??? !"
            },
            comp_website: {
                required : "Vui l??ng nh???p t??n website c??ng ty !"
            },
            comp_email: {
                required: "Vui l??ng nh???p email c??ng ty !",
                email: 'Sai ?????nh d???ng email !'
            },

            news_title:{
                required: "Vui l??ng nh???p ti??u ????? tin t???c !"
            },
            news_thumbnail:{
                extension: "???nh thumbnail kh??ng ????ng ?????nh d???ng !<br>?????nh d???ng ???nh h???p l???: png | jpeg | jpg !"
            },
            news_description:{
                required: "Vui l??ng nh???p n???i dung tin t???c !"
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