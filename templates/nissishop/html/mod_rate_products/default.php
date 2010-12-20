<?php
defined('_JEXEC') or die('Restricted access');
global $option;
?>
<?php foreach ($catpro as $i => $product) { ?>
        <div class="product_item">        
        <div class="product_image">
            <!-- centering -->
            <div class="product_image_container">
                <a href="<?php echo $product->link;?>"><?php 
                        $filename 	= $product->filename;
                        $thumb_path = 'images/products/thumbs/'. $filename ;
                        $thumb_path = ($filename && file_exists($thumb_path))?
                        $thumb_path : 'components/com_products/images/noimage.jpg';
                        echo JHTML::_('image', $thumb_path, $product->name, array('class' => 'product_image_thumb')); 
                    ?>					
				</a>
            </div>
            <!-- /centering -->
        </div>
		<div class="product_item_info">
          <a href="<?php echo $product->link; ?>"><?php echo $product->name; ?></a>
          <span class="product_price">Giá: <?php echo number_format($product->saleprice, 0, '.', '.'); ?> <?php echo $product->currency; ?></span>          
		</div>
	</div>
<?php } ?>
<div class="clear"></div>

