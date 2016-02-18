$( document ).ready(function() {

  // Login modal
  $('#loginModal').on('shown.bs.modal', function (event) {

    if ($('.alert-danger').length){ // get rid of previous error messages in this modal if any are lurking - clean slate!
      $('.alert-danger').remove();
    }

    var button = $(event.relatedTarget); // Find the button that triggered the modal
    var role = button.data('role'); // Extract info about what kind of patron logged in from button's data-* attribute
    $('#username').focus(); // Move the cursor to the first field automatically

    var checkAuth = function(role,username,password){
      $.post("auth.php", { role:role, username:username, password:password },
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
    }

    // Make the submit button trigger a POST request to authenticate with LDAP
    $('#loginbtn').click({role:role},function(){
      username = $('#username').val();
      password = $('#password').val();
      checkAuth(role,username,password);
    });

    // Also bind the enter key to do the same thing
    $("input").keypress({role:role},function(event) {
      if (event.which == 13){
        username = $('#username').val();
        password = $('#password').val();
        checkAuth(role,username,password);
      }
    });

  });

  // Logout function
  $('#logoutbtn').click(function(){
    $.post("auth.php", { logout:true }, function(){
      window.location.assign("welcome.php");
    });
  });
});
