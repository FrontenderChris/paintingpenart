<?php
/*
* Template Name: Redirect Link
*/

if(get_field('redirect_link'))
{
	$rlink = get_field('redirect_link');
}
else{
	$rlink = "/";
}
?>

<script language="javascript">document.location = "<?php echo $rlink; ?>";</script>
