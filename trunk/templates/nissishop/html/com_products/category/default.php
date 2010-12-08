<?php
defined( '_JEXEC' ) or die( 'Restricted access' ); 
?>
<!-- component_header -->
<div id="component_header">
    <div class="component_title">       
    
    <h2>
    <?php
    if (empty($this->manufacturerName))
    {
        echo $this->catName;
    } else {
        echo '<a href="'.JRoute::_('index.php?option=' . $option . '&view=category&catid=' . $this->catid).'">'. $this->catName .'</a>';
    if (!empty($this->manufacturerName)) echo ' > '. $this->manufacturerName;
    }
    ?>
    </h2>
        </div>
</div>
<!-- /component_header -->
<!-- component_content -->
<div id="component_content" class="clearfix">   


    <p class="category_meta">Có tất cả <b><?php echo $this->total; ?></b> sản phẩm</p>
	


    <style type="text/css">
    .block-main-content-item {
        float: left; height: 250px; width: 180px;
        
    }
    .product_detail_wrapper {
        padding:10px;
    }
    </style>  
    
    
<?php if ($this->listProduct) { ?>

	<?php 
	$count_total = count($this->listProduct);
	$count_row = ceil(count($this->listProduct)/3);
	$j = 0;	
	foreach ($this->listProduct as $i => $list) { ?>	
		<div class="block-main-content-item">
            <div class="product_detail_wrapper">
            <a class="link-image" href="<?php echo $list->link; ?>">            
            	<?php $filename = ProductViewCategory::checkImage($list->id);?>
				<?php if($filename && file_exists('images/products/thumbs/'.$filename)){
					$image = JURI::base().'images/products/thumbs/'. $filename;
				}else{
					$image = JURI::base().'components/com_products/images/noimage.jpg';
				}
				?>
            	<img src="<?php echo $image?>" alt="<?php echo $list->name?>" width="119" height="181"/>            	
            </a>
            <p><a class="link-image" href="<?php echo $list->link; ?>"><span><?php echo $list->name;?></span></a></p>
            <p>Giá: <span><?php echo number_format($list->saleprice);?> <?php echo $list->currency?></span></p>
            </div>
        </div>		
	<?php } ?>
	<p style="margin:0; padding:0; clear:both;"></p>
		

<!-- END: BORDER WARPER -->

<?php	echo $this->pagination->getPagesLinks();  ?>

<?php } ?>

    
    

</div>
<!-- /component_content -->
<div id="component_footer"><span></span></div>