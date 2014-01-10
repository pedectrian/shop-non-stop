<?php
/*
 * Template Name: Offer
 * Description: Шаблон для предложений.
 */
get_header(); ?>
<?php /* The loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="page-wrap">
    <div class="offer-container">
        <div class="offer-page-thumb">
            <?php
                the_post_thumbnail('offer-thumb'); //echo get_the_post_thumbnail( $post->ID,  );
                $countdown = get_post_meta($post->ID, "offer_expiration_date_time", true);
                echo $countdown ? '<div class="offer-countdown"><span class="countdown-icon"></span>' . $countdown . '</div>' : '';

                $amount = get_post_meta($post->ID, "discount", true);
                if ($amount) {
                            
                    if ($amount >= 0 && $amount <= 5)
                        $type = 1;
                    elseif ($amount > 5 && $amount <= 10)
                        $type = 2;
                    elseif ($amount > 10 && $amount <= 15)
                        $type = 3;
                    elseif ($amount > 15)
                        $type = 4;
                    
                    echo '<div class="o-discount-amount-bg-' . $type . '"></div>';
                    echo '<div class="discount-amount">' . $amount . '<sup>%</sup></div>';
                }
            ?>
            
        </div>
        <div class="offer-page-description">
            <!--div class="offer-page-title"><?php the_title(); ?></div-->
            <?php the_content(); ?>
        </div>

        
    </div>
</div>
    <?php comments_template(); ?>
<?php endwhile; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
