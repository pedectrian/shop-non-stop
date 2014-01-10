<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
    <div class="page-wrap">
        <div class="discounts">
            <?php
                global $post;
                $id = $post->ID;
                $my_wp_query = new WP_Query('post_type=page&posts_per_page=-1');
                
                $all_wp_pages = $my_wp_query->posts;
                $categories = get_page_children( $id, $all_wp_pages );

                
                foreach($categories as $category) {
                    
                    if($category->post_parent == $id) {
                        echo "<div class='cat-title'>" . $category->post_title . "</div>";
                        
                        $companies = get_page_children( $category->ID, $all_wp_pages);
                        
                        if(count($companies)) {
                            foreach($companies as $company) { ?>
                                <?php 
                                    $template = get_page_template_slug($company->ID);
                                    $type = str_replace('.php', '', str_replace('page_discount-', '', $template));
                                    if($type != 'company') continue;
                                ?>
                                <a href="<?php echo get_post_permalink( $company->ID ); ?>" class='discount-image'>
                                    
                                    <div class="discount-thumb">
                                        <?php echo get_the_post_thumbnail( $company->ID, 'partner-thumb' ); ?> 
                                    </div>
                                    <div class="discount-image-hover">
                                    </div>
                                    
                                    <div class='comp-title'><?php echo $company->post_title ?></div>
                                    
                                    <?php $amount = get_post_meta($company->ID, "discount", true); ?>
                                    <?php if ($amount) { ?>
                                        <?php 
                                            if ($amount >= 0 && $amount <= 5)
                                                $type = 1;
                                            elseif ($amount > 5 && $amount <= 10)
                                                $type = 2;
                                            elseif ($amount > 10 && $amount <= 15)
                                                $type = 3;
                                            elseif ($amount > 15)
                                                $type = 4;
                                        ?>
                                        <div class="discount-amount-bg-<?php echo $type; ?>"></div>
                                        <div class="discount-amount"><?php echo $amount; ?><sup>%</sup></div>
                                    <?php } ?>
                                </a>
                           <?php }
                        }
                    }
                   
                    
                }

            ?>
        </div>
    </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
