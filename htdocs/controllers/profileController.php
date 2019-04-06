<?php

/**
 * A controller that handles the profile page
 *
 * @author Patrick Thompson
 * @date 04/04/2019
 * @version 1.0
 */
class ProfileController extends Controller {
    public static function run() {
        if (isset($_GET['pid'])) {
            $pid = $_GET['pid'];
            $profile = Patients::getProfile($pid);
        }
        include "views/profile-view.php";
    }
}