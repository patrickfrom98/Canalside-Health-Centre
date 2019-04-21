<?php

/**
 * A controller that handles booking
 *
 * @author Patrick Thompson
 * @date 18/04/2019
 * @version 1.0
 */
class BookingController extends Controller {
    public static function run() {
        $diaries = Diaries::getAllDiaries(date("Y-m-d"));
        if (isset($diaries)) {
            include "views/booking-view.php";
        } else {
            header("Location: index.php?action=appointments");
        }
    }
}