<?php

/**
 * A class to handle Sessions
 *
 * @author Patrick Thompson
 * @version 27/02/2019
 */
class Session {
   /**
    * Sets users session variables
    *
    * @param $username - the users name
    * @param $role - the users role
    */
   public static function setLoginSessions($username, $role) {
      $_SESSION['name'] = $username;
      $_SESSION['role'] = $role['role'];
    }

  /**
   * Checks if user is logged on
   *
   * @return boolean
   */
  public static function isLoggedIn() {
    if (isset($_SESSION['name'])) {
      return true;
    }
    return false;
  }

  /**
   * Redirect to a page dictated by the action
   *
   * @param $action - string component of URL for front controller
   */
   public static function redirect($action) {
     if (!isset($_SESSION['name'])) {
       header("Location: index.php?action=sign-in");
     } else {
       $url = "Location: index.php?action={$action}";
       header($url);
     }
   }

   /**
    * Ends users session
    */
    public static function end() {
      $_SESSION['name'] == null;
      $_SESSION['role'] == null;
      session_destroy();
    }
}

?>
