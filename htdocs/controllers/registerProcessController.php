<?php

/**
 * A controller that handles the patient
 * registration process
 *
 * @author Patrick Thompson
 * @date 04/04/2019
 * @version 1.0
 */
class RegisterProcessController extends Controller {
    public static function run() {
        if (isset($_POST['register'])) {
            Patients::addDetails($_POST['patient_id'], $_POST['title'], $_POST['gender'], $_POST['forename'], $_POST['surname']);
            Patients::addContact($_POST['patient_id'], $_POST['mobile'], $_POST['landline'], $_POST['email']);
            Patients::addAddress($_POST['patient_id'], $_POST['address_1'], $_POST['address_2'], $_POST['town'], $_POST['county'], $_POST['postcode']);
            header("Location: index.php?action=register&registered=true");
        } else {
            header("Location: index.php?action=register");
        }
    }
}