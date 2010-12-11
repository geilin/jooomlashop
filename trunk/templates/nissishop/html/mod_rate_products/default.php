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
<?php foreach ($catpro as $i => $product) { ?>
        <div class="product_item">
			<div class="product_thumb">
				<div class="product_thumb_wrapper">
				<a href="<?php echo $product->link; ?>" class="link_image"><span>&nbsp;</span>					
						<?php $filename = modNewProductsHelper::getImageDefault($product->id);?>
							<?php
							$thumb_path = 'images/products/thumbs/'. $filename ;
							$thumb_path = ($filename && file_exists($thumb_path))?
								$thumb_path :
								'components/com_products/images/noimage.jpg';
							?>
							<?php echo JHTML::_('image', $thumb_path, $product->name); ?>					
				</a>
				</div>
			</div>
			<div class="product_item_info">
				<a href="<?php echo $product->link; ?>"><?php echo $product->name; ?></a>
				<span class="pro_price">Giá bán: <?php echo number_format($product->saleprice, 0, '.', '.'); ?> <?php echo $product->currency; ?></span>
			</div>   
        </div> 
<?php } ?>
<div class="clear"></div>

