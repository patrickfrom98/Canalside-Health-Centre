<?php

/**
 * A class that contains all information that
 * the surgery holds about a patient.
 *
 * @author Patrick Thompson
 * @date 27/03/2019
 * @version 1.0
 */
class Profile {
    /**
     * Profile Attributes
     *
     * @var $patient - Patient class
     * @var $address - Address class
     * @var $contact - Contact class
     */
    private $patient;
    private $address;
    private $contact;

    /**
     * Profile constructor.
     *
     * @param $patient
     * @param $address
     * @param $contact
     */
    public function __construct($patient, $address, $contact) {
        $this->patient = $patient;
        $this->address = $address;
        $this->contact = $contact;
    }

    /**
     * Gets patient
     *
     * @return mixed
     */
    public function getPatient() {
        return $this->patient;
    }

    /**
     * Gets patients address
     *
     * @return mixed
     */
    public function getAddress() {
        return $this->address;
    }

    /**
     * Gets patient contact
     *
     * @return mixed
     */
    public function getContact() {
        return $this->contact;
    }

    /**
     * Gets all details about a patient
     *
     * @return array a profile of a patient
     */
    public function getProfile() {
        $profile = array();
        $profile['patient'] = $this->patient->getDetails();
        $profile['contact'] = $this->contact->getDetails();
        $profile['address'] = $this->address->getAddress();
        return $profile;
    }
}