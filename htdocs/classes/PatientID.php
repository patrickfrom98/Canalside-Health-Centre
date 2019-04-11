<?php

/**
 * @author Patrick Thompson
 * @date 11/04/2019
 * @version 1.0
 */
class PatientID {
    /**
     * Generates a patient id
     */
    public static function generate() {
        $pre = "CHS";
        $digits = "";
        for ($i = 0; $i <= 12; $i++) {
            $digit = mt_rand(0,9);
            $digits = $digits . $digit;
        }
        return $pre . $digits;
    }
}