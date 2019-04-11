<?php

/**
 * A class for an appointments diary
 *
 * @author Patrick Thompson
 * @version 12/03/2019
 */
class Diary {
    /**
     * Diary attributes
     */
    private $id;
    private $name;
    private $date;
    private $owner;
    private $start;
    private $end;
    private $appointments;

    /**
     * Diary constructor.
     *
     * @param $id - 16 alphanumeric digit unique code
     * @param $name - the diaries name. Eg. Dr Chan 08:00 - 09:00.
     * @param $date - the date the diary will run. Eg. 2019-03-12.
     * @param $owner - clinician's name
     * @param $start - start time. Eg. 08:00
     * @param $end - end time. Eg. 09:00.
     * @param $appointments - array of appointments
     */
    public function __construct($id, $name, $date, $owner, $start, $end, $appointments) {
        $this->id = $id;
        $this->name = $name;
        $this->date = $date;
        $this->owner = $owner;
        $this->start = $start;
        $this->end = $end;
        $this->appointments = $appointments;
    }

    /**
     * Getters methods for Diary data.
     */
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDate() {
        return $this->date;
    }

    public function getOwner() {
        return $this->owner;
    }

    public function getStart() {
        return $this->start;
    }

    public function getEnd() {
        return $this->end;
    }

    /**
     * Gets the number of 15 min appointments the diary contains
     * between its start and end times
     *
     * @return int - number of appointments as an int
     */
    public function getNoOfAppointments() {
        $startTime = strtotime($this->start);
        $endTime = strtotime($this->end);
        $noOfSlots = ($endTime - $startTime) / (60 * 15);
        return $noOfSlots;
    }

    /**
     * Get all appointments
     *
     * @return array of Appointment
     */
    public function getAppointments() {
        return $this->appointments;
    }

    /**
     * Get appointment by time
     *
     * @param $time
     * @return null / $appointment
     */
    public function getAppointment($time) {
        $appointments = $this->appointments;
        if (isset($appointments)) {
            foreach ($appointments as $appointment) {
                if ($appointment->getTime() === "{$time}:00") {
                    return $appointment;
                }
            }
        }
        return null;
    }
}

?>