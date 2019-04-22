<?php

session_start();

require_once("databases/DB.php");
require_once("models/Patients.php");
require_once("models/Users.php");
require_once("models/Diaries.php");
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
require_once("controllers/bookingController.php");
require_once("controllers/bookingProcessController.php");
require_once("controllers/detailsController.php");
require_once("controllers/bookingsController.php");

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

    case "booking": // Booking Page
        BookingController::run();
        break;

    case "booking-process": // Process for booking an appointment
        BookingProcessController::run();
        break;

    case "bookings":
        BookingsController::run();
        break;

    case "users": // Users Page
        UsersController::run();
        break;

    case "add-user-process": // Process for adding a staff account
        AddUserProcessController::run();
        break;

    case "find-user-process": // Process for finding a users profile
        FindUserProcessController::run();
        break;

    case "profiles": // Profiles Page
        ProfilesController::run();
        break;

    case "profile": // Profile Page
        ProfileController::run();
        break;

    case "details":
        DetailsController::run();
        break;

    case "logout": // Process for logging out of an account
        LogoutController::run();
        break;

    case "401": // 401 Page
        $title = "401 Error: Page Requires Authentication";
        include "views/401-view.php";

    default: // 404 Page
        $title = "404 Error - Page Not Found";
        include("views/404-view.php");
}

?>