<?php

/**
 * A class that handles all operations relating
 * to diaries.
 *
 * @author Patrick Thompson
 * @date 02/04/2019
 * @version 1.0
 */
class Diaries {
    /**
     * Adds new diary
     *
     * @param $diaryName - the name of the diary. Eg. Weekend AM Diary
     * @param $diaryDate - Eg. 22/03/2019
     * @param $clinicianName - the ANP/GP/Nurse etc.
     * @param $startTime - start of diary as datetime
     * @param $endTime - end of diary as datetime
     */
    public static function addDiary($diaryName, $diaryDate, $clinicianName, $startTime, $endTime) {
        $conn = DB::getConnection();
        $stmt = $conn->prepare("INSERT INTO mvc_diary (diary_id, diary_name, diary_date, clinician_name, start_time, end_time) VALUES (NULL, :diaryName, :diaryDate, :clinicianName, :startTime, :endTime)");
        $stmt->bindValue(':diaryName', trim($diaryName));
        $stmt->bindValue(':diaryDate', trim($diaryDate));
        $stmt->bindValue(':clinicianName', trim($clinicianName));
        $stmt->bindValue(':startTime', trim($startTime));
        $stmt->bindValue(':endTime', trim($endTime));
        $stmt->execute();
        DB::closeConnection($conn);
    }

    /**
     * Gets all diaries for the a given day
     *
     * @param $date - the date chosen
     * @return array of Diary
     */
    public static function getAllDiaries($date) {
        $conn = DB::getConnection();
        $stmt = $conn->prepare("SELECT * FROM mvc_diary WHERE diary_date = :diaryDate");
        $stmt->bindValue(':diaryDate', $date);
        $stmt->execute();
        $diaries = $stmt->fetchAll();
        $diariesArray = array();
        foreach ($diaries as $diary) {
            $appointments = self::getAppointments($diary['diary_id']);
            array_push($diariesArray, new Diary($diary['diary_id'], $diary['diary_name'], $diary['diary_date'], $diary['clinician_name'], $diary['start_time'], $diary['end_time'], $appointments));
        }
        DB::closeConnection($conn);
        return $diariesArray;
    }

    /**
     * Adds an appointment to a diary
     *
     * @param $appointmentTime
     * @param $patientId
     * @param $patientName
     */
    public static function addAppointment($appointmentTime, $patientId, $patientName) {
        $conn = DB::getConnection();
        $stmt = $conn->prepare("INSERT INTO mvc_appointment (appointment_id, appointment_time, patient_id, patient_name) VALUES (NULL, :appointmentTime, :patientId, :patientName)");
        $stmt->bindValue(':appointmentTime', trim($appointmentTime));
        $stmt->bindValue(':patientId', trim($patientId));
        $stmt->bindValue(':patientName', trim($patientName));
        $stmt->execute();
        DB::closeConnection($conn);
    }

    /**
     * Connects appointment to the correct clinical diary
     *
     * @param $appointmentId
     * @param $diaryId
     */
    public static function connectToDiary($appointmentId, $diaryId) {
        $conn = DB::getConnection();
        $stmt = $conn->prepare("INSERT INTO mvc_diary_appointment (appointment_id, diary_id) VALUES (:appointment, :diary)");
        $stmt->bindValue(':appointment', trim($appointmentId));
        $stmt->bindValue(':diary', trim($diaryId));
        $stmt->execute();
        DB::closeConnection($conn);
    }

    /**
     * Gets id of last booked appointment
     */
    public static function getId() {
        $conn = DB::getConnection();
        $stmt = $conn->prepare("SELECT appointment_id FROM mvc_appointment ORDER BY appointment_id DESC LIMIT 1");
        $stmt->execute();
        $id = $stmt->fetch();
        DB::closeConnection($conn);
        return $id;
    }

    /**
     * Get appointment for a diary
     *
     * @param $id - diary id
     * @return array of Appointment
     */
    public static function getAppointments($id) {
        $conn = DB::getConnection();
        $stmt = $conn->prepare("SELECT * FROM mvc_appointment INNER JOIN mvc_diary_appointment ON mvc_appointment.appointment_id = mvc_diary_appointment.appointment_id INNER JOIN mvc_diary ON mvc_diary_appointment.diary_id = mvc_diary.diary_id WHERE mvc_diary.diary_id = :id ORDER BY appointment_time");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $appointments = $stmt->fetchAll();
        $appointmentsArray = array();
        foreach ($appointments as $appointment) {
            array_push($appointmentsArray, new Appointment($appointment['appointment_id'], $appointment['appointment_time'],$appointment['patient_id'], $appointment['patient_name']));
        }
        DB::closeConnection($conn);
        return $appointmentsArray;
    }

    /**
     * Gets upcoming appointments for a patient
     *
     * @param $id
     * @return array of Appointment
     */
    public static function getUpcoming($id) {
        $conn = DB::getConnection();
        $stmt = $conn->prepare("SELECT * FROM `mvc_appointment` INNER JOIN mvc_diary_appointment ON mvc_appointment.appointment_id = mvc_diary_appointment.appointment_id INNER JOIN mvc_diary ON mvc_diary_appointment.diary_id = mvc_diary.diary_id WHERE mvc_appointment.patient_id = :id AND mvc_diary.diary_date = CURDATE() AND CURTIME() < mvc_appointment.appointment_time ORDER BY appointment_time ASC");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $appointments = $stmt->fetchAll();
        DB::closeConnection($conn);
        return $appointments;
    }

    /**
     * Gets previous appointments for a patient
     *
     * @param $id
     * @return array of Appointment
     */
    public static function getPrevious($id) {
        $conn = DB::getConnection();
        $stmt = $conn->prepare("SELECT * FROM `mvc_appointment` INNER JOIN mvc_diary_appointment ON mvc_appointment.appointment_id = mvc_diary_appointment.appointment_id INNER JOIN mvc_diary ON mvc_diary_appointment.diary_id = mvc_diary.diary_id WHERE mvc_appointment.patient_id = :id AND mvc_diary.diary_date <= CURDATE() AND mvc_appointment.appointment_time < CURTIME() ORDER BY appointment_time ASC");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $appointments = $stmt->fetchAll();
        DB::closeConnection($conn);
        return $appointments;
    }
}

?>