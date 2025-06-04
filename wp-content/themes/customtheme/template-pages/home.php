<?php
/**
 * Template Name: HomePage
 *
 */ 
get_header();

// LocalBusiness structured data
$business_images = carbon_get_theme_option('crf_business_images');
$image_urls = [];
if ($business_images && is_array($business_images)) {
    foreach ($business_images as $img) {
        if (!empty($img['image'])) {
            $url = wp_get_attachment_image_url($img['image'], 'full');
            if ($url) $image_urls[] = $url;
        }
    }
}

$latitude = (float)carbon_get_theme_option('crf_contact_latitude');
$longitude = (float)carbon_get_theme_option('crf_contact_longitude');

// OpeningHoursSpecification
$opening_hours = carbon_get_theme_option('crf_business_opening_hours_spec');
$openingHoursSpecification = [];
if ($opening_hours && is_array($opening_hours)) {
    foreach ($opening_hours as $item) {
        $days = $item['day_of_week'] ?? '';
        // поддержка массива или строки
        $days = is_array($days) ? $days : [$days];
        $openingHoursSpecification[] = [
            '@type' => 'OpeningHoursSpecification',
            'dayOfWeek' => $days,
            'opens' => $item['opens'] ?? '08:00',
            'closes' => $item['closes'] ?? '20:00',
        ];
    }
} else {
    // По умолчанию: ежедневно с 8:00 до 20:00
    $openingHoursSpecification[] = [
        '@type' => 'OpeningHoursSpecification',
        'dayOfWeek' => [
            'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'
        ],
        'opens' => '08:00',
        'closes' => '20:00',
    ];
}

