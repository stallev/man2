<?php
/**
 * Template Name: Contacts
 *
 */ 
get_header();
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
