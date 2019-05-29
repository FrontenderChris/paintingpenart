<?php
//菜单
register_nav_menus( 
	array(
			'primary-menu'			=>	__( 'Primary Menu' ),
			'footer-menu' 		=>	__( 'Footer Menu'),
              'gallery-menu'     =>  __( 'Gallery Menu')
	)
);

// if no menu pressent fallback to.... used in wp_nav_menu
/*
function header_fallback() {
              echo '<div class="nav"><ul class="menu">';
              wp_list_pages('title_li=');
              echo '</ul></div>';
}
function footer_fallback() {
              echo '<div id="footer-nav-wrapper" class="group"><ul id="footer-nav">';
              wp_list_pages('depth=1&title_li=');
              echo '</ul></div>';
}
*/

/****/
function get_images_from_wpsimplegalleries($post_id) {
    $images = array();
    $gallery = get_post_meta($post_id, 'wpsimplegallery_gallery', true);
    $gallery = (is_string($gallery)) ? @unserialize($gallery) : $gallery;
    if (!empty($gallery)) {
        foreach ($gallery AS $img_id) {
            $img = wp_get_attachment_image_src($img_id, 'projects-gallery');
            $images[] = $img[0];
        }
    }
    return $images;
}

/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

	register_sidebar( array(
		'name' => 'News Right',
		'id' => 'news_right',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
}
add_action( 'widgets_init', 'arphabet_widgets_init' );


/*widget支持shortcode*/
add_filter('widget_text', 'do_shortcode');


/*
Plugin Name: WPJAM HTML Widget Title
Description: 让 Widget 标题支持简单的 HTML 标签
Version: 0.1
Author: Denis
*/
add_filter( 'widget_title', 'wpjam_html_widget_title' );
function wpjam_html_widget_title( $title ) {
    //HTML tag opening/closing brackets
    $title = str_replace( '[', '<', $title );
    $title = str_replace( '[/', '</', $title );

    //<strong></strong>
    $title = str_replace( 's]', 'strong>', $title );
    //<em></em>
    $title = str_replace( 'e]', 'em>', $title );

    return $title;
}

 
 /**********************************************************************************************/

/*
 *breadcrumbs面包屑导航
 */
 function dimox_breadcrumbs() {
 
  $delimiter = '/';

if(function_exists('ps_012_multilingual_list'))
{
  if(get_load_language() == 'en')
  {
    $name = '<a href="/">Home</a>';//.get_bloginfo('title').
  }
  else
  {
    $name = '<a href="/">首页</a>';
  }
}

   //text for the 'Home' link


  $currentBefore = '<span>';
  $currentAfter = '</span>';
 
  if ( !is_home() && !is_front_page() || is_paged() ) {

 
    global $post;
    $home = get_bloginfo('url');
    echo '' . $name . ' ' . $delimiter . ' ';
 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $currentBefore . single_cat_title() . $currentAfter;
 
    } elseif ( is_day() ) {
      echo '' . get_the_time('Y') . ' ' . $delimiter . ' ';
      echo '' . get_the_time('F') . ' ' . $delimiter . ' ';
      echo $currentBefore . get_the_time('d') . $currentAfter;
 
    } elseif ( is_month() ) {
      echo '' . get_the_time('Y') . ' ' . $delimiter . ' ';
      echo $currentBefore . get_the_time('F') . $currentAfter;
 
    } elseif ( is_year() ) {
      echo $currentBefore . get_the_time('Y') . $currentAfter;
 
    } elseif ( is_single() ) {
      $cat = get_the_category(); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_page() && !$post->post_parent ) {
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="'.get_permalink($page->ID).'">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_search() ) {
      echo $currentBefore . 'Search results for &#39;' . get_search_query() . '&#39;' . $currentAfter;
 
    } elseif ( is_tag() ) {
      echo $currentBefore . single_tag_title(). $currentAfter;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $currentBefore . 'Articles posted by ' . $userdata->display_name . $currentAfter;
 
    } elseif ( is_404() ) {
      echo $currentBefore . 'Error 404' . $currentAfter;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __(' Page ') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 

 
  }
}
/**************************************************************/
//获取子分类
// function post_is_in_descendant_category( $cats, $_post = null )
// {
// 	foreach ( (array) $cats as $cat ) 
// 	{
// 		// get_term_children() accepts integer ID only
// 		$descendants = get_term_children( (int) $cat, 'category');
// 		if ( $descendants && in_category( $descendants, $_post ) )
// 		return true;
// 	}
// 	return false;
// }

/*获取父分类
$category = get_the_category();
$parent = get_cat_name($category[0]->category_parent);
if (!empty($parent)) {
echo $parent;
} else {
echo $category[0]->cat_name;
}
*/
//echo get_category_parents($category, $display_link, $separator, $nice_name);


/**返回根分类**/
function get_category_root_id($cat)
{
$this_category = get_category($cat);   // 取得当前分类
while($this_category->category_parent) // 若当前分类有上级分类时，循环
{
$this_category = get_category($this_category->category_parent); // 将当前分类设为上级分类（往上爬）
}
return $this_category->term_id; // 返回根分类的id号
}
/**********************************************************************/
//自定义特色图片
add_theme_support( 'post-thumbnails' );
//获取特色图片
function get_post_thumbnail_url($post_id){
        $post_id = ( null === $post_id ) ? get_the_ID() : $post_id;
        $thumbnail_id = get_post_thumbnail_id($post->ID);
        if($thumbnail_id ){
                $thumb = wp_get_attachment_image_src($thumbnail_id, 'thumbnail');
                return $thumb[0];
        }else{
                return false;
        }
}
//获取特色图片
/*
function post_image_url(){
$post_ID=$post->ID;
$post_thumbnail_id = get_post_thumbnail_id( $post_ID );
$post_thumbnail_src = wp_get_attachment_image_src($post_thumbnail_id,'Full');
echo $post_thumbnail_src[0];
}
*/
/****************************************************************/
//输出缩略图地址 timthumb
function post_thumbnail_src(){
    global $post;
    if( $values = get_post_custom_values("thumb") ) {   //输出自定义域图片地址
        $values = get_post_custom_values("thumb");
        $post_thumbnail_src = $values [0];
    } else if( has_post_thumbnail() ){    //如果有特色缩略图，则输出缩略图地址
        $thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');
        $post_thumbnail_src = $thumbnail_src [0];
    } else if(catch_that_image()){
		$post_thumbnail_src = catch_that_image();
	}
	else{  //如果日志中没有图片，则显示随机图片
            $random = mt_rand(1, 5);
            //$post_thumbnail_src = get_template_directory_uri().'/images/random/'.$random.'.jpg';
            //如果日志中没有图片，则显示默认图片
            $post_thumbnail_src = get_template_directory_uri().'/images/no2.jpg';
        
    };
    echo $post_thumbnail_src;
}
//timthumb.php?src=  post_thumbnail_src(); &w=300&h=230&zc=1
/****************************************************************/
/*提取文章中第一张图片*/
function catch_that_image() { 

 global $post, $posts; 

 $first_img = ''; 

 ob_start(); 

 ob_end_clean(); 

 $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches); 

 $first_img = $matches [1] [0]; 

if(empty($first_img)){  

 $first_img = '';//bloginfo('template_url'). '/images/default-thumb.jpg';  
 
 } 


 return $first_img;   

 }



 
