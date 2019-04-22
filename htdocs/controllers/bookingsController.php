<?php

/**
 * A controller that handles the bookings page
 *
 * @author Patrick Thompson
 * @date 22/04/2019
 * @version 1.0
 */
class BookingsController extends Controller {
    public static function run() {
        $user = Users::findByUsername($_SESSION['name']);
        $patient = Patients::findByUserId($user['user_id']);
        $upcoming = Diaries::getUpcoming($patient['patient_id']);
        $previous = Diaries::getPrevious($patient['patient_id']);
        include "views/bookings-view.php";
    }
}