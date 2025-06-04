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
                    <li class="breadcrumbs__item"><a href="<?php echo home_url('/services-list'); ?>" class="breadcrumbs__link">Услуги</a></li>
                    <li class="breadcrumbs__item"><span class="breadcrumbs__current"><?php the_title(); ?></span></li>
                </ul>
            </nav>
            <?php
            // JSON-LD structured data для BreadcrumbList
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
                    'name' => 'Услуги',
                    'item' => home_url('/services-list')
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 3,
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
            <?php
            // JSON-LD structured data для FAQ
            $faqs = carbon_get_post_meta(get_the_ID(), 'crf_service_faq');
            if (!empty($faqs)) {
                $faq_structured = [
                    "@context" => "https://schema.org",
                    "@type" => "FAQPage",
                    "mainEntity" => []
                ];
                foreach ($faqs as $faq) {
                    if (!empty($faq['question']) && !empty($faq['answer'])) {
                        $faq_structured['mainEntity'][] = [
                            "@type" => "Question",
                            "name" => wp_strip_all_tags($faq['question']),
                            "acceptedAnswer" => [
                                "@type" => "Answer",
                                "text" => wp_strip_all_tags($faq['answer'])
                            ]
                        ];
                    }
                }
                if (!empty($faq_structured['mainEntity'])) {
                    echo '<script type="application/ld+json">' . wp_json_encode($faq_structured, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
                }
            }
            ?>
            <section class="service-feedback">
                <h2 class="section-title"><?php echo esc_html(carbon_get_theme_option('crf_service_form_title')); ?></h2>
                <?php get_template_part('template-parts/feedback-form'); ?>
            </section>
        </div>
    </main>

<?php
get_footer(); 