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
     * @return $diaries
     */
    public static function getAllDiaries($date) {
        $conn = DB::getConnection();
        $stmt = $conn->prepare("SELECT * FROM mvc_diary WHERE diary_date = :diaryDate");
        $stmt->bindValue(':diaryDate', $date);
        $stmt->execute();
        $diaries = $stmt->fetchAll();
        DB::closeConnection($conn);
        return $diaries;
    }

    /**
     * Get appointment for a diary
     *
     * @param $id - diary id
     * @return $appointments as array
     */
    public static function getAppointments($id) {
        $conn = DB::getConnection();
        $stmt = $conn->prepare("SELECT * FROM mvc_appointment INNER JOIN mvc_diary_appointment ON mvc_appointment.appointment_id = mvc_diary_appointment.appointment_id INNER JOIN mvc_diary ON mvc_diary_appointment.diary_id = mvc_diary.diary_id WHERE mvc_diary.diary_id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $appointments = $stmt->fetchAll();
        DB::closeConnection($conn);
        return $appointments;
    }
}

?>