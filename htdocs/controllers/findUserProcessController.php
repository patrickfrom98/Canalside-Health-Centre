<?php

class FindUserProcessController extends Controller {
    public static function run() {
        $username = trim($_POST['username']);
        $user = Users::findByUsername($username);
        $title = "Users | Canalside Health Centre";
        include("views/users-view.php");
    }
}