<?php
/**
 * Подключение стилей и скриптов темы
 *
 * @package customtheme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'customtheme_scripts' ) ) {
    /**
     * Подключение стилей и скриптов темы
     */ 
    function customtheme_scripts() {
        // Получаем версию темы
        $the_theme = wp_get_theme();
        $theme_version = $the_theme->get('Version');

        // Подключение стилей
        wp_enqueue_style(
            'customtheme-style',
            get_template_directory_uri() . '/assets/css/styles.css',
            array(),
            $theme_version
        );

        // Подключение скриптов
        wp_enqueue_script(
            'customtheme-script',
            get_template_directory_uri() . '/assets/js/script.js',
            array('jquery'),
            $theme_version,
            true
        );
    }
}

add_action( 'wp_enqueue_scripts', 'customtheme_scripts' );
