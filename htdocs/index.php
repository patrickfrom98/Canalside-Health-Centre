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
require_once("classes/PatientID.php");
require_once("controllers/controller.php");
require_once("controllers/loginController.php");
require_once("controllers/loginProcessController.php");
require_once("controllers/signupController.php");
require_once("controllers/signupProcessController.php");
require_once("controllers/homeController.php");
require_once("controllers/registerController.php");
require_once("controllers/registerProcessController.php");
require_once("controllers/diaryController.php");
require_once("controllers/addDiaryProcessController.php");
require_once("controllers/appointmentsController.php");
require_once("controllers/usersController.php");
require_once("controllers/addUserProcessController.php");
require_once("controllers/findUserProcessController.php");
require_once("controllers/profilesController.php");
require_once("controllers/profileController.php");
require_once("controllers/logoutController.php");

if (isset($_GET["action"])) {
    $action = $_GET['action'];
} else {
    $action = "login";
}

switch ($action) {
    case "login": // Login page
        LoginController::run();
        break;

    case "login-process": // Process for logging in
        LoginProcessController::run();
        break;

    case "signup": // Signup Page
        SignupController::run();
        break;

    case "signup-process": // Process for signing up a patient
        SignupProcessController::run();
        break;

    case "home": // Home page
        HomeController::run();
        break;

    case "register": // Register page
        RegisterController::run();
        break;

    case "register-process": // Process for registering a patient
        RegisterProcessController::run();
        break;

    case "diary": // Diaries Page
        DiaryController::run();
        break;

    case "add-diary-process": // Process for adding a diary
        AddDiaryProcessController::run();
        break;

    case "appointments": // Appointments Page
        AppointmentsController::run();
        break;

    case "users": // Users Page
        UsersController::run();
        break;

    case "add-user-process":
        AddUserProcessController::run();
        break;

    case "find-user-process": // Process for finding a users profile
        FindUserProcessController::run();
        break;

    case "profiles":
        ProfilesController::run();
        break;

    case "profile":
        ProfileController::run();
        break;

    case "logout":
        LogoutController::run();
        break;

    default: // 404 Page
        $title = "404 Error - Page Not Found";
        include("views/404-view.php");
}

?>