<?php 
/*
*Template Name: Contact
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


<div class="section">
    <div class="container">
         <div class="about">
 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3187.9952542219135!2d174.89768875046687!3d-36.962170179817065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6d0d4cf792e5fb51%3A0x1e69d23686a49820!2s8b+Bishop+Lenihan+Pl%2C+East+Tamaki%2C+Auckland+2013!5e0!3m2!1sen!2snz!4v1505567614099" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
 </div>
 </div>
</div>
 <?php get_footer();?> 