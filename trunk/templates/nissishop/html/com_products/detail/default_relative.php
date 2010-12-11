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
?>

<div id="relative_products">
	<h4>Sản phẩm cùng loại</h4>
	<div id="relative_products_wrapper" class="clearfix">		
		<?php foreach($this->relative as $product): ?>		
			
        
			<?php 
				$title = JFilterOutput::stringURLSafe($product->name);
				$title = str_replace(' ', '-', strtolower($title));
				$product_link = JRoute::_('index.php?option=com_products&view=detail&id=' . $product->id . ':'.$title);


				
				$thumb_path = 'images/products/thumbs/'. $product->filename ;
				$thumb_path = ($product->filename && file_exists($thumb_path))?
					$thumb_path : 'components/com_products/images/noimage.jpg';
					
			?>
        
            <div class="product_item">
			<div class="product_thumb">
				<div class="product_thumb_wrapper">
				<a href="<?php echo $product_link ?>" class="link_image"><span>&nbsp;</span>					
                <?php 

                    
                    echo JHTML::_('image', $thumb_path, $product->name); 
                ?>					
				</a>
				</div>
			</div>
			<div class="product_item_info">
				<a href="<?php echo $product_link ?>"><?php echo $product->name; ?></a>
				<span class="pro_price">Giá bán: <?php echo number_format($product->saleprice, 0, '.', '.'); ?> <?php echo $product->currency; ?></span>
			</div>   
        </div> 
        
        
			<?php endforeach; ?>
	</div>
</div>