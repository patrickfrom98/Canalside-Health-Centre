<?php

/**
 * A controller that handles the process of booking
 * an appointment.
 *
 * @author Patrick Thompson
 * @date 21/04/2019
 * @version 1.0
 */
class BookingProcessController extends Controller {
    public static function run() {
        $appointments = Diaries::getAppointments($_POST['diary']);
        $noOfAppointments = count($appointments);
        if ($noOfAppointments > 0) { // If there's a chance of a double booking
            foreach ($appointments as $appointment) { // Iterate and checks for double bookings
                if ($appointment->getTime() == "{$_POST['time']}:00") {
                    $_SESSION['appointment_already_exists'] = true;
                }
            }
            if (!isset($_SESSION['appointment_already_exists'])) { // Book appointment if no error set
                Diaries::addAppointment($_POST['time'], $_POST['patient_id'], $_POST['patient_name']);
                $id = Diaries::getId();
                Diaries::connectToDiary($id['appointment_id'] ,$_POST['diary']);
                $_SESSION['appointment_booked'] = true;
            } else {
                $_SESSION['appointment_not_booked'] = true;
            }
        } else { // No chance of double booking
            Diaries::addAppointment($_POST['time'], $_POST['patient_id'], $_POST['patient_name']);
            $id = Diaries::getId();
            Diaries::connectToDiary($id['appointment_id'] ,$_POST['diary']);
            $_SESSION['appointment_booked'] = true;
        }
        header("Location: index.php?action=booking");
    }
}