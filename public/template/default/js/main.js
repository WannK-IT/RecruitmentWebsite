$(document).ready(function () {
    $('textarea').keydown(function (e) {
        e.stopPropagation();
    });
    // owl carousel
    $('.owl-carousel').owlCarousel({
        autoplay: true,
        autoplayTimeout: 4000,
        loop: true,
        margin: 50,
        responsive:{
            0:{
                items:3
            },
            600:{
                items:4
            },
            1000:{
                items:5
            }
        }
    });

    // toggle heart icon
    $("h5 i").on('click', function () {
        $(this).toggleClass("bi-bookmark").toggleClass("bi-bookmark-check-fill colormain");
    });
});
