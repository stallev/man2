<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

require_once('inc/common-carbonfields.php');
require_once('inc/custom_hooks/telegram_order_handler.php');
require_once('inc/enqueue.php');

add_action('after_setup_theme', 'crb_load');
function crb_load()
{
    require_once('libs/carbon-fields/vendor/autoload.php');
    \Carbon_Fields\Carbon_Fields::boot();
}

function create_faq_fields()
{
    Container::make('post_meta', 'FAQ')
        ->where('post_type', '=', 'post')
        ->add_fields(array(
            Field::make('complex', 'faq', 'FAQ')
                ->set_visible_in_rest_api($visible = true)
                ->add_fields(array(
                    Field::make('text', 'question', 'Question'),
                    Field::make('text', 'answer', 'Answer'),
                )),
        ));
}

add_theme_support('post-thumbnails', array('post', 'page'));
add_theme_support('title-tag');

add_action('carbon_fields_register_fields', 'create_faq_fields');

require_once('inc/menus-info/menus.php');
require_once('inc/pages-data/pages-data-index.php');

function webp_upload_mimes($existing_mimes)
{
    $existing_mimes['webp'] = 'image/webp';
    return $existing_mimes;
}
add_filter('mime_types', 'webp_upload_mimes');


@ini_set('upload_max_size', '900M');
@ini_set('post_max_size', '900M');
@ini_set('max_execution_time', '300');

/**
 * Подключение файлов с кастомными типами постов
 */
require_once get_template_directory() . '/inc/custom_posts/service_post.php';

remove_action('wp_head', 'wp_generator');

define('AUTOMATIC_UPDATER_DISABLED', true); // Отключает все автообновления
define('WP_AUTO_UPDATE_CORE', false);       // Отключает автообновление ядра
