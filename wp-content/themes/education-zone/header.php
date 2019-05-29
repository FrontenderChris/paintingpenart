<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Education_Zone
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head itemscope itemtype="http://schema.org/WebSite">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
<?php wp_body_open(); ?>
    <div id="page" class="site">

    <?php education_zone_mobile_header(); ?>
    <?php education_zone_site_header(); ?>
    
    <?php do_action( 'education_zone_page_header' );

    $enabled_sections = education_zone_get_sections();  

    if( is_home() || ! $enabled_sections || ! ( is_front_page()  || is_page_template( 'template-home.php' ) ) ){ 
        $class = is_404() ? 'not-found' : 'row' ;    
        ?>
        <div id="content" class="site-content">
            <div class="container">
                <div class="<?php echo esc_attr( $class ); ?>">
    <?php } 