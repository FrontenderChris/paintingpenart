<?php
//$post = $wp_query->post;
if ( in_category( 3 ) || post_is_in_descendant_category( 3 )){
include(TEMPLATEPATH . '/single-products.php');
}
else {
include(TEMPLATEPATH . '/single-news.php');
}
?>

