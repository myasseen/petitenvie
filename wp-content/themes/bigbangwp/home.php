<<<<<<< HEAD
<?php get_header(); ?>

<div class="one">
<div class="slideshow-container">
<div class="flexslider" id="index-slider">
<ul class="slides">
<li>
<a href="#">
<img src="<?php echo get_template_directory_uri().'/images/b1.jpg'?>" alt="Yummy"/>
</a>
<p class="flex-caption">This is a delicious desert</p>
</li>
<li>
<a href="#">
<img src="<?php echo get_template_directory_uri().'/images/b6.jpg'?>" alt="Core Innovation"/>
</a>
<p class="flex-caption">Discover great products nearby</p>
</li>
<li>
<a href="#">
<img src="<?php echo get_template_directory_uri().'/images/b3.jpg'?>" alt="Market Place"/>
</a>
<p class="flex-caption">Assisting in making "real, authentic food accessible again</p>
</li>
<li>
<a href="#">
<img src="<?php echo get_template_directory_uri().'/images/b4.jpg'?>" alt="Market Place"/>
</a>
<p class="flex-caption">Assisting in making "real, authentic food accessible again</p>
</li>
<li>
<a href="#">
<img src="<?php echo get_template_directory_uri().'/images/b5.jpg'?>" alt="Market Place"/>
</a>
<p class="flex-caption">Developing a whole new range of delicious food products</p>
</li>
</ul>
<ul class="flex-direction-nav">
<li><a class="prev" href="#">Previous</a></li>
<li><a class="next" href="#">Next</a></li>
</ul>
</div>
</div>

<div class="portfolio-grid">
	<ul id="thumbs" class="isotope" style="overflow: hidden; position: relative; height: 229px;">
		<li class="col4 item photo isotope-item" style="overflow: hidden; position: absolute; left: 0px; top: 0px;">
			<img src="<?php echo get_template_directory_uri().'/images/b6.jpg'?>"></img>
			<div class="item-info-overlay" style="opacity: 0; display: block;">
				<h3 class="title">Desert1</h3><div><p>This is a delicious Desert</p></div>
				</div>
      <!--END ITEM-INFO-OVERLAY-->
    </li>
    <li class="col4 item video isotope-item" style="overflow: hidden; position: absolute; left: 241px; top: 0px;">
    	<img src="<?php echo get_template_directory_uri().'/images/b5.jpg'?>"></img>
			<div class="item-info-overlay" style="opacity: 0; display: block;">
				<h3 class="title">Desert2</h3><div><p>This is a delicious Desert</p></div>
				</div>
    </li>
    <li class="col4 item video isotope-item" style="overflow: hidden; position: absolute; left: 482px; top: 0px;">
    	<img src="<?php echo get_template_directory_uri().'/images/b3.jpg'?>"></img>
			<div class="item-info-overlay" style="opacity: 0; display: block;">
				<h3 class="title">Desert3</h3><div><p>This is a delicious Desert</p></div>
				</div>
    </li>
    <li class="col4 item branding isotope-item" style="overflow: hidden; position: absolute; left: 723px; top: 0px;">
    	<img src="<?php echo get_template_directory_uri().'/images/b4.jpg'?>"></img>
			<div class="item-info-overlay" style="opacity: 0; display: block;">
				<h3 class="title">Desert4</h3><div><p>This is a delicious Desert</p></div>
				</div>
    </li>
    </ul>
    </div>
  </div>

<script type='text/javascript'>
jQuery(document).ready(function($){
    $('#index-slider').flexslider({
    animation: "fade",  
    slideDirection: "horizontal",  
    slideshow: true,              
    slideshowSpeed: 3500,      
    animationDuration: 500,
    directionNav: true, 
    controlNav: false  
});
});	
</script>
<?php get_footer(); ?>
=======
<?php get_header();?>
This is home
<?php get_footer();?>
>>>>>>> Testing
