<?php 
require(__DIR__ . '/../../config.php');
global $DB, $CFG;


$values = get_config('local_casesending');

if ($_POST["banumber"] == 1) {
    $user_case_text = $values->infobanner1content;
}

if ($_POST["banumber"] == 2) {
    $user_case_text = $values->infobanner2content;
}

if ($_POST["banumber"] == 3) {
    $user_case_text = $values->infobanner3content;
}

if ($_POST["banumber"] == 4) {
    $user_case_text = $values->infobanner4content;
}

echo $user_case_text;