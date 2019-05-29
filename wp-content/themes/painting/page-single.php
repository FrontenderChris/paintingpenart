<?php 
/*
*Template Name: Timeline
*/
get_header();?>
<div class="section">
    <div class="container">
       
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
</div>
 <?php get_footer();?> 