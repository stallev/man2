<?php
/**
 * Регистрация кастомного типа постов "Услуги"
 *
 * @package customtheme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

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
        'supports'            => array('title', 'thumbnail', 'excerpt'),
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

/**
 * Добавление кастомных полей для услуг
 */
function customtheme_service_fields() {
    Container::make('post_meta', __('Информация об услуге', 'customtheme'))
        ->where('post_type', '=', 'service')
        // ->where( 'post_id', '=', 28 )
        // ->where( 'post_type', 'IN',  array( 'service') )
        ->add_tab(__('Основная информация', 'customtheme'), array(
            Field::make('text', 'crf_service_card_title', __('Заголовок карточки', 'customtheme'))
                ->set_help_text(__('Заголовок карточки', 'customtheme'))
                ->set_visible_in_rest_api(true),

            Field::make('text', 'crf_service_card_description', __('Описание карточки', 'customtheme'))
                ->set_help_text(__('Описание карточки', 'customtheme'))
                ->set_visible_in_rest_api(true),

            Field::make('rich_text', 'crf_service_description', __('Описание услуги', 'customtheme'))
                ->set_help_text(__('Подробное описание услуги', 'customtheme'))
                ->set_visible_in_rest_api(true),
            
            Field::make('complex', 'crf_service_benefits', __('Преимущества', 'customtheme'))
                ->set_help_text(__('Список преимуществ услуги', 'customtheme'))
                ->add_fields(array(
                    Field::make('text', 'benefit', __('Преимущество', 'customtheme'))
                        ->set_required(true)
                ))
                ->set_visible_in_rest_api(true),
            
            Field::make('complex', 'crf_service_specs', __('Технические характеристики', 'customtheme'))
                ->set_help_text(__('Технические характеристики услуги', 'customtheme'))
                ->add_fields(array(
                    Field::make('text', 'spec', __('Характеристика', 'customtheme'))
                        ->set_required(true)
                ))
                ->set_visible_in_rest_api(true),
            
            Field::make('complex', 'crf_service_process', __('Процесс выполнения', 'customtheme'))
                ->set_help_text(__('Этапы выполнения услуги', 'customtheme'))
                ->add_fields(array(
                    Field::make('text', 'step', __('Этап', 'customtheme'))
                        ->set_required(true)
                ))
                ->set_visible_in_rest_api(true),
        ))
        ->add_tab(__('Стоимость', 'customtheme'), array(
            Field::make('text', 'crf_service_price', __('Базовая стоимость', 'customtheme'))
                ->set_help_text(__('Например: от 100 BYN за рейс', 'customtheme'))
                ->set_visible_in_rest_api(true),
            
            Field::make('textarea', 'crf_service_price_note', __('Примечание к стоимости', 'customtheme'))
                ->set_help_text(__('Дополнительная информация о стоимости', 'customtheme'))
                ->set_visible_in_rest_api(true),
            
            Field::make('text', 'crf_service_order_button_label', __('Текст кнопки заказа', 'customtheme'))
                ->set_help_text(__('Текст кнопки заказа', 'customtheme'))
                ->set_visible_in_rest_api(true),
        ))
        ->add_tab(__('Галерея', 'customtheme'), array(
            Field::make('complex', 'crf_service_gallery', __('Галерея изображений', 'customtheme'))
                ->set_help_text(__('Фотографии, связанные с услугой', 'customtheme'))
                ->add_fields(array(
                    Field::make('image', 'image', __('Изображение', 'customtheme'))
                        ->set_required(true)
                        ->set_value_type('url'),
                    Field::make('text', 'alt', __('Alt текст', 'customtheme'))
                        ->set_required(true),
                    Field::make('text', 'title', __('Title', 'customtheme'))
                        ->set_required(true)
                ))
                ->set_visible_in_rest_api(true),
        ))
        ->add_tab(__('FAQ', 'customtheme'), array(
            Field::make('complex', 'crf_service_faq', __('Часто задаваемые вопросы', 'customtheme'))
                ->set_help_text(__('Вопросы и ответы по услуге', 'customtheme'))
                ->add_fields(array(
                    Field::make('text', 'question', __('Вопрос', 'customtheme'))
                        ->set_required(true),
                    Field::make('rich_text', 'answer', __('Ответ', 'customtheme'))
                        ->set_required(true)
                ))
                ->set_visible_in_rest_api(true),
        ));
}
add_action('carbon_fields_register_fields', 'customtheme_service_fields');

add_action('edit_form_after_title', function() {
    global $post;
    if ($post) {
        echo '<div style="padding:10px 0;color:#0073aa;font-weight:bold;">Тип поста: ' . esc_html($post->post_type) . '</div>';
    }
});
