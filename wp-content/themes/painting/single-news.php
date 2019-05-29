<?php get_header();?>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="about">
                    <h3 class="contentTitle"><?php the_title(); ?></h3>
                    <hr class="hrLine">
                    <div class="about-time"><span><?php the_time('d-m-Y') ?></span></div>
                    <div class="about-text">
                        				<?php while (have_posts()) : the_post(); ?>
		                
					         <?php the_content();?>
					                
					         <?php endwhile;?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
<?php 
// foreach((get_the_category()) as $category) 
// {      
// 	$cate_id = $category->cat_ID; //当前文章的分类的ID 
// 	//$cate_name = $category->cat_name; //当前文章的分类的名称 
// 	$cate_link = get_category_link($cate_id );
// }
// $p_cate_id = get_category_root_id($cate_id); //根分类
// $p_cate_name = get_cat_name($p_cate_id);    //根据分类ID获取分类名称
?>
                <div class="sidebar category">
                    <h2><?php echo get_cat_name(3);//echo $p_cate_name; ?></h2>
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