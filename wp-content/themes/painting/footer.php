<div class="footer">
    <div class="container">
        <div class="row">
             <div class="col-md-3 col-xs-4 item">
            <h4>
<?php     
if(function_exists('ps_012_multilingual_list'))
{
    if(get_load_language() == 'en')
    {
        echo "Category";
    }
    else
    {
        echo "所有分类";
    }
}
?>

            </h4>
            <hr class="hrLine">
            <?php wp_nav_menu(array('theme_location' => 'footer-menu','link_before' => '','link_after' => '','menu_class' => '')); ?>
        </div>
         <div class="col-md-3 col-xs-4 item">
            <h4>
<?php     
if(function_exists('ps_012_multilingual_list'))
{
    if(get_load_language() == 'en')
    {
        echo "About us";
    }
    else
    {
        echo "关于我们";
    }
}
?>
            </h4>
            <hr class="hrLine">
            <ul>
                <?php echo wp_list_pages("title_li=&child_of=8&echo=0&sort_column=menu_order"); ?>
            </ul>
        </div>
         <div class="col-md-3 col-xs-4 item">
            <h4>
<?php     
if(function_exists('ps_012_multilingual_list'))
{
    if(get_load_language() == 'en')
    {
        echo "Gallery";
    }
    else
    {
        echo "作品";
    }
}
?>
            </h4>
            <hr class="hrLine">
            <ul>
                <?php wp_nav_menu(array('theme_location' => 'gallery-menu','link_before' => '','link_after' => '','menu_class' => '')); ?>
            </ul>
        </div>
        </div>
        <div class="footer-bottom">
             <p class="copy">Copyright © 2017 <span class="sep"> | </span> <a href="">Painting Pen Art School</a></p>
             <p class="design">Web Design & Hosting by ***</p>
        </div>
    </div>
</div>

<script type="text/javascript">

    $('.close-btn').on('click', function() {
        $('.search-box').hide();
    })
     $('.search-btn').on('click', function() {
        $('.search-box').toggle();
    })

     /***********************/
        $(".menu-toggle").click(function(){
            var hl = document.body.clientHeight;
            $(".menu-over").css("height",hl);
            $(".menu-over").fadeIn();
        });
        $(".menu-close").click(function(){
            $(".menu-over").fadeOut();
        });
</script>
		
<?php wp_footer(); ?>
</body>
</html>

