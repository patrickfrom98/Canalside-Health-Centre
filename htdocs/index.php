<?php

session_start();

require_once("databases/DB.php");
require_once("models/Patients.php");
require_once("models/Users.php");
require_once("models/Diaries.php");
require_once("models/Session.php");
require_once("classes/Diary.php");
require_once("classes/Appointment.php");
require_once("classes/Patient.php");
require_once("classes/Address.php");
require_once("classes/Contact.php");
require_once("classes/Profile.php");

/**
 * Get the current action
 */
if (isset($_GET["action"])) {
    $action = $_GET['action'];
} else {
    $action = "login";
}

/**
 * Control code depends on action
 */
if ($action === "login") {
    $title = "Login | Canalside Health Centre";
    include("views/login-view.php");
} else if ($action === "login-process") {
    $errorMsg = false;
    $user = Users::findByUsername($_POST['username']);
    if (isset($user)) { // if user found
        if (password_verify(trim($_POST['password']), $user['password'])) { // check passwords match
            $role = Users::getRole($user['user_id']);
            Session::setLoginSessions($user['username'], $role);
            include("views/home-view.php");
        } else {
            $errorMsg = true;
            include "views/login-view.php";
        }
    } else {
        $errorMsg = true;
        include "views/login-view.php";
    }
} else if ($action === "signup") {
    $title = "Signup | Canalside Health Centre";
    include("views/signup-view.php");
} else if ($action === "signup-process") {
    $patient = Patients::findByPatientId(trim($_POST['patient_id']));
    if (isset($patient)) { // there is a patient with that valid ID
        if ($patient->getUserId() === NULL) { // user hasn't signed up already
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            $hash = password_hash($password, PASSWORD_DEFAULT);
            Users::addUser($username, $hash); // adds user to user table
            $user = Users::findByUsername($username); // gets user from user table including user_id
            Users::setRole($user['user_id'], "Patient"); // adds role to role table
            Users::connectToPatient($user['user_id'], $patientId); // Adds user_id to patient in patient table - connects user/patient
        } else {
            echo "<p>You have already signed up. Go to <a href='index.php?action=sign-in'>Login</a></p>";
        }
    } else {
        echo "No details were found";
    }
    $title = "Sign In | Canalside Health Centre";
    include("views/login-view.php");
} else if (Session::isLoggedIn()) { // restricts access to pages that require logging in
    if ($action === "register") {
        $notify = false;
        if (isset($_GET['registered'])) { $notify = true; }
        $title = "Register Patient | Canalside Health Centre";
        include("views/register-view.php");
    } else if ($action === "register-process") {
        echo "In register process";
        if (isset($_POST['register'])) {
            echo "form has been submitted";
            Patients::addDetails($_POST['patient_id'], $_POST['title'], $_POST['gender'], $_POST['forename'], $_POST['surname']);
            Patients::addContact($_POST['patient_id'], $_POST['mobile'], $_POST['landline'], $_POST['email']);
            Patients::addAddress($_POST['patient_id'], $_POST['address_1'], $_POST['address_2'], $_POST['town'], $_POST['county'], $_POST['postcode']);
            echo "Details added to database";
            //header("Location: index.php?action=register&registered=true");
        } else {
            header("Location: index.php?action=register");
        }
    } else if ($action === "find-patient-process") {
        if (isset($_POST['unregister'])) {
            $patient = Patients::findByPatientId($_POST['pid']);
            include "views/register-view.php";
        } else {
            header("Location: index.php?action=register");
        }
    } else if ($action === "profiles") {
        $allPatients = Patients::findAll();
        include "views/profiles-view.php";
    } else if ($action === "profile") {
        if (isset($_GET['pid'])) {
            $pid = $_GET['pid'];
            $profile = Patients::getProfile($pid);
        }
        include "views/profile-view.php";
    } else if ($action === "home") {
        $title = "Home | Canalside Health Centre";
        include("views/home-view.php");
    } else if ($action === "diary") {
        $diaries = Diaries::getAllDiaries(date("Y-m-d"));
        $title = "Diary | Canalside Health Centre";
        include("views/diary-view.php");
    } else if ($action === "appointments") {
        $allDiaries = Diaries::getAllDiaries(date("Y-m-d")); // Get todays diaries
        $data = array(); // Instantiate array that gets passed to view
        if (isset($allDiaries)) {
            foreach ($allDiaries as $diary) {
                $appointments = Diaries::getAppointments($diary['diary_id']); // Get all appointments for a diary
                $arr = array();
                foreach ($appointments as $appointment) {
                    array_push($arr, new Appointment($appointment['appointment_id'], $appointment['appointment_time']));
                }
                array_push($data, new Diary($diary['diary_id'], $diary['diary_name'], $diary['diary_date'],
                    $diary['clinician_name'], $diary['start_time'], $diary['end_time'], $arr));
            }
        }
        $title = "Appointments | Canalside Health Centre";
        $diaries = $data;
        include("views/appointments-view.php");
    } else if ($action === "add-diary-process") {
        if (isset($_POST['add_diary'])) {
            Diaries::addDiary($_POST['diary_name'], $_POST['diary_date'], $_POST['clinician_name'], $_POST['start_time'], $_POST['end_time']);
        }
        header("Location: index.php?action=diary");
    } else if ($action === "users") {
        $title = "Users | Canalside Health Centre";
        include("views/users-view.php");
    } else if ($action === "add-user-process") {
        $username = trim($_POST['username']);
        $role = trim($_POST['role']);
        $hash = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
        Users::addUser($username, $hash); // adds user to user table
        $user = Users::findByUsername($username); // gets user from user table including user_id
        Users::setRole($user['user_id'], $role); // adds role to role table
        Session::redirect("users");
    } else if ($action === "view-user-process") {
        $username = trim($_POST['username']);
        $user = Users::findByUsername($username);
        $title = "Users | Canalside Health Centre";
        include("views/users-view.php");
    } else if ($action === "logout") {
        Session::end();
        $title = "Sign In | Canalside Health Centre";
        include("views/login-view.php");
    } else {
        $title = "401 Error - Page Requires Authentication";
        include("views/401-view.php");
    }
} else {
    $title = "404 Error - Page Not Found";
    include("views/404-view.php");
}

?>