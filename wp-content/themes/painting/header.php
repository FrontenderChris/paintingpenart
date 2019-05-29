<!DOCTYPE html>
<html>
<head>
	<meta <?php bloginfo( 'charset' ); ?> />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title><?php bloginfo('name'); ?></title>
	<meta name="description" content="<?php bloginfo(description); ?>">
	<meta name="keywords" content="<?php bloginfo(keywords); ?>">
	<link rel="shortcut icon" href="<?php bloginfo('template_url');?>/favicon.ico"/>
	<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    	<link href="<?php bloginfo('template_url');?>/css/base.css" rel="stylesheet" type="text/css">
    	<link href="<?php bloginfo('template_url');?>/css/painting.css" rel="stylesheet" type="text/css">
        <script src="<?php bloginfo('template_url');?>/js/jquery-1.7.2.min.js"></script>
	<?php wp_head();?>
</head>
<body>
<div class="menu-over"> 
        <div class="menu">  
            <div class="menu-close"><img src="<?php bloginfo('template_url');?>/images/menu-close.png"></div>         
            <?php wp_nav_menu(array('theme_location' => 'primary-menu','link_before' => '','link_after' => '','menu_class' => '','container' => '','container_class' => '','container_id' => '')); ?>
        </div>
</div>
<div class="informationLine">
    <div class="container">
        <div class="inform-left">
            <a href="#" class="icon-location">8B Bishop Lenihan Place, East Tamaki / 65 Paul Matthews Road, Rosedale</a>
            <a href="mailto:paintingpen_artschool@hotmail.com" class="icon-email">paintingpen_artschool@hotmail.com</a>
            <a href="tel:09-2000072" class="icon-telephone">09-2000072</a>
            <a href="tel:02102349846" class="icon-telephone">02102349846</a>
        </div>
        <div class="inform-right">
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
<div class="navBox">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><a href="/" class="logo" title="logo"><img src="<?php bloginfo('template_url');?>/images/logo.png"></a></div>
            <div class="col-md-3">
                <div class="header-img">

<?php     
if(function_exists('ps_012_multilingual_list'))
{
    if(get_load_language() == 'en')
    {
        ?>
        <img src="<?php bloginfo('template_url');?>/images/school-text2.png">
        <?php 
    }
    else
    {
        ?>
        <img src="<?php bloginfo('template_url');?>/images/school-text1.png">
        <?php 
    }
}
?>
                    </div>
            </div>
            <div class="col-dm-7">
                    <?php wp_nav_menu(array('theme_location' => 'primary-menu','link_before' => '','link_after' => '','menu_class' => '','container' => '','container_class' => '','container_id' => '')); ?>
                    <i class="icon-search search-btn"></i>
                    <div class="search-box">
                    		<form method="get" id="searchform" action="<?php bloginfo('home'); ?>">        			
            		<input type="text" name="s" id="s" class="search-text" />
            		<div class="search-submit"><i class='icon-search'></i><input type="submit" id="sub" value="" /></div>	
            		</form>
                        	<span class="close-btn">╳</span>
                    </div>
                    <div class="menu-toggle">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </div>
            </div>
        </div>
    </div>
</div>