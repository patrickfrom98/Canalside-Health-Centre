<?php

/**
 * A class that holds details of a patients contact.
 *
 * @author Patrick Thompson
 * @date 27/03/2019
 * @version 1.0
 */
class Contact {
    /**
     * Contact Attributes
     *
     * @var $mobile
     * @var $landline
     * @var $email
     */
    private $mobile;
    private $landline;
    private $email;

    /**
     * Contact constructor.
     *
     * @param $mobile
     * @param $landline
     * @param $email
     */
    public function __construct($mobile, $landline, $email) {
        $this->mobile = trim($mobile);
        $this->landline = trim($landline);
        $this->email = trim($email);
    }

    /**
     * Gets mobile number
     *
     * @return mixed
     */
    public function getMobile() {
        return $this->mobile;
    }

    /**
     * Gets landline number
     *
     * @return mixed
     */
    public function getLandline() {
        return $this->landline;
    }

    /**
     * Gets email
     *
     * @return mixed
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Gets all contact details
     *
     * @return array contact details
     */
    public function getDetails() {
        $details = array();
        $details['mobile'] = $this->mobile;
        $details['landline'] = $this->landline;
        $details['email'] = $this->email;
        return $details;
    }
}