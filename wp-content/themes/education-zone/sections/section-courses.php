<?php
/**
 * Courses Section
*/
 
$section_title= get_theme_mod( 'education_zone_courses_section_title' );
$post_one    = get_theme_mod( 'education_zone_featured_courses_post_one' );
$post_two    = get_theme_mod( 'education_zone_featured_courses_post_two' );
$post_three  = get_theme_mod( 'education_zone_featured_courses_post_three' );
$post_four   = get_theme_mod( 'education_zone_featured_courses_post_four' );

$posts = array( $post_one, $post_two, $post_three, $post_four );
$posts = array_diff( array_unique( $posts ), array('') );

$args = array(
        'post__in'   => $posts,
        'orderby'   => 'post__in',
            'tax_query' => array(
							array(
							'taxonomy' => 'post_format',
							'field'    => 'slug',
							'terms'    => array( 'post-format-gallery' ),
							'operator' => 'NOT IN',
							)),
        );

$qry = new WP_Query( $args );
?>
<div class="container">
    <div class="header-part">
        <h2 class="section-title">新闻</h2>
        <div class="row">
            <div class="col-lg-6">
                <iframe width="570" height="368" src="https://www.youtube.com/embed/13E5azGDK1k" frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen=""></iframe>
            </div>
            <div class="col-lg-6">
                <?php if ($posts && $qry->have_posts()) { ?>
                    <div class="row" id="promos">
                        <?php while ($qry->have_posts()) {
                            $qry->the_post(); ?>
                            <div class="col-lg-6 col-md-12">
                                <?php
                                    $thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail')
                                ?>
                                <div style="background-image: url('<?php echo $thumbnail_image_url[0]; ?>');">
                                    <a class="linkbox" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                        <span><span><?php the_title(); ?></span></span>
                                        <span class="homepagePromoArrow fa fa-angle-right"></span>
                                    </a>
                                </div>
                            </div>
                        <?php }
                            wp_reset_postdata();
                        ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<!--<div class="container">-->
<!--	--><?php //education_zone_get_section_header( $section_title );
//
//    if( $posts && $qry->have_posts() ){ ?>
<!--        <ul>-->
<!--        --><?php
//            while( $qry->have_posts() ){
//                $qry->the_post(); ?>
<!--                <li>-->
<!---->
<!--        			<div class="image-holder">-->
<!--        				--><?php
//                        if(has_post_thumbnail()){
//                            the_post_thumbnail( 'education-zone-featured-course' );
//                        }else{ ?>
<!--                              <img src="--><?php //echo esc_url( get_template_directory_uri() ); ?><!--/images/featured-fallback.png">-->
<!--                        --><?php //} ?>
<!--        				<div class="text">-->
<!--        					<span>--><?php //the_title(); ?><!--</span>-->
<!--        				</div>-->
<!--        				<div class="description">-->
<!--        					<h2>--><?php //the_title(); ?><!--</h2>-->
<!--        					--><?php //the_excerpt();?>
<!--        					<a href="--><?php //the_permalink(); ?><!--" class="learn-more">--><?php //echo esc_html__( 'Learn More', 'education-zone' ); ?><!--</a>-->
<!--        				</div>-->
<!--        			</div>-->
<!---->
<!--                </li>-->
<!--		--><?php //}
//            wp_reset_postdata();
//        ?>
<!--        </ul>-->
<!--    --><?php //} ?>
<!--</div>-->