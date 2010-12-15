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
<link type="text/css" media="screen" rel="stylesheet" href="<?php echo JURI::root();?>/templates/nissishop/css/colorbox.css" />
<script src="<?php echo JURI::root();?>/templates/nissishop/js/jquery.colorbox.js" type="text/javascript"></script>
<script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery("a[rel='product_image']").colorbox();
				
			});
</script>
<style type="text/css">
#component_content_wrapper {
	padding: 10px;
}

#product_main_image { float:left; margin-right: 10px; }

#product_main_image img { padding:5px; }

#product_images { margin-top: 10px; }
#product_images #product_images_wrapper {
	border-top: 1px dashed #cdcdcd;
	border-bottom: 1px dashed #cdcdcd;
	margin:5px 0 10px;
	padding:10px 0;
}

#product_images #product_images_wrapper img { padding:5px; border:1px solid #acacac; margin:0 5px; }
.product_meta_data { line-height: 35px; float: left; width:470px; }
.product_meta_data li { border-bottom: 1px dashed #acacac; }
.product_meta_data li span.product_meta_lable { font-weight:bold; display:inline-block; width:150px}
span.product_price { color: red; font-weight: bold;}
</style>
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
    <?php if ($this->imgDefault->filename && file_exists('images/products/thumbs/'.$this->imgDefault->filename)): ?>        
            <img src="<?php echo JURI::base(); ?>images/products/thumbs/<?php echo $this->imgDefault->filename; ?>" alt="<?php echo $this->product->name; ?>"  align="left" />  
    <?php else: ?>
        <img src='<?php echo JURI::base(); ?>components/com_products/images/noimage.jpg' alt="<?php echo $this->product->name; ?>" align="left" />
    <?php endif; ?>
	</div><!-- /product_main_image -->
	<ul class="product_meta_data">
		<li><span class="product_meta_lable">Tên sản phẩm:</span> <?php echo $this->product->name; ?></li>
		<li><span class="product_meta_lable">Sản xuất bởi:</span> <a href="<?php echo JRoute::_('index.php?option=com_products&view=manufacturer&mid='.$this->product->manufacturerid);?>"><?php echo $this->product->manufacture; ?></a></li>
		<li><span class="product_meta_lable">Giá bán lẻ:</span> <span class="product_price"><?php echo number_format($this->product->saleprice).' '.$this->product->currency; ?></span></li>
		<li><span class="product_meta_lable">Giá khuyến mãi:</span> <?php echo number_format($this->product->saleprice).' '.$this->product->currency; ?></li>
		<li><span class="product_meta_lable">Lượt xem:</span> <?php echo $this->product->hits; ?> lần <span class="small_text">(kể từ ngày <?php $date = new DateTime($this->product->date); echo $date->format('d/m/Y'); ?>)</span></li>
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