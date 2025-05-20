<section id="about" class="about">
        <div class="container">
            <h2><?php echo carbon_get_theme_option('crf_about_title'); ?></h2>
            <div class="about-content">
                <div class="about-text">
                    <?php
                    $about_text = carbon_get_theme_option('crf_about_text');
                    if (!empty($about_text)) {
                        foreach ($about_text as $paragraph) {
                            echo '<p>' . esc_html($paragraph['paragraph']) . '</p>';
                        }
                    }
                    ?>
                </div>
                <div class="about-stats">
                    <?php
                    $stats = carbon_get_theme_option('crf_about_stats');
                    if (!empty($stats)) {
                        foreach ($stats as $stat) {
                            ?>
                            <div class="stat-item">
                                <div class="stat-number"><?php echo esc_html($stat['number']); ?></div>
                                <div class="stat-text"><?php echo esc_html($stat['text']); ?></div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="services">
        <div class="container">
            <h2><?php echo carbon_get_theme_option('crf_services_title'); ?></h2>
            <div class="services-grid">
                <?php
                $services = carbon_get_theme_option('crf_services');
                if (!empty($services)) {
                    foreach ($services as $service) {
                        ?>
                        <div class="service-card">
                            <h3><?php echo esc_html($service['title']); ?></h3>
                            <ul class="service-list">
                                <?php
                                if (!empty($service['list'])) {
                                    foreach ($service['list'] as $item) {
                                        echo '<li>' . esc_html($item['item']) . '</li>';
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2><?php echo carbon_get_theme_option('crf_cta_title'); ?></h2>
                <p class="cta-content__message"><?php echo carbon_get_theme_option('crf_cta_message'); ?></p>
                <div class="cta-button modal-buttons">
                    <button class="cta-button modal-button"><?php echo carbon_get_theme_option('crf_cta_button_text'); ?></button>
                    <a href="tel:<?php echo esc_attr(carbon_get_theme_option('crf_contact_phone')); ?>" class="cta-phone"><?php echo carbon_get_theme_option('crf_contact_phone_label'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section id="paving-stones" class="paving-stones">
        <div class="container">
            <h2><?php echo carbon_get_theme_option('crf_paving_title'); ?></h2>
            <p class="paving-stones__description"><?php echo carbon_get_theme_option('crf_paving_description'); ?></p>
            <div class="portfolio-grid">
                <?php
                $paving_items = carbon_get_theme_option('crf_paving_items');
                if (!empty($paving_items)) {
                    foreach ($paving_items as $item) {
                        ?>
                        <div class="portfolio-item">
                            <a href="<?php echo wp_get_attachment_image_url($item['image'], 'full'); ?>" data-fancybox="paving-gallery" data-src="<?php echo wp_get_attachment_image_url($item['image'], 'full'); ?>">
                                <img loading="lazy" src="<?php echo wp_get_attachment_image_url($item['image'], 'full'); ?>" alt="<?php echo esc_attr($item['title']); ?>">
                            </a>
                            <div class="paving-stones__info">
                                <h3><?php echo esc_html($item['title']); ?></h3>
                                <p class="portfolio-item__description"><?php echo esc_html($item['description']); ?></p>
                                <div class="paving-stones__price">
                                    <span class="paving-stones__price-name">Цена: </span>
                                    <span class="paving-stones__price-value"><?php echo esc_html($item['price']); ?></span>
                                </div>
                                <button class="paving-stones__button modal-button"><?php echo esc_html($item['button_text']); ?></button>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <section id="portfolio" class="portfolio">
        <div class="container">
            <h2><?php echo carbon_get_theme_option('crf_portfolio_title'); ?></h2>
            <div class="portfolio-grid">
                <?php
                $portfolio_items = carbon_get_theme_option('crf_portfolio_items');
                if (!empty($portfolio_items)) {
                    foreach ($portfolio_items as $item) {
                        ?>
                        <div class="portfolio-item">
                            <a href="<?php echo wp_get_attachment_image_url($item['image'], 'full'); ?>" data-fancybox="gallery" data-src="<?php echo wp_get_attachment_image_url($item['image'], 'full'); ?>">
                                <img loading="lazy" src="<?php echo wp_get_attachment_image_url($item['image'], 'full'); ?>" alt="<?php echo esc_attr($item['alt']); ?>">
                            </a>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <section id="advantages" class="advantages">
        <div class="container">
            <h2><?php echo carbon_get_theme_option('crf_advantages_title'); ?></h2>
            <div class="advantages-grid">
                <?php
                $advantages = carbon_get_theme_option('crf_advantages');
                if (!empty($advantages)) {
                    foreach ($advantages as $advantage) {
                        ?>
                        <div class="advantage-card">
                            <div class="advantage-icon">
                                <?php echo $advantage['icon_svg']; ?>
                            </div>
                            <h3><?php echo esc_html($advantage['title']); ?></h3>
                            <p><?php echo esc_html($advantage['description']); ?></p>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <section id="process" class="process">
        <div class="container">
            <h2><?php echo carbon_get_theme_option('crf_process_title'); ?></h2>
            <div class="process-steps">
                <?php
                $process_steps = carbon_get_theme_option('crf_process_steps');
                if (!empty($process_steps)) {
                    foreach ($process_steps as $step) {
                        ?>
                        <div class="process-step">
                            <div class="step-number"><?php echo esc_html($step['number']); ?></div>
                            <h3><?php echo esc_html($step['title']); ?></h3>
                            <p><?php echo esc_html($step['description']); ?></p>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <section id="prices" class="prices">
        <div class="container">
            <h2><?php echo carbon_get_theme_option('crf_prices_title'); ?></h2>
            <p class="price-disclaimer"><?php echo carbon_get_theme_option('crf_prices_disclaimer'); ?></p>
            <div class="price-tables">
                <?php
                $price_tables = carbon_get_theme_option('crf_price_tables');
                if (!empty($price_tables)) {
                    foreach ($price_tables as $table) {
                        ?>
                        <div class="price-table">
                            <h3><?php echo esc_html($table['title']); ?></h3>
                            <?php
                            if (!empty($table['items'])) {
                                foreach ($table['items'] as $item) {
                                    ?>
                                    <div class="price-item">
                                        <div class="price-name"><?php echo esc_html($item['name']); ?></div>
                                        <div class="price-value"><?php echo esc_html($item['price']); ?></div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                            <button class="price-button modal-button"><?php echo esc_html($table['button_text']); ?></button>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <section id="testimonials" class="testimonials">
        <div class="container">
            <h2><?php echo carbon_get_theme_option('crf_testimonials_title'); ?></h2>
            <div class="testimonials-grid">
                <?php
                $testimonials = carbon_get_theme_option('crf_testimonials');
                if (!empty($testimonials)) {
                    foreach ($testimonials as $testimonial) {
                        ?>
                        <div class="testimonial-card">
                            <p>"<?php echo esc_html($testimonial['text']); ?>"</p>
                            <cite>- <?php echo esc_html($testimonial['author']); ?>, <?php echo esc_html($testimonial['project']); ?></cite>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <section id="faq" class="faq">
        <div class="container">
            <h2><?php echo carbon_get_theme_option('crf_faq_title'); ?></h2>
            <div class="faq-list">
                <?php
                $faq_items = carbon_get_theme_option('crf_faq_items');
                if (!empty($faq_items)) {
                    foreach ($faq_items as $item) {
                        ?>
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3><?php echo esc_html($item['question']); ?></h3>
                                <span class="faq-toggle">+</span>
                            </div>
                            <div class="faq-answer">
                                <p><?php echo esc_html($item['answer']); ?></p>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <section id="contact" class="contact">
        <div class="container">
            <h2>Связаться с нами</h2>
            <div class="contact-content">
                <div class="contact-info">
                    <h3 class="contact-info__title">Контактная информация</h3>
                    <div class="contact-info__details">
                        <p class="contact-info__item">
                            <span class="contact-info__label">Телефон:</span>
                            <a href="tel:<?php echo esc_attr(carbon_get_theme_option('crf_contact_phone')); ?>" class="contact-info__link contact-info__link--phone">
                            <?php echo carbon_get_theme_option('crf_contact_phone_label'); ?>
                            </a>
                        </p>
                        <p class="contact-info__item">
                            <span class="contact-info__label">Email:</span>
                            <a href="mailto:<?php echo carbon_get_theme_option('crf_contact_email'); ?>" class="contact-info__link contact-info__link--email">
                            <?php echo carbon_get_theme_option('crf_contact_email'); ?>
                            </a>
                        </p>
                        <p class="contact-info__item">
                            <span class="contact-info__label">Адрес:</span>
                            <a href="<?php echo carbon_get_theme_option('crf_contact_address'); ?>" 
                               target="_blank" 
                               rel="noopener noreferrer" 
                               class="contact-info__link contact-info__link--address">
                               <?php echo carbon_get_theme_option('crf_contact_address_label'); ?>
                            </a>
                        </p>
                    </div>
                </div>
                <form id="contactForm" class="contact-form tg-form">
                    <input type="text" placeholder="<?php echo carbon_get_theme_option('crf_contact_name_placeholder'); ?>" name="personName" required>
                    <input type="tel" placeholder="<?php echo carbon_get_theme_option('crf_contact_phone_placeholder'); ?>" name="personPhone" required>
                    <textarea placeholder="<?php echo carbon_get_theme_option('crf_contact_message_placeholder'); ?>" name="personMessage" required></textarea>
                    <input type="hidden" name="contact_form1" value="1">
                    <button type="submit" class="submit-button"><?php echo carbon_get_theme_option('crf_contact_submit_text'); ?></button>
                </form>
            </div>
            
        </div>
        <div class="map-container">
            <div id="map" style="width: 100%; height: 400px;"></div>
        </div>
    </section>