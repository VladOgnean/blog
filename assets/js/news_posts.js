$(document).ready(function(){

  $("#create_news_post").submit(function(event){
    event.preventDefault();
    var form = this,
        formData = new FormData($(form)[0]);

    $.ajax({
      url: "news_posts/create",
      method: "POST",
      async: false,
      cache: false,
      contentType: false,
      processData: false,
      data: formData,
      success: function(data) {
        $('#ajax_response').prepend(data);
        form.reset();
      }
    });
  });
});