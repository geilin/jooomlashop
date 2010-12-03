<?php 
/**
* @version		1.0  - 	Joomla 1.5.x
* @package		Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    tpl download.
*/

defined( '_JEXEC' ) or die( 'Restricted access' ); 

?>

<div id="wp_pathway">
	<table cellspacing="0" cellpadding="0" width="100%">
		<tr>
			<td width="50%">
				<h1 class="title_of_page blue_bold" style="font-size:12px; margin:0;">
				Download 
				<?php
					if (!empty($this->catName)){
						echo $this->catName;
					} 
				?> cho BlackBerry
				</h1>	
			</td>
			<td align="right" width="34%"><span>&nbsp;</span></td>
			<td  valign="top" width="16%" >
				<a class="buzz" title="Lưu vào Google Bookmark" href="//www.addthis.com/bookmark.php?pub=berrysg&v=250&source=tbx-250&tt=0&s=google&url=<?php echo 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>&title=<?php echo $this->catName; ?>&content=&lng=vi"></a>
				<a class="myspace" title="Chia sẻ mục này qua MySpace" href="//www.addthis.com/bookmark.php?pub=berrysg&v=250&source=tbx-250&tt=0&s=myspace&url=<?php echo 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>&title=<?php echo $this->catName; ?>&content=&lng=vi"></a>
				<a class="twitter" title="Chia sẻ mục này qua Twitter" href="//www.addthis.com/bookmark.php?pub=chuongvm&v=250&source=tbx-250&tt=0&s=twitter&url=<?php echo 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>&title=<?php echo $this->catName; ?>&content=&lng=en"></a>
				<a class="faceb" href="http://www.facebook.com/share.php?u=<?php echo 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>" title="Chia sẻ mục này qua Facebook"></a>
				<div class="cb"></div>
			</td>
		</tr>
	</table>
</div>
<div class="compare_block">
	<div class="compare_warp">
	<form name="download" method="get" action = "<?php echo JURI::base(); ?>phanmem/">
	<div id="tool_pro_cat">
		<table width="100%" cellpadding="0" cellspacing="0"> 
			<tr>
				<td width="110" valign="top">
					<label for="category">Danh mục</label>
					<?php echo $this->list['category']; ?>
				</td>
 				<td width="110" valign="top">
					<label for="subcategory">Danh mục</label>
					<?php echo $this->list['subcategory']; ?>
				</td>
				<td class="compare_search_proline" valign="top">
					<label for="keyword">Loại điện thoại</label>
					<?php echo $this->list['group']; ?>
					<input id="search_d" border="0" align="absmiddle" type="image" name="image" src="<?php echo JURI::base(); ?>templates/bbsaigon/images/tk_bt.jpg" />	
				</td>
			</tr>
		</table>
	</div>
	</form>
</div></div>

<?php if (!empty($this->listDownload)) { ?>
<div id="list_thumb_pro_cat">
	<div id="list_pro_cat_2">
		<div id="list_pro_cat_tbborder">
		<div id="list_pro_cat_tbborder_b">
		<div id="list_pro_cat_border">
			<div class="compare_add_form_warp">
	<?php 
	$count_total = count($this->listDownload);
	foreach ($this->listDownload as $i => $list) { 
	?>
	<div class="item_down<? if (($i+1) == $count_total) echo '_last';  ?>">
		<div class="pic_download"><a href="<?php echo $list->link; ?>" >
				<img src="<?php echo JURI::base(); ?>images/softwares/<?php echo $list->thumbnail; ?>" border="0" alt="<?php echo $list->name; ?>"  />
		</a></div>
		<div class="info_download">
			<h3><a href="<?php echo $list->link; ?>" >
				<?php echo $list->name; ?>
			</a></h3>
			<?php if ($list->description) { ?>
				<div class="desc_down"><?php echo $list->description; ?></div>
			<?php } ?>
	
			<p <? if (($i+1) == $count_total) echo 'style="margin:5px 0 0 0;"';  ?>>
				<a href="<?php echo $list->downloadlink; ?>">Tải về |</a>
				<?php echo $list->download; ?> lượt tải về 
			</p>
		</div>
		<div class="cb"></div>	
	</div>
	<?php } ?>
	<p style="margin:0; padding:0; clear:both;"></p>
		</div>
</div></div></div>
<div align="right"><?php echo $this->pagination->getPagesLinks(); ?></div>
</div></div>
<?php } else { ?>
	<div id="list_thumb_pro_cat">
	<div id="list_pro_cat_2">
		<div id="list_pro_cat_tbborder">
		<div id="list_pro_cat_tbborder_b">
		<div id="list_pro_cat_border">
			<div class="msg_nophone">Không tìm thấy dữ liệu...</div>
</div></div></div>
</div></div>
<?php } ?>