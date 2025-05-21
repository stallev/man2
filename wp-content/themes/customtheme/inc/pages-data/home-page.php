<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

class Crb_All_Fields_Page_Home extends Crb_All_Fields_Page {
    public function theme_land_main() {
        $this->container->add_tab('Блок Hero', array(
            Field::make('text', 'crf_home_hero_title', 'Заголовок Hero')
                ->set_default_value('Грузоперевозки манипулятором по Могилёву и области'),
            Field::make('text', 'crf_home_hero_subtitle', 'Подзаголовок Hero')
                ->set_default_value('Надёжные решения для перевозки грузов с техникой до 15 тонн'),
            Field::make('complex', 'crf_home_hero_features', 'Преимущества Hero')
                ->add_fields(array(
                    Field::make('text', 'feature', 'Преимущество'),
                ))
                ->set_help_text('Например: Максимальная длина груза: до 7,4 м'),
            Field::make('image', 'crf_home_hero_image', 'Изображение Hero')
                ->set_value_type('url')
                ->set_help_text('Главное изображение Hero-блока'),
        ));

        $this->container->add_tab('Блок "Наши услуги"', array(
            Field::make('text', 'crf_home_services_title', 'Заголовок блока услуг')
                ->set_default_value('Наши услуги'),
        ));

        $this->container->add_tab('Галерея техники', array(
            Field::make('text', 'crf_home_equipment_title', 'Заголовок галереи')
                ->set_default_value('Наша техника'),
            Field::make('complex', 'crf_home_equipment_gallery', 'Галерея изображений')
                ->add_fields(array(
                    Field::make('image', 'image', 'Изображение')->set_value_type('url'),
                    Field::make('text', 'alt', 'Alt'),
                ))
                ->set_help_text('Добавьте изображения техники для галереи'),
        ));

        $this->container->add_tab('Преимущества', array(
            Field::make('text', 'crf_home_advantages_title', 'Заголовок блока преимуществ')
                ->set_default_value('Почему выбирают нас'),
            Field::make('complex', 'crf_home_advantages', 'Преимущества')
                ->add_fields(array(
                    Field::make('text', 'title', 'Заголовок'),
                    Field::make('text', 'description', 'Описание'),
                ))
                ->set_help_text('Добавьте преимущества компании'),
        ));

        $this->container->add_tab('Этапы работы', array(
            Field::make('text', 'crf_home_workflow_title', 'Заголовок блока этапов')
                ->set_default_value('Как мы работаем'),
            Field::make('complex', 'crf_home_workflow_steps', 'Этапы работы')
                ->add_fields(array(
                    Field::make('text', 'step_title', 'Заголовок этапа'),
                    Field::make('text', 'step_description', 'Описание этапа'),
                ))
                ->set_help_text('Добавьте этапы работы'),
        ));

        $this->container->add_tab('Форма обратной связи', array(
            Field::make('text', 'crf_home_feedback_title', 'Заголовок формы')
                ->set_default_value('Остались вопросы?'),
            Field::make('text', 'crf_home_feedback_subtitle', 'Подзаголовок формы')
                ->set_default_value('Оставьте заявку, и мы свяжемся с вами в ближайшее время'),
            Field::make('text', 'crf_home_feedback_button', 'Текст кнопки')
                ->set_default_value('Отправить заявку'),
        ));
    }
}
