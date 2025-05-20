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

add_action('carbon_fields_register_fields', 'crb_register_common_fields');
function crb_register_common_fields() {
	Container::make('theme_options', 'Общие настройки сайта')
		->add_tab('Мета-информация', array(
			Field::make('text', 'crf_meta_title', 'Meta Title')
				->set_default_value('Аренда манипулятора в Могилёве — Грузоперевозки и услуги спецтехники'),
			Field::make('textarea', 'crf_meta_description', 'Meta Description')
				->set_default_value('Аренда манипулятора в Могилёве и области. Грузоперевозки до 15 тонн, современные манипуляторы, выгодные цены. Заказать услуги манипулятора — быстро, надёжно, с гарантией!'),
			Field::make('text', 'crf_meta_keywords', 'Meta Keywords')
				->set_default_value('аренда манипулятора, манипулятор Могилёв, услуги манипулятора, грузоперевозки Могилёв, спецтехника, заказать манипулятор, перевозка грузов, аренда спецтехники')
		))
		->add_tab('Контактная информация', array(
			Field::make('text', 'crf_contact_phone', 'Номер телефона')
				->set_default_value('+375336585585'),
			Field::make('text', 'crf_contact_phone_label', 'Отображение номера телефона')
				->set_default_value('+375-(33)-658-5585'),
			Field::make('text', 'crf_contact_email', 'Email адрес')
				->set_default_value('info@example.com'),
			Field::make('text', 'crf_contact_address', 'Адрес')
				->set_default_value('г. Могилёв, ул. Примерная, 123')
		))
		->add_tab('Социальные сети', array(
			Field::make('text', 'crf_social_instagram', 'Instagram')
				->set_default_value('https://www.instagram.com/Mogilev_manipulator_/'),
			Field::make('text', 'crf_social_telegram', 'Telegram')
				->set_default_value('https://t.me/nikitabus3692'),
			Field::make('text', 'crf_social_viber', 'Viber')
				->set_default_value('viber://chat?number=%2B375336585585')
		));
}

class Crb_All_Fields
{
	public $container;
	public function __construct($type, $name)
	{ // работает при старте
		$this->container = $container = Container::make($type, $name);
	}
	// Настройка главной страницы сайта
	public function settings_common()
	{
		$this->container
			->add_tab('Шапка сайта и SEO значения', array(
				Field::make('text', 'crf_header_title', 'Заголовок в шапке')
					->set_default_value('Полный спектр услуг по благоустройству'),
				Field::make('textarea', 'crf_header_description', 'Описание в шапке')
					->set_default_value('От проектирования до реализации: мощение, озеленение, ландшафтный дизайн и уход за территорией'),
				Field::make('text', 'crf_header_button_text', 'Текст кнопки')
					->set_default_value('Заказать консультацию'),
				Field::make('image', 'crf_header_bg_image', 'Фоновое изображение шапки сайта'),
				Field::make('complex', 'crf_header_nav_links', 'Навигационное меню')
					->add_fields(array(
						Field::make('text', 'link_text', 'Текст ссылки'),
						Field::make('text', 'link_url', 'URL ссылки')
					)),
				Field::make('text', 'crf_meta_title', 'Meta Title')
					->set_default_value('ВекторБет | Полный спектр услуг по благоустройству'),
				Field::make('textarea', 'crf_meta_description', 'Meta Description')
					->set_default_value('Профессиональные услуги по благоустройству территорий и широкий ассортимент тротуарных плит. Качественные материалы для вашего ландшафтного дизайна.'),
				Field::make('text', 'crf_meta_keywords', 'Meta Keywords')
					->set_default_value('благоустройство территорий, тротуарная плитка, ландшафтный дизайн, купить тротуарную плитку, благоустройство усадеб, мощение дорожек')
			))
			->add_tab('Контактная информация', array(
				Field::make('text', 'crf_company_name', 'Название компании'),
				Field::make('text', 'crf_contact_phone', 'Номер телефона'),
				Field::make('text', 'crf_contact_phone_label', 'Отображение номера телефона'),
				Field::make('text', 'crf_contact_email', 'Email адрес'),
				Field::make('text', 'crf_contact_address', 'Ссылка на адрес'),
				Field::make('text', 'crf_contact_address_label', 'Текст для адреса'),
				Field::make('text', 'crf_contact_telegram_chanel', 'Ссылка на телеграм канала'),
			))
			->add_tab('О компании', array(
				Field::make('text', 'crf_about_title', 'Заголовок секции'),
				Field::make('complex', 'crf_about_text', 'Текст о компании')
					->add_fields(array(
						Field::make('text', 'paragraph', 'Параграф')
					)),
				Field::make('complex', 'crf_about_stats', 'Статистика')
					->add_fields(array(
						Field::make('text', 'number', 'Число'),
						Field::make('text', 'text', 'Текст')
					))
			));
		return;
	}
}


class Crb_All_Fields_Page extends Crb_All_Fields
{
	public function __construct($type, $name, $template)
	{
		$this->container = $container = Container::make($type, $name)->show_on_template($template);
	}
}

class Crb_All_Fields_Post extends Crb_All_Fields
{
	public function __construct($type, $name, $type_post)
	{
		$this->container = $container = Container::make($type, $name)->where('post_type', '=', $type_post);
		//        $this->container = $container = Container::make( $type , $name)->show_on_post_type($type_post);
	}
}
class Crb_All_Fields_Post_And_Hide_Template extends Crb_All_Fields
{
	public function __construct($type, $name, $type_post, $hide_temp_path)
	{
		$this->container = $container = Container::make($type, $name)->show_on_post_type($type_post)->hide_on_template($hide_temp_path);
	}
}
class Crb_All_Fields_Taxonomy extends Crb_All_Fields
{
	public function __construct($type, $name, $taxonomy)
	{
		$this->container = $container = Container::make($type, $name)->where('term_taxonomy', '=', $taxonomy);
	}
}
