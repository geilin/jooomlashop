<?php 
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    tpl detail.
*/
defined( '_JEXEC' ) or die( 'Restricted access' ); 
$path_to_js = JURI::base().'components/com_products/js/phukienslide/';
$path_to_pk = JURI::base().'/images/accessories/';
if (count($this->phukien)>0) {
	$document =& JFactory::getDocument();
$document->addStyleSheet($path_to_js.'skin.css');
?>
<!-- Phu kien Slide -->
<div class="clearfix h_10"></div>
<div class="pk_warp">
<div class="cb"></div>
<div class="phukien_slide">
<div class="phukien_title_mod"><span style="color:#3366CC;">Những phụ kiện tương thích với điện thoại này</span></div>
<div class="h_20"></div>
<script type="text/javascript" src="<?php echo $path_to_js; ?>jcarousel.min.js"></script>
<script type="text/javascript">
$(function() { 
	jQuery(".caurol_pro").jCarouselLite({
	    btnNext: ".carousel-next",
	    btnPrev: ".carousel-previous",
	    visible: 4,
	    circular: false,
	    speed: 300
	    
	});
	ulheight = jQuery('.pk_warp')[0].offsetHeight;
	jQuery('.pk_warp').css({height: ulheight, overflow: 'hidden'});
}); 
</script>	
<div id="mycarousel">
<?php if (count($this->phukien)>4) { ?>
	<a role="button" class="carousel-control next carousel-next hover"></a>
	<a role="button" class="carousel-control previous carousel-previous disabled hover"></a>
<?php } else { ?>
	<a role="button" class="carousel-control next carousel-next disabled hover"></a>
	<a role="button" class="carousel-control previous carousel-previous disabled hover"></a>
<?php } ?>
<div class="caurol_pro">
 <ul  class="jcarousel-skin-tango">
 	<?php
 		foreach($this->phukien as $pk ) { 
 			
 		$title = JFilterOutput::stringURLSafe($pk->name);
		$title = str_replace(' ', '-', strtolower($title));
 		$link = JRoute::_('index.php?option=com_products' .
			'&controller=accessory&view=adetail&id=' . $pk->id. ':'. $title);	
 	?>
 		 <li style="width:149px;">
 		 	<div class="phukien_item">
 		 		<a href="<?php echo $link; ?>" >
 		 		<img src="<?php echo $path_to_pk.$pk->thumbnail; ?>" height="110px" alt="<?php echo $pk->name; ?>" />
 		 		</a>
 		 		<a href="<?php echo $link; ?>" class="padd_warp">
 		 			<?php echo $pk->name; ?>
 		 		</a>
 		 		<span style="font-size:11px;"><?php echo number_format($pk->price)?> VNĐ</span> 
 		 	</div>
 		  </li>
 	<?php } ?>
    </ul>
    </div>
  </div>
 </div>
<!-- END: Phu kien Slide -->
<div class="clearfix"></div>
</div>
<div class="clearfix h_15" ></div>
<?php } 
// END file ?>

