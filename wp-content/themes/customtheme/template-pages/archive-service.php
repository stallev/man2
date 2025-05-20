<?php
/**
 * Шаблон для отображения архива услуг
 *
 * @package customtheme
 */

get_header();
?>

<main class="main">
    <div class="container">
        <h1 class="page-title"><?php post_type_archive_title(); ?></h1>
        
        <div class="services-grid">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article class="service-card">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="service-card__image">
                                <?php the_post_thumbnail('medium'); ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="service-card__content">
                            <h2 class="service-card__title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            
                            <?php if (has_excerpt()) : ?>
                                <div class="service-card__excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                            <?php endif; ?>
                            
                            <a href="<?php the_permalink(); ?>" class="service-card__link">
                                <?php esc_html_e('Подробнее', 'customtheme'); ?>
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
                
                <?php the_posts_pagination(array(
                    'prev_text' => esc_html__('Назад', 'customtheme'),
                    'next_text' => esc_html__('Вперед', 'customtheme'),
                )); ?>
                
            <?php else : ?>
                <p><?php esc_html_e('Услуги не найдены.', 'customtheme'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php
get_footer(); 