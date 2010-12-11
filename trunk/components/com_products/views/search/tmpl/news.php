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

<div id="wp_pathway">
	<table cellspacing="0" cellpadding="0" width="100%">
		<tr>
			<td width="50%">
				<span class="blue_bold">
				Tìm kiếm tin tức
				</span>	
			</td>
		<td align="right" width="34%"><span>&nbsp;</span></td>
			<td  valign="top" width="16%" >
				<a class="buzz" title="Lưu vào Google Bookmark" href="//www.addthis.com/bookmark.php?pub=berrysg&v=250&source=tbx-250&tt=0&s=google&url=<?php echo 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>&title=Tìm kiếm phụ kiện&content=&lng=vi"></a>
				<a class="myspace" title="Chia sẻ mục này qua MySpace" href="//www.addthis.com/bookmark.php?pub=berrysg&v=250&source=tbx-250&tt=0&s=myspace&url=<?php echo 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>&title=Tìm kiếm phụ kiện&content=&lng=vi"></a>
				<a class="twitter" title="Chia sẻ mục này qua Twitter" href="//www.addthis.com/bookmark.php?pub=chuongvm&v=250&source=tbx-250&tt=0&s=twitter&url=<?php echo 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>&title=Tìm kiếm phụ kiện&content=&lng=en"></a>
				<a class="faceb" href="http://www.facebook.com/share.php?u=<?php echo 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>" title="Chia sẻ mục này qua Facebook"></a>
				<div class="cb"></div>
			</td>
		</tr>
	</table>
</div>
<div id="line_search">
<?php if (!empty($this->listNews)) { ?>
<h2>Có tất cả <b><?php echo $this->totalNews; ?></b> tin tức với từ khóa <b>"<?php echo $this->keyword; ?>"</b></h2>
<?php } ?>
</div>

<?php 
	if (!empty($this->listNews)) { ?>
	<div id="list_thumb_pro_cat">
	<div id="list_pro_cat_2">
		<div id="list_pro_cat_tbborder">
		<div id="list_pro_cat_tbborder_b">
		<div id="list_pro_cat_border">	
		<div class="compare_add_form_warp">
<?php 	
	$count = count($this->listNews);
	foreach ($this->listNews as $i => $product) {
	
?>
	<div class="search_news <?php if (($i+1)==$count) { echo 'r_last '; } if ($i==0) { echo ' r_first'; } ?>">
		<strong><a class="blue" href="<?php echo $product->link; ?>"><?php echo $product->title; ?></a></strong>
		<p>
			<?php echo $product->introtext; ?>
		</p>
	</div>
<?php } } ?>
</div>
</div></div></div>
<?php	echo $this->pagNews->getPagesLinks(); ?>
</div></div>