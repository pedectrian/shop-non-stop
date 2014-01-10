<?php
/*
 * Template Name: News
 * Description: Шаблон для новостей.
 */
get_header(); ?>
<?php /* The loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>

    <div class="page-wrap">
        <?php the_content(); ?>

    </div>
    <?php comments_template(); ?>
<?php endwhile; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
