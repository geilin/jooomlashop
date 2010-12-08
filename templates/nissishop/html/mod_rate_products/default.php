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
	<?php foreach ($catpro as $i => $pro) { ?>
			<div class="pro_item">
				<p class="link_img"><a href="<?php echo $pro->link; ?>" >
					<?php $filename = modNewProductsHelper::getImageDefault($pro->id);?>
				
						<?php if($filename && file_exists('images/products/thumbs/'.$filename)){
							$image = JURI::base().'images/products/thumbs/'. $filename;
						}else{
							$image = JURI::base().'components/com_products/images/noimage.jpg';
						}
						?>				
						<img src="<?php echo $image?>" />			
					
				</a></p>
				<p class="link_title"><a href="<?php echo $pro->link; ?>"><?php echo $pro->name; ?></a></p>				
				 <p class="pro_price">Giá bán: <?php echo number_format($pro->saleprice); ?> <?php echo $pro->currency; ?></p>
			</div> 
	<?php } ?>
<div class="clear"></div>


