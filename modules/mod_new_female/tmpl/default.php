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
<h3 class="block-main-content-title"><?php echo JText::_('Thời Trang Nữ');?></h3>
<a class="read-more" href="<?php echo $linkAll?>"><?php echo JText::_('Xem tất cả');?></a>
<div class="content">
	<?php foreach ($catpro as $i => $pro) { ?>
	 	<div class="block-main-content-item">
            <a class="link-image" href="<?php echo $pro->link; ?>">
            
            	<?php $filename = modNewFemaleHelper::getImageDefault($pro->id);?>
				<?php if($filename && file_exists('images/products/thumbs/'.$filename)){
					$image = JURI::base().'images/products/thumbs/'. $filename;
				}else{
					$image = JURI::base().'components/com_products/images/noimage.jpg';
				}
				?>
            	<img src="<?php echo $image?>" alt="<?php echo $pro->name?>" width="119" height="181"/>
            	
            </a>
            <p><?php echo $pro->name;?><span><?php echo number_format($pro->saleprice);?> <?php echo $pro->currency?></span></p>
        </div>
	<?php } ?>
</div>		


