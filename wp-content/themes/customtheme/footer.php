<footer class="footer">
    <div class="footer__container">
        <div class="footer__main">
            <div class="footer__info">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="footer__logo">
                    <?php 
                    $logo = carbon_get_theme_option('crf_footer_logo');
                    if ($logo) {
                        echo carbon_get_theme_option('crf_header_logo');
                    } else {
                        // Fallback SVG logo if no image is set
                        ?>
                        <svg class="footer__logo-img" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 200 200">
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
                <p class="footer__description">
                    <?php echo esc_html(carbon_get_theme_option('crf_footer_description')); ?>
                </p>
                <div class="footer__social">
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
                       class="footer__social-link footer__social-link--<?php echo esc_attr($platform); ?>" 
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

            <div class="footer__nav">
                <div class="footer__nav-column">
                    <h3 class="footer__nav-title"><?php echo esc_html__('Навигация', 'customtheme'); ?></h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer_nav',
                        'container' => false,
                        'menu_class' => 'footer__nav-list',
                        'fallback_cb' => false,
                        'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                    ));
                    ?>
                </div>

                <div class="footer__nav-column">
                    <h3 class="footer__nav-title"><?php echo esc_html__('Услуги', 'customtheme'); ?></h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer_services',
                        'container' => false,
                        'menu_class' => 'footer__nav-list',
                        'fallback_cb' => false,
                        'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                    ));
                    ?>
                </div>

                <div class="footer__nav-column">
                    <h3 class="footer__nav-title"><?php echo esc_html__('Контакты', 'customtheme'); ?></h3>
                    <ul class="footer__nav-list">
                        <?php 
                        $phone = carbon_get_theme_option('crf_contact_phone');
                        $phone_label = carbon_get_theme_option('crf_contact_phone_label');
                        if ($phone && $phone_label): 
                        ?>
                        <li>
                            <a href="tel:<?php echo esc_attr($phone); ?>" class="footer__nav-link footer__nav-link--contact">
                                <svg class="footer__nav-icon" width="20" height="20" viewBox="0 0 24 24">
                                    <path d="M20 15.5c-1.2 0-2.4-.2-3.6-.6-.3-.1-.7 0-1 .2l-2.2 2.2c-2.8-1.4-5.1-3.8-6.6-6.6l2.2-2.2c.3-.3.4-.7.2-1-.3-1.1-.5-2.3-.5-3.5 0-.6-.4-1-1-1H4c-.6 0-1 .4-1 1 0 9.4 7.6 17 17 17 .6 0 1-.4 1-1v-3.5c0-.6-.4-1-1-1zM19 12h2c0-4.9-4-8.9-9-8.9v2c3.9 0 7 3.1 7 6.9zm-4 0h2c0-2.8-2.2-5-5-5v2c1.7 0 3 1.3 3 3z" />
                                </svg>
                                <?php echo esc_html($phone_label); ?>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php 
                        $email = carbon_get_theme_option('crf_contact_email');
                        if ($email): 
                        ?>
                        <li>
                            <a href="mailto:<?php echo esc_attr($email); ?>" class="footer__nav-link footer__nav-link--contact">
                                <svg class="footer__nav-icon" width="20" height="20" viewBox="0 0 24 24">
                                    <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                                </svg>
                                <?php echo esc_html($email); ?>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php 
                        $address = carbon_get_theme_option('crf_contact_address');
                        $address_url = carbon_get_theme_option('crf_contact_address_url');
                        if ($address && $address_url): 
                        ?>
                        <li>
                            <a href="<?php echo esc_url($address_url); ?>" target="_blank" rel="noopener noreferrer" class="footer__nav-link footer__nav-link--contact">
                                <svg class="footer__nav-icon" width="20" height="20" viewBox="0 0 24 24">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                                </svg>
                                <?php echo esc_html($address); ?>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="footer__bottom">
            <div class="footer__copyright">
                <?php 
                $copyright = carbon_get_theme_option('crf_footer_copyright');
                if ($copyright) {
                    echo wp_kses_post($copyright);
                } else {
                    printf(
                        esc_html__('© %d %s. Все права защищены.', 'customtheme'),
                        date('Y'),
                        get_bloginfo('name')
                    );
                }
                ?>
            </div>
            <div class="footer__policy">
                <?php if ($privacy_policy = carbon_get_theme_option('crf_privacy_policy_link')): ?>
                <a href="<?php echo esc_url($privacy_policy); ?>" class="footer__policy-link">
                    <?php echo esc_html(carbon_get_theme_option('crf_privacy_policy_text')); ?>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>

<div class="modal" id="orderModal">
    <div class="modal__overlay"></div>
    <div class="modal__container">
        <button class="modal__close" aria-label="Закрыть">
            <svg width="24" height="24" viewBox="0 0 24 24">
                <path
                    d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
            </svg>
        </button>
        <h2 class="modal__title">Заказать манипулятор</h2>
        <form class="modal__form" id="orderForm">
            <input type="hidden" name="service" id="serviceName" />
            <div class="modal__form-group">
                <label class="modal__label" for="name">Ваше имя</label>
                <input type="text" class="modal__input" id="name" name="name" required
                    placeholder="Введите ваше имя" />
            </div>
            <div class="modal__form-group">
                <label class="modal__label" for="phone">Телефон</label>
                <input type="tel" class="modal__input form-phone" name="phone" required
                    placeholder="+375 (__) ___-__-__" />
            </div>
            <div class="modal__form-group">
                <label class="modal__label" for="message">Комментарий</label>
                <textarea class="modal__textarea" id="message" name="message"
                    placeholder="Опишите ваш вопрос или задачу"></textarea>
            </div>
            <div class="modal__form-group modal__form-group--checkbox">
                <input type="checkbox" class="modal__checkbox" id="privacy" name="privacy" required />
                <label class="modal__label modal__label--checkbox" for="privacy">
                    Я согласен на обработку персональных данных
                </label>
            </div>
            <button type="submit" class="modal__submit">Отправить заявку</button>
        </form>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>