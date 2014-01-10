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

	<script>
        $(document).ready(function(){
            $('.faq-title').on('click', function(){
                var el = $(this).parent().find('.faq-answer');
                
                if(el.is(':visible')) {
                    el.hide('slow');
                } else {
                    el.show('slow');
                }
            })
            var url = document.location.href;
            var hash = url.substring(url.indexOf("#")+1);
            
            if(hash && hash == 'feedback') {
                $('.feedback-form-wrap').css('display', 'block');
                $('.faq-questions-wrap').css('display', 'none');
                
                $('.faq-page-title a:first-child').removeClass('current');
                $('.faq-page-title a:last-child').addClass('current');
            }
            
        })
        
    </script>
    <div class="page-wrap">
        <div class="faq-wrap">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>