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
    <div class="woman-subscribe-wrap">
        <!-- Begin Signup Form -->
<link href="http://subscribe.pechkin-mail.ru/css/classic.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{background:; clear:left; font:14px Helvetica,Arial,sans-serif; }	/* Add your own form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
	h2, label {color: ;}#mc_embed_signup input {background-color: ;}#mc_embed_signup input {color: ;}#mc_embed_signup input {border: 1px solid ;}#mc_embed_signup .button {background-color: ;}#mc_embed_signup .button:hover {background-color: ;}#mc_embed_signup .button {color: ;}#mc_embed_signup .mc-field-group input {width: px;}#mc_embed_signup .button {width: px;}</style>

<script type="text/javascript">
try {
    var jqueryLoaded=jQuery;
    jqueryLoaded=true;
} catch(err) {
    var jqueryLoaded=false;
}
var head= document.getElementsByTagName('head')[0];
if (!jqueryLoaded) {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js';
    head.appendChild(script);
    if (script.readyState && script.onload!==null){
        script.onreadystatechange= function () {
              if (this.readyState == 'complete') mce_preload_check();
        }    
    }
}
var script = document.createElement('script');
script.type = 'text/javascript';
var charset = document.charset || document.characterSet;
if (charset.indexOf('1251') + 1) {
	script.src = 'http://subscribe.pechkin-mail.ru/js/jquery.form-n-validate-cp.js';
} else {
	script.src = 'http://subscribe.pechkin-mail.ru/js/jquery.form-n-validate.js';
}
head.appendChild(script);
var err_style = '';
try{
    err_style = mc_custom_error_style;
} catch(e){
    err_style = '#mc_embed_signup input.mce_inline_error{border-color:#6B0505;} #mc_embed_signup div.mce_inline_error{margin: 0 0 1em 0; padding: 5px 10px; background-color:#6B0505; font-weight: bold; z-index: 1; color:#fff;}';
}
var head= document.getElementsByTagName('head')[0];
var style= document.createElement('style');
style.type= 'text/css';
if (style.styleSheet) {
  style.styleSheet.cssText = err_style;
} else {
  style.appendChild(document.createTextNode(err_style));
}
head.appendChild(style);
setTimeout('mce_preload_check();', 250);

var mce_preload_checks = 0;
function mce_preload_check(){
    if (mce_preload_checks>40) return;
    mce_preload_checks++;
    try {
        var jqueryLoaded=jQuery;
    } catch(err) {
        setTimeout('mce_preload_check();', 250);
        return;
    }
    try {
        var validatorLoaded=jQuery("#fake-form").validate({});
    } catch(err) {
        setTimeout('mce_preload_check();', 250);
        return;
    }
    mce_init_form();
}

function mce_init_form(){
    jQuery(document).ready( function($) {
      var options = { errorClass: 'mce_inline_error', errorElement: 'div', onkeyup: function(){}, onfocusout:function(){}, onblur:function(){}  };
      var mce_validator = $("#mc-embedded-subscribe-form").validate(options);
      $("#mc-embedded-subscribe-form").unbind('submit');//remove the validator so we can get into beforeSubmit on the ajaxform, which then calls the validator
      options = { url: 'http://subscribe.pechkin-mail.ru/?ajax', type: 'GET', dataType: 'jsonp', contentType: "application/json; charset=utf-8",
                    beforeSubmit: function(){
                        $('#mce_tmp_error_msg').remove();
                        $('.datefield','#mc_embed_signup').each(
                            function(){
                                var txt = 'filled';
                                var fields = new Array();
                                var i = 0;
                                $(':text', this).each(
                                    function(){
                                        fields[i] = this;
                                        i++;
                                    });
                                $(':hidden', this).each(
                                    function(){
                                        var bday = false;
                                        if (fields.length == 2){
                                            bday = true;
                                            fields[2] = {'value':1970};//trick birthdays into having years
                                        }
                                    	if ( fields[0].value=='MM' && fields[1].value=='DD' && (fields[2].value=='YYYY' || (bday && fields[2].value==1970) ) ){
                                    		this.value = '';
									    } else if ( fields[0].value=='' && fields[1].value=='' && (fields[2].value=='' || (bday && fields[2].value==1970) ) ){
                                    		this.value = '';
									    } else {
	                                        this.value = fields[0].value+'/'+fields[1].value+'/'+fields[2].value;
	                                    }
                                    });
                            });
                        return mce_validator.form();
                    }, 
                    success: mce_success_cb
                };
      $('#mc-embedded-subscribe-form').ajaxForm(options);
            
    });
}
function mce_success_cb(resp){
    $('#mce-success-response').hide();
    $('#mce-error-response').hide();
    if (resp.result=="success"){
        $('#mc-embedded-subscribe').hide();
		$('#mce-'+resp.result+'-response').show();
        $('#mce-'+resp.result+'-response').html("Спасибо и добро пожаловать в клуб скидок!");
        $('#mc-embedded-subscribe-form').each(function(){
            this.reset();
    	});
    } else {
        alert(resp.msg);
    }
}

