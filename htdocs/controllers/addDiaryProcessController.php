<?php

/**
 * A controller that handles the process for adding
 * a diary
 *
 * @author Patrick Thompson
 * @date 04/04/2019
 * @version 1.0
 */
class AddDiaryProcessController extends Controller {
    public static function run() {
        if (isset($_POST['add_diary'])) {
            Diaries::addDiary($_POST['diary_name'], $_POST['diary_date'], $_POST['clinician_name'], $_POST['start_time'], $_POST['end_time']);
        }
        header("Location: index.php?action=diary");
    }
}