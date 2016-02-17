$( document ).ready(function() {

  // Login modal
  $('#loginModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var role = button.data('role'); // Extract info from data-* attribute

    // Make the submit button trigger an AJAX request to update the database with the new data.
    $('#loginbtn').click({role:role},function(e){
      username = $('#username').val();
      password = $('#password').val();
      $.post("auth.php", { role:e.data.role, username:username, password:password },
        function(data){
            $('.modal-body').html(data); // Display the success or error message
        });
    });
  });

});
