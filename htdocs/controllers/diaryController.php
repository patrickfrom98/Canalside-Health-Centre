<?php

/**
 * A controller that handles the diary page
 *
 * @author Patrick Thompson
 * @date 04/04/2019
 * @version 1.0
 */
class DiaryController extends Controller {
    public static function run() {
        $diaries = Diaries::getAllDiaries(date("Y-m-d"));
        $title = "Diary | Canalside Health Centre";
        include("views/diary-view.php");
    }
}