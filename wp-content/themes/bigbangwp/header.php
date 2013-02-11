<!DOCTYPE html>
<?php
$PAGE_ID = get_the_ID(); 
$layout = get_option(BRANKIC_VAR_PREFIX."boxed_stretched");
if (isset($_GET["layout"])) 
{
    if (htmlspecialchars(strip_tags($_GET["layout"])) == "stretched") $layout = "stretched" ;
    if (htmlspecialchars(strip_tags($_GET["layout"])) == "boxed") $layout = "boxed" ;
} 
$page_template = get_page_template();
$path = pathinfo($page_template);
$page_template = $path['filename'];
?>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head>

	
	<title><?php brankic_titles(); ?></title>
    <meta name="BRANKIC_VAR_PREFIX" content="<?php echo BRANKIC_VAR_PREFIX; ?>" />
    <meta name="BRANKIC_THEME" content="<?php echo BRANKIC_THEME; ?>" />  
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<link rel='start' href='<?php echo home_url(); ?>'>
    <link rel='alternate' href='<?php echo get_option(BRANKIC_VAR_PREFIX . "logo2"); ?>'>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<meta name="viewport" content="initial-scale=1, maximum-scale=1" />
    <meta name="viewport" content="width=device-width" /> 
	<!-- Favicon -->
	<link rel="shortcut icon" href="<?php echo stripslashes(get_option(BRANKIC_VAR_PREFIX.'favicon')); ?>" />	
	<?php if (is_search()) { ?><meta name="robots" content="noindex, nofollow" /><?php } ?>
    
    
    <?php echo get_option(BRANKIC_VAR_PREFIX."custom_google_font_href"); ?>
    <style type="text/css">
    <!--
    h1.title, h2.title, h3.title, h4.title, h5.title, h6.title, #primary-menu ul li a, .section-title .title, .section-title .title a, .section-title h1.title span, .section-title p, #footer h3, .services h2, .item-info h3, .item-info-overlay h3, #contact-intro h1.title, #contact-intro p, .widget h3.title, .post-title h2.title, .post-title h2.title a {
        <?php echo get_option(BRANKIC_VAR_PREFIX."custom_google_font")?>
    }
    -->
    </style>
    
	
    
<?php echo get_option(BRANKIC_VAR_PREFIX."ga"); ?>
    

<?php wp_head(); ?>
</head>
<body id="top" <?php body_class(); ?> style="background-image: url(<?php echo get_template_directory_uri().'/images/pattern/bg-8.png'?>);" >

<?php
if ($layout == "boxed")
{
?>
<div id="wrapper">    

<div class="content-wrapper clear"> 
<?php
}
?>
    <!-- START HEADER -->
    
    <div id="header-wrapper">
    	
        <div class="header clear">
            
           
           
            <div id="logo">    
                <a href="<?php echo home_url(); ?>"><img src="<?php echo get_option(BRANKIC_VAR_PREFIX."logo"); ?>" alt="" /></a>        
            </div><!--END LOGO-->
        
           
           
                     
           
           
            <div id="primary-menu"> 
            <?php 
            wp_nav_menu( array( 'theme_location' => 'primary-menu' , 
                                'container' => false, 
                                'menu_class' => 'menu', 
                                'menu_id' => '', 
                                'fallback_cb' => 'header_fallback'
                                ) );
            ?>                
            </div><!--END PRIMARY MENU-->
           
           
           <div class="social-bookmarks" style="float:right; clear:right">
		<ul>
			<li class="mixx">
				<a id ="aDisplayNewsLetter" href="https://twitter.com/brankic1979" target="_blank">twitter</a>
   		 	</li>
			<li class="twitter">
				<a href="https://twitter.com/brankic1979" target="_blank">twitter</a>
   		 	</li>
    <li class="facebook">
    	<a href="https://www.facebook.com/brankic1979themes" target="_blank">facebook</a>
    	</li>
    	
    	</ul>
      <!-- END UL-->
    </div> 
           <div id="divNewsLetter" style="float:right; clear:right">
    		<?php nsu_signup_form();?>
    		</div> 
        </div><!--END HEADER-->    
        
    </div><!--END HEADER-WRAPPER-->        
    
    <!-- END HEADER -->
    <script type='text/javascript'>
    jQuery(document).ready(function($){
        $("#divNewsLetter").hide();
    	$("#aDisplayNewsLetter").click(function(){
    		$(this).parents(".social-bookmarks").hide('slow',function(){
    	        $("#divNewsLetter").show();
        		});
    		return false;
        	});
        });
    </script>
<?php
if ($layout == "stretched")
{
    if ($page_template == "page-contact-2") $class = "class='fullwidth clear'"; else $class = "class='clear'";
?>
<div id="wrapper"  <?php echo $class; ?>>    

<?php
if ($page_template != "page-contact-2")
{
?>
<div class="content-wrapper clear">
<?php
}
}
?>