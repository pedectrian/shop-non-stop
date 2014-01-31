<?php
get_header();
global $shop, $post;

$slug = $shop->getPageSlug($post);
?>

    <div class="page-wrap">
        <div class="discounts">

            <?php
                global $post;
                $id = $post->ID;
                $my_wp_query = new WP_Query('post_type=page&posts_per_page=-1');
                
                $all_wp_pages = $my_wp_query->posts;
                $companies = array();
                
                foreach($all_wp_pages as $page) {
                    if($slug == 'news') {
                        $newDate = new \DateTime($page->post_date);
                        $ex =  get_post_meta($page->ID, "news-preview", true);
                        $excerpt =  $ex ? $ex : get_excerpt_by_id($page->ID);
                        $cName = get_the_title($page->post_parent);
                        
                        if($page->post_parent) {
                            $companies[$page->post_parent] = $cName;
                        }
                        
                        echo '<div class="news-block data-row" attr-company="' . $page->post_parent . '" >';
                    
                            echo '<a href="' . get_post_permalink( $page->ID ) . '" class="news-description">';
                        
                            
                                echo '<div class="news-title">';
                                    echo $page->post_title;
                                    echo '<div class="news-date">' . $newDate->format('d.m.Y') . '</div>';
                                echo '</div>';
                                echo $excerpt;
                        
                            echo '</a>';
                        echo '</div>';
                    }
                }
                
                echo "<input type='hidden' class='companies-holder' value='" . json_encode($companies) . "'>";
            ?>
        </div>
    </div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
