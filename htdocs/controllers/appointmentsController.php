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
    }
}