<?php
/**
 * Регистрация кастомного типа постов "Услуги"
 *
 * @package customtheme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Регистрация кастомного типа постов
 */
function customtheme_register_service_post_type() {
    $labels = array(
        'name'                  => _x('Услуги', 'Post Type General Name', 'customtheme'),
        'singular_name'         => _x('Услуга', 'Post Type Singular Name', 'customtheme'),
        'menu_name'            => __('Услуги', 'customtheme'),
        'name_admin_bar'       => __('Услуга', 'customtheme'),
        'archives'             => __('Архив услуг', 'customtheme'),
        'attributes'           => __('Атрибуты услуги', 'customtheme'),
        'parent_item_colon'    => __('Родительская услуга:', 'customtheme'),
        'all_items'            => __('Все услуги', 'customtheme'),
        'add_new_item'         => __('Добавить новую услугу', 'customtheme'),
        'add_new'              => __('Добавить новую', 'customtheme'),
        'new_item'             => __('Новая услуга', 'customtheme'),
        'edit_item'            => __('Редактировать услугу', 'customtheme'),
        'update_item'          => __('Обновить услугу', 'customtheme'),
        'view_item'            => __('Просмотреть услугу', 'customtheme'),
        'view_items'           => __('Просмотреть услуги', 'customtheme'),
        'search_items'         => __('Найти услугу', 'customtheme'),
    );

    $args = array(
        'label'               => __('Услуги', 'customtheme'),
        'description'         => __('Услуги компании', 'customtheme'),
        'labels'              => $labels,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-clipboard',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest'        => true,
        'rewrite'             => array(
            'slug' => 'services',
            'with_front' => true
        ),
    );

    register_post_type('service', $args);
}
add_action('init', 'customtheme_register_service_post_type');

/**
 * Добавление поддержки миниатюр для кастомного типа постов
 */
function customtheme_service_thumbnail_support() {
    add_theme_support('post-thumbnails', array('service'));
}
add_action('after_setup_theme', 'customtheme_service_thumbnail_support');
