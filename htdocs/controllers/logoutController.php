<?php

/**
 * A controller that handles the process of
 * logging out
 *
 * @author Patrick Thompson
 * @date 04/04/2019
 * @version 1.0
 */
class LogoutController extends Controller {
    public static function run() {
        $_SESSION['name'] = null;
        $_SESSION['role'] = null;
        session_destroy();
        $title = "Sign In | Canalside Health Centre";
        header("Location: index.php?action=login");
    }
}