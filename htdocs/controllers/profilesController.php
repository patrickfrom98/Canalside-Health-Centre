<?php

/**
 * A controller that handles the profiles page
 *
 * @author Patrick Thompson
 * @date 04/04/2019
 * @version 1.0
 */
class ProfilesController extends Controller {
    public static function run() {
        $allPatients = Patients::findAll();
        include "views/profiles-view.php";
    }
}