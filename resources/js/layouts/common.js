$(document).ready(function() {
    $('.modal-close').on('click', function(e) {
        $(this).closest('.modal-overflow').removeClass('show');
    });
});