/*******************/

/**************************/
/*
* 分页
*/

/* Pagenavi */  
if(function_exists('ps_012_multilingual_list'))
{
  if(get_load_language() == 'en')
  {


function pagenavi( $before = '', $after = '', $p = 2 ) {   
if ( is_singular() ) return;   
global $wp_query, $paged;   
$max_page = $wp_query->max_num_pages;   
if ( $max_page == 1 ) return;   
if ( empty( $paged ) ) $paged = 1;   
echo $before.'<div id="pagenavi">'."\n";   
echo '<span class="pages">Page: ' . $paged . ' of ' . $max_page . ' </span>';   
if ( $paged > 1 ) p_link( $paged - 1, 'Previous Page', '«' );   
if ( $paged > $p + 1 ) p_link( 1, 'First Page' );   
if ( $paged > $p + 2 ) echo '... ';   
for( $i = $paged - $p; $i <= $paged + $p; $i++ ) {   
if ( $i > 0 && $i <= $max_page ) $i == $paged ? print "<span class='page-numbers current'>{$i}</span>" : p_link( $i );   
}   
if ( $paged < $max_page - $p - 1 ) echo '... ';   
if ( $paged < $max_page - $p ) p_link( $max_page, 'Last Page' );   
if ( $paged < $max_page ) p_link( $paged + 1,'Next Page', '»' );   
echo '</div>'.$after."\n";   
}   
function p_link( $i, $title = '', $linktype = '' ) {   
if ( $title == '' ) $title = "Page {$i}";   
if ( $linktype == '' ) { $linktext = $i; } else { $linktext = $linktype; }   
echo "<a class='page-numbers' href='", esc_html( get_pagenum_link( $i ) ), "' title='{$title}'>{$linktext}</a>";   
} 


  }
  else
  {

function pagenavi( $before = '', $after = '', $p = 2 ) {   
if ( is_singular() ) return;   
global $wp_query, $paged;   
$max_page = $wp_query->max_num_pages;   
if ( $max_page == 1 ) return;   
if ( empty( $paged ) ) $paged = 1;   
echo $before.'<div id="pagenavi">'."\n";   
echo '<span class="pages">页码：第' . $paged . ' 页/共 ' . $max_page . ' 页</span>';   
if ( $paged > 1 ) p_link( $paged - 1, '上一页', '«' );   
if ( $paged > $p + 1 ) p_link( 1, '第一页');   
if ( $paged > $p + 2 ) echo '... ';   
for( $i = $paged - $p; $i <= $paged + $p; $i++ ) {   
if ( $i > 0 && $i <= $max_page ) $i == $paged ? print "<span class='page-numbers current'>{$i}</span>" : p_link( $i );   
}   
if ( $paged < $max_page - $p - 1 ) echo '... ';   
if ( $paged < $max_page - $p ) p_link( $max_page, '最后一页' );   
if ( $paged < $max_page ) p_link( $paged + 1,'下一页', '»' );   
echo '</div>'.$after."\n";   
}   
function p_link( $i, $title = '', $linktype = '' ) {   
if ( $title == '' ) $title = "第 {$i} 页";   
if ( $linktype == '' ) { $linktext = $i; } else { $linktext = $linktype; }   
echo "<a class='page-numbers' href='", esc_html( get_pagenum_link( $i ) ), "' title='{$title}'>{$linktext}</a>";   
} 


  }
}


 /* 
//remove_action('wp_head', 'wp_enqueue_scripts', 1 );   
remove_action('wp_head', 'feed_links', 2 );   
remove_action('wp_head', 'feed_links_extra', 3 );//清除feed信息   
remove_action('wp_head', 'rsd_link' );   //清除离线编辑器接口
remove_action('wp_head', 'wlwmanifest_link' );   
remove_action('wp_head', 'index_rel_link' );   
remove_action('wp_head', 'parent_post_rel_link', 10, 0 );   
remove_action('wp_head', 'start_post_rel_link', 10, 0 );   
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );   //清除前后文信息
//remove_action('wp_head', 'locale_stylesheet' );   
remove_action('publish_future_post', 'check_and_publish_future_post', 10, 1 );   
//remove_action('wp_head', 'noindex', 1 );   
//remove_action('wp_head', 'wp_print_styles', 8 );   
//remove_action('wp_head', 'wp_print_head_scripts', 9 );   
remove_action('wp_head', 'wp_generator' );   //去除版本信息
//remove_action('wp_head', 'rel_canonical' );   
remove_action('wp_footer', 'wp_print_footer_scripts' );   
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );   
remove_action('template_redirect', 'wp_shortlink_header', 11, 0 );  
 
add_action('widgets_init', 'my_remove_recent_comments_style');   
function my_remove_recent_comments_style() {   
global $wp_widget_factory;   
remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));   
}   
*/
add_filter('show_admin_bar', '__return_false');//去除adminbar

