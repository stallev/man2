<?php
/**
 * Template Name: OurEquipment
 *
 */ 
get_header();

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

<main class="equipment-main">
        <div class="content-container">
            <nav class="breadcrumbs">
                <ul class="breadcrumbs__list">
                    <li class="breadcrumbs__item"><a href="<?php echo home_url(); ?>" class="breadcrumbs__link">Главная</a></li>
                    <li class="breadcrumbs__item"><span class="breadcrumbs__current"><?php echo get_the_title(); ?></span></li>
                </ul>
            </nav>
            <h1 class="equipment-title"><?php echo esc_html(carbon_get_theme_option('crf_equipment_title')); ?></h1>
            <div class="equipment-intro">
                <p><?php echo esc_html(carbon_get_theme_option('crf_equipment_intro')); ?></p>
            </div>
            <section class="equipment-list-section">
                <h2 class="section-title"><?php echo esc_html(carbon_get_theme_option('crf_equipment_list_title')); ?></h2>
                <div class="equipment-list">
                    <?php $cards = carbon_get_theme_option('crf_equipment_cards');
                    if ($cards) :
                        foreach ($cards as $card) : ?>
                            <article class="equipment-card">
                                <div class="equipment-card__image">
                                    <?php if (!empty($card['crf_equipment_card_item_image'])) :
                                        $img_url = wp_get_attachment_image_url($card['crf_equipment_card_item_image'], 'medium'); ?>
                                        <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($card['crf_equipment_card_item_title']); ?>" class="equipment-card__img">
                                    <?php endif; ?>
                                </div>
                                <div class="equipment-card__content">
                                    <h3 class="equipment-card__title"><?php echo esc_html($card['crf_equipment_card_item_title']); ?></h3>
                                    <ul class="equipment-card__specs">
                                        <?php if (!empty($card['crf_equipment_card_item_specs'])) :
                                            foreach ($card['crf_equipment_card_item_specs'] as $spec) : ?>
                                                <li><?php echo esc_html($spec['crf_equipment_card_item_spec']); ?></li>
                                        <?php endforeach; endif; ?>
                                    </ul>
                                    <div class="equipment-card__features"><?php echo esc_html($card['crf_equipment_card_item_features']); ?></div>
                                    <button class="equipment-card__order-btn" data-equipment="<?php echo esc_attr($card['crf_equipment_card_item_title']); ?>">
                                        <?php echo esc_html($card['crf_equipment_card_item_button_text']); ?>
                                    </button>
                                </div>
                            </article>
                    <?php endforeach; endif; ?>
                </div>
            </section>
            <section class="equipment-advantages">
                <h2 class="section-title"><?php echo esc_html(carbon_get_theme_option('crf_equipment_advantages_title')); ?></h2>
                <ul class="equipment-advantages__list">
                    <?php $advantages = carbon_get_theme_option('crf_equipment_advantages');
                    if ($advantages) :
                        foreach ($advantages as $adv) : ?>
                            <li><?php echo esc_html($adv['crf_equipment_advantages_item_title']); ?></li>
                    <?php endforeach; endif; ?>
                </ul>
            </section>
            <section class="equipment-feedback">
                <h2 class="section-title"><?php echo esc_html(carbon_get_theme_option('crf_equipment_feedback_title')); ?></h2>
                <?php get_template_part('template-parts/feedback-form'); ?>
            </section>
        </div>
    </main>

<?php
get_footer();
