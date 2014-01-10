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
                if(isset($_COOKIE['gender'])) {
                    $slug = $_COOKIE['gender'];
                } else if (isset($_GET['gender']) && $_GET['gender'] == 'woman' || get_page_slug(true) == "woman") {
                    $slug = "woman";
                }
            ?>
		<footer id="colophon" class="site-footer <?php echo isset($slug) ? 'footer-' . $slug : '';?> " role="contentinfo">
			
			<div class="site-info">
                <?php if ($slug == "woman"): ?>
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
                    * Условия получения карты и актуальный размер скидки уточняйте непосредственно у компаний-партнеров (далее – «КП»). Скидки и специальные предложения действительны только при предъявлении карты. Карта действительна до конца 2014 года. Ответственность за достоверность предоставленной информации о скидках и специальных предложениях, действующих в КП, а также качество предоставляемых в КП услуг несут КП. Об инцидентах неисполнения КП заявленных обязательств просьба сообщать на info@shop-non-stop.com
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
    <script type="text/javascript">
    
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-46771855-1']);
    _gaq.push(['_trackPageview']);
    
    (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
    
    </script>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
    (function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
    try {
    w.yaCounter23522752 = new Ya.Metrika({id:23522752,
    webvisor:true,
    clickmap:true,
    trackLinks:true,
    accurateTrackBounce:true});
    } catch(e) { }
    });
    
    var n = d.getElementsByTagName("script")[0],
    s = d.createElement("script"),
    f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";
    
    if (w.opera == "[object Opera]") {
    d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript><div><img src="//mc.yandex.ru/watch/23522752" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
</body>
</html>