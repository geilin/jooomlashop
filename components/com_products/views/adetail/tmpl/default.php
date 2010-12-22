<?php 
defined( '_JEXEC' ) or die( 'Restricted access' ); 
$tmpl_path = JURI::base().'templates/bbsaigon/';
?>
<link type="text/css" media="screen" rel="stylesheet" href="<?php echo $tmpl_path; ?>js/zoombox/zoombox.css" />
<script src="<?php echo $tmpl_path; ?>js/jquery.zoombox-min.js" type="text/javascript"></script>
<!-- javascript for tab -->
		<script type="text/javascript" charset="utf-8">
			jQuery(function () {
					 var tabContainers = jQuery('div.tabs > div');
					 tabContainers.hide().filter(':first').show();
					 jQuery('div.tabs ul.tabNavigation span').click(function () {
							 tabContainers.hide();
							 tabContainers.filter(jQuery(this).attr('rel')).show();
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
				<h1 class="product_title blue_bold"><?php echo $this->accessory->name; ?></h1>
			</td>
			<td align="right" width="34%"><span>&nbsp;</span></td>
			<td  valign="top" width="16%" >
				<a class="buzz" title="Lưu vào Google Bookmark" href="//www.addthis.com/bookmark.php?pub=berrysg&v=250&source=tbx-250&tt=0&s=google&url=<?php echo 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>&title=<?php echo $this->accessory->name; ?>&content=&lng=vi"></a>
				<a class="myspace" title="Chia sẻ mục này qua MySpace" href="//www.addthis.com/bookmark.php?pub=berrysg&v=250&source=tbx-250&tt=0&s=myspace&url=<?php echo 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>&title=<?php echo $this->accessory->name; ?>&content=&lng=vi"></a>
				<a class="twitter" title="Chia sẻ mục này qua Twitter" href="//www.addthis.com/bookmark.php?pub=chuongvm&v=250&source=tbx-250&tt=0&s=twitter&url=<?php echo 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>&title=<?php echo $this->accessory->name; ?>&content=&lng=en"></a>
				<a class="faceb" href="http://www.facebook.com/share.php?u=<?php echo 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>" title="Chia sẻ mục này qua Facebook"></a>
				<div class="cb"></div>
			</td>
		</tr>
	</table>
</div>
<div id="pro_detail">
	<!-- thong tin san pham -->
	<div id="intro_pro_detail">
	<div class="intro_pro_detail_bot" style="padding-right:0; padding-left:0;" >
	<div class="intro_pro_detail_bd" >
		<div class="pro_img">
			<div class="pro_img_wrap" align="center">
			<?php if (!empty($this->images['img'][1])) {?>
				<a href="<?php echo JURI::base().$this->images['img'][1][0]; ?>" rel="product" class="zoom_pro_i" >
			<?php } ?>
				<img src='<?php echo JURI::base(); ?>images/accessories/<?php echo $this->accessory->thumbnail; ?>' alt="<?php echo $this->accessory->name; ?>" title="<?php echo $this->accessory->name; ?>" />
			<?php if (!empty($this->images['img'][1])) { ?>
				</a>
			<?php } ?>	
			<div class="h_5"></div>
			<p align="center" style="padding:0; margin:0; font-weight:bold;"><span class="price"><?php echo number_format($this->accessory->price);  ?> VNĐ</span></p>
			</div>
		</div>
		<div class="pro_desc">
			<div class="pro_desc_wrap">
				<div class="pro_info_list" style="border-bottom:1px dotted #ccc; padding:5px 0 0 0;">
					<?php echo $this->accessory->description; ?>
				</div>
				<div class="pro_list_tb">
					<table width="100%" cellpadding="0" cellspacing="0" border="0">
						<?php if (!empty($this->accessory->shortdesc)) {?>
						<tr>
							<td width="140" valign="top"><span class="fea_title">Mô tả sản phẩm:</span></td>
							<td><?php echo $this->accessory->shortdesc; ?></td>
						</tr>
						<?php } ?>
						<?php if (!empty($this->accessory->rating)) {?>
						<tr>
							<td width="140" valign="top"><span class="fea_title">Đánh giá hình thức:</span></td>
							<td><?php echo $this->accessory->rating; ?></td>
						</tr>
						<?php } ?>
						
						<?php if (!empty($this->accessory->warranty)) {?>
						<tr>
							<td width="140" valign="top"><span class="fea_title">Bảo hành:</span></td>
							<td><?php echo $this->accessory->warranty; ?></td>
						</tr>
						<?php } ?>
						<?php if (!empty($this->accessory->promotion)) {?>
						<tr>
							<td width="140" valign="top"><span class="fea_title">Khuyến mãi:</span></td>
							<td><?php echo $this->accessory->promotion; ?></td>
						</tr>
						<?php } ?>
						<?php if (!empty($this->accessory->status)) {?>
						<tr>
							<td width="140" valign="top"><span class="fea_title">Tình trạng:</span></td>
							<td><?php echo $this->accessory->status; ?></td>
						</tr>
						<?php } ?>
						<tr>
							<td  width="140" valign="top" class="last_r"><span class="fea_title">Số lượt xem:</span></td>
							<td  class="last_r"><?php echo $this->accessory->hits; ?> lần <span class="small_text">(kể từ ngày <?php $date = new DateTime($this->accessory->date); echo $date->format('d/m/Y'); ?>)</span></td>
						</tr>
					</table>
				</div>
				<div class="h_5"></div>
				
			</div>
		</div>
		<div class="clearfix" style="marign:0; padding:0;"></div>
	</div></div>
	</div>
<!-- PHU KIEN LIEN QUAN -->	
<?php echo $this->loadTemplate('phukien'); ?>
<!-- END: PHU KIEN LIEN QUAN -->	
<?php if ((empty($this->accessory->content)) || (!empty($this->images['img'][1]))) {	 ?>
<!-- bat dau cac thong tin trong tabs -->
    <div class="tabs" id="tabs">
        <ul class="tabNavigation" >
		<?php 
           	if (!empty($this->accessory->content))
				echo '<li><span rel="#first" class="tab thongtin_tab">Thông tin chi tiết</span></li>';
			if (!empty($this->images['img'][1])) 	
				echo '<li><span rel="#second" class="tab hinhanh_tab">Hình ảnh</span></li>';
			if (!empty($this->accessory->video))
				echo '<li><span rel="#six" class="tab hinhanh_tab">Video</span></li>';
           				
		?>
        </ul>
		<?php if (!empty($this->accessory->content)) { ?>
        <!-- FIRST TAB CT -->
	        <div id="first" class="tab_div">
				<div class="tab_div_r">
					<div class="border_tab_div">
				   <?php echo $this->accessory->content; ?>
				   </div>
				</div>
	        </div>
		<?php } ?>
		<?php if (!empty($this->images['img'][1])) { ?>
        <!-- END: FIRST TAB CT -->
        <div id="second" align="center" class="tab_div">
		<div class="tab_div_r">
			<div class="border_tab_div">
				<div class="imgtab">
				<?php 
					$HTML = $this->images;
					$icount = count($HTML['img'][1]);
					foreach ($HTML['img'][1] as $i => $imgsrc) {
						if ($i != 0 ) {
						?>
						<a href="<?php echo JURI::base().$imgsrc; ?>" rel="product" title="<?php echo $HTML['ct'][$i]; ?>">
						<?php } ?>
							<img src="<?php echo JURI::base().$imgsrc; ?>" alt="<?php if ($HTML['ct'][$i]) 
																							echo $HTML['ct'][$i];
																					  else echo 'blackberry' ?>" />
						<?php if ($i != 0 ) { ?>	
						</a>
						<?php } ?>
						<?php if ($HTML['ct'][$i]) { ?>
							<p class="small_gray"><?php echo $HTML['ct'][$i]; ?></p>
						<?php } ?>
							<?php if ($i +1 < $icount) { ?>
								<div class="h_12"></div>
							<?php } ?>
						<?php 
					}
				?>
				</div>
			</div>	
		</div>
        </div>
		<?php } ?>
		
    </div>
	<!-- ket thuc cac thong tin trong tabs -->
	<?php } ?>
</div>
