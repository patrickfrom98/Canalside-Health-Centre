<?php

/**
 * A class that handles all operations relating
 * to patients.
 *
 * @author Patrick Thompson
 * @date 19/03/2019
 * @version 1.0
 */
class Patients {
    /**
     * Add a new patient
     *
     * @param $patientId
     * @param $title
     * @param $gender
     * @param $forename
     * @param $surname
     */
    public static function addDetails($patientId, $title, $gender, $forename, $surname) {
        $conn = DB::getConnection();
        $stmt = $conn->prepare("INSERT INTO mvc_patient (patient_id, user_id, title, gender, forename, surname) VALUES (:patientId, NULL, :title, :gender, :forename, :surname)");
        $stmt->bindValue(':patientId', $patientId);
        $stmt->bindValue(':title', $title);
        $stmt->bindValue(':gender', $gender);
        $stmt->bindValue(':forename', $forename);
        $stmt->bindValue(':surname', $surname);
        $stmt->execute();
        DB::closeConnection($conn);
    }

    /**
     * Gets patient using their patient ID
     *
     * @param $patientId
     * @return Patient object
     */
    public static function findByPatientId($patientId) {
        $conn = DB::getConnection();
        $stmt = $conn->prepare("SELECT * FROM mvc_patient WHERE mvc_patient.patient_id = :id");
        $stmt->bindValue(':id', $patientId);
        $stmt->execute();
        $patient = $stmt->fetch();
        DB::closeConnection($conn);
        $patientObject = new Patient($patient['patient_id'], $patient['user_id'], $patient['title'], $patient['gender'], $patient['forename'], $patient['surname']);
        return $patientObject;
    }

    /**
     * Gets patients address using their id
     *
     * @param $patientId
     * @return Address object
     */
    public static function getAddress($patientId) {
        $conn = DB::getConnection();
        $stmt = $conn->prepare("SELECT * FROM mvc_address WHERE mvc_address.patient_id = :id");
        $stmt->bindValue(':id', $patientId);
        $stmt->execute();
        $address = $stmt->fetch();
        DB::closeConnection($conn);
        $addressObject = new Address($address['address_1'], $address['address_2'], $address['town'], $address['county'], $address['postcode']);
        return $addressObject;
    }

    /**
     * Gets patients contact using their id
     *
     * @param $patientId
     * @return Contact object
     */
    public static function getContact($patientId) {
        $conn = DB::getConnection();
        $stmt = $conn->prepare("SELECT * FROM mvc_contact WHERE mvc_contact.patient_id = :id");
        $stmt->bindValue(':id', $patientId);
        $stmt->execute();
        $contact = $stmt->fetch();
        DB::closeConnection($conn);
        $contactObject = new Contact($contact['mobile'], $contact['landline'], $contact['email']);
        return $contactObject;
    }

    /**
     * Gets patients full details profile
     *
     * @param $patientId
     * @return Profile object
     */
    public static function getProfile($patientId) {
        $patient = self::findByPatientId($patientId);
        $address = self::getAddress($patientId);
        $contact = self::getContact($patientId);
        $profile = new Profile($patient, $address, $contact);
        return $profile;
    }

    /**
     * Gets all patients
     *
     * @return array
     */
    public static function findAll() {
        $conn = DB::getConnection();
        $stmt = $conn->prepare("SELECT * FROM mvc_patient ORDER BY forename LIMIT 50");
        $stmt->execute();
        $patients = $stmt->fetchAll();
        DB::closeConnection($conn);
        return $patients;
    }

    /**
     * Gets patient using their user ID
     *
     * @param $userId - the patients unique user id
     * @return array
     */
    public static function findByUserId($userId) {
        $conn = DB::getConnection();
        $stmt = $conn->prepare("SELECT * FROM mvc_patient WHERE mvc_patient.user_id = :id");
        $stmt->bindValue(':id', $userId);
        $stmt->execute();
        $patient=$stmt->fetch();
        DB::closeConnection($conn);
        return $patient;
    }

    /**
     * Add an address for a new patient
     *
     * @param $patientId
     * @param $address1
     * @param $address2
     * @param $town
     * @param $county
     * @param $postcode
     */
    public static function addAddress($patientId, $address1, $address2, $town, $county, $postcode) {
        $conn = DB::getConnection();
        $stmt = $conn->prepare("INSERT INTO mvc_address (patient_id, address_1, address_2, town, county, postcode) VALUES (:patientId, :address1, :address2, :town, :county, :postcode)");
        $stmt->bindValue(':patientId', $patientId);
        $stmt->bindValue(':address1', $address1);
        $stmt->bindValue(':address2', $address2);
        $stmt->bindValue(':town', $town);
        $stmt->bindValue(':county', $county);
        $stmt->bindValue(':postcode', $postcode);
        $stmt->execute();
        DB::closeConnection($conn);
    }

    /**
     * Add a contact for a new patient
     *
     * @param $patientId
     * @param $mobile
     * @param $landline
     * @param $email
     */
    public static function addContact($patientId, $mobile, $landline, $email) {
        $conn = DB::getConnection();
        $stmt = $conn->prepare("INSERT INTO mvc_contact (patient_id, mobile, landline, email) VALUES (:patientId, :mobile, :landline, :email)");
        $stmt->bindValue(':patientId', $patientId);
        $stmt->bindValue(':mobile', $mobile);
        $stmt->bindValue(':landline', $landline);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        DB::closeConnection($conn);
    }

    /**
     * Checks if patient is registered with surgery
     *
     * @param $patientId - the users unique patient_id
     * @return boolean value
     */
    function isRegisterPatient($patientId) {
        $conn = DB::getConnection();
        $patient = findByPatientId($patientId);
        if ($patient) {
            DB::closeConnection($conn);
            return true;
        }
        DB::closeConnection($conn);
        return false;
    }
}