$(document).ready(function(){$(".main-slider").slick({prevArrow:!1,nextArrow:!1,infinite:!0,speed:300,slidesToShow:1,adaptiveHeight:!0}),$(".accordion-question").click(function(){var e=$(this).next(".accordion-answer");e.slideToggle(),$(".accordion-answer").not(e).slideUp()})});