/*************
* 退出后，跳转到指定页面
*
*/
/*
add_filter('logout_url', 'ludou_logout_redirect', 10, 2);

function ludou_logout_redirect($logouturl, $redir) {
  $redir = '/'; // 这里改成你要跳转的网址
  return $logouturl . '&amp;redirect_to=' . urlencode($redir);
}*/


 //判断移动设备
function is_mobile() {
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	$mobile_agents = Array("240x320","acer","acoon","acs-","abacho","ahong","airness","alcatel","amoi","android","anywhereyougo.com","applewebkit/525","applewebkit/532","asus","audio","au-mic","avantogo","becker","benq","bilbo","bird","blackberry","blazer","bleu","cdm-","compal","coolpad","danger","dbtel","dopod","elaine","eric","etouch","fly ","fly_","fly-","go.web","goodaccess","gradiente","grundig","haier","hedy","hitachi","htc","huawei","hutchison","inno","ipad","ipaq","ipod","jbrowser","kddi","kgt","kwc","lenovo","lg ","lg2","lg3","lg4","lg5","lg7","lg8","lg9","lg-","lge-","lge9","longcos","maemo","mercator","meridian","micromax","midp","mini","mitsu","mmm","mmp","mobi","mot-","moto","nec-","netfront","newgen","nexian","nf-browser","nintendo","nitro","nokia","nook","novarra","obigo","palm","panasonic","pantech","philips","phone","pg-","playstation","pocket","pt-","qc-","qtek","rover","sagem","sama","samu","sanyo","samsung","sch-","scooter","sec-","sendo","sgh-","sharp","siemens","sie-","softbank","sony","spice","sprint","spv","symbian","tablet","talkabout","tcl-","teleca","telit","tianyu","tim-","toshiba","tsm","up.browser","utec","utstar","verykool","virgin","vk-","voda","voxtel","vx","wap","wellco","wig browser","wii","windows ce","wireless","xda","xde","zte");
	$is_mobile = false;
	foreach ($mobile_agents as $device) {
		if (stristr($user_agent, $device)) {
			$is_mobile = true;
			break;
		}
	}
	return $is_mobile;
} 
//更改上传附件大小
/*
@ini_set( 'upload_max_size' , '1M' );
@ini_set( 'post_max_size', '1M');
@ini_set( 'max_execution_time', '300' );
*/

