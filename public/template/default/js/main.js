$(document).ready(function () {
    // owl carousel
    $('.owl-carousel').owlCarousel({
        autoplay: true,
        autoplayTimeout: 4000,
        loop: true,
        margin: 50,
        responsive: {
            0: {
                items: 3
            },
            600: {
                items: 4
            },
            1000: {
                items: 5
            }
        }
    });

    // toggle heart icon
    $("h5 i").on('click', function () {
        $(this).toggleClass("bi-bookmark").toggleClass("bi-bookmark-check-fill colormain");
    });

    $('#form-user-image').on('change', function () {
        $('#form-user-image').submit();
    });

    $('#career_search, #city_search, #type_work_search').on('change', function () {
        $('#formSearchCareer').submit();
    });

    $('#form-upload-cv').change(function () {
        $('#form-upload-cv').submit();
    })

    $('.btnViewCV').click(function (e) {
        e.preventDefault();
        $('#modalViewCV').modal('show');
    })
    

});

function chkLogin(check) {
    if (check == 'notLogged') {
        $('#modalLogin').modal('show');
    } else {
        $('#modalApply').modal('show');
    }
}

function followJob(link, check){
    if(check == 'notLogged'){
        $('#modalLogin').modal('show');
    }else{
        $.get(link, function (data) {
            if(data == 'saved'){
                $('#btn_follow_job').html('<i class="fa-solid fa-check pe-1"></i>Hủy theo dõi');
                toastMsg('success', 'Đã theo dõi');
            }else{
                $('#btn_follow_job').text('Theo dõi');
                toastMsg('success', 'Đã hủy theo dõi');
            }
            
        }, 'json')
    }
}

function deleteCV(link) {
    Swal.fire({
        text: 'Bạn muốn xóa CV hiện tại ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Đồng ý'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = link
        }
    })
}