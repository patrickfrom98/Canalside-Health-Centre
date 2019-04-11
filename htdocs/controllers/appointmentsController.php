<?php

/**
 * A controller that handles the appointments page
 *
 * @author Patrick Thompson
 * @date 04/04/2019
 * @version 1.0
 */
class AppointmentsController extends Controller {
    public static function run() {
        $diaries = Diaries::getAllDiaries(date("Y-m-d")); // Get todays diaries
        $title = "Appointments | Canalside Health Centre";
        include("views/appointments-view.php");
    }
}