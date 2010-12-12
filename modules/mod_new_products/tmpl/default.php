<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package		Module Cat Menu Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    tpl.
*/
defined('_JEXEC') or die('Restricted access');
global $option;
?>
<div class="pro_new">
	<?php foreach ($catpro as $i => $product) { ?>
			<div class="pro_item">
				<p class="link_img"><a href="<?php echo $product->link; ?>" >
					<?php $filename = modNewProductsHelper::getImageDefault($product->id);?>
						<?php if($filename && file_exists('images/products/thumbs/'.$filename)){
							$image = JURI::base().'images/products/thumbs/'. $filename;
						}else{
							$image = JURI::base().'components/com_products/images/noimage.jpg';
						}
						?>
				
						<img src="<?php echo $image?>" border=0 width="90"  height="60"/>
					
					
				</a></p>
				<p class="link_title"><a href="<?php echo $product->link; ?>"><?php echo $product->name; ?></a></p>
				
			</div> 
	<?php } ?>
	<div class="clearfix"></div>
</div>		


