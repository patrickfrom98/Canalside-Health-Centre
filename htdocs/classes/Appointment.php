<?php

/**
 * A class that holds appointment details
 *
 * @author Patrick Thompson
 * @date 12/03/2019
 * @version 1.0
 */
class Appointment {
    /**
     * Appointment properties.
     *
     * @var $id - the appointment id
     * @var $time - the time the appointment should occur
     * @var $patientId
     * @var $patientName
     */
    private $id;
    private $time;
    private $patientId;
    private $patientName;

    /**
     * Appointment constructor.
     *
     * @param $id
     * @param $time
     * @param $patientId
     * @param $patientName
     */
    public function __construct($id, $time, $patientId, $patientName) {
        $this->id = trim($id);
        $this->time = trim($time);
        $this->patientId = trim($patientId);
        $this->patientName = trim($patientName);
    }

    /**
     * Getter methods
     */
    public function getId() {
        return $this->id;
    }

    public function getTime() {
        return $this->time;
    }

    public function getPatientId() {
        return $this->patientId;
    }

    public function getPatientName() {
        return $this->patientName;
    }
}

?>