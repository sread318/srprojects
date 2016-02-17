$( document ).ready(function() {

  // Login modal
  $('#loginModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Find the button that triggered the modal
    var role = button.data('role'); // Extract info about what kind of patron logged in from button's data-* attribute
    $('#username').focus(); // Move the cursor to the first field automatically

    // Make the submit button trigger a POST request to authenticate with LDAP
    $('#loginbtn').click({role:role},function(e){
      username = $('#username').val();
      password = $('#password').val();
      $.post("auth.php", { role:e.data.role, username:username, password:password },
        function(json){
          result = $.parseJSON(json);
          if (result.success == true){

            switch(result.role){
              case "student":
                url = "submit.php";
                break;
              case "faculty":
                url = "review.php";
                break;
              case "staff":
                url = "admin.php";
                break;
              default:
                url = "welcome.php";
                break;
            }
            window.location.assign(url);

          }
          else if (!$('.alert-danger').length){
            $('.modal-body').prepend("<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span><span class='sr-only'>Error: incorrect login </span> "+result.msg+"</div>");
          }
        });
    });
  });

});
