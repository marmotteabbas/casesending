<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Capability tool settings form.
 *
 * Do no include this file, it is automatically loaded by the class loader!
 *
 * @package    tool_capability
 * @copyright  2013 Sam Hemelryk
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.');    ///  It must be included from a Moodle page
}

require_once($CFG->libdir . '/formslib.php');
/**
 * Class local_casesending_form
 *
 *
 * @copyright  2025 Florent Paccalet
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */



class formulaire extends moodleform {
    /**
     * The form definition.
     */
    public function definition() {
        global $USER, $DB, $CFG, $PAGE;

        $PAGE->requires->js_call_amd('local_casesending/updatefpfile','check');

        $mform =& $this->_form;

        $attributes_name=array('value'=>$USER->firstname.' '.$USER->lastname, "readonly" => "readonly");
        $mform->addElement('text', 'name', get_string('name_form_label', 'local_casesending'), $attributes_name);
        $mform->addRule('name', get_string('name_form_label', 'local_casesending'), 'required',  null, 'client');

        $attributes_mail=array('value'=>$USER->email, "readonly" => "readonly");
        $mform->addElement('text', 'email', get_string('email_form_label', 'local_casesending'), $attributes_mail);
        $mform->addRule('email',get_string('email_form_label', 'local_casesending'), 'required',  null, 'client');
        
        $mform->addElement('text', 'subject', get_string('subject_form_label', 'local_casesending'));
        $mform->addRule('subject',get_string('subject_form_label', 'local_casesending'), 'required',  null, 'client');

        $mform->addElement('hidden', 'url_from', $_POST['url']);
   
        $params = ['userid' => $USER->id];

        $courses_list = $DB->get_records_sql("SELECT c.id, c.fullname FROM {user_enrolments} ur 
        INNER JOIN {user} u ON ur.userid = u.id 
        INNER JOIN {enrol} e ON ur.enrolid = e.id 
        RIGHT JOIN {course} c ON c.id = e.courseid WHERE ur.userid = ".$USER->id);

        $courses_array = array();
        $courses_array[""] = "";
        foreach ($courses_list as $cl) {
          $courses_array[$cl->id] = $cl->fullname;
        } 

        $select = $mform->addElement('select', 'course_list', get_string('course_list_form_label', 'local_casesending'), $courses_array, $attributes);
        $select->setMultiple(false);

        $select = $mform->addElement('select', 'concerned_activities', get_string('concerned_activities', 'local_casesending'), [], $attributes);
        $select->setMultiple(false);

         $mform->addElement('text', 'url', get_string('url', 'local_casesending'));

        $mform->addElement('textarea', 'description_demande', get_string('description_demande', 'local_casesending'));
        $mform->addRule('description_demande',get_string('description_demande', 'local_casesending'), 'required',  null, 'client');

        $mform->addElement('filemanager','fichier', get_string('file'), null,
        [
          'accepted_types' => '*',
           'maxfiles' => 1
        ]
        );

        $mform->addElement('hidden','fpfilecheck',0 ,null);

      $mform->addElement('submit', 'preloadtest', get_string('submit', 'local_casesending'));


    }

    function validation($data, $files) {
      $errors= array();

      if (empty($data['name'])){
              $errors['name'] = "Name Field Missing";
      }

      if (empty($data['email'])){
              $errors['email'] = "Email Field Missing";
      }

      if (empty($data['subject'])){
              $errors['subject'] = "Subject Field Missing";
      }

      return $errors;
    }

}
