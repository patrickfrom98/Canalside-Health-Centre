<?php

/**
 * A class that holds details of a patient.
 *
 * @author Patrick Thompson
 * @date 27/03/2019
 * @version 1.0
 */
class Patient {
    /**
     * Patient Attributes
     *
     * @var $patientId
     * @var $userId
     * @var $title
     * @var $gender
     * @var $forename
     * @var $surname
     */
    private $patientId;
    private $userId;
    private $title;
    private $gender;
    private $forename;
    private $surname;

    /**
     * Patient constructor.
     *
     * @param $patientId
     * @param $userId
     * @param $title
     * @param $gender
     * @param $forename
     * @param $surname
     */
    public function __construct($patientId, $userId, $title, $gender, $forename, $surname) {
        $this->patientId = trim($patientId);
        $this->userId = trim($userId);
        $this->title = trim($title);
        $this->gender = trim($gender);
        $this->forename = trim($forename);
        $this->surname = trim($surname);
    }

    /**
     * Gets patient id
     *
     * @return mixed
     */
    public function getPatientId() {
        return $this->patientId;
    }

    /**
     * Gets user id
     *
     * @return mixed
     */
    public function getUserId() {
        return $this->userId;
    }

    /**
     * Gets patients title. Eg. Mr / Mrs.
     *
     * @return mixed
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Gets patients gender
     *
     * @return mixed
     */
    public function getGender() {
        return $this->gender;
    }

    /**
     * Gets forename
     *
     * @return string
     */
    public function getForename() {
        return $this->forename;
    }

    /**
     * Gets surname
     *
     * @return string
     */
    public function getSurname() {
        return $this->surname;
    }



    /**
     * Gets patients full name
     *
     * @return string
     */
    public function getName() {
        return "{$this->forename} {$this->surname}";
    }

    /**
     * Gets all patient details
     *
     * @return array patient details
     */
    public function getDetails() {
        $details = array();
        $details['patient_id'] = $this->patientId;
        $details['title'] = $this->title;
        $details['gender'] = $this->gender;
        $details['name'] = $this->getName();
        return $details;
    }
}