<?php
/**
 * Template Name: HomePage
 *
 */ 
get_header();
// get_template_part('template-parts/land_main_page');
?>

<main class="main">
        <section class="hero">
            <div class="content-container">
                <div class="hero__container">
                    <div class="hero__content">
                        <h1 class="hero__title">
                            Грузоперевозки манипулятором по Могилёву и области
                        </h1>
                        <p class="hero__subtitle">
                            Надёжные решения для перевозки грузов с техникой до 15 тонн
                        </p>

                        <ul class="hero__features">
                            <li class="hero__feature">
                                <svg class="hero__feature-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z" />
                                </svg>
                                <span>Максимальная длина груза: до 7,4 м</span>
                            </li>
                            <li class="hero__feature">
                                <svg class="hero__feature-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z" />
                                </svg>
                                <span>Вылет стрелы: до 12,5 м</span>
                            </li>
                            <li class="hero__feature">
                                <svg class="hero__feature-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z" />
                                </svg>
                                <span>Грузоподъёмность стрелы: до 7 тонн</span>
                            </li>
                            <li class="hero__feature">
                                <svg class="hero__feature-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z" />
                                </svg>
                                <span>Грузоподъёмность на максимальном вылете: до 1 700 кг</span>
                            </li>
                        </ul>
                    </div>
                    <div class="hero__image">
                        <img src="assets\img\crantrack2.webp" alt="Манипулятор в работе" class="hero__img"
                            loading="eager" />
                    </div>
                </div>
                <div class="hero__advantages">
                    <div class="hero__advantage-item">
                        <span class="hero__advantage-icon">
                            <!-- SVG чек -->
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#3498db"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="4" y="3" width="16" height="18" rx="2" />
                                <path d="M8 7h8M8 11h8M8 15h4" />
                            </svg>
                        </span>
                        <span class="hero__advantage-title">ЛЮБАЯ ФОРМА ОПЛАТЫ</span>
                        <span class="hero__advantage-desc">Наличные, безналичный расчет</span>
                    </div>
                    <div class="hero__advantage-item">
                        <span class="hero__advantage-icon">
                            <!-- SVG часы/будильник -->
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#3498db"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="13" r="8" />
                                <polyline points="12 9 12 13 15 15" />
                                <line x1="9" y1="2" x2="9.01" y2="2" />
                                <line x1="15" y1="2" x2="15.01" y2="2" />
                            </svg>
                        </span>
                        <span class="hero__advantage-title">РАБОТАЕМ 24/7</span>
                        <span class="hero__advantage-desc">Без выходных и обедов</span>
                    </div>
                    <div class="hero__advantage-item">
                        <span class="hero__advantage-icon">
                            <!-- SVG аккуратность/слои -->
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#3498db"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="12 2 22 7 12 12 2 7 12 2" />
                                <polyline points="2 17 12 22 22 17" />
                                <polyline points="2 12 12 17 22 12" />
                            </svg>
                        </span>
                        <span class="hero__advantage-title">АККУРАТНО</span>
                        <span class="hero__advantage-desc">Перевезем ваш груз</span>
                    </div>
                </div>

                <button class="hero__button">Заказать манипулятор</button>
            </div>
        </section>

        <section class="section" id="services">
            <div class="content-container">
                <h2 class="section-title">Наши услуги</h2>

                <div class="services__grid">
                    <?php get_template_part('template-parts/service-posts'); ?>
                </div>
            </div>
        </section>

        <section class="section section--gray" id="equipment-gallery">
            <div class="content-container">
                <h2 class="section-title">Наша техника</h2>
                <div class="service-gallery__grid service-gallery__grid--equipment">
                    <a href="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1200&q=80" data-fancybox="equipment" class="service-gallery__item">
                        <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=400&q=80" alt="Манипулятор КАМАЗ в горах" class="service-gallery__img" loading="lazy" />
                    </a>
                    <a href="https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=1200&q=80" data-fancybox="equipment" class="service-gallery__item">
                        <img src="https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=400&q=80" alt="Грузовой кран на строительстве" class="service-gallery__img" loading="lazy" />
                    </a>
                    <a href="https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=1200&q=80" data-fancybox="equipment" class="service-gallery__item">
                        <img src="https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=400&q=80" alt="Манипулятор на фоне неба" class="service-gallery__img" loading="lazy" />
                    </a>
                    <a href="https://images.unsplash.com/photo-1523413363574-c30aa1c2a516?auto=format&fit=crop&w=1200&q=80" data-fancybox="equipment" class="service-gallery__item">
                        <img src="https://images.unsplash.com/photo-1523413363574-c30aa1c2a516?auto=format&fit=crop&w=400&q=80" alt="Погрузка строительных материалов" class="service-gallery__img" loading="lazy" />
                    </a>
                    <a href="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=1200&q=80" data-fancybox="equipment" class="service-gallery__item">
                        <img src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=400&q=80" alt="Манипулятор на стройке" class="service-gallery__img" loading="lazy" />
                    </a>
                    <a href="https://images.unsplash.com/photo-1468421870903-4df1664ac249?auto=format&fit=crop&w=1200&q=80" data-fancybox="equipment" class="service-gallery__item">
                        <img src="https://images.unsplash.com/photo-1468421870903-4df1664ac249?auto=format&fit=crop&w=400&q=80" alt="Грузовой автомобиль с краном" class="service-gallery__img" loading="lazy" />
                    </a>
                    <a href="https://images.unsplash.com/photo-1516979187457-637abb4f9353?auto=format&fit=crop&w=1200&q=80" data-fancybox="equipment" class="service-gallery__item">
                        <img src="https://images.unsplash.com/photo-1516979187457-637abb4f9353?auto=format&fit=crop&w=400&q=80" alt="Манипулятор на объекте" class="service-gallery__img" loading="lazy" />
                    </a>
                    <a href="https://images.unsplash.com/photo-1516979187457-637abb4f9353?auto=format&fit=crop&w=1200&q=80" data-fancybox="equipment" class="service-gallery__item">
                        <img src="https://images.unsplash.com/photo-1516979187457-637abb4f9353?auto=format&fit=crop&w=400&q=80" alt="Манипулятор на объекте" class="service-gallery__img" loading="lazy" />
                    </a>
                </div>
            </div>
        </section>

        <section class="section" id="advantages">
            <div class="content-container">
                <h2 class="section-title">Почему выбирают нас</h2>

                <div class="advantages__grid">
                    <article class="advantage-card animated-fadeInUp card-hover-anim">
                        <div class="advantage-card__icon">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        <h3 class="advantage-card__title">Опыт работы</h3>
                        <p class="advantage-card__description">
                            Более 10 лет успешной работы в сфере грузоперевозок и монтажных
                            работ
                        </p>
                    </article>

                    <article class="advantage-card animated-fadeInUp card-hover-anim">
                        <div class="advantage-card__icon">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20ZM12.5 7H11V13L16.25 16.15L17 14.92L12.5 12.25V7Z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        <h3 class="advantage-card__title">Оперативность</h3>
                        <p class="advantage-card__description">
                            Быстрая подача техники и выполнение работ в кратчайшие сроки
                        </p>
                    </article>

                    <article class="advantage-card animated-fadeInUp card-hover-anim">
                        <div class="advantage-card__icon">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20ZM12 6C8.69 6 6 8.69 6 12C6 15.31 8.69 18 12 18C15.31 18 18 15.31 18 12C18 8.69 15.31 6 12 6ZM12 16C9.79 16 8 14.21 8 12C8 9.79 9.79 8 12 8C14.21 8 16 9.79 16 12C16 14.21 14.21 16 12 16Z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        <h3 class="advantage-card__title">Современная техника</h3>
                        <p class="advantage-card__description">
                            Собственный парк манипуляторов с грузоподъёмностью до 15 тонн
                        </p>
                    </article>

                    <article class="advantage-card animated-fadeInUp card-hover-anim">
                        <div class="advantage-card__icon">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20ZM12 6C8.69 6 6 8.69 6 12C6 15.31 8.69 18 12 18C15.31 18 18 15.31 18 12C18 8.69 15.31 6 12 6ZM12 16C9.79 16 8 14.21 8 12C8 9.79 9.79 8 12 8C14.21 8 16 9.79 16 12C16 14.21 14.21 16 12 16Z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        <h3 class="advantage-card__title">Доступные цены</h3>
                        <p class="advantage-card__description">
                            Гибкая система ценообразования и индивидуальный подход к каждому
                            клиенту
                        </p>
                    </article>
                </div>
            </div>
        </section>

        <section class="section section--gray" id="workflow">
            <div class="content-container">
                <h2 class="section-title">Как мы работаем</h2>
                <div class="workflow__steps">
                    <article class="workflow-step animated-fadeInUp card-hover-anim">
                        <div class="workflow-step__number">01</div>
                        <div class="workflow-step__icon">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M20 4H4C2.89 4 2 4.89 2 6V18C2 19.11 2.89 20 4 20H20C21.11 20 22 19.11 22 18V6C22 4.89 21.11 4 20 4ZM20 18H4V8L12 13L20 8V18ZM12 11L4 6H20L12 11Z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        <h3 class="workflow-step__title">Заявка</h3>
                        <p class="workflow-step__description">
                            Оставьте заявку на сайте или по телефону
                        </p>
                    </article>

                    <article class="workflow-step animated-fadeInUp card-hover-anim">
                        <div class="workflow-step__number">02</div>
                        <div class="workflow-step__icon">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M20 2H4C2.9 2 2 2.9 2 4V22L6 18H20C21.1 18 22 17.1 22 16V4C22 2.9 21.1 2 20 2ZM20 16H5.17L4 17.17V4H20V16Z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        <h3 class="workflow-step__title">Консультация</h3>
                        <p class="workflow-step__description">
                            Уточняем детали и рассчитываем стоимость
                        </p>
                    </article>

                    <article class="workflow-step animated-fadeInUp card-hover-anim">
                        <div class="workflow-step__number">03</div>
                        <div class="workflow-step__icon">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20ZM12.5 7H11V13L16.25 16.15L17 14.92L12.5 12.25V7Z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        <h3 class="workflow-step__title">Подача и выполнение</h3>
                        <p class="workflow-step__description">
                            Подаём технику и выполняем все работы
                        </p>
                    </article>

                    <article class="workflow-step animated-fadeInUp card-hover-anim">
                        <div class="workflow-step__number">04</div>
                        <div class="workflow-step__icon">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.8 10.9C9.53 10.31 8.8 9.7 8.8 8.75C8.8 7.66 9.81 6.9 11.5 6.9C13.28 6.9 13.94 7.75 14 9H16.21C16.14 7.28 15.09 5.7 13 5.19V3H10V5.16C8.06 5.58 6.5 6.84 6.5 8.77C6.5 10.08 7.23 11.23 8.2 11.9C10.54 12.52 11.2 13.3 11.2 14.3C11.2 15 10.71 16.1 9 16.1C7.2 16.1 6.5 15.18 6.35 14H4.16C4.3 16.19 5.84 17.42 8 17.83V20H11V17.84C12.95 17.45 14.5 16.35 14.5 14.3C14.5 12.64 13.41 11.5 11.8 10.9Z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        <h3 class="workflow-step__title">Оплата</h3>
                        <p class="workflow-step__description">
                            Вы оплачиваете услугу удобным способом
                        </p>
                    </article>
                </div>
            </div>
        </section>

        <section class="section" id="feedback">
            <div class="content-container">
                <div class="feedback__content">
                    <h2 class="section-title">Остались вопросы?</h2>
                    <p class="feedback__subtitle">
                        Оставьте заявку, и мы свяжемся с вами в ближайшее время
                    </p>

                    <?php get_template_part('template-parts/feedback-form'); ?>
                </div>
            </div>
        </section>
    </main>

<?php
get_footer();