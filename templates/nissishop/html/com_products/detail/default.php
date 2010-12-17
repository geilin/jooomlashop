<?php
defined( '_JEXEC' ) or die( 'Restricted access' ); 
?>

<!-- component_header -->
<div id="component_header">
    <div class="component_title">       
		<h2 class="product_title"><?php echo $this->product->name; ?></h2>
    </div>
</div><!-- /component_header -->

<!-- component_content -->
<div id="component_content" class="clearfix">
	<!-- component_content_wrapper -->
	<div id="component_content_wrapper">
	
    <!-- product_main_image -->
	<div id="product_main_image">
    <?php if (isset($this->imgDefault->filename) && file_exists('images/products/thumbs/'.$this->imgDefault->filename)): ?>        
            <img src="<?php echo JURI::base(); ?>images/products/thumbs/<?php echo $this->imgDefault->filename; ?>" alt="<?php echo $this->product->name; ?>"  align="left" />  
    <?php else: ?>
        <img src='<?php echo JURI::base(); ?>components/com_products/images/noimage.jpg' alt="<?php echo $this->product->name; ?>" align="left" />
    <?php endif; ?>
	</div><!-- /product_main_image -->
	<ul class="product_meta_data">
		<li><span class="product_meta_lable">Tên sản phẩm:</span> <a href="<?php  echo $this->product->link; ?>"><?php echo $this->product->name; ?></a></li>
		<li><span class="product_meta_lable">Sản xuất bởi:</span> <a href="<?php echo JRoute::_('index.php?option=com_products&view=manufacturer&mid='.$this->product->manufacturerid);?>"><?php echo $this->product->manufacture; ?></a></li>
		<li><span class="product_meta_lable">Giá bán lẻ:</span> <span class="product_price"><?php echo number_format($this->product->saleprice).' '.$this->product->currency; ?></span></li>
		<li><span class="product_meta_lable">Giá khuyến mãi:</span> <?php echo number_format($this->product->discount_price).' '.$this->product->currency; ?></li>
		<li class="last"><span class="product_meta_lable">Lượt xem:</span> <?php echo $this->product->hits; ?> lần <span class="small_text">(kể từ ngày <?php $date = new DateTime($this->product->date); echo $date->format('d/m/Y'); ?>)</span></li>
	</ul>
	
	<div class="clear"></div>
	
	<!-- product_images -->	
	<div id="product_images">
		<h4>Hình ảnh</h4>
		<div id="product_images_wrapper" class="clearfix">
        <?php foreach($this->images as $img) : ?>      
        <a rel="product_image" class="zoom_pro_i <? echo $class; ?>" title="<?php echo $this->product->name; ?>" href="<?php echo JURI::base(); ?>images/products/<?php echo $img->filename ?>">		
			<img src="<?php echo JURI::base(); ?>images/products/thumbs/<?php echo $img->filename ?>" alt="<?php echo $this->product->name; ?>" align="left" />
		</a>   
        <?php endforeach; ?>
		</div>
	</div>
    <!-- /product_images -->
		<div class="clear"></div>
		<div class="pro_description">
		<h4>Thông tin chi tiết sản phẩm</h4>
		<?php echo $this->product->intro; ?>
		</div>	
	</div><!-- /component_content_wrapper -->
	
	<!-- relative_products -->	
	<?php echo $this->loadTemplate('relative'); ?>
	<!-- /relative_products -->
	<div class="clear"></div>
	
</div><!-- /component_content -->

<div id="component_footer"><span></span></div> 