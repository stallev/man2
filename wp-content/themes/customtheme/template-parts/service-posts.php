<?php
// Получаем ID активных услуг из настроек темы
$active_services = carbon_get_theme_option('crf_active_services');

// Преобразуем массив объектов ассоциаций в массив ID
$active_ids = array();
if (!empty($active_services) && is_array($active_services)) {
    foreach ($active_services as $item) {
        if (isset($item['id'])) {
            $active_ids[] = (int)$item['id'];
        }
    }
}

if (!empty($active_ids)) {
    $service_query = new WP_Query([
        'post_type' => 'service',
        'post__in' => $active_ids,
        'orderby' => 'post__in',
        'posts_per_page' => -1,
        'post_status' => 'publish',
    ]);

    if ( $service_query->have_posts() ) :
        while ( $service_query->have_posts() ) : $service_query->the_post(); ?>
            <article class="service-card animated-fadeInUp card-hover-anim">
                <div class="service-card__image">
                    <?php if ( has_post_thumbnail() ) {
                        $img_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                        $img_alt = get_the_title();
                        $img_title = get_the_title();
                    } else {
                        $img_url = get_template_directory_uri() . '/assets/images/no-image.jpg';
                        $img_alt = $img_title = get_the_title();
                    } ?>
                    <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>" title="<?php echo esc_attr($img_title); ?>" class="service-card__img" />
                </div>
                <div class="service-card__content">
                    <h3 class="service-card__title">
                        <?php echo esc_html(get_the_title()); ?>
                    </h3>
                    <p class="service-card__description">
                        <?php echo esc_html(carbon_get_post_meta(get_the_ID(), 'crf_service_card_description')); ?>
                    </p>
                    <div class="service-card__footer">
                        <div class="service-card__price">
                            <?php echo esc_html(carbon_get_post_meta(get_the_ID(), 'crf_service_price')); ?>
                        </div>
                        <div class="service-card__buttons">
                            <a href="<?php the_permalink(); ?>" class="service-card__link button-anim">Подробнее</a>
                            <button class="service-card__button button-anim" data-service="<?php echo esc_attr(get_the_title()); ?>">
                                <?php echo esc_html('Заказать' ?: carbon_get_post_meta(get_the_ID(), 'crf_service_order_button_label')); ?>
                            </button>
                        </div>
                    </div>
                </div>
            </article>
        <?php endwhile;
        wp_reset_postdata();
    else : ?>
        <p>Услуги не найдены.</p>
    <?php endif;
} else {
    echo '<p>Услуги не выбраны для отображения.</p>';
}
