<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta name='yandex-verification' content='6e7c03762b0455b0' />
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link href="<?php echo get_template_directory_uri(); ?>/css/lightbox.css" rel="stylesheet" />
    
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.10.2.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.countdown.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.placeholder.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.BlackAndWhite.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/lightbox-2.6.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/index.js"></script>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
    <?php
        global $shop, $post;

        $shop->setGenderCookie();

        if(is_front_page() && $shop->getUserGender() == 'woman')
        {
            header( 'Location: /woman' );
        }
    ?>
	<?php wp_head(); ?>
    <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.ico?v=1.2"/>
</head>
<?php

    $gender = $shop->getPageGender($post);
    $slug = $shop->getPageSlug($post);
    $type = $shop->guessPageType($post);

    $title = $shop->getPageTitle($post);
    $description = $shop->getPageDescription($post);
    $current_page = $post;
?>
<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
        <?php $header = ($gender == $slug) ? 'header-' . $gender : 'header-' . $gender . '-' . $slug; ?>
		<header id="masthead" class="site-header <?php echo $header;?> " role="banner">
			<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?><?php echo $slug == 'woman' ? '/woman' :'';?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<?php $logo = ($gender == "woman" || $gender == "man") ? $gender : ""; ?>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/<?php echo $logo ? $logo . '-' : '';?>logo.png" />
                <div style="float: right;"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/header-slogan.png" /></div>
			</a>
            <?php if(($type || !is_front_page() ) && $slug != $gender && function_exists('bcn_display')) : ?>
                <div class="breadcrumbs">
                    <?php bcn_display(); ?>
                </div>
            <?php endif; ?>

            <?php if ($type) : ?>

                <?php 
                    switch($type) {
                        case 'company':
                            echo '<div class="company-info">';
                                echo '<div class="company-thumb">';
                                    echo get_the_post_thumbnail( $current_page->ID, 'company-thumb' );
                                    $url     = get_post_meta($current_page->ID, "company-url", true);
                                    $hours   = get_post_meta($current_page->ID, "company-work-hour", true);
                                    $phone   = get_post_meta($current_page->ID, "company-phone", true);
                                    $address = get_post_meta($current_page->ID, "company-address", true);
                                    $discount = get_post_meta($current_page->ID, "discount", true);
                                    echo "<div class='company-details'>";
                                        echo $url     ? "<div><div class='company-url'></div><a href='".$url."' target='blank'>" . $url . "</a></div>" : '';
                                        echo $hours   ? "<div><div class='company-hours'></div>" . $hours . "</div>" : '';
                                        echo $phone   ? "<div><div class='company-phone'></div>" . $phone . "</div>" : '';
                                        echo $address ? "<div><div class='company-address'></div>" . $address . "</div>" : '';
                                        echo $discount ? "<div class='company-discount'>Скидка <b>" . $discount . "</b>%</div>" : '';
                                    echo '</div>';
                                echo '</div>';
                                echo '<div class="company-right-col">';
                                    echo '<div class="company-title">';
                                        echo $title;
                                    echo '</div>';
                                    echo '<div class="company-description">' . $description . '</div>';
                                echo '</div>';
                            echo '</div>';
                            
                            break;
                        
                        case "category":
                            echo '<div class="woman-page-description">';
                                echo $description;
                            echo '</div>';
                        
                            break;
                        case "offer":
                        case "news":
                            echo '<div class="news-info">';
                            echo '<div class="news-page-title">';
                                echo $title;
                            echo '</div>';
                            echo '</div>';
                        
                            break;
                    }
                ?>
            <?php elseif (!$type && ($name=="news" || $name=="offers") ) : ?>

                <div class="news-info">
                    <div class="news-page-title">
                       <?php echo $current_page->post_title; ?>
                        <div style="float:right;">
                            <select class="companies-filter">
                                <option value=""> Все компании</option>
                            </select>
                        </div>
                    </div>
                </div>
            <?php elseif (!$type && ($name=="faq") ) : ?>
                <div class="news-info">
                    <div class="news-page-title faq-page-title">
                       <a class="current" href="<?php echo '/' . $slug . '/' . $name; ?>"><?php echo $current_page->post_title; ?></a>
                       <a href="<?php echo '/' . $slug . '/' . $name . '#feedback'; ?>">Обратная связь</a>
                    </div>
                </div>
            <?php elseif (!$type && $slug != 'woman' && $slug != 'discounts' && $slug != 'dev') : ?>
                <div class="news-info">
                    <div class="news-page-title faq-page-title">
                        <?php echo $current_page->post_title; ?>
                    </div>
                </div>
            <?php elseif ($slug == 'discounts') : ?>
                <div class="woman-page-description">
                    <?php echo $description; ?>
                </div>
            <?php endif; ?>
			<div id="navbar" class="navbar">
				<nav id="site-navigation" class="navigation main-navigation" role="navigation">
				</nav><!-- #site-navigation -->
			</div><!-- #navbar -->
            
		</header><!-- #masthead -->
        <?php if(is_front_page()) : ?>
        <div class="gender-check">
            <div style="width: 1025px; margin: 0 auto;">
                <div class="man-card">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/man-card.png">
                    <a class="dark-blue-btn choose-man">Я мужчина и хочу делать покупки разумно без переплат</a>
                    <!-- href="/man?gender=man" -->
                </div>
                <div class="woman-card choose-woman">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/women-card.png">
                    
                    <a class="pink-btn" href="/woman?gender=woman">Я девушка и хочу выгодный шопинг и приятные подарки</a>
                </div>
            </div>
        </div>
        <?php endif; ?>
		<div id="main" class="site-main">