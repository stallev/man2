<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

get_header();
?>

<main class="service-main">
        <div class="content-container">
            <nav class="breadcrumbs">
                <ul class="breadcrumbs__list">
                    <li class="breadcrumbs__item"><a href="/" class="breadcrumbs__link">Главная</a></li>
                    <li class="breadcrumbs__item"><a href="/services.html" class="breadcrumbs__link">Услуги</a></li>
                    <li class="breadcrumbs__item"><span class="breadcrumbs__current">Перевозка газосиликатных блоков</span></li>
                </ul>
            </nav>
            <h1 class="service-title"><?php the_title(); ?></h1>
            <div class="service-desc">
                <?php echo wp_kses_post(carbon_get_post_meta(get_the_ID(), 'crf_service_description')); ?>
            </div>
            <section class="service-benefits">
                <h2 class="section-title">Преимущества</h2>
                <ul class="service-benefits__list">
                    <?php 
                    $benefits = carbon_get_post_meta(get_the_ID(), 'crf_service_benefits');
                    if (!empty($benefits)) {
                        foreach ($benefits as $benefit) {
                            echo '<li>' . esc_html($benefit['benefit']) . '</li>';
                        }
                    }
                    ?>
                </ul>
            </section>
            <section class="service-specs">
                <h2 class="section-title">Технические характеристики</h2>
                <ul class="service-specs__list">
                    <?php 
                    $specs = carbon_get_post_meta(get_the_ID(), 'crf_service_specs');
                    if (!empty($specs)) {
                        foreach ($specs as $spec) {
                            echo '<li>' . esc_html($spec['spec']) . '</li>';
                        }
                    }
                    ?>
                </ul>
            </section>
            <div class="service-row">
                <section class="service-process">
                    <h2 class="section-title">Процесс выполнения</h2>
                    <ol class="service-process__list">
                        <?php 
                        $process = carbon_get_post_meta(get_the_ID(), 'crf_service_process');
                        if (!empty($process)) {
                            foreach ($process as $step) {
                                echo '<li>' . esc_html($step['step']) . '</li>';
                            }
                        }
                        ?>
                    </ol>
                </section>
                <section class="service-price">
                    <h2 class="section-title">Стоимость</h2>
                    <div class="service-price__value"><?php echo esc_html(carbon_get_post_meta(get_the_ID(), 'crf_service_price')); ?></div>
                    <p class="service-price__note"><?php echo esc_html(carbon_get_post_meta(get_the_ID(), 'crf_service_price_note')); ?></p>
                    <button class="service-card__button" data-service="<?php echo esc_attr(get_the_title()); ?>">Заказать перевозку</button>
                </section>
            </div>
            <section class="service-gallery">
                <h2 class="section-title">Фотогалерея</h2>
                <div class="service-gallery__grid">
                    <?php 
                    $gallery = carbon_get_post_meta(get_the_ID(), 'crf_service_gallery');
                    if (!empty($gallery)) {
                        foreach ($gallery as $image) {
                            echo '<a data-fancybox="gallery" href="' . esc_url($image['image']) . '">';
                            echo '<img src="' . esc_url($image['image']) . '" alt="' . esc_attr($image['alt']) . '" title="' . esc_attr($image['title']) . '">';
                            echo '</a>';
                        }
                    }
                    ?>
                </div>
            </section>
            <section class="service-faq">
                <h2 class="section-title">Часто задаваемые вопросы</h2>
                <div class="faq">
                    <?php 
                    $faqs = carbon_get_post_meta(get_the_ID(), 'crf_service_faq');
                    if (!empty($faqs)) {
                        foreach ($faqs as $faq) {
                            echo '<div class="faq__item">';
                            echo '<button class="faq__question">' . esc_html($faq['question']) . '</button>';
                            echo '<div class="faq__answer">' . wp_kses_post($faq['answer']) . '</div>';
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
            </section>
            <section class="service-feedback">
                <h2 class="section-title"><?php echo esc_html(carbon_get_theme_option('crf_service_form_title')); ?></h2>
                <form class="feedback-form" id="feedbackForm">
                <input type="hidden" name="service" id="serviceName" value="<?php echo esc_attr(get_the_title()); ?>" />
                    <div class="feedback-form__group">
                        <label class="feedback-form__label" for="nameService"><?php echo esc_html(carbon_get_theme_option('crf_service_form_name_label')); ?></label>
                        <input type="text" class="feedback-form__input" id="nameService" name="name" required 
                            placeholder="<?php echo esc_attr(carbon_get_theme_option('crf_service_form_name_placeholder')); ?>">
                    </div>
                    <div class="feedback-form__group">
                        <label class="feedback-form__label" for="phoneService"><?php echo esc_html(carbon_get_theme_option('crf_service_form_phone_label')); ?></label>
                        <input type="tel" class="feedback-form__input form-phone" name="phone" required 
                            placeholder="<?php echo esc_attr(carbon_get_theme_option('crf_service_form_phone_placeholder')); ?>">
                    </div>
                    <div class="feedback-form__group">
                        <label class="feedback-form__label" for="messageService"><?php echo esc_html(carbon_get_theme_option('crf_service_form_message_label')); ?></label>
                        <textarea class="feedback-form__textarea" id="messageService" name="message" 
                            placeholder="<?php echo esc_attr(carbon_get_theme_option('crf_service_form_message_placeholder')); ?>"></textarea>
                    </div>
                    <div class="feedback-form__group feedback-form__group--checkbox">
                        <input type="checkbox" class="feedback-form__checkbox" id="privacyService" name="privacy" required>
                        <label class="feedback-form__label feedback-form__label--checkbox" for="privacyService">
                            <?php echo esc_html(carbon_get_theme_option('crf_service_form_privacy_label')); ?>
                        </label>
                    </div>
                    <button type="submit" class="feedback-form__submit"><?php echo esc_html(carbon_get_theme_option('crf_service_form_submit_text')); ?></button>
                </form>
            </section>
        </div>
    </main>

<?php
get_footer(); 