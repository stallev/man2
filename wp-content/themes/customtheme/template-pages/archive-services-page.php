<?php
/**
 * Template Name: Archive Service
 *
 */ 

get_header();

// Получаем ID активных услуг из настроек темы
// $active_services = carbon_get_theme_option('crf_active_services');
// $active_ids = array();
// if (!empty($active_services) && is_array($active_services)) {
//     foreach ($active_services as $item) {
//         if (isset($item['id'])) {
//             $active_ids[] = (int)$item['id'];
//         }
//     }
// }
// $itemListElement = [];
// if (!empty($active_ids)) {
//     $service_query = new WP_Query([
//         'post_type' => 'service',
//         'post__in' => $active_ids,
//         'orderby' => 'post__in',
//         'posts_per_page' => -1,
//         'post_status' => 'publish',
//     ]);
//     $position = 1;
//     if ($service_query->have_posts()) {
//         while ($service_query->have_posts()) {
//             $service_query->the_post();
//             $service_id = get_the_ID();
//             $service_title = get_the_title();
//             $service_url = get_permalink();
//             $service_desc = carbon_get_post_meta($service_id, 'crf_service_card_description');
//             $service_img = has_post_thumbnail() ? get_the_post_thumbnail_url($service_id, 'medium') : get_template_directory_uri() . '/assets/images/no-image.jpg';
//             $service_price = carbon_get_post_meta($service_id, 'crf_service_price');
//             $itemListElement[] = [
//                 '@type' => 'ListItem',
//                 'position' => $position++,
//                 'item' => [
//                     '@type' => 'Service',
//                     'name' => $service_title,
//                     'url' => $service_url,
//                     'description' => $service_desc,
//                     'image' => $service_img,
//                     'offers' => [
//                         '@type' => 'Offer',
//                         'price' => $service_price,
//                         'priceCurrency' => 'BYN'
//                     ]
//                 ]
//             ];
//         }
//         wp_reset_postdata();
//     }
// }
// $itemlist_structured = [
//     '@context' => 'https://schema.org',
//     '@type' => 'ItemList',
//     'itemListElement' => $itemListElement
// ];
// echo '<script type="application/ld+json">' . wp_json_encode($itemlist_structured, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';

// BreadcrumbList structured data
$breadcrumb_items = [
    [
        '@type' => 'ListItem',
        'position' => 1,
        'name' => 'Главная',
        'item' => home_url('/')
    ],
    [
        '@type' => 'ListItem',
        'position' => 2,
        'name' => get_the_title(),
        'item' => get_permalink()
    ]
];
$breadcrumb_structured = [
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => $breadcrumb_items
];
echo '<script type="application/ld+json">' . wp_json_encode($breadcrumb_structured, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';

?>

<main class="services-page">
    <div class="content-container">
        <nav class="breadcrumbs">
            <ul class="breadcrumbs__list">
                <li class="breadcrumbs__item">
                    <a href="/" class="breadcrumbs__link">Главная</a>
                </li>
                <li class="breadcrumbs__item">
                    <span class="breadcrumbs__current"><?php echo get_the_title(); ?></span>
                </li>
            </ul>
        </nav>

        <h1 class="services-page__title"><?php echo get_the_title(); ?></h1>

        <div class="services-page__grid">
            <?php get_template_part('template-parts/service-posts'); ?>
        </div>
    </div>
</main>

<?php
get_footer(); 