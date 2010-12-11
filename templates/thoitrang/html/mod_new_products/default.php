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
<ul id="mycarousel" class="jcarousel-skin-tango block-content sanphammoi">
	<?php foreach ($catpro as $product) { ?>
		<li class="block-content-item">
            <a href="<?php echo $product->link;?>">
				<?php $filename = modNewProductsHelper::getImageDefault($product->id);?>
				<?php if($filename && file_exists('images/products/thumbs/'.$filename)){
					$image = JURI::base().'images/products/thumbs/'. $filename;
				}else{
					$image = JURI::base().'components/com_products/images/noimage.jpg';
				}
				?>
				<img src="<?php echo $image?>" alt="<?php echo $product->name?>" width="135" height="198"/>
			</a>
        </li>
	<?php } ?>
</ul><!--End .block-content .sanphammoi-->	


