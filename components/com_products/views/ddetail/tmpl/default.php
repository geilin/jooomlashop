<?php 
/**
* @version		1.0  - 	Joomla 1.5.x
* @package		Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    tpl download detail.
* 
*/

defined( '_JEXEC' ) or die( 'Restricted access' ); 

?>
<!-- javascript for tab -->
		<script type="text/javascript" charset="utf-8">
		jQuery(function () {
            var tabContainers = jQuery('div.tabs > div');
            tabContainers.hide().filter(':first').show();
            jQuery('div.tabs ul.tabNavigation span').click(function () {
                    tabContainers.hide();
                    tabContainers.filter($(this).attr('rel')).show();
                    jQuery('div.tabs ul.tabNavigation span').removeClass('selected');
                    jQuery(this).addClass('selected');
                    return false;
            }).filter(':first').click();
    });
				
        </script>
<div id="wp_pathway">
	<table cellspacing="0" cellpadding="0" width="100%">
		<tr>
			<td width="50%">
				<h1 class="product_title blue_bold"><?php echo $this->download->name; ?></h1>
			</td>
			<td align="right" width="34%"><span>&nbsp;</span></td>
			<td  valign="top" width="16%" >
				<a class="buzz" title="Lưu vào Google Bookmark" href="//www.addthis.com/bookmark.php?pub=berrysg&v=250&source=tbx-250&tt=0&s=google&url=<?php echo 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>&title=<?php echo $this->download->name; ?>&content=&lng=vi"></a>
				<a class="myspace" title="Chia sẻ mục này qua MySpace" href="//www.addthis.com/bookmark.php?pub=berrysg&v=250&source=tbx-250&tt=0&s=myspace&url=<?php echo 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>&title=<?php echo $this->download->name; ?>&content=&lng=vi"></a>
				<a class="twitter" title="Chia sẻ mục này qua Twitter" href="//www.addthis.com/bookmark.php?pub=chuongvm&v=250&source=tbx-250&tt=0&s=twitter&url=<?php echo 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>&title=<?php echo $this->download->name; ?>&content=&lng=en"></a>
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
				<td width="148">
					<label for="keyword">Từ khóa</label>
					<input type="text" value="<?php echo $this->list['keyword']; ?>" name="keyword" class="searchtext inputbox" id="keyword">
				</td>
				<td width="110">
					<label for="keyword">Danh mục</label>
					<?php echo $this->list['category']; ?>
				</td>
				<td valign="top" class="compare_search_proline">
					<label for="keyword">Loại điện thoại</label>
					<?php echo $this->list['group']; ?>
					<input id="search_d" border="0" align="absmiddle" type="image" name="image" src="<?php echo JURI::base(); ?>templates/bbsaigon/images/tk_bt.jpg">
				</td>
			</tr>
		</table>
	</div>
	</form>
</div></div>


<div id="pro_detail">
	<!-- thong tin san pham -->

	<div id="intro_pro_detail">
	<div class="intro_pro_detail_bot" style="padding-right:0; padding-left:0;" >
	<div id="list_pro_cat_tbborder">
	<div id="list_pro_cat_tbborder_b">
	<div class="intro_pro_detail_bd" >
	<!-- WARP SKIN -->
	<div class="download_info">
		<div class="pro_img">
			<div class="pro_img_wrap" align="center">
				<div style="height:5px"></div>
				<img src='<?php echo JURI::base(); ?>images/softwares/<?php echo $this->download->thumbnail; ?>' alt="<?php echo $this->download->name; ?>" width="165px"/>
			</div>
		</div>
		<div class="pro_desc">
			<div class="pro_desc_wrap">
				<div style="border-bottom:1px dotted #ccc;">
					<?php if ($this->download->description) {?>
					<div class="pro_info_list" >
						<?php echo $this->download->description; ?>
					</div>
					<?php } ?>
					<p>Dành cho: <?php echo $this->groupdownload; ?></p>
				</div>
				<div class="pro_list_tb">
					<table width="100%" cellpadding="0" cellspacing="0" border="0">
						<?php if (!empty($this->download->version)) {?>
						<tr>
							<td width="140" valign="top"><span class="fea_title">Phiên bản:</span></td>
							<td><?php echo $this->download->version; ?></td>
						</tr>
						<?php } ?>
						<?php if (!empty($this->download->manufacturer)) {?>
						<tr>
							<td width="140" valign="top"><span class="fea_title">Nhà sản xuất:</span></td>
							<td><?php echo $this->download->manufacturer; ?></td>
						</tr>
						<?php } ?>
						<?php if (!empty($this->download->update)) {?>
						<tr>
							<td width="140" valign="top"><span class="fea_title">Ngày cập nhật:</span></td>
							<td><span><?php $date = new DateTime($this->download->update); echo $date->format('d/m/Y'); ?></span></td>
						</tr>
						<?php } ?>						
						<tr>
							<td width="140" valign="top" ><span class="fea_title">Số lượt xem:</span></td>
							<td ><?php echo $this->download->hits; ?> lần <span class="small_text">(kể từ ngày <?php $date = new DateTime($this->download->date); echo $date->format('d/m/Y'); ?>)</span></td>
						</tr>
						<tr>
							<td  width="140" valign="top" class="last_r"><span class="fea_title">Số lượt tải về:</span></td>
							<td class="last_r" ><span><?php echo $this->download->download; ?></span> | <a href="<?php echo $this->download->link; ?>" class="blue">Tải về</a></td>
						</tr>
					</table>
				</div>
				
				<div class="h_5"></div>
			</div>
		</div>
		<div class="clearfix" style="marign:0; padding:0;"></div>
	</div>
	<!-- END : WARP SKIN -->
	</div></div> 	</div></div>
	</div>
<?php
	
if ((empty($this->download->content)) || (empty($this->download->image))){ ?>
<!-- bat dau cac thong tin trong tabs -->
    <div class="tabs" id="tabs">
        <ul class="tabNavigation" >
		<?php 
           	if (!empty($this->download->content))
				echo '<li><span rel="#first" class="tab thongtin_tab">Thông tin chi tiết</span></li>';
			if (!empty($this->download->picture))	
				echo '<li><span rel="#second" class="tab hinhanh_tab">Hình ảnh</span></li>';
           				
		?>
        </ul>
		<?php 	if (!empty($this->download->content)) { ?>
        <!-- FIRST TAB CT -->
	        <div id="first" class="tab_div" >
				<div class="tab_div_r" style="padding-bottom:1px">
					<div class="border_tab_div" style="padding:12px 11px 1px 11px">
				   <?php echo $this->download->content; ?>
				   </div>
				</div>
	        </div>
		<?php } ?>
		<?php 	if (!empty($this->download->picture)) { ?>
        <!-- END: FIRST TAB CT -->
        <div id="second" align="center" class="tab_div" >
		<div class="tab_div_r" style="padding-bottom:1px">
			<div class="border_tab_div" style="padding:12px 11px 1px 11px">
				<?php 
				echo $this->download->picture;
				?>
			</div>	
		</div>
        </div>
		<?php } ?>
    </div>
	<!-- ket thuc cac thong tin trong tabs -->
<?php } ?>	
</div>
