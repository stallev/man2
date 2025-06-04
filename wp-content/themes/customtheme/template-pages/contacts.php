<?php
/**
 * Template Name: Contacts
 *
 */ 
get_header();

// LocalBusiness + ContactPoint structured data
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
$opening_hours = carbon_get_theme_option('crf_business_opening_hours_spec');
$openingHoursSpecification = [];
if ($opening_hours && is_array($opening_hours)) {
    foreach ($opening_hours as $item) {
        $days = $item['day_of_week'] ?? '';
        $days = is_array($days) ? $days : [$days];
        $openingHoursSpecification[] = [
            '@type' => 'OpeningHoursSpecification',
            'dayOfWeek' => $days,
            'opens' => $item['opens'] ?? '08:00',
            'closes' => $item['closes'] ?? '20:00',
        ];
    }
} else {
    $openingHoursSpecification[] = [
        '@type' => 'OpeningHoursSpecification',
        'dayOfWeek' => [
            'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'
        ],
        'opens' => '08:00',
        'closes' => '20:00',
    ];
}
$contactpoints = carbon_get_theme_option('crf_contactpoints');
$contactPointsArr = [];
if ($contactpoints && is_array($contactpoints)) {
    foreach ($contactpoints as $cp) {
        $contactPointsArr[] = [
            '@type' => 'ContactPoint',
            'contactType' => $cp['type'] ?? 'customer support',
            'telephone' => $cp['telephone'] ?? carbon_get_theme_option('crf_contact_phone'),
            'email' => $cp['email'] ?? carbon_get_theme_option('crf_contact_email'),
            'areaServed' => $cp['area_served'] ?? 'Могилёв и область',
            'availableLanguage' => $cp['available_language'] ?? 'Russian',
        ];
    }
} else {
    $contactPointsArr[] = [
        '@type' => 'ContactPoint',
        'contactType' => 'customer support',
        'telephone' => carbon_get_theme_option('crf_contact_phone'),
        'email' => carbon_get_theme_option('crf_contact_email'),
        'areaServed' => 'Могилёв и область',
        'availableLanguage' => 'Russian',
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
    'contactPoint' => $contactPointsArr,
];
echo '<script type="application/ld+json">' . wp_json_encode($business, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';

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

  <main class="contacts-main">
    <div class="content-container">
      <nav class="breadcrumbs">
        <ul class="breadcrumbs__list">
            <li class="breadcrumbs__item"><a href="<?php echo home_url(); ?>" class="breadcrumbs__link">Главная</a></li>
            <li class="breadcrumbs__item"><span class="breadcrumbs__current"><?php echo get_the_title(); ?></span></li>
        </ul>
      </nav>
      <h1 class="contacts-title"><?php echo esc_html(carbon_get_theme_option('crf_contacts_title')); ?></h1>
      <div class="contacts-content">
        <section class="contacts-info">
          <h2 class="visually-hidden">Контактная информация</h2>
          <ul class="contacts-info__list">
            <li>
              <span class="contacts-info__icon">🏢</span>
              <span><?php echo esc_html(carbon_get_theme_option('crf_contact_address')); ?></span>
            </li>
            <li>
              <span class="contacts-info__icon">📞</span>
              <a href="tel:<?php echo esc_attr(carbon_get_theme_option('crf_contact_phone')); ?>" class="contacts-info__link">
                <?php echo esc_html(carbon_get_theme_option('crf_contact_phone_label')); ?>
              </a>
            </li>
            <li>
              <span class="contacts-info__icon">✉️</span>
              <a href="mailto:<?php echo esc_attr(carbon_get_theme_option('crf_contact_email')); ?>" class="contacts-info__link">
                <?php echo esc_html(carbon_get_theme_option('crf_contact_email')); ?>
              </a>
            </li>
            <li>
              <span class="contacts-info__icon">⏰</span>
              <span><?php echo esc_html(carbon_get_theme_option('crf_contacts_worktime')); ?></span>
            </li>
          </ul>
          <div class="contacts-social">
            <a href="<?php echo esc_url(carbon_get_theme_option('crf_social_instagram')); ?>" class="contacts-social__link header__social-link--instagram" aria-label="Instagram">
              <?php echo carbon_get_theme_option('crf_social_instagram_icon'); ?>
            </a>
            <a href="<?php echo esc_url(carbon_get_theme_option('crf_social_telegram')); ?>" class="contacts-social__link header__social-link--telegram" aria-label="Telegram">
              <?php echo carbon_get_theme_option('crf_social_telegram_icon'); ?>
            </a>
            <a href="<?php echo esc_url(carbon_get_theme_option('crf_social_viber')); ?>" class="contacts-social__link header__social-link--viber" aria-label="Viber">
              <?php echo carbon_get_theme_option('crf_social_viber_icon'); ?>
            </a>
            <a href="<?php echo esc_url(carbon_get_theme_option('crf_social_whatsapp')); ?>" class="contacts-social__link header__social-link--whatsapp" aria-label="WhatsApp">
              <?php echo carbon_get_theme_option('crf_social_whatsapp_icon'); ?>
            </a>
          </div>
          <div class="contacts-info__cta">
            <?php echo esc_html(carbon_get_theme_option('crf_contacts_cta')); ?>
          </div>
        </section>
        <section class="contacts-map">
          <?php echo carbon_get_theme_option('crf_contacts_map_iframe'); ?>
        </section>
        <section class="contacts-form-section">
          <h2 class="contacts-form-title">
            <?php echo esc_html(carbon_get_theme_option('crf_modal_title')); ?>
          </h2>
          <?php get_template_part('template-parts/feedback-form'); ?>
        </section>
      </div>
      <section class="owner-info">
        <div class="content-container">
          <h2 class="owner-info__title">Реквизиты индивидуального предпринимателя</h2>
          <ul class="owner-info__list">
            <li class="owner-info__item">
              <span class="owner-info__label">Полное наименование ИП:</span>
              <span class="owner-info__value"><?php echo esc_html(carbon_get_theme_option('crf_owner_fullname')); ?></span>
            </li>
            <li class="owner-info__item">
              <span class="owner-info__label">Юридический адрес:</span>
              <span class="owner-info__value"><?php echo esc_html(carbon_get_theme_option('crf_owner_legal_address')); ?></span>
            </li>
            <li class="owner-info__item">
              <span class="owner-info__label">Фактический адрес:</span>
              <span class="owner-info__value"><?php echo esc_html(carbon_get_theme_option('crf_owner_actual_address')); ?></span>
            </li>
            <li class="owner-info__item">
              <span class="owner-info__label">Сведения о регистрации:</span>
              <span class="owner-info__value"><?php echo esc_html(carbon_get_theme_option('crf_owner_registration_info')); ?></span>
            </li>
            <li class="owner-info__item">
              <span class="owner-info__label">УНП:</span>
              <span class="owner-info__value"><?php echo esc_html(carbon_get_theme_option('crf_owner_unp')); ?></span>
            </li>
            <li class="owner-info__item">
              <span class="owner-info__label">Способы оплаты:</span>
              <span class="owner-info__value"><?php echo esc_html(carbon_get_theme_option('crf_owner_payment_methods')); ?></span>
            </li>
          </ul>
          <?php if ($bank_details = carbon_get_theme_option('crf_owner_bank_details')): ?>
            <div class="owner-info__bank-details">
              <strong>Банковские реквизиты:</strong><br>
              <?php echo nl2br(esc_html($bank_details)); ?>
            </div>
          <?php endif; ?>
          <?php if ($receipt_img = carbon_get_theme_option('crf_owner_receipt_sample')): ?>
            <div class="owner-info__receipt-sample-img">
              <strong>Образец кассового чека:</strong><br>
              <img src="<?php echo esc_url($receipt_img); ?>" alt="Образец кассового чека" class="owner-info__receipt-img" loading="lazy"/>
            </div>
          <?php endif; ?>
        </div>
      </section>
      <section class="contacts-seo-text">
        <h2 class="visually-hidden">Аренда манипулятора — контакты</h2>
        <p>
          <?php echo esc_html(carbon_get_theme_option('crf_contacts_seo_text')); ?>
        </p>
      </section>
    </div>
  </main>
<?php
get_footer();
