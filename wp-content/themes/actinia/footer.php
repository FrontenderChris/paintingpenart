<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Actinia
 */

?>

	</div><!-- #content -->
        
        <?php if ( is_active_sidebar( 'footer-widget-area' ) && ! ( is_404() ) ): ?>
            <aside id="footer-widget-area" class="widget-area-2">
                <?php dynamic_sidebar( 'footer-widget-area' ); ?>
            </aside><!-- #secondary -->
        <?php endif; ?>

	<footer id="colophon" class="site-footer">
	    <div class="site-info">
     
		Copyright &copy; 2017 <span class="sep"> | </span> <a href="">Painting Pen Art School</a>.
		
	    </div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
