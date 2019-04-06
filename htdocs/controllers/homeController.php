<?php

/**
 * A controller that handles the home page
 *
 * @author Patrick Thompson
 * @date 04/04/2019
 * @version 1.0
 */
class HomeController extends Controller {
    public static function run() {
        $title = "Home | Canalside Health Centre";
        include("views/home-view.php");
    }
}