<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])){

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
      $_SESSION["patroninfo"]["role"]=$role;
      $_SESSION["patroninfo"]["email"]=$ldapinfo[0]["mail"][0];
      $_SESSION["patroninfo"]["lastname"]=$ldapinfo[0]["sn"][0];
      $_SESSION["patroninfo"]["firstname"]=$ldapinfo[0]["givenname"][0];
      $_SESSION["patroninfo"]["ldaprole"]=$ldapinfo[0]["lclarkstatus"][0];

      // For students
      if ($role == 'student'){
        $_SESSION["patroninfo"]["major"]=$ldapinfo[0]["lclarkmajor"][0];
        foreach ($ldapinfo[0]["lclarkadvisor"] as $advisor){
          $_SESSION["patroninfo"]["advisors"][$advisor];
        }
      }

      // For faculty
      if ($role == 'faculty'){
        $_SESSION["patroninfo"]["major"]=$ldapinfo[0]["lclarkmajor"][0];
      }

      // For staff
      if ($role == 'staff'){
        $_SESSION["patroninfo"]["title"]=$ldapinfo[0]["title"][0];
        $_SESSION["patroninfo"]["department"]=$ldapinfo[0]["departmentnumber"][0];
      }

      $result = array();
      $result['success'] = true;
      $result['msg'] = 'Welcome, '.$_SESSION["patroninfo"]["firstname"].' '.$_SESSION["patroninfo"]["lastname"].'!';
      $result['role'] = $role;
      echo json_encode($result);
      @ldap_close($ldap);

    } else {
      $result = array();
      $result['success'] = false;
      $result['msg'] = 'Invalid username / password.';
      $result['role'] = $role;
      echo json_encode($result);
    }

}
?>
