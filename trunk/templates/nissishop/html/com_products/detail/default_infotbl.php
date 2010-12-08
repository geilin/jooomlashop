<?php 
/**
* @version		1.0  - 	Joomla 1.5.x
* @package		Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    tpl detail.
*/

defined( '_JEXEC' ) or die( 'Restricted access' ); 
/*jQuery(function(){
		jQuery('div.tabs a.tltip').hover(
				function(){
						var aoffset     = jQuery(this).offset();
						var twarpoffset = jQuery('.tip_warp').offset();
						var topoffset   = aoffset.top - twarpoffset.top + 15;
						jQuery('#'+jQuery(this).attr('rel')).fadeIn('fast').css('top',topoffset+'px');
				}
				,function(){
					    jQuery('#'+jQuery(this).attr('rel')).fadeOut('slow');
				}
		);
});*/ 
?>
<script type="text/javascript">
jQuery(function(){jQuery('a.tltip').hover(function(){var aoffset=jQuery(this).offset();var twarpoffset=jQuery('.tip_warp').offset();var topoffset=aoffset.top-twarpoffset.top+15;jQuery('#'+jQuery(this).attr('rel')).fadeIn('fast').css('top',topoffset+'px');},function(){jQuery('#'+jQuery(this).attr('rel')).fadeOut('slow');});});
</script>
<div style="padding:0 1px; position: relative; " class="tip_warp">
<table class="pro_tbl" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
	<tr>
		<td colspan="2" class="pro_row_title">
			Thông Tin Chung
		</td>
	</tr>
	<?php 
	// MANG 2G
	if ($this->profeature->Mang2G) {
		$Mang2G =  findBr($this->profeature->Mang2G);
		if (isset($Mang2G[0]) && isset($Mang2G[1]) && $Mang2G[1] != '' ) { 
	?>
	<tr>
		<td rowspan="2" valign="top" >
			Mạng 2G 
			<a rel= "tips1" style="cursor:pointer" class="tltip"><img src= "<?php echo  JURI::base(); ?>components/com_products/images/icon-help.jpg" align= "texttop" border= "0" /></a>
			<div id="tips1" class="tipstyle" >
				<p>2G (Second-Generation wireless telephone technology) là công nghệ truyền thông thế hệ thứ hai. Đặc điểm khác biệt nổi bật giữa mạng điện thoại thế hệ đầu tiên (1G) và mạng 2G là sự chuyển đổi từ điện thoại dùng tín hiệu tương tự sang tín hiệu số.</p>
				<p>Tùy theo kỹ thuật đa truy cập, mạng 2G có thể phân ra 2 loại: mạng 2G dựa trên nền TDMA và mạng 2G dựa trên nền CDMA. Có thể kể đến các mạng 2G sau:</p>
				<ul>
				<li>+ Đầu tiên là sự ra đời của mạng D-AMPS (hay IS-136) dùng TDMA phổ biến ở Mỹ.</li>
				<li>+ Mạng cdmaOne (hay IS-95) dùng CDMA phổ biến ở châu Mỹ và một phần của châu Á.</li>
				<li>+ Mạng GSM dùng TDMA ra đời đầu tiên ở Châu Âu và hiện được sử dụng khắp thế giới.</li>
				<li>+ Mạng PDC dùng TDMA chỉ được triển khai ở Nhật từ năm 1993.</li>
				</ul>
				<div class="h_10"></div>
			</div>
		</td>
		<td>
			<?php echo  $Mang2G[0]; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo  $Mang2G[1]; ?>
		</td>
	</tr>	
	<?php } else { ?>
		<tr>
		<td width="110px">
			Mạng 2G
			<a rel= "tips2" style="cursor:pointer" class="tltip"><img src= "<?php echo  JURI::base(); ?>components/com_products/images/icon-help.jpg" align= "texttop" border= "0" /></a>
			<div id="tips2" class="tipstyle" >
				<p>2G (Second-Generation wireless telephone technology) là công nghệ truyền thông thế hệ thứ hai. Đặc điểm khác biệt nổi bật giữa mạng điện thoại thế hệ đầu tiên (1G) và mạng 2G là sự chuyển đổi từ điện thoại dùng tín hiệu tương tự sang tín hiệu số.</p>
				<p>Tùy theo kỹ thuật đa truy cập, mạng 2G có thể phân ra 2 loại: mạng 2G dựa trên nền TDMA và mạng 2G dựa trên nền CDMA. Có thể kể đến các mạng 2G sau:</p>
				<ul style="padding:0; margin:0;">
				<li>+ Đầu tiên là sự ra đời của mạng D-AMPS (hay IS-136) dùng TDMA phổ biến ở Mỹ.</li>
				<li>+ Mạng cdmaOne (hay IS-95) dùng CDMA phổ biến ở châu Mỹ và một phần của châu Á.</li>
				<li>+ Mạng GSM dùng TDMA ra đời đầu tiên ở Châu Âu và hiện được sử dụng khắp thế giới.</li>
				<li>+ Mạng PDC dùng TDMA chỉ được triển khai ở Nhật từ năm 1993.</li>
				</ul><div class="h_10"></div>
			</div>
		</td>
		<td>
			<?php echo  $Mang2G[0]; ?>
		</td>
	</tr>
	<?php } 
	}
	// END MANG 2G ?>
	<?php 
	// MANG 3G
	if ($this->profeature->Mang3G) {
		$Mang3G =  findBr($this->profeature->Mang3G);
		if (isset($Mang3G[0]) && isset($Mang3G[1]) && $Mang3G[1] != '' ) { 
	?>
	<tr>
		<td rowspan="2" valign="top">
			Mạng 3G
			<a rel= "tips3" style="cursor:pointer" class="tltip"><img src= "<?php echo  JURI::base(); ?>components/com_products/images/icon-help.jpg" align= "texttop" border= "0" /></a>
			<div id="tips3" class="tipstyle" >
				<p>3G (Third-Generation wireless telephone technology) là công nghệ truyền thông thế hệ thứ ba, cho phép truyền cả dữ liệu thoại và dữ liệu ngoài thoại (tải dữ liệu, gửi email, tin nhắn nhanh, hình ảnh...).</p>
				<p>Trong số các dịch vụ của 3G, điện thoại video thường được miêu tả như là lá cờ đầu (ứng dụng hủy diệt). Giá tần số cho công nghệ 3G rất đắt tại nhiều nước, nơi mà các cuộc bán đầu giá tần số mang lại hàng tỷ euro cho các chính phủ. Bởi vì chi phí cho bản quyền về các tần số phải trang trải trong nhiều năm trước khi các thu nhập từ mạng 3G đem lại, nên một khối lượng đầu tư khổng lồ là cần thiết để xây dựng mạng 3G. Nhiều nhà cung cấp dịch vụ viễn thông đã rơi vào khó khăn về tài chính và điều này đã làm chậm trễ việc triển khai mạng 3G tại nhiều nước ngoại trừ Nhật Bản và Hàn Quốc, nơi yêu cầu về bản quyền tần số được bỏ qua do phát triển hạ tâng cơ sở IT quốc gia được đặt ưu tiên cao.</p>				
			</div>
		</td>
		<td>
			<?php echo  $Mang3G[0]; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo  $Mang3G[1]; ?>
		</td>
	</tr>	
	<?php } else { ?>
		<tr>
		<td >
			Mạng 3G
			<a rel= "tips4" style="cursor:pointer" class="tltip"><img src= "<?php echo  JURI::base(); ?>components/com_products/images/icon-help.jpg" align= "texttop" border= "0" /></a>
			<div id="tips4" class="tipstyle" >
				<p>3G (Third-Generation wireless telephone technology) là công nghệ truyền thông thế hệ thứ ba, cho phép truyền cả dữ liệu thoại và dữ liệu ngoài thoại (tải dữ liệu, gửi email, tin nhắn nhanh, hình ảnh...).</p>
				<p>Trong số các dịch vụ của 3G, điện thoại video thường được miêu tả như là lá cờ đầu (ứng dụng hủy diệt). Giá tần số cho công nghệ 3G rất đắt tại nhiều nước, nơi mà các cuộc bán đầu giá tần số mang lại hàng tỷ euro cho các chính phủ. Bởi vì chi phí cho bản quyền về các tần số phải trang trải trong nhiều năm trước khi các thu nhập từ mạng 3G đem lại, nên một khối lượng đầu tư khổng lồ là cần thiết để xây dựng mạng 3G. Nhiều nhà cung cấp dịch vụ viễn thông đã rơi vào khó khăn về tài chính và điều này đã làm chậm trễ việc triển khai mạng 3G tại nhiều nước ngoại trừ Nhật Bản và Hàn Quốc, nơi yêu cầu về bản quyền tần số được bỏ qua do phát triển hạ tâng cơ sở IT quốc gia được đặt ưu tiên cao.</p>				
			</div>
		</td>
		<td>
			<?php echo  $Mang3G[0]; ?>
		</td>
	</tr>
	<?php } 
	}
	// END MANG 3G ?>
	<?php 
	// CDMA
	if ($this->profeature->CDMA) {
		$CDMA =  findBr($this->profeature->CDMA);
		if (isset($CDMA[0]) && isset($CDMA[1]) && $CDMA[1] != '' ) { 
	?>
	<tr>
		<td rowspan="2" valign="top">
			Mạng CDMA
			<a rel= "tips5" style="cursor:pointer" class="tltip"><img src= "<?php echo  JURI::base(); ?>components/com_products/images/icon-help.jpg" align= "texttop" border= "0" /></a>
			<div id="tips5" class="tipstyle">
				<p>CDMA (Code Division Multiple Access) nghĩa là Đa truy nhập (đa người dùng) phân chia theo mã. GSM phân phối tần số thành những kênh nhỏ, rồi chia xẻ thời gian các kênh ấy cho người sử dụng. Trong khi đó thuê bao của mạng di động CDMA chia sẻ cùng một giải tần chung. Mọi khách hàng có thể nói đồng thời và tín hiệu được phát đi trên cùng 1 giải tần. Các kênh thuê bao được tách biệt bằng cách sử dụng mã ngẫu nhiên. Các tín hiệu của nhiều thuê bao khác nhau sẽ được mã hoá bằng các mã ngẫu nhiên khác nhau, sau đó được trộn lẫn và phát đi trên cùng một giải tần chung và chỉ được phục hồi duy nhất ở thiết bị thuê bao (máy điện thoại di động) với mã ngẫu nhiên tương ứng. Áp dụng lý thuyết truyền thông trải phổ, CDMA đưa ra hàng loạt các ưu điểm mà nhiều công nghệ khác chưa thể đạt được.</p>
				<p>Ở nước ta các mạng di động sử dụng CDMA (EVN Telecom, HT Mobile, S-Fone)</p>				
			</div>
		</td>
		<td>
			<?php echo  $CDMA[0]; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo  $CDMA[1]; ?>
		</td>
	</tr>	
	<?php } else { ?>
		<tr>
		<td >
			Mạng CDMA
			<a rel= "tips6" style="cursor:pointer" class="tltip"><img src= "<?php echo  JURI::base(); ?>components/com_products/images/icon-help.jpg" align= "texttop" border= "0" /></a>
			<div id="tips6" class="tipstyle" >
				<p>CDMA (Code Division Multiple Access) nghĩa là Đa truy nhập (đa người dùng) phân chia theo mã. GSM phân phối tần số thành những kênh nhỏ, rồi chia xẻ thời gian các kênh ấy cho người sử dụng. Trong khi đó thuê bao của mạng di động CDMA chia sẻ cùng một giải tần chung. Mọi khách hàng có thể nói đồng thời và tín hiệu được phát đi trên cùng 1 giải tần. Các kênh thuê bao được tách biệt bằng cách sử dụng mã ngẫu nhiên. Các tín hiệu của nhiều thuê bao khác nhau sẽ được mã hoá bằng các mã ngẫu nhiên khác nhau, sau đó được trộn lẫn và phát đi trên cùng một giải tần chung và chỉ được phục hồi duy nhất ở thiết bị thuê bao (máy điện thoại di động) với mã ngẫu nhiên tương ứng. Áp dụng lý thuyết truyền thông trải phổ, CDMA đưa ra hàng loạt các ưu điểm mà nhiều công nghệ khác chưa thể đạt được.</p>
				<p>Ở nước ta các mạng di động sử dụng CDMA (EVN Telecom, HT Mobile, S-Fone)</p>				
			</div>
		</td>
		<td>
			<?php echo  $CDMA[0]; ?>
		</td>
	</tr>
	<?php } 
	}
	// END MANG 3G ?>
	<?php if ($this->profeature->RaMat) { ?>
	<tr>
		<td>
			Ra mắt
		</td>
		<td>
			<?php echo  $this->profeature->RaMat; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if ($this->profeature->KichThuoc || $this->profeature->TrongLuong) { ?>
	<tr>
		<td colspan="2" class="pro_row_title">
			Kích Thước và Trọng Lượng
		</td>
	</tr>
	<?php if ($this->profeature->KichThuoc) { ?>
	<tr>
		<td>
			Kích thước
		</td>
		<td>
			<?php echo  $this->profeature->KichThuoc; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if ($this->profeature->TrongLuong) { ?>
	<tr>
		<td>
			Trọng lượng
		</td>
		<td>
			<?php echo  $this->profeature->TrongLuong; ?>
		</td>
	</tr>
	<?php } ?>
	<?php } ?>
	<?php if ($this->profeature->KichThuoc || $this->profeature->TrongLuong) { ?>
	<tr>
		<td colspan="2" class="pro_row_title">
			Hiển Thị
		</td>
	</tr>
	<?php if ($this->profeature->Loai) { ?>
	<tr>
		<td>
			Loại
		</td>
		<td>
			<?php echo  $this->profeature->Loai; ?>
		</td>
	</tr>
	<?php } ?>
	<?php 
	// Kich thuoc HT
	if ($this->profeature->KichThuocHT) {
		$KichThuocHT =  findBr($this->profeature->KichThuocHT);
		if (isset($KichThuocHT[0]) && isset($KichThuocHT[1]) && $KichThuocHT[1] != '' ) { 
	?>
	<tr>
		<td rowspan="2" valign="top">
			Kích Thước
		</td>
		<td>
			<?php echo  $KichThuocHT[0]; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo  $KichThuocHT[1]; ?>
		</td>
	</tr>	
	<?php } else { ?>
		<tr>
		<td >
			Kích thước
		</td>
		<td>
			<?php echo  $KichThuocHT[0]; ?>
		</td>
	</tr>
	<?php }
	// Kich thuoc HT
	}
	 ?>
	<?php } ?>
	<tr>
		<td colspan="2" class="pro_row_title">
			Âm Thanh
		</td>
	</tr>
	<?php if ($this->profeature->KieuChuong) { ?>
	<tr>
		<td>
			Kiểu chuông
		</td>
		<td>
			<?php echo  $this->profeature->KieuChuong; ?>
		</td>
	</tr>
	<?php } ?>
	<?php 
	// Dong Loa Ngoai
	if ($this->profeature->LoaNgoai) {
		$loangoai =  findBr($this->profeature->LoaNgoai);
		if (isset($loangoai[0]) && isset($loangoai[1]) && $loangoai[1] != '' ) { 
	?>
	<tr>
		<td rowspan="2" valign="top">
			Loa ngoài
		</td>
		<td>
			<?php echo  $loangoai[0]; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo  $loangoai[1]; ?>
		</td>
	</tr>	
	<?php } else { ?>
		<tr>
		<td >
			Loa ngoài
		</td>
		<td>
			<?php echo  $loangoai[0]; ?>
		</td>
	</tr>
	<?php }
	// END: Dong Loa Ngoai
	}
	 ?>
	 <tr>
		<td colspan="2" class="pro_row_title">
			Bộ Nhớ
		</td>
	</tr>
	<?php if ($this->profeature->DanhBa) { ?>
	 <tr>
		<td valign="top">
			Danh bạ
			<a rel= "tips7" style="cursor:pointer" class="tltip"><img src= "<?php echo  JURI::base(); ?>components/com_products/images/icon-help.jpg" align= "texttop" border= "0" /></a>
			<div id="tips7" class="tipstyle" >
				<p>Số lượng các mục để lưu thông tin cần thiết (họ, tên, số điện thoại, số fax, địa chỉ Email, ...) về những đối tượng cần liên lạc vào bộ nhớ điện thoại. Một số sản phẩm điện thoại di động chỉ cho phép lưu danh bạ trên SIM.</p>				
			</div>
		</td>
		<td>
			<?php echo  $this->profeature->DanhBa; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if ($this->profeature->SoDaGoi) { ?>
	<tr>
		<td valign="top">
			Các số đã gọi
		</td>
		<td>
			<?php echo  $this->profeature->SoDaGoi; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if ($this->profeature->BoNhoTrong) { ?>
	<tr>
		<td valign="top">
			Bộ nhớ trong
			<a rel= "tips8" style="cursor:pointer" class="tltip"><img src= "<?php echo  JURI::base(); ?>components/com_products/images/icon-help.jpg" align= "texttop" border= "0" /></a>
			<div id="tips8" class="tipstyle" >
				<p>Bộ nhớ do nhà sản xuất tích hợp sẵn trong máy. Với bộ nhớ này, cho phép người dùng có thể lưu trữ danh bạ, tin nhắn, ... Ngoài ra, người dùng có thể tải thêm hình ảnh, nhạc chuông, trò chơi, ... vào bộ nhớ có sẵn này.</p>				
			</div>
		</td>
		<td>
			<?php echo  $this->profeature->BoNhoTrong; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if ($this->profeature->KheCamTheNho) { ?>
	<tr>
		<td valign="top">
			Khe cắm thẻ nhớ
		</td>
		<td>
			<?php echo  $this->profeature->KheCamTheNho; ?>
		</td>
	</tr>
	<?php } ?>
	 <tr>
		<td colspan="2" class="pro_row_title">
			Truyền Dữ Liệu
		</td>
	</tr>
	<?php if ($this->profeature->GPRS) { ?>
	 <tr>
		<td valign="top">
			GPRS
			<a rel= "tips9" style="cursor:pointer" class="tltip"><img src= "<?php echo  JURI::base(); ?>components/com_products/images/icon-help.jpg" align= "texttop" border= "0" /></a>
			<div id="tips9" class="tipstyle" >
				<p>GPRS (General Packet Radio Service) - Dịch vụ vô tuyến gói tổng hợp, là một dịch vụ dữ liệu di động dạng gói dành cho những người dùng Hệ thống thông tin di động toàn cầu (GSM) và điện thoại di động IS-136. Nó cung cấp dữ liệu ở tốc độ từ 56 đến 114 kbps.</p>
				<p>GPRS có thể được dùng cho những dịch vụ như truy cập Giao thức Ứng dụng Không dây (WAP), Dịch vụ tin nhắn ngắn (SMS), Dịch vụ nhắn tin đa phương tiện (MMS), và với các dịch vụ liên lạc Internet như email và truy cập World Wide Web. Dữ liệu được truyền trên GPRS thường được tính theo từng megabyte đi qua, trong khi dữ liệu liên lạc thông qua chuyển mạch truyền thống được tính theo từng phút kết nối, bất kể người dùng có thực sự đang sử dụng dung lượng hay đang trong tình trạng chờ. GPRS là một dịch vụ chuyển mạch gói nỗ lực tối đa, trái với chuyển mạch, trong đó một mức Chất lượng dịch vụ (QoS) được bảo đảm trong suốt quá trình kết nối đối với người dùng cố định.</p>				
			</div>
		</td>
		<td>
			<?php echo  $this->profeature->GPRS; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if ($this->profeature->EDGE) { ?>
	<tr>
		<td valign="top">
			EDGE
			<a rel= "tips10" style="cursor:pointer" class="tltip"><img src= "<?php echo  JURI::base(); ?>components/com_products/images/icon-help.jpg" align= "texttop" border= "0" /></a>
			<div id="tips10" class="tipstyle" >
				<p>Tốc độ dữ liệu nâng cao cho sự phát triển GSM hay toàn cầu là một chuẩn đã được công nhận của 3G sử dụng băng tần GSM hiện có và hỗ trợ tốc độ truyền tải dữ liệu lên tới 384kbit/s (trung bình từ 40 đến 60kbit/s cho một khe thời gian). EDGE có thể dễ dàng thích ứng với hệ thống GSM. Bản chất đó chỉ sự nâng cấp phần mềm của hệ thống trạm vô tuyến GSM.</p>				
			</div>
		</td>
		<td>
			<?php echo  $this->profeature->EDGE; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if ($this->profeature->Truyen3G) { ?>
	<tr>
		<td valign="top">
			3G
		</td>
		<td>
			<?php echo  $this->profeature->Truyen3G; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if ($this->profeature->WLAN) { ?>
	<tr>
		<td valign="top">
			WLAN
			<a rel= "tips11" style="cursor:pointer" class="tltip"><img src= "<?php echo  JURI::base(); ?>components/com_products/images/icon-help.jpg" align= "texttop" border= "0" /></a>
			<div id="tips11" class="tipstyle" >
				<p>WLAN (Wireless Local Area Network) hay mạng LAN không dây là một mạng không dây cục bộ rất được ưu chuộng bởi cung cấp khả năng truyền tải dữ liệu có tốc độ cao, với khoảng cách xa mà không phải lo lắng về dây dẫn, cáp... Các sản phẩm WLAN nổi tiếng hiện nay lại phù hợp với chuẩn 802.11 “Wi-Fi”. Đó là sự vượt trội của công nghệ không dây so với công nghệ có dây.</p>				
			</div>
		</td>
		<td>
			<?php echo  $this->profeature->WLAN; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if ($this->profeature->Bluetooth) { ?>
	<tr>
		<td valign="top">
			Bluetooth
			<a rel= "tips12" style="cursor:pointer" class="tltip"><img src= "<?php echo  JURI::base(); ?>components/com_products/images/icon-help.jpg" align= "texttop" border= "0" /></a>
			<div id="tips12" class="tipstyle" >
				<p>Là một đặc tả công nghiệp cho truyền thông không dây tầm gần giữa các thiết bị điện tử. Công nghệ này hỗ trợ việc truyền dữ liệu qua các khoảng cách ngắn giữa các thiết bị di động và cố định, tạo nên các mạng cá nhân không dây (wireless personal area network).</p>
				<p>Bluetooth có thể đạt được tốc độ truyền dữ liệu 1Mb/s. Bluetooth hỗ trợ tốc độ truyền tải dữ liệu lên tới 720 Kbps trong phạm vi 10 m–100 m. Khác với kết nối hồng ngoại (IrDA), kết nối Bluetooth là vô hướng và sử dụng giải tần 2,4 GHz.</p>
				<p>Bluetooth cho phép kết nối và trao đổi thông tin giữa các thiết bị như điện thoại di động, điện thoại cố định, máy tính xách tay, PC, máy in, thiết bị định vị dùng GPS, máy ảnh số, và video game console.</p>
				<p>Các ứng dụng nổi bật của Bluetooth gồm:</p>
				<ul>
				<li>+ Điều khiển và giao tiếp không giây giữa một điện thoại di động và tai nghe không dây.</li>
				<li>+ Mạng không dây giữa các máy tính cá nhân trong một không gian hẹp đòi hỏi ít băng thông.</li>
				<li>+ Giao tiếp không dây với các thiết bị vào ra của máy tính, chẳng hạn như chuột, bàn phím và máy in.</li>
				<li>+ Truyền dữ liệu giữa các thiết bị dùng giao thức OBEX.</li>
				
				<li>+ Thay thế các giao tiếp nối tiếp dùng dây truyền thống giữa các thiết bị đo, thiết bị định vị dùng GPS, thiết bị y tế, máy quét mã vạch, và các thiết bị điều khiển giao thông.</li>
				<li>+ Thay thế các điều khiển dùng tia hồng ngoại.</li>
				<li>+ Gửi các mẩu quảng cáo nhỏ từ các pa-nô quảng cáo tới các thiết bị dùng Bluetooth khác.</li>
				<li>+ Điều khiển từ xa cho các thiết bị trò chơi điện tử như Wii - Máy chơi trò chơi điện tử thế hệ 7 của Nintendo[1] và PlayStation 3 của Sony.</li>
				<li>+ Kết nối Internet cho PC hoặc PDA bằng cách dùng điện thoại di động thay modem.</li>
				</ul><div class="h_10"></div>
			</div>
		</td>
		<td>
			<?php echo  $this->profeature->Bluetooth; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if ($this->profeature->USB) { ?>
	<tr>
		<td valign="top">
			USB
			<a rel= "tips13" style="cursor:pointer" class="tltip"><img src= "<?php echo  JURI::base(); ?>components/com_products/images/icon-help.jpg" align= "texttop" border= "0" /></a>
			<div id="tips13" class="tipstyle" >
				<p>Chuẩn USB phiên bản 2.0 được đưa ra vào tháng tư năm 2000 và xem như bản nâng cấp của USB 1.1.</p>
				<p>USB 2.0 (USB với loại tốc độ cao) mở rộng băng thông cho ứng dụng đa truyền thông và truyền với tốc độ nhanh hơn 40 lần so với USB 1.1. Để có sự chuyển tiếp các thiết bị mới và cũ, USB 2.0 có đầy đủ khả năng tương thích ngược với những thiết bị USB trước đó và cũng hoạt động tốt với những sợi cáp, đầu cắm dành cho cổng USB trước đó.</p>
				<p>Hỗ trợ ba chế độ tốc độ (1,5 Mbps; 12 Mbps và 480 Mbps), USB 2.0 hỗ trợ những thiết bị chỉ cần băng thông thấp như bàn phím và chuột, cũng như thiết bị cần băng thông lớn như Webcam, máy quét, máy in, máy quay và những hệ thống lưu trữ lớn. Sự phát triển của chuẩn USB 2.0 đã cho phép những nhà phát triển phần cứng phát triển các thiết bị giao tiếp nhanh hơn, thay thế các chuẩn giao tiếp song song và tuần tự cổ điển trong công nghệ máy tính. USB 2.0 và các phiên bản kế tiếp của nó trong tương lai sẽ giúp các máy tính có thể đồng thời làm việc với nhiều thiết bị ngoại vi hơn.</p>
				<p>Hiện nay, nhiều máy tính cùng tồn tại song song hai chuẩn USB 1.1 và 2.0, người sử dụng nên xác định rõ các cổng 2.0 để sử dụng hiệu quả. Thông thường hệ điều hành Windows có thể cảnh báo nếu một thiết bị hỗ trợ chuẩn USB 2.0 được cắm vào cổng USB 1.1.</p>				
			</div>
		</td>
		<td>
			<?php echo  $this->profeature->USB; ?>
		</td>
	</tr>
	<?php } ?>
	<tr>
		<td colspan="2" class="pro_row_title">
			Chụp Ảnh
		</td>
	</tr>
	<?php if ($this->profeature->CameraChinh) { ?>
	<tr>
		<td valign="top">
			Camrera chính
			<a rel= "tips14" style="cursor:pointer" class="tltip"><img src= "<?php echo  JURI::base(); ?>components/com_products/images/icon-help.jpg" align= "texttop" border= "0" /></a>
			<div id="tips14" class="tipstyle" >
				<p>Một tính năng phụ ngày càng quan trọng đối với những sản phẩm điện thoại di động. Tính năng này cho phép người dùng có thể chụp hình hay quay một đoạn video clip bằng máy ảnh tích hợp sẵn trên điện thoại của họ. Một đặc tính quan trọng của máy ảnh là độ phân giải. Độ phân giải máy ảnh càng cao, hình ảnh càng sắc nét.</p>				
			</div>
		</td>
		<td>
			<?php echo  $this->profeature->CameraChinh; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if ($this->profeature->ddCamera) { ?>
	<tr>
		<td valign="top">
			Đặc điểm
		</td>
		<td>
			<?php echo  $this->profeature->ddCamera; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if ($this->profeature->CameraPhu) { ?>
	<tr>
		<td>
			Camera phụ
		</td>
		<td>
			<?php echo  $this->profeature->CameraPhu; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if ($this->profeature->QuayPhim) { ?>
	<tr>
		<td>
			Quay phim
			<a rel= "tips15" style="cursor:pointer" class="tltip"><img src= "<?php echo  JURI::base(); ?>components/com_products/images/icon-help.jpg" align= "texttop" border= "0" /></a>
			<div id="tips15" class="tipstyle" >
				<p>Các model điên thoại BlackBerry đa số đều có tính năng quay phim. Một số model có thể không hỗ trợ nhưng khi cập nhật hệ điều hành mới (up ROM, up firmware) thì vẫn có thể quay phim được.</p>				
			</div>
		</td>
		<td>
			<?php echo  $this->profeature->QuayPhim; ?>
		</td>
	</tr>
	<?php } ?>
	<tr>
		<td colspan="2" class="pro_row_title">
			Đặc Điểm
		</td>
	</tr>
	<?php if ($this->profeature->HeDieuHanh) { ?>
	<tr>
		<td>
			Hệ điều hành
			<a rel= "tips16" style="cursor:pointer" class="tltip"><img src= "<?php echo  JURI::base(); ?>components/com_products/images/icon-help.jpg" align= "texttop" border= "0" /></a>
			<div id="tips16" class="tipstyle" >
				<p>Một máy tính hoặc thiết bị cầm tay về bản chất thì chỉ là một khối kim loại với các dây dẫn và silicon. Hệ điều hành biết cách nói chuyện với các phần cứng này và có thể quản lý các chức năng của máy tính như phân bổ bộ nhớ, lập thời khóa biểu cho các tiến trình, truy cập dữ liệu, và cung cấp một giao diện tương tác với người dùng.</p>
				<p>Không có hệ điều hành, các nhà phát triển phần mềm phải viết các chương trình truy cập trực tiếp vào phần cứng (giống như phát minh lại bánh xe) trên mỗi chương trình. Với hệ điều hành, các nhà phát triển phần mềm có thể viết sẵn một tập hợp các giao diện lập trình phổ biến và sau đó giao cho hệ điều hành công việc nói chuyện với phần cứng. Như thế, việc lập trình sẽ được dễ dàng hơn rất nhiều. Hệ điều hành cho các thiết bị cầm tay phổ biến là Palm OS, Windows Mobile, Symbian, Linux, ... và hệ điều hành dành cho BlackBerry là BlackBerry OS.</p>				
			</div>
		</td>
		<td>
			<?php echo  $this->profeature->HeDieuHanh; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if ($this->profeature->BoXuLy) { ?>
	<tr>
		<td>
			Bộ xử lý
			<a rel= "tips17" style="cursor:pointer" class="tltip"><img src= "<?php echo  JURI::base(); ?>components/com_products/images/icon-help.jpg" align= "texttop" border= "0" /></a>
			<div id="tips17" class="tipstyle" >
				<p>Bộ xử lý hay còn gọi là CPU (Central Processing Unit) – đơn vị xử lý trung tâm. Là bộ phận tính toán và điều khiển họat động chính của điện thoại. Nhiệm vụ chính của bộ xử lý là xử lý chương trình và dữ kiện. Bộ xử lý là một mạch xử lý dữ liệu theo chương trình được thiết lập trước. Thông số của bộ xử lý càng cao thì tốc độ hoạt động của các chương trình trong điện thoại càng nhanh.</p>				
			</div>
		</td>
		<td>
			<?php echo  $this->profeature->BoXuLy; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if ($this->profeature->TinNhan) { ?>
	<tr>
		<td>
			Tin nhắn
			<a rel= "tips18" style="cursor:pointer" class="tltip"><img src= "<?php echo  JURI::base(); ?>components/com_products/images/icon-help.jpg" align= "texttop" border= "0" /></a>
			<div id="tips18" class="tipstyle" >
				<p>Một tính năng quan trọng của điện thoại di động. Loại tin nhắn trên điện thoại di động ngày nay bao gồm: SMS, EMS, MMS, Email, Fax, Instant Messaging. Một số loại tin nhắn chỉ sử dụng được khi cần có sự hỗ trợ của nhà cung cấp mạng.</p>				
			</div>
		</td>
		<td>
			<?php echo  $this->profeature->TinNhan; ?>
		</td>
	</tr>
	<?php } ?>
	
	<?php if ($this->profeature->TrinhDuyet) { ?>
	<tr>
		<td>
			Trình duyệt
			<a rel= "tips19" style="cursor:pointer" class="tltip"><img src= "<?php echo  JURI::base(); ?>components/com_products/images/icon-help.jpg" align= "texttop" border= "0" /></a>
			<div id="tips19" class="tipstyle" >
				<p>Là một giao diện của mạng World Wide Web, nó diễn dịch các liên kết siêu văn bản, cho phép bạn xem các trang web và di chuyển từ trang này tới trang kia. Mozilla, Opera, Microsoft là các công ty viết các trình duyệt Web thông dụng nhất. Các trình duyệt web trên thiết bị cầm tay thường thấy là Pocket Internet Explorer cho Pocket PC và Blazer cho Palm.</p>				
			</div>
		</td>
		<td>
			<?php echo  $this->profeature->TrinhDuyet; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if ($this->profeature->Radio) { ?>
	<tr>
		<td>
			Radio
		</td>
		<td>
			<?php echo  $this->profeature->Radio; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if ($this->profeature->TroChoi) { ?>
	<tr>
		<td>
			Trò chơi
		</td>
		<td>
			<?php echo  $this->profeature->TroChoi; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if ($this->profeature->MauSac) { ?>
	<tr>
		<td>
			Màu sắc
		</td>
		<td>
			<?php echo  $this->profeature->MauSac; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if ($this->profeature->NgonNgu) { ?>
	<tr>
		<td>
			Ngôn ngữ
		</td>
		<td>
			<?php echo  $this->profeature->NgonNgu; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if ($this->profeature->GPS) { ?>
	<tr>
		<td>
			GPS
			<a rel= "tips20" style="cursor:pointer" class="tltip"><img src= "<?php echo  JURI::base(); ?>components/com_products/images/icon-help.jpg" align= "texttop" border= "0" /></a>
			<div id="tips20" class="tipstyle" >
				<p>GPS (Global Positioning System) - hệ thống định vị toàn cầu, là hệ thống xác định vị trí dựa trên vị trí của các vệ tinh nhân tạo. Trong cùng một thời điểm, ở một vị trí trên mặt đất nếu xác định được khoảng cách đến ba vệ tinh (tối thiểu) thì sẽ tính được tọa độ của vị trí đó.</p>
				<p>GPS được thiết kế và bảo quản bởi Bộ Quốc phòng Hoa Kỳ, nhưng chính phủ Hoa Kỳ cho phép mọi người trên thế giới sử dụng nó miễn phí, bất kể quốc tịch.</p>
				<p>Các nước trong Liên minh châu Âu đang xây dựng Hệ thống định vị Galileo, có tính năng giống như GPS của Hoa Kỳ, dự tính sẽ bắt đầu hoạt động năm 2011-12.</p>				
			</div>
		</td>
		<td>
			<?php echo  $this->profeature->GPS; ?>
		</td>
	</tr>
	<?php } ?>
	<?php 
	// Java
	if ($this->profeature->Java) {
		$java =  findBr($this->profeature->Java);
		if (isset($java[0]) && isset($java[1]) && $java[1] != '' ) { 
	?>
	<tr>
		<td rowspan="2" valign="top">
			Java
			<a rel= "tips21" style="cursor:pointer" class="tltip"><img src= "<?php echo  JURI::base(); ?>components/com_products/images/icon-help.jpg" align= "texttop" border= "0" /></a>
			<div id="tips21" class="tipstyle" >
				<p>Một số sản phẩm điện thoại di động ngày nay có hỗ trợ Java cho phép người dùng có thể cài đặt thêm những trò chơi hoặc ứng dụng được phát triển trên nền tảng Java. Java là một ngôn ngữ lập trình hiện đại ngày càng phổ biến trên điện thoại di động với nhiều phiên bản khác nhau.</p>				
			</div>
		</td>
		<td>
			<?php echo  $java[0]; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo  $java[1]; ?>
		</td>
	</tr>	
	<?php } else { ?>
		<tr>
		<td >
			Java
			<a rel= "tips22" style="cursor:pointer" class="tltip"><img src= "<?php echo  JURI::base(); ?>components/com_products/images/icon-help.jpg" align= "texttop" border= "0" /></a>
			<div id="tips22" class="tipstyle" >
				<p>Một số sản phẩm điện thoại di động ngày nay có hỗ trợ Java cho phép người dùng có thể cài đặt thêm những trò chơi hoặc ứng dụng được phát triển trên nền tảng Java. Java là một ngôn ngữ lập trình hiện đại ngày càng phổ biến trên điện thoại di động với nhiều phiên bản khác nhau.</p>				
			</div>
		</td>
		<td>
			<?php echo  $java[0]; ?>
		</td>
	</tr>
	<?php }
	// END: Java
	}
	 ?>
	<tr>
		<td colspan="2" class="pro_row_title">
			Pin
		</td>
	</tr>
	
	 <tr>
	  <?php if ($this->profeature->PinChuan) { ?>
	<tr>
		<td>
			Pin chuẩn
		</td>
		<td>
			<?php echo  $this->profeature->PinChuan; ?>
		</td>
	</tr>
	<?php  } ?>
	<?php if ($this->profeature->Cho) { ?>
	<tr>
	<tr>
		<td>
			Chờ
		</td>
		<td>
			<?php echo  $this->profeature->Cho; ?>
		</td>
	</tr>
	<?php  } ?>
	<?php if ($this->profeature->DamThoai) { ?>
	<tr>
		<td>
			Đàm thoại
		</td>
		<td>
			<?php echo  $this->profeature->DamThoai; ?>
		</td>
	</tr>
	<?php  } ?>
</table>
</div>
<?php
	function findBr($string_input) {
		$row = array();
			preg_match_all ("/<p[^>]*>(.*)<\/p>/", $string_input, $ct);
	    	$content = (count($ct)) ? $ct : array();
	    	$row     = $content[1];
				
		return $row;
	} 
?>