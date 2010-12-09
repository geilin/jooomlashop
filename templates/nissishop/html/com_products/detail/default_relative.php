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

<style type="text/css">
    .block-main-content-item {
        float: left; height: 250px; width: 180px;
        
    }
    .product_detail_wrapper {
        text-align: center;
    }
    .product_thumb {
         width: 110px;
    padding:5px; border: 1px solid #acacac;
    }
    .pro_price { margin: 10px 0; color: red; font-weight: bold; border-top: 1px dashed #acacac}
	#relative_products h4 { margin-left:10px; }
	#relative_products_wrapper { 
	margin:10px; 
	border-top: 1px dashed #acacac; 
	border-bottom: 1px dashed #acacac;
	padding:10px 0 10px;
	}
</style> 

<div id="relative_products">
	<h4>Sản phẩm cùng loại</h4>
	<div id="relative_products_wrapper" class="clearfix">		
		<?php foreach($this->relative as $product): ?>	
			
			<div class="block-main-content-item">
				<div class="product_detail_wrapper">
				<?php 
				$title = JFilterOutput::stringURLSafe($product->name);
				$title = str_replace(' ', '-', strtolower($title));
				$product_link = JRoute::_('index.php?option=com_products&view=detail&id=' . $product->id . ':'.$title);
				?>
				<a class="link-image" href="<?php echo $product_link  ?>">            
					<?php 
						
						if($product->filename && file_exists('images/products/thumbs/'.$product->filename)){
							$image = JURI::base().'images/products/thumbs/'. $product->filename;
						}else{
							$image = JURI::base().'components/com_products/images/noimage.jpg';
						}
					?>
					<img src="<?php echo $image?>" alt="<?php echo $product->name?>" class="product_thumb" />            	
				</a>
				<p><a class="link-image" href="<?php echo $product_link; ?>"><span><?php echo $product->name;?></span></a></p>
				<p class="pro_price">Giá bán: <span><?php echo number_format($product->saleprice);?> <?php echo $product->currency?></span></p>
				</div>
			</div>
			<?php endforeach; ?>
	</div>
</div>