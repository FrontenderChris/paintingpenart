<?php
/*
* Template Name: Home
*/
 get_header();?>
 <link href="<?php bloginfo('template_url');?>/css/swiper-3.2.7.min.css" rel="stylesheet" type="text/css">

<div class="sliderBox slider-swiper swiper-container">
    <?php echo do_shortcode("[layerslider id='1']"); ?>
</div>
<div class="section">
    <div class="container">
        <h3 class="contentTitle">
<?php     
if(function_exists('ps_012_multilingual_list'))
{
	if(get_load_language() == 'en')
	{
		echo "School Event Photos";
	}
	else
	{
		echo "学校活动照片";
	}
}
?>
        </h3>
        <hr class="hrLine">
        <div class="contentBox row">

             <?php $my_query = new WP_Query( 'cat=4&showposts=6' );?>
             <?php while ($my_query->have_posts() ) : $my_query->the_post();   ?>     
             <div class="col-md-3 detailBox">
                <h4><?php echo mb_strimwidth(strip_tags(apply_filters('the_title', $post->post_title)), 0, 40," ..."); ?></h4>
                <div class="detailBox-img"><img src="<?php echo post_thumbnail_src(); ?>"></div>
                <a href="<?php the_permalink(); ?>" class="detail-btn">View More</a>
             </div>                    
             <?php endwhile; ?>
             <?php wp_reset_query();  ?> 
            
        </div>        
    </div>
</div>
<div class="section section-three">
    <div class="container">
        <h3 class="contentTitle">
<?php     
if(function_exists('ps_012_multilingual_list'))
{
	if(get_load_language() == 'en')
	{
		echo "Art Gallery";
	}
	else
	{
		echo "学生作品";
	}
}
?>
        </h3>
        <hr class="hrLine">
        <div class="contentBox row">

        <?php
            $images1 = get_images_from_wpsimplegalleries('141');
            for($i=0; $i<6; $i++)
            {
        ?>
            <div class="col-md-4 detailBox">
                <div class="detail-center">
                    <div class="detail-inner">
                        <a href="/art-gallery/">
                        <div class="img-warp">
                             <img src="<?php echo $images1[$i]; ?>">
                        </div>
                        <div class="mask"></div>
                        </a>
                    </div>
                </div>
            </div> 
        <?php   
            }
        ?>

            
            
        </div>
    </div>
</div>
<div class="section section-four">
    <div class="container">
        <h3 class="contentTitle">
            <?php     
if(function_exists('ps_012_multilingual_list'))
{
    if(get_load_language() == 'en')
    {
        echo "Teachers";
    }
    else
    {
        echo "教师团队";
    }
}
?>

        </h3>
        <hr class="hrLine">
        <div class="contentBox row">

            <?php $my_query2 = new WP_Query( 'post_type=teams&showposts=4' );?>
            <?php while ($my_query2->have_posts() ) : $my_query2->the_post();   ?>     
            <div class="col-md-3 detail-wrap">
                <div class="img-inner">
                        <a class="img-wrap" href="<?php the_permalink(); ?>">
                             <img src="<?php echo post_thumbnail_src(); ?>">
                        </a>
                 </div>
                 <div class="text-wrap">
                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                     <hr class="hrLine">
                     <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 100," ..."); ?></p>
                     <div class="btns">
                        <a href="<?php if(get_field('email_address')) { the_field('email_address'); }?>" target="_blank">
                          <span class="icon-email icon-btn icon-top"></span>
                          <span class="icon-email icon-btn icon-bottom"></span>
                         </a>
                        <a href="<?php if(get_field('facebook_link')) { the_field('facebook_link'); }?>" target="_blank">
                          <span class="icon-facebook icon-btn icon-top"></span>
                          <span class="icon-facebook icon-btn icon-bottom"></span>
                         </a>
                     </div>
                 </div>                
            </div>
            <?php endwhile; ?>
             <?php wp_reset_query();  ?> 
            
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="video">
<?php     
// if(function_exists('ps_012_multilingual_list'))
// {
//     if(get_load_language() == 'en')
//     {

if(get_field('videourl')){

?>
<iframe width="100%" src="<?php the_field('videourl') ?>" frameborder="0" allowfullscreen></iframe>
<?php
}
    // }
    // else
    // {
?>
<?php
//     }
// }
?>
        </div>
    </div>
</div>
<div class="connect-us">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="conn-left">
                    <h3 class="contentTitle">CHILDRENS ART COURSES</h3>
                    <hr class="hrLine">
                    <div class="sliderBox2 slider-swiper2 swiper-container">
                    <div class="swiper-wrapper">

                 <?php $my_query3 = new WP_Query( 'cat=8&showposts=3' );?>
                    <?php while ($my_query3->have_posts() ) : $my_query3->the_post();   ?>
                        <div class="swiper-slide">                            
                           <a href="<?php the_permalink(); ?>">
                            <h3><?php the_title(); ?></h3>
                            <span class="dis"><?php the_time('Y-M-d'); ?></span>
                            <div class="dian">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 350," ..."); ?></p>
                           </a> 
                        </div>
                    <?php endwhile; ?>
                <?php wp_reset_query();  ?> 

             </div>
             <div class="swiper-pagination"></div>
           </div>
        </div>
     </div>
     <div class="col-md-5">
           <h3 class="contentTitle">Connect With Us</h3>
           <hr class="hrLine">
           <div class="conn-right">
               <div class="conn-content">
             <?php $my_query4 = new WP_Query( 'cat=9&showposts=1' );?>
             <?php while ($my_query4->have_posts() ) : $my_query4->the_post();   ?>  

                   <p class="small-title"><?php the_title(); ?></p>
                   <p class="small-date"><?php the_time('Y-M-d'); ?></p>
                   <p class="text-center"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 300," ..."); ?></p>
                   <a href="<?php the_permalink(); ?>" class="more">See More</a>

            <?php endwhile; ?>
             <?php wp_reset_query();  ?> 

               </div>
           </div>
     </div>
    </div>
        </div>
</div>
<div class="map-content">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
             <?php the_content();?>
        <?php endwhile;?>
        
    </div>
</div>

<script src="<?php bloginfo('template_url');?>/js/swiper-3.2.7.min.js"></script>
<script type="text/javascript">
    (function () {
        var swiper1 = new Swiper(".slider-swiper",{
            autoplay : 3000,
            autoplayDisableOnInteraction : false,
            loop:true,
            nextButton: '.swiper-btn-next',
            prevButton: '.swiper-btn-prev'
        });
         var swiper2 = new Swiper(".slider-swiper2",{
            autoplay : 3000,
            autoplayDisableOnInteraction : false,
            loop:true,
            pagination: '.swiper-pagination',
            autoHeight: true
        });
    })();
</script>					
	

 <?php get_footer();?> 	