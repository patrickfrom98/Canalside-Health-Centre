<?php

/**
 * A controller that handles signup
 *
 * @author Patrick Thompson
 * @date 04/04/2019
 * @version 1.0
 */
class SignupController extends Controller {
    public static function run() {
        $title = "Signup | Canalside Health Centre";
        include("views/signup-view.php");
    }
}