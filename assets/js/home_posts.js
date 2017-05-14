$(document).ready(function(){

  $("#create_post").submit(function(event){
    event.preventDefault();
    var form = this,
        formData = new FormData($(form)[0]);

    $.ajax({
      url: "home_posts/create",
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