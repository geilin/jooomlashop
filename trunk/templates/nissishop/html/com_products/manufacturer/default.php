<?php
defined( '_JEXEC' ) or die( 'Restricted access' ); 
$mid = JRequest::getInt('mid',0);

?>
<!-- component_header -->
<div id="component_header">
    <div class="component_title"><h2><?php echo $this->manufacture;?></h2></div>
</div>
<!-- /component_header -->
<!-- component_content -->
<div id="component_content" class="clearfix">
<p id="category_message_count">Có tất cả <b><?php echo $this->total; ?></b> sản phẩm sản xuất bởi 
<a href="<?php echo JRoute::_('index.php?option=com_products&view=manufacturer&mid='.$mid); ?>" title="<?php echo $this->manufacture;?>">
	<?php echo $this->manufacture;?>
</a></p>    
    
<?php if ($this->listProduct) { ?>

	<?php 
	$count_total = count($this->listProduct);
	$count_row = ceil(count($this->listProduct)/3);
	$j = 0;	
	foreach ($this->listProduct as $i => $product) { 
	
		$title = JFilterOutput::stringURLSafe($product->name);
		$title = str_replace(' ', '-', strtolower($title));
		$product_link = JRoute::_('index.php?option=com_products&view=detail&id=' . $product->id . ':'.$title);
		
	
	?>	        

	<div class="product_item">        
        <div class="product_image">
            <!-- centering -->
            <div class="product_image_container">
                <a href="<?php echo $product_link;?>"><?php
                            $filename = $product->filename;                            
							$thumb_path = 'images/products/thumbs/'. $filename ;
							$thumb_path = ($filename && file_exists($thumb_path))?
								$thumb_path :
								'components/com_products/images/noimage.jpg';
							echo JHTML::_('image', $thumb_path, $product->name, array('class' => 'product_image_thumb')); ?>					
				</a>
            </div>
            <!-- /centering -->
        </div>
		<div class="product_item_info">
          <a href="<?php echo $product_link; ?>"><?php echo $product->name; ?></a>
          <span class="product_price">Giá: <?php echo number_format($product->saleprice, 0, '.', '.'); ?> <?php echo $product->currency; ?></span>          
		</div>
	</div>
		
	<?php } ?>		
<div class="clear"></div>
<!-- END: BORDER WARPER -->

<?php	echo $this->pagination->getPagesLinks();  ?>

<?php } ?>
</div><!-- /component_content -->
<div id="component_footer"><span></span></div>