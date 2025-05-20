<?php
/**
 * Общие поля сайта
 *
 * @package customtheme
 */

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Регистрация общих полей сайта
 */
add_action('carbon_fields_register_fields', 'crb_register_common_fields');
function crb_register_common_fields() {
	Container::make('theme_options', 'Общие настройки сайта')
		->add_tab('SVG Логотип и название сайта', array(
			Field::make('text', 'crf_header_logo', 'Логотип в шапке')
				->set_default_value('https://www.instagram.com/Mogilev_manipulator_/'),
			Field::make('text', 'crf_footer_logo', 'Логотип в футере')
				->set_default_value('https://www.instagram.com/Mogilev_manipulator_/'),
			Field::make('text', 'crf_header_logo_text', 'Название сайта')
				->set_default_value('Mogilev_manipulator_'),
		))
		->add_tab('Контактная информация', array(
			Field::make('text', 'crf_contact_phone', 'Номер телефона')
				->set_default_value('+375336585585'),
			Field::make('text', 'crf_contact_phone_label', 'Отображение номера телефона')
				->set_default_value('+375-(33)-658-5585'),
			Field::make('text', 'crf_contact_email', 'Email адрес')
				->set_default_value('info@example.com'),
			Field::make('text', 'crf_contact_address', 'Адрес')
				->set_default_value('г. Могилёв, ул. Примерная, 123'),
			Field::make('text', 'crf_contact_latitude', 'Широта')
				->set_default_value('53.9000')
				->set_help_text('Введите широту в формате 53.9000'),
			Field::make('text', 'crf_contact_longitude', 'Долгота')
				->set_default_value('30.3333')
				->set_help_text('Введите долготу в формате 30.3333')
		))
		->add_tab('Социальные сети', array(
			Field::make('text', 'crf_social_instagram', 'Instagram')
				->set_default_value('https://www.instagram.com/Mogilev_manipulator_/'),
			Field::make('text', 'crf_social_instagram_icon', 'SVG иконка Instagram')
				->set_default_value('https://www.instagram.com/Mogilev_manipulator_/'),
			Field::make('text', 'crf_social_telegram', 'Telegram')
				->set_default_value('https://t.me/nikitabus3692'),
			Field::make('text', 'crf_social_telegram_icon', 'SVG иконка Telegram')
				->set_default_value('https://www.instagram.com/Mogilev_manipulator_/'),
			Field::make('text', 'crf_social_viber', 'Viber')
				->set_default_value('viber://chat?number=%2B375336585585'),
			Field::make('text', 'crf_social_viber_icon', 'SVG иконка Viber')
				->set_default_value('https://www.instagram.com/Mogilev_manipulator_/'),
		))
		->add_tab('Формы обратной связи', array(
			Field::make('text', 'crf_modal_title', __('Заголовок формы', 'customtheme'))
				->set_default_value('Заказать манипулятор')
				->set_help_text(__('Заголовок модальной формы заказа', 'customtheme')),
			
			Field::make('text', 'crf_modal_name_label', __('Метка поля имени', 'customtheme'))
				->set_default_value('Ваше имя')
				->set_help_text(__('Текст метки для поля ввода имени', 'customtheme')),
			
			Field::make('text', 'crf_modal_name_placeholder', __('Плейсхолдер поля имени', 'customtheme'))
				->set_default_value('Введите ваше имя')
				->set_help_text(__('Текст подсказки в поле ввода имени', 'customtheme')),
			
			Field::make('text', 'crf_modal_phone_label', __('Метка поля телефона', 'customtheme'))
				->set_default_value('Телефон')
				->set_help_text(__('Текст метки для поля ввода телефона', 'customtheme')),
			
			Field::make('text', 'crf_modal_phone_placeholder', __('Плейсхолдер поля телефона', 'customtheme'))
				->set_default_value('+375 (__) ___-__-__')
				->set_help_text(__('Текст подсказки в поле ввода телефона', 'customtheme')),
			
			Field::make('text', 'crf_modal_message_label', __('Метка поля комментария', 'customtheme'))
				->set_default_value('Комментарий')
				->set_help_text(__('Текст метки для поля ввода комментария', 'customtheme')),
			
			Field::make('text', 'crf_modal_message_placeholder', __('Плейсхолдер поля комментария', 'customtheme'))
				->set_default_value('Опишите ваш вопрос или задачу')
				->set_help_text(__('Текст подсказки в поле ввода комментария', 'customtheme')),
			
			Field::make('text', 'crf_modal_privacy_label', __('Текст согласия', 'customtheme'))
				->set_default_value('Я согласен на обработку персональных данных')
				->set_help_text(__('Текст согласия на обработку персональных данных', 'customtheme')),
			
			Field::make('text', 'crf_modal_submit_text', __('Текст кнопки отправки', 'customtheme'))
				->set_default_value('Отправить заявку')
				->set_help_text(__('Текст на кнопке отправки формы', 'customtheme')),
		))
		->add_tab('Форма на странице услуги', array(
			Field::make('text', 'crf_service_form_title', __('Заголовок формы', 'customtheme'))
				->set_default_value('Оставьте заявку')
				->set_help_text(__('Заголовок формы на странице услуги', 'customtheme')),
			
			Field::make('text', 'crf_service_form_name_label', __('Метка поля имени', 'customtheme'))
				->set_default_value('Ваше имя')
				->set_help_text(__('Текст метки для поля ввода имени', 'customtheme')),
			
			Field::make('text', 'crf_service_form_name_placeholder', __('Плейсхолдер поля имени', 'customtheme'))
				->set_default_value('Введите ваше имя')
				->set_help_text(__('Текст подсказки в поле ввода имени', 'customtheme')),
			
			Field::make('text', 'crf_service_form_phone_label', __('Метка поля телефона', 'customtheme'))
				->set_default_value('Телефон')
				->set_help_text(__('Текст метки для поля ввода телефона', 'customtheme')),
			
			Field::make('text', 'crf_service_form_phone_placeholder', __('Плейсхолдер поля телефона', 'customtheme'))
				->set_default_value('+375 (__) ___-__-__')
				->set_help_text(__('Текст подсказки в поле ввода телефона', 'customtheme')),
			
			Field::make('text', 'crf_service_form_message_label', __('Метка поля комментария', 'customtheme'))
				->set_default_value('Комментарий')
				->set_help_text(__('Текст метки для поля ввода комментария', 'customtheme')),
			
			Field::make('text', 'crf_service_form_message_placeholder', __('Плейсхолдер поля комментария', 'customtheme'))
				->set_default_value('Опишите ваш вопрос или задачу')
				->set_help_text(__('Текст подсказки в поле ввода комментария', 'customtheme')),
			
			Field::make('text', 'crf_service_form_privacy_label', __('Текст согласия', 'customtheme'))
				->set_default_value('Я согласен на обработку персональных данных')
				->set_help_text(__('Текст согласия на обработку персональных данных', 'customtheme')),
			
			Field::make('text', 'crf_service_form_submit_text', __('Текст кнопки отправки', 'customtheme'))
				->set_default_value('Отправить заявку')
				->set_help_text(__('Текст на кнопке отправки формы', 'customtheme')),
		));
}

