$(document).ready(function(){$(".review-btn").click(function(){$("#review-modal").addClass("show")}),$(".review-form").submit(function(t){t.preventDefault();var o=new FormData($(this)[0]);$.ajax({url:$(this).attr("action"),type:$(this).attr("method"),data:o,processData:!1,contentType:!1,success:function(e){console.log(e),$("#review-modal").removeClass("show"),alert("Сообщение успешно отправлено!")},error:function(e,r,a){console.error(e.responseText),$("#review-modal").removeClass("show"),alert("Произошла ошибка при отправке сообщения! Пожалуйста, попробуйте еще раз.")}})})});