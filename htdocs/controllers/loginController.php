<?php

/**
 * A controller that handles login
 *
 * @author Patrick Thompson
 * @date 04/04/2019
 * @version 1.0
 */
class LoginController extends Controller {
    public static function run() {
        $title = "Login | Canalside Health Centre";
        include("views/login-view.php");
    }
}