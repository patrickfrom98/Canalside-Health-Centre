<?php

/**
 * A controller that handles the process of adding a
 * user to the system
 *
 * @author Patrick Thompson
 * @date 04/04/2019
 * @version 1.0
 */
class AddUserProcessController extends Controller {
    public static function run() {
        $username = trim($_POST['username']);
        $role = trim($_POST['role']);
        $hash = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
        Users::addUser($username, $hash); // adds user to user table
        $user = Users::findByUsername($username); // gets user from user table including user_id
        Users::setRole($user['user_id'], $role); // adds role to role table
        $_SESSION['staff_account_added'] = true;
        header("Location: index.php?action=users");
    }
}