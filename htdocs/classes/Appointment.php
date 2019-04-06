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

    public function __construct($id, $time) {
        $this->id = $id;
        $this->time = $time;
    }

    public function getId() {
        return $this->id;
    }

    public function getTime() {
        return $this->time;
    }
}

?>