/**
 * Базовый класс для работы с полями Carbon Fields
 */
class Crb_All_Fields {
	public $container;

	public function __construct($type, $name) {
		$this->container = Container::make($type, $name);
	}

	/**
	 * Добавление общих полей контактной информации
	 * Используется для добавления этих полей в другие контейнеры
	 */
	public function add_contact_fields() {
		$this->container->add_fields(array(
			Field::make('text', 'crf_contact_phone', 'Номер телефона'),
			Field::make('text', 'crf_contact_phone_label', 'Отображение номера телефона'),
			Field::make('text', 'crf_contact_email', 'Email адрес'),
			Field::make('text', 'crf_contact_address', 'Адрес'),
			Field::make('text', 'crf_contact_latitude', 'Широта')
				->set_help_text('Введите широту в формате 53.9000'),
			Field::make('text', 'crf_contact_longitude', 'Долгота')
				->set_help_text('Введите долготу в формате 30.3333')
		));
		return $this;
	}

	/**
	 * Добавление полей социальных сетей
	 * Используется для добавления этих полей в другие контейнеры
	 */
	public function add_social_fields() {
		$this->container->add_fields(array(
			Field::make('text', 'crf_social_instagram', 'Instagram'),
			Field::make('text', 'crf_social_instagram_icon', 'SVG иконка Instagram'),
			Field::make('text', 'crf_social_telegram', 'Telegram'),
			Field::make('text', 'crf_social_telegram_icon', 'SVG иконка Telegram'),
			Field::make('text', 'crf_social_viber', 'Viber'),
			Field::make('text', 'crf_social_viber_icon', 'SVG иконка Viber')
		));
		return $this;
	}
}

/**
 * Класс для работы с полями страниц
 */
class Crb_All_Fields_Page extends Crb_All_Fields {
	public function __construct($type, $name, $template) {
		$this->container = Container::make($type, $name)->show_on_template($template);
	}
}

/**
 * Класс для работы с полями записей
 */
class Crb_All_Fields_Post extends Crb_All_Fields {
	public function __construct($type, $name, $type_post) {
		$this->container = Container::make($type, $name)->where('post_type', '=', $type_post);
	}
}

/**
 * Класс для работы с полями записей с исключением шаблонов
 */
class Crb_All_Fields_Post_And_Hide_Template extends Crb_All_Fields {
	public function __construct($type, $name, $type_post, $hide_temp_path) {
		$this->container = Container::make($type, $name)
			->show_on_post_type($type_post)
			->hide_on_template($hide_temp_path);
	}
}

/**
 * Класс для работы с полями таксономий
 */
class Crb_All_Fields_Taxonomy extends Crb_All_Fields {
	public function __construct($type, $name, $taxonomy) {
		$this->container = Container::make($type, $name)->where('term_taxonomy', '=', $taxonomy);
	}
}
