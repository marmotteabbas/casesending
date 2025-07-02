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
 * Local plugin "staticpage" - Library
 *
 * @package    local_casesending
 * @copyright  2025 Florent Paccalet
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

 function local_casesending_before_footer() {
   global $PAGE, $USER, $CFG;
   $PAGE->requires->js_call_amd('local_casesending/call');

   $user_case_text = 0;

   if (strpos($USER->email,'@etu.univ-grenoble-alpes.fr') !== false) {
     //$user_case_text = $values->infobanner3content;
     $user_case_text = 3;
   }

   if (strpos($USER->email, '@etu.grenoble-inp.fr') !== false) {
     //$user_case_text  =$values->infobanner1content;
     $user_case_text = 1;
   }

   if (strpos($USER->email, '@etu.sciencespo-grenoble.fr') !== false) {
     //$user_case_text = $values->infobanner2content;
     $user_case_text = 2;
   }

   if (strpos($USER->email, '@univ-smb.fr') !== false) {
     $user_case_text = 4;
     //$user_case_text ="savoie";
   }
   //die($user_case_text);
   $values = get_config('local_casesending');

   if ($values->onoff) {
        $PAGE->requires->js_call_amd('local_casesending/launch','launch',["cas"=> $user_case_text]);
   }
   
//require(['local_casesending/call'], function(amd) {amd.call();});;
//$(".footer-support-link:nth-child(3)").html("<a href='javascript:require(["+'"local_casesending/call"]'+", function(amd) {amd.call();});;'><i class='icon fa fa-envelope-o fa-fw ' aria-hidden='true'></i>Contacter l’assistance du site</a>");
 }
