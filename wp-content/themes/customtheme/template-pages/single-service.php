<?php
/**
 * Шаблон для отображения отдельной услуги
 *
 * @package customtheme
 */

get_header();
?>

<main class="main">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article class="service-single">
                <header class="service-single__header">
                    <h1 class="service-single__title"><?php the_title(); ?></h1>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="service-single__image">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <div class="service-single__content">
                    <?php the_content(); ?>
                </div>

                <?php if (has_excerpt()) : ?>
                    <div class="service-single__excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                <?php endif; ?>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php
get_footer(); 