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
