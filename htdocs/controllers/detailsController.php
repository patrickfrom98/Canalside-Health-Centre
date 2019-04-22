<?php

/**
 * A controller that handles the details page
 *
 * @author Patrick Thompson
 * @date 22/04/2019
 * @version 1.0
 */
class DetailsController extends Controller {
    public static function run() {
        $user = Users::findByUsername($_SESSION['name']);
        $patient = Patients::findByUserId($user['user_id']);
        $profile = Patients::getProfile($patient['patient_id']);
        include "views/details-view.php";
    }
}