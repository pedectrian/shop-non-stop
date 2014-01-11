<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

		</div><!-- #main -->
            <?php
                global $shop, $post;

                $gender = $shop->getPageGender($post);
            ?>
		<footer id="colophon" class="site-footer <?php echo $gender ? 'footer-' . $gender : '';?> " role="contentinfo">
			
			<div class="site-info">
                <?php if ($gender == "woman"): ?>
                    <div class='footer-woman-subscribe'>
                        <input type="text" class="custom-input" placeholder="Имя">
                        <input type="text" class="custom-input"  placeholder="Эл. почта">
                        <a class="orange-btn">Вступить в клуб скидок</a>
                    </div>
                    <div class="woman-footer-menu"><?php dynamic_sidebar( 'woman-sidebar' ); ?></div>
                <?php endif; ?>
                <script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
                
				<div class="copyrights">
                    &copy; 2013 - <?php echo date('Y'); ?> Shop Non-Stop
                <div style="float: right;vertical-align: top;margin: -6px 0 0 0;" class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="button" data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,moimir,lj,moikrug,gplus">
                </div> 
                </div>

                <div class="rules">
                    <?php echo get_option('sns_footer_text'); ?>
                </div>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
    <div class="popup-wrap">
        <div class="popup">
            <a class="popup-close"></a>
            
            <div id="mc_embed_signup" class="subscribe-form">
            <form action="http://subscribe.pechkin-mail.ru/" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
            <input type="hidden" name="list_id" value="84474">
            <input type="hidden" name="no_conf" value="yes">
            <input type="hidden" name="notify" value="yes">
                <input type="email" value="" name="email" class="required email custom-input" id="mce-EMAIL" placeholder="Эл. почта">
                <input type="text" value="" name="merge_1" class="required name custom-input" id="mce-MERGE1" placeholder="Имя">
                <div id="mce-responses" class="clear">
                    <div class="response" id="mce-error-response" style="display:none"></div>
                    <div class="response" id="mce-success-response" style="display:none"></div>
                </div>
                    <button dojotype="dijit.form.Button" type="submit" class="black-btn" name="subscribe" id="mc-embedded-subscribe">Сообщить мне об открытии мужского клуба!</button>
            </form>
                
            </div>
            
            <div class="subscribe-info">
                <p>«Сначала дамы!» — именно этим принципом мы руководствовались,
                запуская сперва дисконтную программу для девушек.</p>
                <p>Ты можешь сделать сюрприз своей маме, девушке или сестре, подарив им карту <a href="/woman">Shop Non-Stop для девушек.</a></p>
                <p>Однако и программа скидок для рациональных мужчин также на подходе!</p>
                            
                <p class="pink">Укажи свое имя и email в форме выше и узнай о запуске проекта одним из первых!</p>
            </div>
                
        </div>
    </div>
    <?php echo get_option('gaq_script'); ?>
</body>
</html>