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
$imagesX = $this->images;
if (is_array($imagesX)) {	
?>
<div class="imgtab">
<?php 
	foreach ($imagesX as $imgsrc) {?>
	<?php if($imgsrc->filename && file_exists('images/products/thumbs/'.$imgsrc->filename)){?>
		<a href="<?php echo JURI::base().'images/products/'.$imgsrc->filename; ?>" rel="product" >
			<img src="<?php echo JURI::base().'images/products/thumbs/'.$imgsrc->filename; ?>" alt="" width="150"/>
		</a>
	<?php } ?>
	<?php } ?>
</div>
<?php
}
// END file ?>

