
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<title><?php echo $page_title.$site_name; ?></title>
	
	
<meta property="og:site_name" content="<?php echo $page_title.$site_name; ?>" />
<meta property="og:url" content="<?php echo url::site();?><?php echo url::current();?>/?l=<?php echo Kohana::config('locale.language.0'); ?>" />

<meta property="og:title" content="<?php echo $page_title.$site_name; ?>" />
<meta property="og:description" content="<?php echo strip_tags(Kohana::lang('ui_main.frontpage-intro')); ?>" />
<meta property="og:image" content="<?php echo url::site();?>themes/reevo/images/avatar-<?php echo Kohana::config('locale.language.0'); ?>.png" />
	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="<?php echo Kohana::config('core.site_protocol'); ?>://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Pathway+Gothic+One' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Comfortaa:400,700,300' rel='stylesheet' type='text/css'>
	
<!-- <script src="http://code.jquery.com/jquery-1.9.1.js"></script> -->
<!-- <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> -->


<?php  if (isset($_GET['embed'])) { ?>
	<base target="_parent" />
<?php } ?>

 <script src="<?php echo url::site();?>/themes/reevo/js/jquery-1.4.4.min.js"></script> 


<script src="<?php echo url::site();?>/themes/reevo/js/jquery.reveal.js"></script>


<?php echo $header_block; ?>
	
<?php
	// Action::header_scripts - Additional Inline Scripts from Plugins
	Event::run('ushahidi_action.header_scripts');
?>

<script type="text/javascript" src="http://calebjacob.com/tooltipster/js/jquery.tooltipster.js"></script>
<script src="<?php echo url::site();?>/themes/reevo/js/jquery.autosize.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo url::site();?>/themes/reevo/css/reveal.css" />
<link rel="stylesheet" type="text/css" href="<?php echo url::site();?>/themes/reevo/css/tooltipster.css" />


	
<script type="application/javascript">
function expandFields() {
		$('#custom_field_18_inner').toggle('slow', function() {
		$('#custom_field_18_link').addClass('expanded');
		isExpanded_18=false;}); 
		
	
};
	
function myFunction()
	{
		
		$("#topbar").animate({ opacity: 0,left: '-=500', }, 1, function() {
		// Animation complete.
		});
			$("#topbar").animate({ opacity: 0.95,left: '+=500', }, 500, function() {
		// Animation complete.
		});
		
// 		$("#OpenLayers_Map_17_OpenLayers_Container").animate({ opacity: 0.95,left: '300px', }, 500, function() {
// // 			map.trigger("resize");
// 		})	
		$('textarea').autosize();   
	};
	
	$(window).load(myFunction);
</script>

<script>
		$(document).ready(function() {
				$('.category-filters a').tooltipster({
					position: 'right',
					offsetX: -24,
					delay: 50,
					maxWidth: 200,
				});
				
				$('.footer-btn').tooltipster({
					position: 'top',
					delay: 100,
					offsetX: 0,
					offsetY: 2,
					maxWidth: 200,
				});

				$('#footer-lang').tooltipster({
					position: 'top',
					delay: 100,
					offsetX: 0,
					offsetY: 2,
					maxWidth: 200,
				});
				

				twitter_share = 'http://twitter.com/home/?status=<?php echo str_replace("|", "", $page_title);?>- '+encodeURIComponent(location.href)+' %23EduMap @ReevoSocial';
				
				$('iframe').each(function(){
							var url = $(this).attr("src");
							var char = "?";
							if(url.indexOf("?") != -1){
											var char = "&";
							}
						
							$(this).attr("src",url+char+"wmode=transparent");
				});
		});
</script>

</head>


<?php
  // Add a class to the body tag according to the page URI
  // we're on the home page
  if (count($uri_segments) == 0)
  {
    $body_class = "page-main";
  }
  // 1st tier pages
  elseif (count($uri_segments) == 1)
  {
    $body_class = "page-".$uri_segments[0];
  }
  // 2nd tier pages... ie "/reports/submit"
  elseif (count($uri_segments) >= 2)
  {
    $body_class = "page-".$uri_segments[0]."-".$uri_segments[1];
  }

?>


<?php  if (isset($_GET['embed'])) { ?>
<!-- Only in embed -->

<?php } else { ?>
<body id="page" class="<?php echo $body_class; ?>">


	<!-- wrapper -->
	<div class="wrapper wrapper-<?php echo $this_page; ?> floatholder">

	<!-- topbar -->
	<div id="topbar">
		<div class="wrapper-960">
			<div id="topbar-bg" ></div>
			
			<a style="background: url('<?php echo url::site();?>themes/reevo/images/btn-bar-logo-<?php echo Kohana::config('locale.language.0'); ?>.png') no-repeat;" id="topbar-logo" href="<?php echo url::site();?>" title="<?php echo $site_name; ?>"></a>
			
			<a style="background: url('<?php echo url::site();?>themes/reevo/images/btn-bar-add-<?php echo Kohana::config('locale.language.0'); ?>.png') no-repeat;" id="topbar-add" href="<?php echo url::site();?>reports/submit"></a>
			
			<a style="background: url('<?php echo url::site();?>themes/reevo/images/btn-bar-list-<?php echo Kohana::config('locale.language.0');?>.png') no-repeat;" id="topbar-list" href="<?php echo url::site();?>reports"></a>
		</div>
		
		

	</div>
	<!-- / topbar -->
		
	
<?php } ?>