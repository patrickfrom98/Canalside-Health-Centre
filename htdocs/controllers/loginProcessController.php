<?php

/**
 * A controller that handles the login process
 *
 * @author Patrick Thompson
 * @date 04/04/2019
 * @version 1.0
 */
class LoginProcessController extends Controller {
    public static function run() {
        $errorMsg = false;
        $user = Users::findByUsername($_POST['username']);
        if (isset($user)) { // if user found
            if (password_verify(trim($_POST['password']), $user['password'])) { // check passwords match
                $role = Users::getRole($user['user_id']);
                Session::setLoginSessions($user['username'], $role);
                header("Location: index.php?action=home");
            } else {
                $errorMsg = true;
                include "views/login-view.php";
            }
        } else {
            $errorMsg = true;
            include "views/login-view.php";
        }
    }
}