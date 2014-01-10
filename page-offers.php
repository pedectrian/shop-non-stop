<?php
get_header(); ?>

    <div class="page-wrap">
        <div class="discounts">
            <?php
                global $post;
                $id = $post->ID;
                $my_wp_query = new WP_Query('post_type=page&posts_per_page=-1');
                function offerSort( $a, $b ) {
                    $aVal = strtotime(get_post_meta($a->ID, "offer_expiration_date_time", true));
                    $bVal = strtotime(get_post_meta($b->ID, "offer_expiration_date_time", true));
                    return $aVal == $bVal ? 0 : ( $aVal > $bVal ) ? 1 : -1;
                }
                $all_wp_pages = $my_wp_query->posts;
                $companies = array();
                $offers = array();
                foreach($all_wp_pages as $offer) {
                    if(guessPageType($offer->ID) == 'offer') {
                        $countdown = get_post_meta($offer->ID, "offer_expiration_date_time", true);
                        $now = new \DateTime('now');
                        $endTime = new DateTime($countdown);
                        
                        if ($countdown && $now >= $endTime) continue;
                        
                        $cName = get_the_title($offer->post_parent);
                        
                        if($offer->post_parent) {
                            $companies[$offer->post_parent] = $cName;
                        }
                        
                        $offers[] = $offer;
                    }
                }

                usort($offers, 'offerSort');
                
                foreach($offers as $offer) {
                    $countdown = get_post_meta($offer->ID, "offer_expiration_date_time", true);
                    
                    echo '<div class="offer-block data-row offer-row" attr-company="' . $offer->post_parent . '">';
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
                }
                
                echo "<input type='hidden' class='companies-holder' value='" . json_encode($companies) . "'>";
            ?>
        </div>
    </div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
