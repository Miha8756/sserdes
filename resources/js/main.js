$(document).ready(function() {
    $('.main-slider').slick({
        prevArrow: false,
        nextArrow: false,

        infinite: true,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true
    });

    $('.accordion-question').click(function() {
        var answer = $(this).next('.accordion-answer');
        answer.slideToggle();
        $('.accordion-answer').not(answer).slideUp();
    });
});