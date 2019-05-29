<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Actinia
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"> -->  
    <?php wp_head(); ?>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/custom.css">
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'actinia' ); ?></a>
    
<div class="top">
    <div class="site-content">
 
        <div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo('template_url');?>/images/logo.png"></a></div>
        <div class="top-right">
            <div class="top-search">
                <button class="searchform-toggle" aria-expanded="false"></button>
                <?php get_search_form(); ?>
            </div>        
           <div class="language">
                <ul>

    <?php if ( function_exists( 'ps_012_multilingual_list' ) ) $gs = ps_012_multilingual_list(false); ?>
    <?php
            $flags_dir = get_bloginfo('template_directory');
            $flags_dir .= '/images/flags/';
            foreach(array_reverse($gs, true) as $key=>$val){
                    $flag_icon = $flags_dir . $key . '.png';
                    if (ps_url_exists( $flag_icon )):
                            if ($val['current']) {
                                    $flag_icon = '<img src="'.$flag_icon.'"><span>'.$val['name'].'</span>';
                            }
                            else
                            {
                                    $flag_icon = '<img src="'.$flag_icon.'"><span class="current">'.$val['name'].'</span>';
                            }
                    endif;
                    $html .= '<li><a href="'.$val['url'].'">'.$flag_icon.'</a></li>';
            }
 
            echo $html;
    ?>

                </ul>
            </div>
      </div>
    </div>
</div>

    <header id="masthead" class="site-header">
        <?php //if ( ! is_404() ): ?>
            <!-- <button class="searchform-toggle" aria-expanded="false"></button> -->
            <?php //get_search_form(); ?>
        <?php //endif; ?>        
        <nav id="site-navigation" class="main-navigation">
	    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'actinia' ); ?></button>
                <?php if ( has_nav_menu( 'primary' ) && ! is_404()  ): 
                    wp_nav_menu( array( 
                        'theme_location' => 'primary', 
                        'menu_id' => 'primary-menu', 
                        'fallback_cb'    => '__return_false' ) 
                    ); ?>
                <?php endif; ?>             
        </nav><!-- #site-navigation -->
          <!--
	<div class="site-branding" style="<?php if ( get_header_image() ): ?> background-image:url('<?php header_image(); ?>'); min-height: 200px; width: 100%; padding: 0 1em;<?php endif; ?>">
	    <h1 class="site-title">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
            </h1>
	<?php $description = get_bloginfo( 'description', 'display' );
	    if ( $description || is_customize_preview() ) : ?>
		<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
	    <?php endif; ?>
	</div>--><!-- .site-branding -->

    </header><!-- #masthead -->

<div id="content" class="site-content">
