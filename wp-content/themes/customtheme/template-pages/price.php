<?php
/**
 * Template Name: Price
 *
 */ 
get_header();
?>

<main class="main">
        <div class="content-container">
            
            <section class="price-info">
                <nav class="breadcrumbs">
                    <ul class="breadcrumbs__list">
                      <li class="breadcrumbs__item"><a href="<?php echo home_url(); ?>" class="breadcrumbs__link">Главная</a></li>
                      <li class="breadcrumbs__item"><span class="breadcrumbs__current"><?php echo get_the_title(); ?></span></li>
                    </ul>
                </nav>
                <h1 class="price-info__title"><?php echo esc_html(carbon_get_theme_option('crf_price_title')); ?></h1>
                <p class="price-info__subtitle"><?php echo esc_html(carbon_get_theme_option('crf_price_subtitle')); ?></p>
                <ul class="price-info__list">
                    <?php $factors = carbon_get_theme_option('crf_price_factors');
                    if ($factors) :
                        foreach ($factors as $factor) : ?>
                            <li><b><?php echo esc_html($factor['crf_price_factor_title']); ?></b> <?php echo esc_html($factor['crf_price_factor_desc']); ?></li>
                    <?php endforeach; endif; ?>
                </ul>
                <div class="price-info__note">
                    <span class="price-info__icon material-icons"><?php echo esc_html(carbon_get_theme_option('crf_price_note_icon')); ?></span>
                    <span><?php echo esc_html(carbon_get_theme_option('crf_price_note_text')); ?></span>
                </div>
                <div class="price-info__map-block">
                    <h2 class="price-info__map-title"><?php echo esc_html(carbon_get_theme_option('crf_price_map_title')); ?></h2>
                    <div class="price-info__map">
                        <?php echo carbon_get_theme_option('crf_price_map_iframe'); ?>
                    </div>
                </div>
            </section>
        </div>
    </main>

<?php
get_footer();