$business = [
    '@context' => 'https://schema.org',
    '@type' => 'LocalBusiness',
    'name' => carbon_get_theme_option('crf_business_name'),
    'image' => $image_urls,
    'logo' => carbon_get_theme_option('crf_business_logo'),
    'url' => carbon_get_theme_option('crf_business_url'),
    'description' => carbon_get_theme_option('crf_business_description'),
    'telephone' => carbon_get_theme_option('crf_contact_phone'),
    'email' => carbon_get_theme_option('crf_contact_email'),
    'servesCuisine' => carbon_get_theme_option('crf_business_serves_cuisine'),
    'address' => [
        '@type' => 'PostalAddress',
        'streetAddress' => carbon_get_theme_option('crf_contact_address'),
        'addressLocality' => 'Могилёв',
        'addressRegion' => carbon_get_theme_option('crf_contact_region'),
        'postalCode' => carbon_get_theme_option('crf_contact_postal_code'),
        'addressCountry' => 'BY',
    ],
    'geo' => [
        '@type' => 'GeoCoordinates',
        'latitude' => $latitude,
        'longitude' => $longitude,
    ],
    'priceRange' => carbon_get_theme_option('crf_business_price_range'),
    'openingHours' => carbon_get_theme_option('crf_contacts_worktime'),
    'openingHoursSpecification' => $openingHoursSpecification,
];
echo '<script type="application/ld+json">' . wp_json_encode($business, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';

// get_template_part('template-parts/land_main_page');
?>

<main class="main">
        <section class="hero">
            <div class="content-container">
                <div class="hero__container">
                    <div class="hero__content">
                        <h1 class="hero__title">
                            <?php echo esc_html(carbon_get_theme_option('crf_home_hero_title')); ?>
                        </h1>
                        <p class="hero__subtitle">
                            <?php echo esc_html(carbon_get_theme_option('crf_home_hero_subtitle')); ?>
                        </p>

                        <ul class="hero__features">
                            <?php $features = carbon_get_theme_option('crf_home_hero_features');
                            if ($features) :
                                foreach ($features as $feature) : ?>
                                    <li class="hero__feature">
                                        <?php if (!empty($feature['crf_home_hero_features_item_svg_icon_code'])) : ?>
                                            <span class="hero__feature-icon"><?php echo $feature['crf_home_hero_features_item_svg_icon_code']; ?></span>
                                        <?php endif; ?>
                                        <span><?php echo esc_html($feature['crf_home_hero_features_item_title']); ?></span>
                                    </li>
                            <?php endforeach; endif; ?>
                        </ul>
                    </div>
                    <div class="hero__image">
                        <?php $hero_img = carbon_get_theme_option('crf_home_hero_image');
                        if ($hero_img) :
                            $img_url = wp_get_attachment_image_url($hero_img, 'full'); ?>
                            <img src="<?php echo esc_url($img_url); ?>" alt="Манипулятор в работе" class="hero__img"
                                loading="eager" />
                        <?php endif; ?>
                    </div>
                </div>
                <div class="hero__advantages">
                    <?php $advantages = carbon_get_theme_option('crf_home_hero_advantages');
                    if ($advantages) :
                        foreach ($advantages as $adv) : ?>
                            <div class="hero__advantage-item">
                                <?php if (!empty($adv['crf_home_hero_advantages_item_svg_icon_code'])) : ?>
                                    <span class="hero__advantage-icon"><?php echo $adv['crf_home_hero_advantages_item_svg_icon_code']; ?></span>
                                <?php endif; ?>
                                <span class="hero__advantage-title"><?php echo esc_html($adv['crf_home_hero_advantages_item_title']); ?></span>
                                <span class="hero__advantage-desc"><?php echo esc_html($adv['crf_home_hero_advantages_item_desc']); ?></span>
                            </div>
                    <?php endforeach; endif; ?>
                </div>

                <button class="hero__button" data-modal-open="order-modal-button order-modal-button--hero">Заказать манипулятор</button>
            </div>
        </section>

        <section class="section" id="services">
            <div class="content-container">
                <h2 class="section-title"><?php echo esc_html(carbon_get_theme_option('crf_home_services_title')); ?></h2>

                <div class="services__grid">
                    <?php get_template_part('template-parts/service-posts'); ?>
                </div>
            </div>
        </section>

        <section class="section section--gray" id="equipment-gallery">
            <div class="content-container">
                <h2 class="section-title"><?php echo esc_html(carbon_get_theme_option('crf_home_gallery_title')); ?></h2>
                <div class="service-gallery__grid service-gallery__grid--equipment">
                    <?php $gallery = carbon_get_theme_option('crf_home_gallery_images');
                    if ($gallery) :
                        foreach ($gallery as $img) :
                            $img_url = wp_get_attachment_image_url($img['image'], 'medium');
                            $img_full = wp_get_attachment_image_url($img['image'], 'full');
                            $alt = !empty($img['alt']) ? esc_attr($img['alt']) : '';
                    ?>
                        <a href="<?php echo esc_url($img_full); ?>" data-fancybox="equipment" class="service-gallery__item">
                            <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo $alt; ?>" class="service-gallery__img" loading="lazy" />
                        </a>
                    <?php endforeach; endif; ?>
                </div>
            </div>
        </section>

        <section class="section" id="advantages">
            <div class="content-container">
                <h2 class="section-title"><?php echo esc_html(carbon_get_theme_option('crf_home_advantages_title')); ?></h2>

                <div class="advantages__grid">
                    <?php $advantages = carbon_get_theme_option('crf_home_advantages');
                    if ($advantages) :
                        foreach ($advantages as $adv) : ?>
                        <article class="advantage-card animated-fadeInUp card-hover-anim">
                            <div class="advantage-card__icon">
                                <?php if (!empty($adv['crf_home_advantages_item_svg_icon_code'])) : ?>
                                    <?php echo $adv['crf_home_advantages_item_svg_icon_code']; ?>
                                <?php endif; ?>
                            </div>
                            <h3 class="advantage-card__title"><?php echo esc_html($adv['crf_home_advantages_item_title']); ?></h3>
                            <p class="advantage-card__description"><?php echo esc_html($adv['crf_home_advantages_item_desc']); ?></p>
                        </article>
                    <?php endforeach; endif; ?>
                </div>
            </div>
        </section>

        <section class="section section--gray" id="workflow">
            <div class="content-container">
                <h2 class="section-title"><?php echo esc_html(carbon_get_theme_option('crf_home_steps_title')); ?></h2>
                <div class="workflow__steps">
                    <?php $steps = carbon_get_theme_option('crf_home_steps');
                    if ($steps) :
                        $i = 1;
                        foreach ($steps as $step) : ?>
                        <article class="workflow-step animated-fadeInUp card-hover-anim">
                            <div class="workflow-step__number"><?php echo sprintf('%02d', $i++); ?></div>
                            <div class="workflow-step__icon">
                                <?php if (!empty($step['crf_home_steps_item_svg_icon_code'])) : ?>
                                    <?php echo $step['crf_home_steps_item_svg_icon_code']; ?>
                                <?php endif; ?>
                            </div>
                            <h3 class="workflow-step__title"><?php echo esc_html($step['crf_home_steps_item_title']); ?></h3>
                            <p class="workflow-step__description"><?php echo esc_html($step['crf_home_steps_item_desc']); ?></p>
                        </article>
                    <?php endforeach; endif; ?>
                </div>
            </div>
        </section>

        <section class="section" id="feedback">
            <div class="content-container">
                <div class="feedback__content">
                    <h2 class="section-title"><?php echo esc_html(carbon_get_theme_option('crf_home_feedback_title')); ?></h2>
                    <p class="feedback__subtitle">
                        <?php echo esc_html(carbon_get_theme_option('crf_home_feedback_subtitle')); ?>
                    </p>

                    <?php get_template_part('template-parts/feedback-form'); ?>
                </div>
            </div>
        </section>
    </main>

<?php
get_footer();