</script>
<!--End mc_embed_signup-->
        <div class="woman-subscribe">
            <div id="mc_embed_signup" class="subscribe-form">
            <form action="http://subscribe.pechkin-mail.ru/" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
            <input type="hidden" name="list_id" value="84415">
            <input type="hidden" name="no_conf" value="yes">
            <input type="hidden" name="notify" value="yes">
                <input type="email" value="" name="email" class="required email custom-input" id="mce-EMAIL" placeholder="Укажи cвой email...">
                <input type="text" value="" name="merge_1" class="required name custom-input" id="mce-MERGE1" placeholder="Укажи cвоё имя...">
                <div id="mce-responses" class="clear">
                    <div class="response" id="mce-error-response" style="display:none"></div>
                    <div class="response" id="mce-success-response" style="display:none"></div>
                </div>
                    <button dojotype="dijit.form.Button" type="submit" class="orange-btn" name="subscribe" id="mc-embedded-subscribe">Вступить в клуб скидок!</button>
            </form>
                
            </div>
            
            <div class="subscribe-info">
                <p>Хочешь получать уникальные скидки в лучших магазинах района Митино?</p>

                <p><b>Вступай в клуб скидок для девушек «Shop Non-Stop»!</b></p>
            </div>
        </div>
    </div>
    <div class="woman-features-wrap" id="benefits">
        <div class="woman-features">
            <div class="wf1 blue">
                <b>ВЫГОДНО!</b> «Shop Non-Stop» дает тебе возможность по-новому взглянуть на привычные расходы. Теперь обычный поход за покупками или в салон красоты, обед в кафе или тренировка в фитнес-клубе станут для тебя приятной возможностью получить скидку до 20%!
            </div>
            <div class="wf2 purple">
                <b>УДОБНО!</b> Все необходимые сервисы, услуги и магазины теперь всегда под рукой, ведь мы специально выбрали те компании, которые расположены недалеко от твоего дома – в Митино! Ты всегда будешь особой гостьей наших компаний-партнеров. 
            </div>
            <div class="wf3 orange">
                <b>СТИЛЬНО!</b> Карта «Shop Non-Stop» создана специально для тебя, её дизайн соответствует стилю современной, яркой, успешной девушки. Карта не будет «еще одним куском пластика» в кошельке, она станет неотъемлемой частью твоего ежедневного ритма жизни.
            </div>
        </div>
    </div>
    <div class="woman-brands-wrap" id="discounts">
        <div class="woman-brands">
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
                       echo '<div class="partner-logo">';
                            echo '<div class="bwWrapper">';
                                echo wp_get_attachment_image( $attachment->ID, 'partner-thumb' );
                            echo '</div>';
                       echo '</div>';
                      }
                 }
                
                 endwhile; endif; ?>
        </div>
    </div>
    <div class="woman-subscribe-2-wrap" id="getcard">
        <div class="woman-subscribe-2">
            <div class="subscribe-form">
                <?php echo do_shortcode('[contact-form-7 id="522" title="Форма подписки на /woman#getcard"]'); ?>
            </div>
            
            <div class="subscribe-info">
                <p class="purple">Для участия в программе от тебя не требуется никаких дополнительных затрат. Просто воспользуйся услугами одной из компаний-партнеров программы, заполни простую анкету и получи доступ к миру скидок «Shop Non-Stop»*!</p>


            <p class="purple">При заполнении анкеты укажи свой email и номер телефона, чтобы всегда быть в курсе самых свежих и интересных скидок и спецпредложений!</p>
            
            
            <p class="red red-dotted">Хочешь выгодный шопинг, но нет времени на получение карты?
            Закажи её доставку в удобное для тебя время и место!
            </p>
            </div>
        </div>
    </div>
    <div class="woman-trends-wrap" id="latestnews">
        <div class="woman-trends">
            <a class="woman-trend-news" href="/woman/news/"></a>
            <a class="woman-trend-offers" href="/woman/offers/"></a>
        </div>
    </div>

    <div class="woman-share-wrap" id="socialmedia">
        <div class="woman-share">
            <a class="sm-vk" href="http://vk.com/sns_woman" target="blank"></a><a class="sm-fb" href="https://www.facebook.com/snswoman" target="blank"></a><a class="sm-insta" href="http://instagram.com/sns_woman" target="blank"></a><a class="sm-tw" href="https://twitter.com/sns_woman" target="blank"></a>
        </div>
    </div>

    <div class="woman-actions-wrap" id="media">
        <div class="woman-actions">
            <a class="act-horo" href="/woman/horoscopes/"></a><a class="act-vote" href="/woman/votes/"></a><a class="act-test" href="/woman/tests/"></a><a class="act-diet" href="/woman/diets/"></a><a class="act-train" href="/woman/workouts/"></a>
        </div>
    </div>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">    
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>