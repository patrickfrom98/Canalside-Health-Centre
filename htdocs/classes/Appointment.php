<?php

/**
 * A class that holds appointment details
 *
 * @author Patrick Thompson
 * @date 12/03/2019
 */
class Appointment {
    private $id;
    private $time;
    private $patientId;
    private $patientName;

    public function __construct($id, $time) {
        $this->id = $id;
        $this->time = $time;
        $this->patientName = "";
    }

    public function getId() {
        return $this->id;
    }

    public function getTime() {
        return $this->time;
    }

    public function setPatientName(string $patientName) {
        $this->patientName = $patientName;
    }



    public function getPatientName() {
        return $this->patientName;
    }


}

?>