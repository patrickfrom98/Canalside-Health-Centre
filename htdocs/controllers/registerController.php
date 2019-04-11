<?php

/**
 * A controller that handles the patient
 * registration/unregistration page
 *
 * @author Patrick Thompson
 * @date 04/04/2019
 * @version 1.0
 */
class RegisterController extends Controller {
    public static function run() {
        $notify = false;
        if (isset($_GET['registered'])) { $notify = true; }
        $title = "Register Patient | Canalside Health Centre";
        $id = PatientID::generate();
        while (!Patients::isValidId($id)) {
            $id = PatientID::generate();
        }
        include("views/register-view.php");
    }
}