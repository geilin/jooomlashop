<?php 
/**
* @version		1.0  - 	Joomla 1.5.x
* @package		Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    tpl category.
*/

defined( '_JEXEC' ) or die( 'Restricted access' ); 

?>

<div id="wp_pathway">
	<table cellspacing="0" cellpadding="0" width="100%">
		<tr>
			<td width="50%">
				<span class="blue_bold">
				<?php
						if (!empty($this->catName)){
							echo $this->catName;
						} 	
				?>
				</span>	
			</td>
			<td align="right" width="34%"><span>&nbsp;</span></td>
			<td  valign="top" width="16%" >
				<a class="buzz" title="Lưu vào Google Bookmark" href="//www.addthis.com/bookmark.php?pub=berrysg&v=250&source=tbx-250&tt=0&s=google&url=<?php echo 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>&title=<?php echo $this->catName;?>&content=&lng=vi"></a>
				<a class="myspace" title="Chia sẻ mục này qua MySpace" href="//www.addthis.com/bookmark.php?pub=berrysg&v=250&source=tbx-250&tt=0&s=myspace&url=<?php echo 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>&title=<?php echo $this->catName;?>&content=&lng=vi"></a>
				<a class="twitter" title="Chia sẻ mục này qua Twitter" href="//www.addthis.com/bookmark.php?pub=chuongvm&v=250&source=tbx-250&tt=0&s=twitter&url=<?php echo 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>&title=<?php echo $this->catName;?>&content=&lng=en"></a>
				<a class="faceb" title="Chia sẻ mục này qua Facebook" href="http://www.facebook.com/share.php?u=<?php echo 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>" ></a>
				<div class="cb"></div>
			</td>
		</tr>
	</table>
</div>
<div id="tool_pro_cat">
	<table width="100%" cellspacing="0"> 
		<tr>
			<td class="cell">Có tất cả <b><?php echo $this->total; ?></b> sản phẩm</td>
			<td align="right" class="cell c_right"></td>
		</tr>
	</table>
</div>

<!-- Manufacturer -->
<div id="manufacturers_pro_cat" align="center">
	<?php 
		if (!empty($this->manufacturers)) {
			$count = count($this->manufacturers);
			$i = 0;
			foreach ($this->manufacturers as $result){
				$i++;
				if ( JRequest::getVar('mid','') != $result->id ) {
					echo '<a href="'.$result->link.'" class="gray_bold" ><strong>'. $result->name .'</strong></a>';
				} else {
					echo '<span class="blue_bold" ><strong>'. $result->name .'</strong></span>';
				}
				if ($i == $count) {
					echo ' ';
				} else {
					echo ' | ';
				}			
			}
		}
	?>
</div>
<?php if (!empty($this->listAccessory)) { ?>
<div id="list_thumb_pro_cat">
	<div id="list_pro_cat_2">
		<div id="list_pro_cat_tbborder">
		<div id="list_pro_cat_tbborder_b">
		<div id="list_pro_cat_border">
			
	<?php 
	$count_total = count($this->listAccessory);
	$count_row = ceil(count($this->listAccessory)/3);
	$j = 0;	
	
	foreach ($this->listAccessory as $i => $list) { 
				// DIEU KIEN 
		$a = $i +1;
		if ( $i%3 == 0 ) { $j++; }
		if ( $i < 3 ) {
			if ($count_total <= 3 ) {
				$class = ' first_r_div_left';
				if ($i == 2) {
					$class = '';
				}
				$class_warp = 'last_br'; // De ve ra boder ben left
			} else {
				switch ($i%3){
					case 0:				
						$class = ' first_div_left';
						$class_warp = 'left_br'; // De ve ra boder ben left
						break;
					case 1:
						$class = ' first_div_left';
						$class_warp = 'center_br'; // De ve ra boder ben left
						break;
					case 2:
						$class = '';
						$class_warp = 'right_br'; // De ve ra boder ben right
						break;
				}
			}
			
			$class_p = '';
		} elseif ($j == ($count_row)) {
			$class_p = 'class="padd_top"';
			switch ($i%3){
				case 0:				
					$class = ' last_div_left';
					$class_warp = 'last_br'; // De ve ra boder ben left
					break;
				case 1:
					$class = ' last_div_left';
					$class_warp = 'last_br'; // De ve ra boder ben left
					break;
				case 2:
					$class = '';
					$class_warp = 'last_br'; // De ve ra boder ben right
					break;
			}
	    } else {
			$class_p = 'class="padd_top"';
			switch ($i%3){
				case 0:				
					$class = ' div_left';
					$class_warp = 'left_br'; // De ve ra boder ben left
					break;
				case 1:
					$class = ' div_left';
					$class_warp = 'center_br'; // De ve ra boder ben left
					break;
				case 2:
					$class = '';
					$class_warp = 'right_br'; // De ve ra boder ben right
					break;
			}
		}
		// END DIEU KIEN
	?>
		<div class="<?php echo $class_warp; ?>">
		<div class="assor item_pro_cat<? if ($j == $count_row && $count_row > 3) echo '_last'; 
								   else if ($j == $count_row && $count_row <= 3) echo '_first'; ?>
				    <?php echo $class ?>">
			<p <?php echo $class_p; ?>><a href="<?php echo $list->link; ?>" >
				<img src="<?php echo JURI::base(); ?>images/accessories/<?php echo $list->thumbnail; ?>" border="0" alt="<?php echo $list->name; ?>" />
			</a></p>
			<h3><a href="<?php echo $list->link; ?>" >
				<?php echo $list->name; ?>
			</a></h3>
			<font style="font-size:12px;"><?php echo number_format($list->price)?> VNĐ</font> 

		</div>
		</div>
	<?php } ?>
	<p style="margin:0; padding:0; clear:both;"></p>
		
</div></div></div>
<div align="right"><?php echo $this->pagination->getPagesLinks(); ?></div>
</div></div>

		

<?php } ?>