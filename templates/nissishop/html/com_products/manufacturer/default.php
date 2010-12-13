<?php
defined( '_JEXEC' ) or die( 'Restricted access' ); 
$catid = JRequest::getInt('catid',0);


//echo "<pre>";
//print_r();
//echo "</pre>";


?>
<!-- component_header -->
<div id="component_header">
    <div class="component_title">   
    
    <h2>
    <?php
    if($this->listProduct[0]->manufacture){
    	echo $this->listProduct[0]->manufacture;
    }else if((int)$this->mid <1 || !$this->listProduct[0]->manufacture){
    	$msg = 'Không tìm thấy sản phẩm';
		$controller = new JController;
		$controller->setRedirect('index.php',$msg);
		$controller->redirect();
    }
    ?>
    </h2>
    </div>
</div>
<!-- /component_header -->
<!-- component_content -->
<div id="component_content" class="clearfix">
<p class="category_meta">Có tất cả <b><?php echo $this->total; ?></b> sản phẩm</p>    
    
<?php if ($this->listProduct) { ?>

	<?php 
	$count_total = count($this->listProduct);
	$count_row = ceil(count($this->listProduct)/3);
	$j = 0;	
	foreach ($this->listProduct as $i => $product) { ?>	
        <div class="product_item">
			<div class="product_thumb">
				<div class="product_thumb_wrapper">
				<a href="<?php echo $product->link; ?>" class="link_image"><span>&nbsp;</span>					
						<?php
                            $filename = ProductViewManufacturer::checkImage($product->id);
                            //$filename = modNewProductsHelper::getImageDefault($list->id);
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
	<p class="clear"></p>
		

<!-- END: BORDER WARPER -->

<?php	echo $this->pagination->getPagesLinks();  ?>

<?php } ?>
</div><!-- /component_content -->
<div id="component_footer"><span></span></div>