$(document).ready(function() {
    $('.contacts-form').submit(function(e) {
        e.preventDefault();

        var formData = $(this).serialize();
        var formAction = $(this).attr('action');

        $.ajax({
            url: formAction,
            method: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    alert('Письмо успешно отправлено!');
                } else {
                    alert('Не удалось отправить электронное письмо.');
                }
            },
            error: function(xhr, status, error) {
                alert('Не удалось отправить электронное письмо. Пожалуйста, повторите попытку позже.');
            }
        });
    });
});