<?php

require_once('all-fields/Crb_All_Fields.php');

// Common Settings
add_action( 'carbon_fields_register_fields', 'carbon_fields_settings_common' );
function carbon_fields_settings_common() {
    $Container = new Crb_All_Fields('theme_options', 'Настройка сайта');
    $Container->add_contact_fields();
    $Container->add_social_fields();
    return $Container;
}

//home.php
add_action( 'carbon_fields_register_fields', 'carbon_fields_page_main' );
function carbon_fields_page_main() {
    $Container = new Crb_All_Fields_Page('post_meta', 'Настройки страницы', 'template-pages/home.php');
    $Container->theme_land_main();
    return $Container;
}

add_action('carbon_fields_register_fields', 'register_carbon_fields_other');
function register_carbon_fields_other() {
  require_once( 'all-fields/post-meta.php' );
}

 