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
 * Local plugin "staticpage" - View page
 *
 * @package    local_casesending
 * @copyright  2025 Florent Paccalet, Grenoble University
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Include config.php.
// phpcs:disable moodle.Files.RequireLogin.Missing
// Let codechecker ignore the next line because otherwise it would complain about a missing login check
// after requiring config.php which is really not needed.

//https://moodle-test.grenet.fr/moodle_flo/local/casesending/view.php

require(__DIR__ . '/../../config.php');

// Globals.
global $CFG, $PAGE, $USER;

$PAGE->requires->js_call_amd('local_casesending/formadapt', 'formadapt', []);

//Include
require_once($CFG->dirroot.'/local/casesending/lib.php');
require_once($CFG->dirroot.'/local/casesending/classes/form/formulaire.php');

echo $OUTPUT->header();

$form = new formulaire("sending.php");
$form->display();

echo $OUTPUT->footer();