//禁止wordpress自动生成缩略图
/*
function v7v3_remove_image_size($sizes) {
	unset( $sizes['small'] );
    unset( $sizes['medium'] );
    unset( $sizes['large'] );
    return $sizes;
}
add_filter('image_size_names_choose', 'v7v3_remove_image_size');
*/
//修改文章添加图片时不自动链接到 “媒体文件”。  
function Bing_imagelink_setup(){
$id = 'image_default_link_type';
if( get_option( $id ) !== 'none' ) update_option( $id, 'none' );
}
add_action( 'admin_init', 'Bing_imagelink_setup' );
//你也可以把代码中的两处 “none” 改成 “file”（媒体文件）、“post”（附件页面） 和 “custom”（自定义URL）




//wordpress去掉后台上传图片的宽度和高度参数 
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 ); 
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 ); 
function remove_width_attribute( $html ) { 
$html = preg_replace( '/(width|height)="\d*"\s/', "", $html ); 
return $html;
 }
 
//修改WordPress登录错误的提示信息
function failed_login() {
    return 'LOST YOUR PASSWORD? PLEASE CONTACT <a href="mailto:info@paradisehouse.co.nz">PARADISE HOUSE</a>';
}
add_filter('login_errors', 'failed_login');

//禁用WordPress登录错误的提示信息
//add_filter('login_errors', create_function('$a', "return null;"));


/**
* Tests if any of a post"s assigned categories are descendants of target categories
*
* @param int|array $cats The target categories. Integer ID or array of integer IDs
* @param int|object $_post The post. Omit to test the current post in the Loop or main query
* @return bool True if at least 1 of the post"s categories is a descendant of any of the target categories
* @see get_term_by() You can get a category by name or slug, then pass ID to this function
* @uses get_term_children() Passes $cats
* @uses in_category() Passes $_post (can be empty)
* @version 2.7
* @link http://codex.wordpress.org/Function_Reference/in_category#Testing_if_a_post_is_in_a_descendant_category
*/
if (! function_exists( "post_is_in_descendant_category" ) ) {
  function post_is_in_descendant_category( $cats, $_post = null ) {
  foreach ( (array) $cats as $cat ) {
  // get_term_children() accepts integer ID only
  $descendants = get_term_children( (int) $cat, "category" );
  if ( $descendants && in_category( $descendants, $_post ) )
  return true;
  }
  return false;
  }
}

/******/
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count.' ';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


 /**
 * 让 WordPress 只搜索文章的标题
 * https://www.wpdaxue.com/search-by-title-only.html
 */
function __search_by_title_only( $search, &$wp_query )
{
  global $wpdb;
 
  if ( empty( $search ) )
        return $search; // skip processing - no search term in query
 
    $q = $wp_query->query_vars;    
    $n = ! empty( $q['exact'] ) ? '' : '%';
 
    $search =
    $searchand = '';
 
    foreach ( (array) $q['search_terms'] as $term ) {
      $term = esc_sql( like_escape( $term ) );
      $search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
      $searchand = ' AND ';
    }
 
    if ( ! empty( $search ) ) {
      $search = " AND ({$search}) ";
      if ( ! is_user_logged_in() )
        $search .= " AND ($wpdb->posts.post_password = '') ";
    }
 
    return $search;
}
add_filter( 'posts_search', '__search_by_title_only', 500, 2 );