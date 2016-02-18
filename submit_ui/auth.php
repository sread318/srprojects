<?php

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])){

    // Login code

    session_start();

    $ldap = ldap_connect("ldap.lclark.edu");
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $ldaprdn = "uid=$username,ou=People,o=lclark.edu,dc=lclark,dc=edu";

    ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

    $bind = ldap_bind($ldap, $ldaprdn, $password);

    if ($bind) {
      $result=ldap_read($ldap, "uid=$username,ou=People,o=lclark.edu,dc=lclark,dc=edu", "objectClass=*");
      $ldapinfo=ldap_get_entries($ldap,$result);

      // Put info from LDAP into $_SESSION variable for later use

      // Basic information
      $_SESSION["patroninfo"]["username"]=$username;
      $_SESSION["patroninfo"]["role"]=$role; // this role is only tied to which button the patron clicked in the welcome portal
      $_SESSION["patroninfo"]["email"]=$ldapinfo[0]["mail"][0];
      $_SESSION["patroninfo"]["lastname"]=$ldapinfo[0]["sn"][0];
      $_SESSION["patroninfo"]["firstname"]=$ldapinfo[0]["givenname"][0];
      $_SESSION["patroninfo"]["ldaprole"]=$ldapinfo[0]["lclarkstatus"][0]; // note that this is derived from LDAP, not the button

      // Role-specific information
      switch ($role){

        case 'student':
          $_SESSION["patroninfo"]["major"]=$ldapinfo[0]["lclarkmajor"][0];
          foreach ($ldapinfo[0]["lclarkadvisor"] as $advisor){ // LDAP should give us a full list of every advisor for students
            $_SESSION["patroninfo"]["advisors"][$advisor];
          }
          break;

        case 'faculty':
          $_SESSION["patroninfo"]["department"]=$ldapinfo[0]["departmentnumber"][0];
          break;

        case 'staff':
          $_SESSION["patroninfo"]["title"]=$ldapinfo[0]["title"][0];
          $_SESSION["patroninfo"]["department"]=$ldapinfo[0]["departmentnumber"][0];
          break;

        case default:
          break;
      }

      /*

      // For students
      if ($role == 'student'){
        $_SESSION["patroninfo"]["major"]=$ldapinfo[0]["lclarkmajor"][0];
        foreach ($ldapinfo[0]["lclarkadvisor"] as $advisor){
          $_SESSION["patroninfo"]["advisors"][$advisor];
        }
      }

      // For faculty
      if ($role == 'faculty'){
        $_SESSION["patroninfo"]["department"]=$ldapinfo[0]["departmentnumber"][0];
      }

      // For staff
      if ($role == 'staff'){
        $_SESSION["patroninfo"]["title"]=$ldapinfo[0]["title"][0];
        $_SESSION["patroninfo"]["department"]=$ldapinfo[0]["departmentnumber"][0];
      }

      */

      // notify that the authentication succeeded and close the LDAP connection

      $result = array();
      $result['success'] = true;
      $result['msg'] = 'Welcome, '.$_SESSION["patroninfo"]["firstname"].' '.$_SESSION["patroninfo"]["lastname"].'!';
      $result['role'] = $role;
      echo json_encode($result); // necessary to pass multiple parameters back to our javascript
      @ldap_close($ldap);

    }
    else { // tell the user to retry the authentication
      $result = array();
      $result['success'] = false;
      $result['msg'] = 'Invalid username / password.';
      $result['role'] = $role;
      echo json_encode($result); // don't close LDAP connection until we succeed
    }

}
else if ($_POST['logout'] == true){

  // Logout code taken from https://secure.php.net/session_destroy

  // Initialize the session.
  // If you are using session_name("something"), don't forget it now!
  session_start();

  // Unset all of the session variables.
  $_SESSION = array();

  // If it's desired to kill the session, also delete the session cookie.
  // Note: This will destroy the session, and not just the session data!
  if (ini_get("session.use_cookies")) {
      $params = session_get_cookie_params();
      setcookie(session_name(), '', time() - 42000,
          $params["path"], $params["domain"],
          $params["secure"], $params["httponly"]
      );
  }

  // Finally, destroy the session.
  session_destroy();
}
?>
