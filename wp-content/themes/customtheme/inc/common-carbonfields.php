<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

require_once('theme-fields/Crb_All_Fields.php');

// Common Settings
add_action( 'carbon_fields_register_fields', 'carbon_fields_settings_common' );
function carbon_fields_settings_common() {
    $Container = new Crb_All_Fields('theme_options', 'Настройка сайта');
    $Container->add_contact_fields();
    $Container->add_social_fields();
    return $Container;
}
