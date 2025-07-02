<?php 
require(__DIR__ . '/../../config.php');
global $DB, $CFG;
//SELECT cm.*, m.name FROM course_modules cm INNER JOIN modules m ON m.id = cm.module WHERE course = 1817
//SELECT cm.instance, m.name FROM course_modules cm INNER JOIN modules m ON m.id = cm.module WHERE course = 1817

$all_results = [];
$list = $DB->get_records_sql("SELECT cm.instance, m.name FROM course_modules cm INNER JOIN modules m ON m.id = cm.module WHERE course = ".$_POST["id_option"]);
foreach ($list as $l){
    $r = $DB->get_record_sql("SELECT name, id FROM ". $l->name ." WHERE id=".$l->instance);
    $all_results[] = "[".$r->id."] ".$r->name." (".$l->name.")";
}

echo json_encode($all_results);