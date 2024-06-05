$(document).ready(function() {
    $('.review-btn').click(function() {
        $('#review-modal').addClass('show');
    });

    $('.review-form').submit(function(event) {
        event.preventDefault();

        var formData = new FormData($(this)[0]);

        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                $('#review-modal').removeClass('show');
                alert('Сообщение успешно отправлено!');
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                $('#review-modal').removeClass('show');
                alert('Произошла ошибка при отправке сообщения! Пожалуйста, попробуйте еще раз.');
            }
        });
    });

});