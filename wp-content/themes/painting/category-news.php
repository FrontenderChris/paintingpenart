<?php get_header();?>
<div class="section">
    <div class="container">
        <!-- <div class="row">
            <div class="col-md-9"> -->
                <div class="about">
                    <h3 class="contentTitle"><?php single_cat_title(); ?></h3>
                    <hr class="hrLine">
                    <div class="news">
                        	<ul>
                        		<?php 
					//$post_author = $current_user->user_login;
					//$post_author = get_the_author_meta( 'user_login' );
					$limit = get_option('posts_per_page');
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$args=array(
							//'post_type'=>'project',
							'paged' => $paged,
							'showposts' => $limit,
							'orderby' => id, // 按时间排序
							'cat' => $cat,
							'order' => desc,	
							//'author_name' => $post_author,					
//  'meta_query' => array(
// 	 array(
// 		 'key' => 'post_title_zh', //自定义字段
// 		 'value'=> '',
// 		 'compare' => '!='
// 	 )
// )
						);
					query_posts($args);	
					while (have_posts()) : the_post();
				?>
                        		<li><a href="<?php the_permalink() ?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_title', $post->post_title)), 0, 60,' ...'); ?></a><span><?php the_time('Y-m-d'); ?></span></li>
                        		<?php endwhile;?> 
                    </ul>
                    </div>
                    <div class="pagenav">
                    	<?php pagenavi(); ?> 
			<?php wp_reset_query();  ?>
                    </div>
                </div>
            <!-- </div> -->
            <!-- <div class="col-md-3">

                <div class="sidebar category">
                    <h2><?php  echo get_cat_name(get_category_root_id($cat)); ?></h2>
                    <ul>
                    	<?php wp_list_categories('style=list&hide_empty=0&child_of='.get_category_root_id($cat).'&title_li='); ?>
                    </ul>
                </div>


            </div> -->
        <!-- </div> -->
    </div>
</div>
 <?php 
get_footer();?> 