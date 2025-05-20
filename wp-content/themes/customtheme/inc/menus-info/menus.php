<?php
/**
 * Регистрация навигационных меню
 *
 * @package customtheme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Регистрация областей меню
 */
function customtheme_register_menus() {
    register_nav_menus(
        array(
            'header_menu' => esc_html__('Главное меню в шапке', 'customtheme'),
            'footer_nav' => esc_html__('Навигация в подвале', 'customtheme'),
            'footer_services' => esc_html__('Меню услуг в подвале', 'customtheme')
        )
    );
}
add_action('after_setup_theme', 'customtheme_register_menus');

/**
 * Добавление классов к пунктам меню
 */
function customtheme_menu_classes($classes, $item, $args) {
    if ($args->theme_location === 'header_menu') {
        $classes[] = 'header__menu-item';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'customtheme_menu_classes', 10, 3);

/**
 * Добавление классов к ссылкам меню
 */
function customtheme_menu_link_classes($atts, $item, $args) {
    if ($args->theme_location === 'header_menu') {
        $atts['class'] = 'header__menu-link';
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'customtheme_menu_link_classes', 10, 3);

/**
 * Вывод меню в шапке
 */
function customtheme_header_menu() {
    wp_nav_menu(array(
        'theme_location' => 'header_menu',
        'container' => 'nav',
        'container_class' => 'header__nav',
        'menu_class' => 'header__menu',
        'fallback_cb' => false,
        'depth' => 1
    ));
}

/**
 * Вывод навигации в подвале
 */
function customtheme_footer_nav() {
    wp_nav_menu(array(
        'theme_location' => 'footer_nav',
        'container' => 'nav',
        'container_class' => 'footer__nav',
        'menu_class' => 'footer__menu',
        'fallback_cb' => false,
        'depth' => 1
    ));
}

/**
 * Вывод меню услуг в подвале
 */
function customtheme_footer_services() {
    wp_nav_menu(array(
        'theme_location' => 'footer_services',
        'container' => 'nav',
        'container_class' => 'footer__services',
        'menu_class' => 'footer__services-menu',
        'fallback_cb' => false,
        'depth' => 1
    ));
}
  