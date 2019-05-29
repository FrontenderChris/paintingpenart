<?php get_header();?>
<div class="section">
    <div class="container">
        <h3 class="contentTitle"><?php single_cat_title(); ?></h3>
        <hr class="hrLine">
        <div class="contentBox row">

        	<?php 
								//$limit = get_option('posts_per_page');
								//$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
								$args=array(
								//'paged' => $paged,
								//'showposts' => $limit,
									'showposts' => -1,
								'orderby' => id, // 按时间排序
								'cat' => $cat,
								'order' => desc							
								);
								query_posts($args);
								
								while (have_posts()) : the_post();
						?>
	   <div class="col-md-3 detailBox">
                <h4><?php echo mb_strimwidth(strip_tags(apply_filters('the_title', $post->post_title)), 0, 30,' ...'); ?></h4>
                <div class="detailBox-img"><img src="<?php bloginfo('template_url');?>/timthumb.php?src=<?php   post_thumbnail_src();?>&h=160&zc=1"></div>
                <a href="<?php the_permalink() ?>" class="detail-btn">View More</a>
            </div>
						<?php endwhile;?>
		<?php wp_reset_query();  ?>   
            
           
        </div>
        <!-- <div class="pagenav">
                 <?php //pagenavi(); ?>                                   
        </div> -->

    </div>
</div>
 <?php get_footer();?> 