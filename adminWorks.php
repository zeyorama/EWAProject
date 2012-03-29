<?php

  include_once 'epic.php';
  
  global $db;
  
  /*
   * TODO - Fehler im Query!!! muss noch berichtigt werden
   */
  if (isset($_POST['session'])) {
    /**
     * This section resets the session id of specified user in POST parameter 'uid'
     */
    $id = $_POST['uid'];
    $db->query("SELECT * FROM _user WHERE user_id=$id LIMIT 1;");
    $user = $db->get_next_result('User');
    
    $user->setSessionId(NULL);
    $_SESSION['user'] = NULL;
    
    header("Loaction: admin.php?user=$id");
  } else if ($_POST['admin']) {
    /**
     * This section changes the admin flag of specified user in POST parameter 'uid'
     * true ←→ false
     */
    $id = $_POST['uid'];
    $db->query("UPDATE _user SET admin={$_POST['admin']} WHERE user_id=$id;");
    
    header("Loaction: admin.php?user=$id");
  } else if ($_POST['lock']) {
    /**
     * This section unlocks or locks a specified user in POST parameter 'uid'
     * true ←→ false
     */
    $id = $_POST['uid'];
    $db->query("UPDATE _user SET locked={$_POST['lock']} WHERE user_id=$id;");
    
    header("Loaction: admin.php?user=$id");
  } else {
    /**
     * Otherwise, redirects to dashboard 
     */
    header("Location: admin.php");
  }
  
?>
