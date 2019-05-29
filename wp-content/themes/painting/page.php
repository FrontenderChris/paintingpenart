<?php get_header();?>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="about">
                    <h3 class="contentTitle"><?php the_title(); ?></h3>
                    <hr class="hrLine">
                    <div class="about-text">
                        				<?php while (have_posts()) : the_post(); ?>
		                
					         <?php the_content();?>
					                
					         <?php endwhile;?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
<?php      
if($post->post_parent)
{
    $titlename = get_page($post->post_parent)->post_title;
    $pageid = $post->post_parent;
}else{
    $titlename = $post->post_title;
    $pageid = $post->ID;
}
$children = wp_list_pages("title_li=&child_of=".$pageid."&echo=0&sort_column=menu_order");
?>
                <div class="sidebar category">
                    <h2><?php echo $titlename; ?></h2>
                    <ul>
                    	<?php  if ($children) { echo $children; } ?>
                    </ul>
                </div>


            </div>
        </div>
    </div>
</div>
 <?php 
get_footer();?> 