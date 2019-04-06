<?php

/**
 * A controller that handles the users page
 *
 * @author Patrick Thompson
 * @date 04/04/2019
 * @version 1.0
 */
class UsersController extends Controller {
    public static function run() {
        $title = "Users | Canalside Health Centre";
        include("views/users-view.php");
    }
}