<footer class="footer">
    <div class="container">
        <div class="social-icons footer-social">
            <a class="social-telegram" href="<?php echo esc_attr(carbon_get_theme_option('crf_contact_telegram_chanel')); ?>" target="_blank" rel="noopener noreferrer" aria-label="Telegram">
                <svg xmlns="http://www.w3.org/2000/svg" width="39" height="33" fill="currentColor" viewBox="0 0 39 33">
                    <path d="M15.5834 21.4945L14.9556 30.3244C15.8538 30.3244 16.2428 29.9386 16.7093 29.4753L20.9204 25.4509L29.6462 31.8409C31.2465 32.7327 32.374 32.2631 32.8057 30.3687L38.5333 3.53105L38.5349 3.52947C39.0425 1.16386 37.6794 0.238804 36.1202 0.819137L2.45354 13.7082C0.155859 14.6001 0.190648 15.8809 2.06295 16.4612L10.6702 19.1384L30.663 6.62879C31.6039 6.00577 32.4594 6.35049 31.7557 6.97351L15.5834 21.4945Z" />
                </svg>
            </a>
            <a class="social-viber" href="viber://chat?number=<?php echo esc_attr(carbon_get_theme_option('crf_contact_phone')); ?>" target="_blank" rel="noopener noreferrer" aria-label="Viber">
                <img src="<?= get_template_directory_uri() ?>/img/icons/viber_icon.svg">
            </a>
        </div>
        <div class="footer-copyright">
            © <script>document.write(new Date().getFullYear())</script> ООО "<?php echo esc_attr(carbon_get_theme_option('crf_company_name')); ?>". Все права защищены.
        </div>
    </div>
</footer>

<div class="modal">
    <div class="modal-content">
        <button class="modal-close">&times;</button>
        <h2>Заказать услугу</h2>
        <form id="orderForm" class="tg-form">
            <input type="text" name="personName" placeholder="<?php echo carbon_get_theme_option('crf_contact_name_placeholder'); ?>" required>
            <input type="tel" name="personPhone" placeholder="<?php echo carbon_get_theme_option('crf_contact_phone_placeholder'); ?>" required>
            <input id="orderForm__type" type="text" name="type" placeholder="">
            <input type="hidden" name="modal_contact_form" value="1">
            <textarea placeholder="<?php echo carbon_get_theme_option('crf_contact_message_placeholder'); ?>" name="personMessage" required></textarea>
            <button type="submit" class="submit-button"><?php echo carbon_get_theme_option('crf_contact_submit_text'); ?></button>
        </form>
    </div>
</div>
<?php wp_footer() ?>
</body>
</html>