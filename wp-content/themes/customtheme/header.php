<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
    <link rel="manifest" href="/site.webmanifest" />
    <link rel="stylesheet" href="styles.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
</head>

<body <?php body_class(); ?>>
    <header class="header">
        <div class="header__container">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo">
                <?php 
                $logo = carbon_get_theme_option('crf_header_logo');
                if ($logo) {
                    echo carbon_get_theme_option('crf_header_logo');
                } else {
                    // Fallback SVG logo if no image is set
                    ?>
                    <svg class="header__logo-img" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 200 200">
                        <rect width="200" height="200" fill="url('#gradient')"></rect>
                        <defs>
                            <linearGradient id="gradient" gradientTransform="rotate(45 0.5 0.5)">
                                <stop offset="0%" stop-color="#ffffff"></stop>
                                <stop offset="100%" stop-color="#ffffff"></stop>
                            </linearGradient>
                        </defs>
                        <g>
                            <g fill="#1b3855" transform="matrix(5.984415584415585,0,0,5.984415584415585,10.174156649004331,142.5485704706861)" stroke="#0e5278" stroke-width="1.35">
                                <path d="M9.98 0L9.15-2.66L4.45-2.66L3.63 0L-0.03 0L5.19-14.22L8.41-14.22L13.66 0L9.98 0ZM6.80-10.23L5.27-5.30L8.33-5.30L6.80-10.23ZM14.70-14.22L19.20-14.22L22.37-4.33L25.54-14.22L30.05-14.22L30.05 0L26.61 0L26.61-3.32L26.94-10.12L23.51 0L21.24 0L17.79-10.13L18.13-3.32L18.13 0L14.70 0L14.70-14.22Z"></path>
                            </g>
                        </g>
                    </svg>
                    <?php
                }
                ?>
            </a>

            <nav class="header__nav">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'header_menu',
                    'container' => false,
                    'menu_class' => 'header__menu',
                    'fallback_cb' => false,
                    'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                ));
                ?>
            </nav>

            <div class="header__contacts">
                <?php 
                $phone = carbon_get_theme_option('crf_contact_phone');
                $phone_label = carbon_get_theme_option('crf_contact_phone_label');
                if ($phone && $phone_label): 
                ?>
                <a href="tel:<?php echo esc_attr($phone); ?>" class="header__phone">
                    <?php echo esc_html($phone_label); ?>
                </a>
                <?php endif; ?>

                <div class="header__social">
                    <?php 
                    $social_links = array(
                        'instagram' => array(
                            'url' => carbon_get_theme_option('crf_social_instagram'),
                            'label' => 'Instagram'
                        ),
                        'telegram' => array(
                            'url' => carbon_get_theme_option('crf_social_telegram'),
                            'label' => 'Telegram'
                        ),
                        'viber' => array(
                            'url' => carbon_get_theme_option('crf_social_viber'),
                            'label' => 'Viber'
                        )
                    );

                    foreach ($social_links as $platform => $data):
                        if ($data['url']):
                    ?>
                    <a href="<?php echo esc_url($data['url']); ?>" 
                       class="header__social-link header__social-link--<?php echo esc_attr($platform); ?>" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       aria-label="<?php echo esc_attr($data['label']); ?>">
                        <?php echo carbon_get_theme_option('crf_social_' . $platform . '_icon'); ?>
                    </a>
                    <?php 
                        endif;
                    endforeach; 
                    ?>
                </div>
            </div>
            
            <button class="header__mobile-menu-btn" aria-label="<?php echo esc_attr__('Открыть меню', 'customtheme'); ?>">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>