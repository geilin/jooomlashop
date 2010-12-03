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
/*jQuery(function () {
	jQuery('#imei').numeric();
	jQuery('#pin').alphanumeric();
	jQuery('#warranty_reset').css('cursor','default');
});
	function checkVarranty() {	

		var imei = jQuery('#imei').val();
		var pin = jQuery('#pin').val();
		if (imei != '' && imei != '') { 
			jQuery('.error').fadeOut('fast');
			jQuery('.border_top').show();
			jQuery('.loadding_fb').show();
			jQuery('#warranty').hide();
			jQuery('.error').hide();
			jQuery.ajax({
				type: "POST",
				contentType: "application/json; charset=utf-8",
				url: siteurl+"index.php?option=com_products&task=warranty&imei="+imei+"&pin="+pin,			
				dataType: "json",
				success: function(json){	
					if (json) {
						jQuery('#buyer').html(json.name);
						jQuery('#address').html(json.address);
						jQuery('#phone').html(json.phone);
						jQuery('#date').html(json.date);
						jQuery('#nameproduct').html(json.nameproduct);
						jQuery('#expired').html(json.expired);
						jQuery('.loadding_fb').fadeOut('fast');
						jQuery('#warranty').fadeIn('slow');
						
						
					} else {
						jQuery('.error').show();
						jQuery('#warranty').hide();
						jQuery('.loadding_fb').fadeOut('fast');
						jQuery('.error').fadeIn('fast');
					}
					resetClick();
				}
			});
		} else {
			alert('Bạn chưa nhập số IMEI hoặc số PIN');
		}
	}	
	function resetClick(){
		jQuery('#warranty_reset').css('cursor','pointer');
		jQuery('#warranty_reset').click(function() {
			jQuery('.border_top').fadeOut('slow');
			jQuery('#imei').val('');
			jQuery('#pin').val('');
			jQuery('#warranty_reset').css('cursor','default');
		});
	}*/
?>
<script language="javascript" type="text/javascript" src="<?php echo JURI::base(); ?>templates/bbsaigon/js/alphanumeric.pack.js"></script>
<script language="javascript" type="text/javascript">
jQuery(function(){jQuery('#imei').numeric();jQuery('#pin').alphanumeric();jQuery('#warranty_reset').css('cursor','default');});function checkVarranty(){var imei=jQuery('#imei').val();var pin=jQuery('#pin').val();if(imei!=''&&imei!=''){jQuery('.error').fadeOut('fast');jQuery('.border_top').show();jQuery('.loadding_fb').show();jQuery('#warranty').hide();jQuery('.error').hide();jQuery.ajax({type:"POST",contentType:"application/json; charset=utf-8",url:siteurl+"index.php?option=com_products&task=warranty&imei="+imei+"&pin="+pin,dataType:"json",success:function(json){if(json){jQuery('#buyer').html(json.name);jQuery('#address').html(json.address);jQuery('#phone').html(json.phone);jQuery('#date').html(json.date);jQuery('#nameproduct').html(json.nameproduct);jQuery('#expired').html(json.expired);jQuery('.loadding_fb').fadeOut('fast');jQuery('#warranty').fadeIn('slow');}else{jQuery('.error').show();jQuery('#warranty').hide();jQuery('.loadding_fb').fadeOut('fast');jQuery('.error').fadeIn('fast');}
resetClick();}});}else{alert('Bạn chưa nhập số IMEI hoặc số PIN.');}}
function resetClick(){jQuery('#warranty_reset').css('cursor','pointer');jQuery('#warranty_reset').click(function(){jQuery('.border_top').fadeOut('slow');jQuery('#imei').val('');jQuery('#pin').val('');jQuery('#warranty_reset').css('cursor','default');});}
</script>

<div id="wp_pathway">
	<table cellspacing="0" cellpadding="0" width="100%">
		<tr>
			<td width="50%">
				<h1 class="title_of_page blue_bold" style="font-size:12px; margin:0;">
				Bảo Hành
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
<!-- ARTICLE -->
<div class="article_wrap_l" id="ja-contentwrap">
<div class="article_wrap_r" id="ja-content">
<div class="clearfix article_border" id="ja-current-content">
	<div class="article-content">
	<?php 	
		echo $this->wa_art->introtext;
		echo $this->wa_art->fulltext;
	?>
</div></div></div></div>
<!-- END: ARTICLE -->
<div class="h_10"></div>
<div class="warranty_block">
	<div class="b_blue">Kiểm tra thông tin bảo hành</div>	
	<div class="h_5"></div>
	<!-- WARRANTY -->
	<div id="list_thumb_pro_cat">
	<div id="list_pro_cat_2">
	<div id="list_pro_cat_tbborder">
	<div id="list_pro_cat_tbborder_b">
	<div id="list_pro_cat_border">
		<!-- WARRANTY CT HERE-->
		<div class="warranty_form" id="warranty_focus">
			<img class="warranty_pic" src="<?php echo JURI::base(); ?>images/warranty_icon.jpg" alt="bảo hàng blackberry - bbsaigon.com"/>
			<div class="warranty_faq">
				Hãy nhập số IMEI và số PIN trên điện thoại của bạn vào ô bên dưới để kiểm tra thời hạn bảo hành (Chỉ áp dụng cho điện thoại mua tại  BlackBerry Sài Gòn).
				<div class="form_warranty" >
							<div class="form_warranty_warp">
							<table width="100%" cellspacing="0" cellpadding="0"> 
							<tr>
								<td width="205px">
								<label for="imei">Số IMEI:</label>&nbsp;
								<input type="text" value="" name="imei" id="imei" class="text_area" style="width:130px"/>
								&nbsp;	
								</td>
								<td width="150px">
								<label for="pin">Số PIN:</label>&nbsp;
								<input type="text" value="" name="pin" id="pin" class="text_area" style="width:80px"/>	
								&nbsp;					
								</td>
								<td>
									<a href="javascript:void(0);" id="warranty_bt" onclick="checkVarranty()">&nbsp;</a>
									<a href="javascript:void(0);" id="warranty_reset">&nbsp;</a>
								</td>
							</tr>
							</table>
							</div>
							<div class="border_top" >
								<div class="loadding_fb"><img src="<?php echo JURI::base(); ?>images/fb.gif" /></div>
								<div class="error">Số IMEI hoặc số PIN không đúng, vui lòng nhập lại.</div>
								<ul id="warranty">
									<li>Người mua: <span id="buyer"></span></li>
									<li>Địa chỉ: <span id="address"></span></li>
									<li>Số điện thoại: <span id="phone"></span></li>
									<li>Tên sản phẩm: <span id="nameproduct"></span></li>
									<li>Ngày mua: <span id="date"></span></li>
									<li>Ngày hết hạn bảo hành: <span id="expired"></span></li>
								</ul>
							</div>				   
				</div>
				
			</div>
			<div class="clearfix"></div>	
		</div>
		
		<!-- END: WARRANTY CT HERE-->
	</div></div></div></div></div>
	<!-- END: WARRANTY -->
</div>