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
        $('#mce-'+resp.result+'-response').html('Спасибо! Наш менеджер свяжется с Вами сразу после запуска мужской программы Shop Non-Stop');
        $('#mc-embedded-subscribe-form').each(function(){
            this.reset();
    	});
    } else {
        alert(resp.msg);
    }
}

</script>
<!--End mc_embed_signup-->

	<div class="woman-brands-wrap" id="discounts" style="background: #fff;">
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
                       echo '<div class="partner-logo no-redirect">';
                            echo '<div class="bwWrapper">';
                                echo wp_get_attachment_image( $attachment->ID, 'partner-thumb' );
                            echo '</div>';
                       echo '</div>';
                      }
                 }
                
                 endwhile; endif; ?>
        </div>
    </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>