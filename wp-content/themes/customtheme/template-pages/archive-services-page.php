<?php
/**
 * Template Name: Archive Service
 *
 */ 

get_header();
?>

<main class="services-page">
    <div class="content-container">
        <nav class="breadcrumbs">
            <ul class="breadcrumbs__list">
                <li class="breadcrumbs__item">
                    <a href="/" class="breadcrumbs__link">Главная</a>
                </li>
                <li class="breadcrumbs__item">
                    <span class="breadcrumbs__current"><?php echo get_the_title(); ?></span>
                </li>
            </ul>
        </nav>

        <h1 class="services-page__title"><?php echo get_the_title(); ?></h1>

        <div class="services-page__grid">
            <?php get_template_part('template-parts/service-posts'); ?>
        </div>
    </div>
</main>

<?php
get_footer(); 