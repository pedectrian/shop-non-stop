<?php
/*
 * Template Name: Company
 * Description: Шаблон для компаний.
 */
get_header(); ?>

    <?php 
        global $post;
        $id = $post->ID;
        $my_wp_query = new WP_Query('post_type=page&posts_per_page=-1');
        
        $all_wp_pages = $my_wp_query->posts;
        $children = get_page_children( $id, $all_wp_pages );
        
        $offers = array();
        $news = array();
        foreach($children as $child) {
            $template = get_page_template_slug($child->ID);
            $type = str_replace('.php', '', str_replace('page_discount-', '', $template));
            
            if($type == "offer")
                $offers[] = $child;
            elseif($type == 'news')
                $news[] = $child;
        }
    ?>
    <div class="page-wrap">
        <div class="company-gallery">
            <?php /* The loop */ ?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 

				$args = array(
                   'post_type' => 'attachment',
                   'numberposts' => -1,
                   'post_status' => null,
                   'post_parent' => get_the_ID()
                  );
                
                 $attachments = get_posts( $args );
                 if ( $attachments ) {
                    foreach ( $attachments as $attachment ) {
                       $info = wp_get_attachment_image_src( $attachment->ID, 'small' );
                       echo '<a class="company-photo" href="' . $info[0] . '" data-lightbox="roadtrip">' . wp_get_attachment_image( $attachment->ID, 'small' ) . '</a>';
                    }
                 }
                
                 endwhile; endif; ?>
        </div>
        <?php if(count($offers)) : ?>
            <div class="company-offers">
            <?php foreach($offers as $offer) {
        
                $countdown = get_post_meta($offer->ID, "offer_expiration_date_time", true);
                $now = new \DateTime('now');
                $endTime = new DateTime($countdown);
                if ($countdown && $now >= $endTime) continue;
                echo '<div class="offer-block">';
                    echo '<a class="offer-thumb" href="' . get_post_permalink( $offer->ID ) . '">';
                        echo get_the_post_thumbnail( $offer->ID, 'offer-thumb' );
                        $amount = get_post_meta($offer->ID, "discount", true);
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
                    echo '</a>';
            
                    echo '<div class="offer-description">';
                        echo '<div class="offer-title">';
                            echo $offer->post_title;
                        echo '</div>';
                        $ex =  get_post_meta($offer->ID, "offer-preview", true);
                        $excerpt =  $ex ? $ex : get_excerpt_by_id($offer->ID);
                        echo $excerpt;
                    echo '</div>';
                    echo '<div class="offer-actions">';
                        echo '<a href="' . get_post_permalink( $offer->ID ) . '" class="orange-btn">Посмотреть</a>';
                        echo $countdown ? '<div class="offer-countdown"><span class="countdown-icon"></span>' . $countdown . '</div>' : '';
                    echo '</div>';
                echo '</div>';
            }?>
            </div>
        <?php endif; ?>
        <?php if(count($news)) : ?>
            <div class="company-news">
                <div class="news-block-title"></div>
                <?php $newsNum = 0; ?>
            <?php foreach($news as $n) {
                
                if ($newsNum > 2) break;
                $newDate = new \DateTime($n->post_date);
                $ex =  get_post_meta($n->ID, "news-preview", true);
                $excerpt =  $ex ? $ex : get_excerpt_by_id($n->ID);
        
                echo '<div class="news-block">';
            
                    echo '<a href="' . get_post_permalink( $n->ID ) . '" class="news-description">';
                        echo '<div class="news-title">';
                            echo $n->post_title;
                            echo '<div class="news-date">' . $newDate->format('d.m.Y') . '</div>';
                        echo '</div>';
                        echo $excerpt;
                    echo '</a>';
                echo '</div>';
                
                $newsNum++;
            }?>
            </div>
        <?php endif; ?>
    </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
