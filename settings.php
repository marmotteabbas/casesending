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
 * Plugin settings for the local_anonymanager plugin.
 *
 * @package   local_casending
 * @copyright Year, You Name <florent.paccalet@grenet.fr>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

global $PAGE, $DB;

// Ensure the configurations for this site are set
if ($hassiteconfig) {
    $settings = new admin_settingpage('local_casesending', 'Case Sending');

    $settings->add(new admin_setting_configcheckbox(
            'local_casesending/onoff',
            'ON/OFF',
            get_string('onoff_explain', 'local_casesending'),
            1
        ));

    $settings->add(new admin_setting_heading('local_casesending/title_1', get_string('PopINP', 'local_casesending'), ''));

    $settings->add(new admin_setting_configtextarea('local_casesending/infobanner1content',
                                                    get_string('banner1', 'local_casesending'),
                                                    get_string('banner1Explain', 'local_casesending'),
                                                    $default));

    $settings->add(new admin_setting_heading('local_casesending/title_2', get_string('PopIEP', 'local_casesending'), ''));

    $settings->add(new admin_setting_configtextarea('local_casesending/infobanner2content',
                                                    get_string('banner2', 'local_casesending'),
                                                    get_string('banner2Explain', 'local_casesending'),
                                                    $default));

    $settings->add(new admin_setting_heading('local_casesending/title_3', get_string('PopUGA', 'local_casesending'), ''));

    $settings->add(new admin_setting_configtextarea('local_casesending/infobanner3content',
                                                    get_string('banner3', 'local_casesending'),
                                                    get_string('banner3Explain', 'local_casesending'),
                                                    $default));

    $settings->add(new admin_setting_heading('local_casesending/title_4', get_string('PopVALENCE', 'local_casesending'), ''));

    $settings->add(new admin_setting_configtextarea('local_casesending/infobanner4content',
                                                    get_string('banner4', 'local_casesending'),
                                                    get_string('banner4Explain', 'local_casesending'),
                                                    $default));
    $settings->add(new admin_setting_configtext(
        'local_casesending/recipientemail',
        get_string('recipientemail', 'local_casesending'),
        get_string('recipientemail_desc', 'local_casesending'),
        'assistance@exemple.fr', // Valeur par défaut
        PARAM_EMAIL
    ));    
    $ADMIN->add('localplugins', $settings);
}
