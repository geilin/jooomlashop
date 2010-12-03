<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    tpl category.
*/

defined( '_JEXEC' ) or die( 'Restricted access' ); 



?>
<h2 class="title_page_sub">
    <?php
        if (empty($this->manufacturerName))
        {
            echo $this->catName;
        } else {
            echo '<a href="'.JRoute::_('index.php?option=' . $option .
            '&view=category&catid=' . $this->catid).'">'. $this->catName .'</a>';
        if (!empty($this->manufacturerName)) echo ' > '. $this->manufacturerName;
        }
    ?>
</h2>
<div id="tool_pro_cat">
	<table width="100%" cellspacing="0"> 
		<tr>
			<td class="cell ">Có tất cả <b><?php echo $this->total; ?></b> sản phẩm</td>
		</tr>
	</table>
	<?php if (!$this->listProduct) { ?>
		<div class="border_bot" style="height:2px;"></div>
	<?php }?>
</div>
<div class="content">
<?php if ($this->listProduct) { ?>
<div id="list_thumb_pro_cat">
	<?php 
	$count_total = count($this->listProduct);
	$count_row = ceil(count($this->listProduct)/3);
	$j = 0;	
	foreach ($this->listProduct as $i => $list) { ?>
	
	
		<div class="block-main-content-item">
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
            <p><?php echo $list->name;?><span><?php echo number_format($list->saleprice);?> <?php echo $list->currency?></span></p>
        </div>
	
		
	<?php } ?>
	<p style="margin:0; padding:0; clear:both;"></p>
		

<!-- END: BORDER WARPER -->

<?php	echo $this->pagination->getPagesLinks();  ?>
</div>

<?php } ?>
</div>
