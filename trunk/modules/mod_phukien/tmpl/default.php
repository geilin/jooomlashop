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
<ul id="mycarousel-up">
   <?php foreach ($phukien as $i => $pro) { ?>
        <li>
            <a class="link-image" href="<?php echo $pro->link; ?>">

            	<?php $filename = modPhukienHelper::getImageDefault($pro->id);?>
				<?php if($filename && file_exists('images/products/thumbs/'.$filename)){
					$image = JURI::base().'images/products/thumbs/'. $filename;
				}else{
					$image = JURI::base().'components/com_products/images/noimage.jpg';
				}
				?>
            	<img src="<?php echo $image?>" alt="<?php echo $pro->name?>" width="119" height="181"/>

            </a>
        </li>
	<?php } ?>
</ul><!--End .block-content .sanphammoi-->


