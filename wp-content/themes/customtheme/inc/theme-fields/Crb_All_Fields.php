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
		->add_tab('Основные настройки', array(
			// Группа: SVG Логотип и название сайта
			Field::make('html', 'group_logo_title')->set_html('<h3 style="margin-top:2em;">SVG Логотип и название сайта</h3>'),
			Field::make('text', 'crf_header_logo', 'Логотип в шапке')
				->set_default_value('https://www.instagram.com/Mogilev_manipulator_/'),
			Field::make('text', 'crf_footer_logo', 'Логотип в футере')
				->set_default_value('https://www.instagram.com/Mogilev_manipulator_/'),
			Field::make('text', 'crf_header_logo_text', 'Название сайта')
				->set_default_value('Mogilev_manipulator_'),


			// Группа: Контактная информация
			Field::make('html', 'group_contacts_title')->set_html('<h3 style="margin-top:2em;">Контактная информация</h3>'),
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
				->set_help_text('Введите долготу в формате 30.3333'),


			// Группа: Социальные сети
			Field::make('html', 'group_social_title')->set_html('<h3 style="margin-top:2em;">Социальные сети</h3>'),
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



			// Группа: Формы обратной связи
			Field::make('html', 'group_forms_title')->set_html('<h3 style="margin-top:2em;">Формы обратной связи</h3>'),
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



			// Группа: Форма на странице услуги
			Field::make('html', 'group_service_form_title')->set_html('<h3 style="margin-top:2em;">Форма на странице услуги</h3>'),
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

			// Группа: Активные услуги
			Field::make('html', 'group_active_services_title')->set_html('<h3 style="margin-top:2em;">Активные услуги</h3>'),
			Field::make('association', 'crf_active_services', 'Активные услуги')
				->set_types(array(
					array(
						'type'      => 'post',
						'post_type' => 'service',
					),
				))
				->set_max(20)
				->set_help_text('Выберите и отсортируйте услуги, которые должны отображаться на странице. Только отмеченные услуги будут видны посетителям.'),
		))
		->add_tab('Главная страница', array(
			// Hero-блок
			Field::make('html', 'group_home_hero_title')->set_html('<h3 style="margin-top:2em;">Hero-блок</h3>'),
			Field::make('text', 'crf_home_hero_title', 'Заголовок Hero'),
			Field::make('text', 'crf_home_hero_subtitle', 'Подзаголовок Hero'),
			Field::make('complex', 'crf_home_hero_features', 'Возможности Hero')
				->add_fields(array(
					Field::make('text', 'crf_home_hero_features_item_title', 'Возможность'),
				)),
			Field::make('image', 'crf_home_hero_image', 'Изображение Hero'),

			Field::make('complex', 'crf_home_hero_advantages', 'Преимущества Hero')
				->add_fields(array(
					Field::make('text', 'crf_home_hero_advantages_item_title', 'Преимущество')
						->set_width(25),
					Field::make('text', 'crf_home_hero_advantages_item_desc', 'Описание')
						->set_width(25),
					Field::make('text', 'crf_home_hero_advantages_item_svg_icon_code', 'SVG иконка')
						->set_width(25),
				)),

			// Блок "Наши услуги"
			Field::make('html', 'group_home_services_title')->set_html('<h3 style="margin-top:2em;">Блок "Наши услуги"</h3>'),
			Field::make('text', 'crf_home_services_title', 'Заголовок блока "Наши услуги"'),

			// Галерея техники
			Field::make('html', 'group_home_gallery_title')->set_html('<h3 style="margin-top:2em;">Галерея техники</h3>'),
			Field::make('text', 'crf_home_gallery_title', 'Заголовок галереи техники'),
			Field::make('complex', 'crf_home_gallery_images', 'Изображения галереи')
				->add_fields(array(
					Field::make('image', 'image', 'Изображение')
						->set_width(25),
					Field::make('text', 'alt', 'Alt')
						->set_width(50),
				)),

			// Блок "Почему выбирают нас"
			Field::make('html', 'group_home_advantages_title')->set_html('<h3 style="margin-top:2em;">Почему выбирают нас</h3>'),
			Field::make('text', 'crf_home_advantages_title', 'Заголовок блока преимуществ'),
			Field::make('complex', 'crf_home_advantages', 'Преимущества')
				->add_fields(array(
					Field::make('text', 'crf_home_advantages_item_title', 'Заголовок') ->set_width(25),
					Field::make('text', 'crf_home_advantages_item_desc', 'Описание') ->set_width(25),
					Field::make('text', 'crf_home_advantages_item_svg_icon_code', 'SVG иконка') ->set_width(25),
				)),

			// Блок "Как мы работаем"
			Field::make('html', 'group_home_steps_title')->set_html('<h3 style="margin-top:2em;">Как мы работаем</h3>'),
			Field::make('text', 'crf_home_steps_title', 'Заголовок блока этапов'),
			Field::make('complex', 'crf_home_steps', 'Этапы работы')
				->add_fields(array(
					Field::make('text', 'crf_home_steps_item_title', 'Заголовок этапа')
						->set_width(25),
					Field::make('text', 'crf_home_steps_item_desc', 'Описание этапа')
						->set_width(25),
					Field::make('text', 'crf_home_steps_item_svg_icon_code', 'SVG иконка')
						->set_width(25),
				)),

			// Блок "Остались вопросы?"
			Field::make('html', 'group_home_feedback_title')->set_html('<h3 style="margin-top:2em;">Остались вопросы?</h3>'),
			Field::make('text', 'crf_home_feedback_title', 'Заголовок формы'),
			Field::make('text', 'crf_home_feedback_subtitle', 'Подзаголовок формы'),
		))
		->add_tab('Парк техники', array(
			Field::make('text', 'crf_equipment_title', 'Заголовок страницы'),
			Field::make('text', 'crf_equipment_intro', 'Вводный текст'),

			Field::make('text', 'crf_equipment_list_title', 'Заголовок списка техники'),

			Field::make('html', 'group_equipment_cards_title')->set_html('<h3 style="margin-top:2em;">Карточки техники</h3>'),
			Field::make('complex', 'crf_equipment_cards', 'Карточки техники')
				->add_fields(array(
					Field::make('image', 'crf_equipment_card_item_image', 'Изображение')
						->set_width(25),
					Field::make('text', 'crf_equipment_card_item_title', 'Название техники')
						->set_width(25),
					Field::make('complex', 'crf_equipment_card_item_specs', 'Характеристики')
						->add_fields(array(
							Field::make('text', 'crf_equipment_card_item_spec', 'Характеристика'),
						)),
					Field::make('text', 'crf_equipment_card_item_features', 'Особенности')
						->set_width(25),
					Field::make('text', 'crf_equipment_card_item_button_text', 'Текст кнопки')
						->set_width(25),
				)),

			Field::make('html', 'group_equipment_advantages_title')->set_html('<h3 style="margin-top:2em;">Преимущества автопарка</h3>'),
			Field::make('complex', 'crf_equipment_advantages', 'Преимущества автопарка')
				->add_fields(array(
					Field::make('text', 'crf_equipment_advantages_item_title', 'Преимущество'),
				)),

			Field::make('text', 'crf_equipment_feedback_title', 'Заголовок формы'),
		))
		->add_tab('Стоимость услуг', array(
			Field::make('text', 'crf_price_title', 'Заголовок страницы'),
			Field::make('text', 'crf_price_subtitle', 'Подзаголовок страницы'),
			Field::make('html', 'group_price_factors_title')->set_html('<h3 style="margin-top:2em;">Факторы формирования цены</h3>'),
			Field::make('complex', 'crf_price_factors', 'Факторы формирования цены')
				->add_fields(array(
					Field::make('text', 'crf_price_factor_title', 'Заголовок фактора')
						->set_width(50),
					Field::make('text', 'crf_price_factor_desc', 'Описание фактора')
						->set_width(50),
				)),
			Field::make('text', 'crf_price_note_icon', 'Иконка примечания (например, info)'),
			Field::make('text', 'crf_price_note_text', 'Текст примечания'),
			Field::make('text', 'crf_price_map_title', 'Заголовок карты'),
			Field::make('textarea', 'crf_price_map_iframe', 'Код карты (iframe)'),
		))
		->add_tab('Контакты', array(
			Field::make('text', 'crf_contacts_title', 'Заголовок страницы')
				->set_default_value('Контакты и заявка на аренду манипулятора'),
			Field::make('text', 'crf_contacts_worktime', 'Время работы')
				->set_default_value('Пн–Сб: 8:00–20:00'),
			Field::make('text', 'crf_contacts_cta', 'Призыв к действию')
				->set_default_value('Свяжитесь с нами любым удобным способом!'),
			Field::make('textarea', 'crf_contacts_map_iframe', 'Карта (iframe)')
				->set_default_value('<iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Aexample&amp;source=constructor&amp;width=100%25&amp;height=320&amp;lang=ru_RU&amp;scroll=false&amp;ll=30.265652,53.913507&amp;z=16&amp;pt=30.265652,53.913507,pm2rdm" width="100%" height="320" frameborder="0" allowfullscreen title="Карта проезда" class="contacts-map__iframe"></iframe>'),
			Field::make('textarea', 'crf_contacts_seo_text', 'SEO-текст')
				->set_default_value('Свяжитесь с нами для заказа манипулятора в Могилёве и области. Мы оперативно ответим на все вопросы, подберём оптимальную технику и предложим выгодные условия сотрудничества. Работаем с частными и корпоративными клиентами, гарантируем прозрачность и профессионализм на каждом этапе.'),

			// Группа: Информация об ИП
			Field::make('html', 'group_owner_info_title')->set_html('<h3 style="margin-top:2em;">Информация об индивидуальном предпринимателе</h3>'),
			Field::make('text', 'crf_owner_fullname', 'Полное наименование ИП (ФИО)')
				->set_default_value('Иванов Иван Иванович'),
			Field::make('text', 'crf_owner_legal_address', 'Юридический адрес')
				->set_default_value('220000, г. Минск, ул. Примерная, д. 1, кв. 1'),
			Field::make('text', 'crf_owner_actual_address', 'Фактический адрес')
				->set_default_value('220000, г. Минск, ул. Примерная, д. 1, кв. 1'),
			Field::make('text', 'crf_owner_registration_info', 'Сведения о гос. регистрации')
				->set_default_value('Зарегистрирован Минским горисполкомом 01.01.2020 г.'),
			Field::make('text', 'crf_owner_unp', 'УНП')
				->set_default_value('123456789'),
			Field::make('text', 'crf_owner_payment_methods', 'Способы оплаты')
				->set_default_value('Наличный расчет, банковские карты, ЕРИП'),
			Field::make('image', 'crf_owner_receipt_sample', 'Образец кассового чека')
				->set_value_type('url'),
			Field::make('textarea', 'crf_owner_bank_details', 'Банковские реквизиты')
				->set_default_value('Банковские реквизиты: BY00UNBS00000000000000000000, ОАО "Банк", БИК UNBSBY2X'),
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
