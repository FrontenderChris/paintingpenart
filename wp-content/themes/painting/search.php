<?php get_header();?>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="about">
                    <h3 class="contentTitle">
<?php     
if(function_exists('ps_012_multilingual_list'))
{
	if(get_load_language() == 'en')
	{
?>
		Search Result	
<?php
	}
	else
	{
?>
		搜索结果		
<?php		
	}
}
?>
                    </h3>
                    <hr class="hrLine">
                    <div class="news">
                        	<ul>
                        		<?php 
					$resault = $_GET['s']; //获取搜索内容
					$limit = get_option('posts_per_page');
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

if(function_exists('ps_012_multilingual_list'))
{
	if(get_load_language() == 'en')
	{
								
								$args=array(
								's' => $resault ,
								//'cat' => 1,
								'paged' => $paged,
								'showposts' => $limit,
								'orderby' => date,						
								);


	}
	else{
								$args=array(
								//'cat' => 1,
								'paged' => $paged,
								'showposts' => $limit,
								'orderby' => date,
								'meta_query' => array(
								        array(
								            'key' => 'post_title_zh',     // 你的使用的自定义字段1
								            'value' =>  $resault,  // 自定义字段1对应的值
								            'compare' => 'like'
								        	    ),
									),						
								);
								
	}
}													
					
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
            </div>
            <div class="col-md-3">

                <div class="sidebar category">
                    <h2><?php  echo get_cat_name('3'); ?></h2>
                    <ul>
                    	<?php wp_list_categories('style=list&hide_empty=0&child_of=3&title_li='); ?>
                    </ul>
                </div>


            </div>
        </div>
    </div>
</div>
 <?php 
get_footer();?> 