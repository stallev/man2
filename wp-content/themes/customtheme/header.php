<!DOCTYPE html>
<html lang="ru">

<head>
    <?php wp_head() ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo esc_attr(carbon_get_theme_option('crf_meta_description')); ?>">
    <meta name="keywords" content="<?php echo esc_attr(carbon_get_theme_option('crf_meta_keywords')); ?>">
    <title><?php echo esc_attr(carbon_get_theme_option('crf_meta_title')); ?></title>
    <meta property="og:title" content="<?php echo esc_attr(carbon_get_theme_option('crf_meta_title')); ?>">
    <meta property="og:description" content="<?php echo esc_attr(carbon_get_theme_option('crf_meta_description')); ?>">
    <meta property="og:type" content="website">
    <meta name="robots" content="noindex, nofollow">
    <meta property="og:image" content="<?php echo esc_url(wp_get_attachment_image_url(carbon_get_theme_option('crf_header_bg_image'), 'full')); ?>">
    <meta property="og:url" content="<?php echo esc_url(get_site_url()); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    
</head>

<body>
    <header ?>">
        <div class="header__top">
            <div class="container container--nav">
                <nav class="nav">
                    <div class="logo"><?php echo esc_attr(carbon_get_theme_option('crf_company_name')); ?></div>
                    <div class="burger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <ul class="nav-links">
                        <?php
                        $nav_links = carbon_get_theme_option('crf_header_nav_links');
                        if (!empty($nav_links)) {
                            foreach ($nav_links as $link) {
                                $url = $link['link_url'];
                                $text = $link['link_text'];
                                echo '<li><a href="' . esc_url($url) . '">' . esc_html($text) . '</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="container">
            <div class="hero">
                <h1><?php echo esc_html(carbon_get_theme_option('crf_header_title')); ?></h1>
                <p><?php echo esc_html(carbon_get_theme_option('crf_header_description')); ?></p>
                <a href="tel:<?php echo esc_attr(carbon_get_theme_option('crf_contact_phone')); ?>" class="hero-phone"><?php echo esc_html(carbon_get_theme_option('crf_contact_phone_label')); ?></a>
                <button class="cta-button modal-button"><?php echo esc_html(carbon_get_theme_option('crf_header_button_text')); ?></button>
                <div class="social-icons">
                    <a class="social-telegram" href="<?php echo esc_attr(carbon_get_theme_option('crf_contact_telegram_chanel')); ?>" target="_blank" rel="noopener noreferrer" aria-label="Telegram">
                        <svg xmlns="http://www.w3.org/2000/svg" width="39" height="33" fill="currentColor" viewBox="0 0 39 33">
                            <path d="M15.5834 21.4945L14.9556 30.3244C15.8538 30.3244 16.2428 29.9386 16.7093 29.4753L20.9204 25.4509L29.6462 31.8409C31.2465 32.7327 32.374 32.2631 32.8057 30.3687L38.5333 3.53105L38.5349 3.52947C39.0425 1.16386 37.6794 0.238804 36.1202 0.819137L2.45354 13.7082C0.155859 14.6001 0.190648 15.8809 2.06295 16.4612L10.6702 19.1384L30.663 6.62879C31.6039 6.00577 32.4594 6.35049 31.7557 6.97351L15.5834 21.4945Z" />
                        </svg>
                    </a>
                    <a class="social-viber" href="viber://chat?number=<?php echo esc_attr(carbon_get_theme_option('crf_contact_phone')); ?>" target="_blank" rel="noopener noreferrer" aria-label="Viber">
                        <img src="<?= get_template_directory_uri() ?>/img/icons/viber_icon.svg">
                    </a>
                    <!-- <a class="social-instagram" href="https://www.instagram.com/your_profile" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                    <a class="social-vk" href="https://vk.com/your_profile" target="_blank" rel="noopener noreferrer" aria-label="VK">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M21.579 6.855c.14-.465 0-.806-.662-.806h-2.193c-.558 0-.813.295-.953.619 0 0-1.115 2.719-2.695 4.482-.51.513-.743.675-1.021.675-.139 0-.341-.162-.341-.627V6.855c0-.558-.161-.806-.626-.806H9.642c-.348 0-.558.258-.558.504 0 .528.789.65.87 2.138v3.228c0 .707-.127.836-.407.836-.743 0-2.551-2.729-3.624-5.853-.209-.606-.42-.847-.98-.847H2.752c-.627 0-.752.295-.752.619 0 .582.743 3.462 3.461 7.271 1.812 2.601 4.363 4.011 6.687 4.011 1.393 0 1.565-.313 1.565-.853v-1.966c0-.626.133-.752.574-.752.324 0 .882.164 2.183 1.417 1.486 1.486 1.732 2.153 2.567 2.153h2.193c.627 0 .939-.313.759-.931-.197-.615-.907-1.51-1.849-2.569-.512-.604-1.277-1.254-1.51-1.579-.325-.419-.231-.604 0-.976.001 0 2.672-3.761 2.949-5.04z"/></svg>
                    </a> -->
                </div>
            </div>
        </div>
    </header>