<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package		Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    tpl search.
*/

defined( '_JEXEC' ) or die( 'Restricted access' ); 

?>
<h2 class="title_page_sub"><?php echo JText::_('Kết quả tìm kiếm');?></h2>
<div id="line_search">
<?php if (!empty($this->total) OR (empty($this->total) AND empty($this->totalAccessory) AND empty($this->listNews) )) { ?>
	<h2 class="search_tl">Có tất cả <b><?php echo $this->total; ?></b> sản phẩm với từ khóa <b>"<?php echo $this->keyword; ?>"</b></h2>
<?php } ?>
</div>

<div class="content">
<?php if ($this->listProduct) { ?>
<div id="list_thumb_pro_cat">
	<?php 
	$count_total = count($this->listProduct);
	$count_row = ceil(count($this->listProduct)/3);
	$j = 0;	
	foreach ($this->listProduct as $i => $product) { ?>
	
	
		<div class="block-main-content-item">
            <a class="link-image" href="<?php echo $product->link; ?>">
            
            	<?php $filename = ProductViewSearch::checkImage($product->id);?>
				<?php if($filename && file_exists('images/products/thumbs/'.$filename)){
					$image = JURI::base().'images/products/thumbs/'. $filename;
				}else{
					$image = JURI::base().'components/com_products/images/noimage.jpg';
				}
				?>
            	<img src="<?php echo $image?>" alt="<?php echo $product->name?>" width="119" height="181"/>
            	
            </a>
            <p><?php echo $product->name;?><span><?php echo number_format($product->saleprice);?> <?php echo $product->currency?></span></p>
        </div>
	
		
	<?php } ?>
	<p style="margin:0; padding:0; clear:both;"></p>
		

<!-- END: BORDER WARPER -->

<?php	echo $this->pagination->getPagesLinks();  ?>
</div>

<?php } ?>
</div>
