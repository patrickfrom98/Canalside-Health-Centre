<?php

/**
 * A class that holds details of a patients address.
 *
 * @author Patrick Thompson
 * @date 27/03/2019
 * @version 1.0
 */
class Address {
    /**
     * Address Attributes
     *
     * @var $address1
     * @var $address2
     * @var $town
     * @var $county
     * @var $postcode
     */
    private $address1;
    private $address2;
    private $town;
    private $county;
    private $postcode;

    /**
     * Address constructor.
     *
     * @param $address1
     * @param $address2
     * @param $town
     * @param $county
     * @param $postcode
     */
    public function __construct($address1, $address2, $town, $county, $postcode) {
        $this->address1 = trim($address1);
        $this->address2 = trim($address2);
        $this->town = trim($town);
        $this->county = trim($county);
        $this->postcode = trim($postcode);
    }

    /**
     * Gets house name
     *
     * @return mixed
     */
    public function getAddress1() {
        return $this->address1;
    }

    /**
     * Gets road name
     *
     * @return string
     */
    public function getAddress2() {
        return $this->address2;
    }

    /**
     * Gets town
     *
     * @return string
     */
    public function getTown() {
        return $this->town;
    }

    /**
     * Gets County
     *
     * @return string
     */
    public function getCounty() {
        return $this->county;
    }

    /**
     * Gets postcode
     *
     * @return string
     */
    public function getPostcode() {
        return $this->postcode;
    }



    /**
     * Gets full address
     *
     * @return String a full UK address
     */
    public function getAddress() {
        return "{$this->address1}, {$this->address2}, {$this->town}, {$this->county}, {$this->postcode}";
    }
}

?>