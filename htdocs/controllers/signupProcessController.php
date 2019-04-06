<?php

/**
 * A controller that handles the signup process
 *
 * @author Patrick Thompson
 * @date 04/04/2019
 * @version 1.0
 */
class SignupProcessController extends Controller {
    public static function run() {
        $patient = Patients::findByPatientId(trim($_POST['patient_id']));
        if ($patient->getPatientId() !== "") { // there is a patient with that valid ID
            if ($patient->getUserId() === "") { // user hasn't signed up already
                $username = trim($_POST['username']);
                $password = trim($_POST['password']);
                $hash = password_hash($password, PASSWORD_DEFAULT);
                Users::addUser($username, $hash); // adds user to user table
                $user = Users::findByUsername($username); // gets user from user table including user_id
                Users::setRole($user['user_id'], "Patient"); // adds role to role table
                Users::connectToPatient($user['user_id'], $patient->getPatientId()); // Adds user_id to patient in patient table - connects user/patient
                $_SESSION['patient_signup'] = true;
                header("Location: index.php?action=signup");
            } else {
                $_SESSION['patient_signed_up'] = true;
                header("Location: index.php?action=signup");
            }
        } else {
            $_SESSION['patient_not_found'] = true;
            header("Location: index.php?action=signup");
        }
        $title = "Sign In | Canalside Health Centre";
        include("views/login-view.php");
    }
}