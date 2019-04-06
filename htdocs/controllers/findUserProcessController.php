<?php

/**
 * Created by PhpStorm.
 * User: patri
 * Date: 04/04/2019
 * Time: 20:14
 */

class FindUserProcessController extends Controller {
    public static function run() {
        $username = trim($_POST['username']);
        $user = Users::findByUsername($username);
        $title = "Users | Canalside Health Centre";
        include("views/users-view.php");
    }
}