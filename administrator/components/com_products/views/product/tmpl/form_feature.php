<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package		Component Administrator Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    view feature.
*/

defined( '_JEXEC' ) or die( 'Restricted access' ); 
		$editor =& JFactory::getEditor();
		JHTML::_('behavior.calendar');
?>

	<table class="admintable">
	<tr>
		<td width="100" align="right" class="key">
			Thông Tin Chung
		</td>
		<td class="key">			
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Mạng 2G:
		</td>
		<td>
			<?php echo $editor->display( 'Mang2G',  $this->product->Mang2G, '700', '150', '60', '20', array('pagebreak', 'readmore') ) ; ?>
			
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Mạng 3G:
		</td>
		<td>
			<?php echo $editor->display( 'Mang3G',  $this->product->Mang3G, '700', '150', '60', '20', array('pagebreak', 'readmore') ) ; ?>
			
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			CDMA:
		</td>
		<td>
			<?php echo $editor->display( 'CDMA',  $this->product->CDMA, '700', '150', '60', '20', array('pagebreak', 'readmore') ) ; ?>
			
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Ngày Ra Mắt:
		</td>
		<td>
			<input class="text_area" type="text" name="RaMat" id="RaMat" size="50" maxlength="250" value="<?php echo $this->product->RaMat;?>" /> 
			Tháng 4 năm 2010
		</td>
	</tr>
	<tr>
		<td width="100" class="key">
			Kích Thước			
		</td>
		<td class="key">			

		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Kích Thước:
		</td>
		<td>
			<input class="text_area" type="text" name="KichThuoc" id="KichThuoc" size="50" maxlength="250" value="<?php echo $this->product->KichThuoc;?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Trọng Lượng:
		</td>
		<td>
			<input class="text_area" type="text" name="TrongLuong" id="TrongLuong" size="50" maxlength="250" value="<?php echo $this->product->TrongLuong;?>" />
		</td>
	</tr>
	<tr>
		<td width="100" class="key">
			Hiển Thị			
		</td>
		<td class="key">			

		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Loại
		</td>
		<td>
			<input class="text_area" type="text" name="Loai" id="Loai" size="50" maxlength="250" value="<?php echo $this->product->Loai; ?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Kích Thước:
		</td>
		<td>
			<?php echo $editor->display( 'KichThuocHT',  $this->product->KichThuocHT, '700', '150', '60', '20', array('pagebreak', 'readmore') ) ; ?>
		</td>
	</tr>
	<tr>
		<td width="100" class="key">
			Âm Thanh			
		</td>
		<td class="key">			

		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Kiểu Chuông:
		</td>
		<td>
			<input class="text_area" type="text" name="KieuChuong" id="KieuChuong" size="50" maxlength="250" value="<?php echo $this->product->KieuChuong;?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Loa Ngoài:
		</td>
		<td>
			<?php echo $editor->display( 'LoaNgoai',  $this->product->LoaNgoai, '700', '150', '60', '20', array('pagebreak', 'readmore') ) ; ?>
		</td>
	</tr>
	
	<tr>
		<td width="100" align="right" class="key">
			Bộ Nhớ
		</td>
		<td class="key">			
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Danh Bạ:
		</td>
		<td>
			<input class="text_area" type="text" name="DanhBa" id="DanhBa" size="50" maxlength="250" value="<?php echo $this->product->DanhBa;?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Các Số Đã Gọi:
		</td>
		<td>
			<input class="text_area" type="text" name="SoDaGoi" id="SoDaGoi" size="50" maxlength="250" value="<?php echo $this->product->SoDaGoi;?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Bộ Nhớ Trong:
		</td>
		<td>
			<input class="text_area" type="text" name="BoNhoTrong" id="BoNhoTrong" size="50" maxlength="250" value="<?php echo $this->product->BoNhoTrong;?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Khe Cắm Thẻ Nhớ:
		</td>
		<td>
			<input class="text_area" type="text" name="KheCamTheNho" id="KheCamTheNho" size="50" maxlength="250" value="<?php echo $this->product->KheCamTheNho;?>" />
		</td>
	</tr>
	
	<tr>
		<td width="100" align="right" class="key">
			Truyền Dữ Liệu
		</td>
		<td class="key">			
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			GPRS:
		</td>
		<td>
			<input class="text_area" type="text" name="GPRS" id="GPRS" size="50" maxlength="250" value="<?php echo $this->product->GPRS;?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			EDGE:
		</td>
		<td>
			<input class="text_area" type="text" name="EDGE" id="EDGE" size="50" maxlength="250" value="<?php echo $this->product->EDGE;?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			3G:
		</td>
		<td>
			<input class="text_area" type="text" name="Truyen3G" id="Truyen3G" size="50" maxlength="250" value="<?php echo $this->product->Truyen3G;?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			WLAN:
		</td>
		<td>
			<input class="text_area" type="text" name="WLAN" id="WLAN" size="50" maxlength="250" value="<?php echo $this->product->WLAN;?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Bluetooth:
		</td>
		<td>
			<input class="text_area" type="text" name="Bluetooth" id="Bluetooth" size="50" maxlength="250" value="<?php echo $this->product->Bluetooth;?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			USB:
		</td>
		<td>
			<input class="text_area" type="text" name="USB" id="USB" size="50" maxlength="250" value="<?php echo $this->product->USB; ?>" />
		</td>
	</tr>
		
	<tr>
		<td width="100" align="right" class="key">
			Chụp Ảnh
		</td>
		<td class="key">			
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Camera Chính:
		</td>
		<td>
			<input class="text_area" type="text" name="CameraChinh" id="CameraChinh" size="50" maxlength="250" value="<?php echo $this->product->CameraChinh; ?>" />
			
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Đặc điểm (camera):
		</td>
		<td>
			<input class="text_area" type="text" name="ddCamera" id="ddCamera" size="50" maxlength="250" value="<?php echo $this->product->ddCamera; ?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Camera Phụ:
		</td>
		<td>
			<input class="text_area" type="text" name="CameraPhu" id="CameraPhu" size="50" maxlength="250" value="<?php echo $this->product->CameraPhu; ?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Quay Phim:
		</td>
		<td>
		<input class="text_area" type="text" name="QuayPhim" id="QuayPhim" size="50" maxlength="250" value="<?php echo $this->product->QuayPhim; ?>" />
		</td>
	</tr>
	
	<tr>
		<td width="100" align="right" class="key">
			Đặc Điểm
		</td>
		<td class="key">			
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Hệ Điều Hành:
		</td>
		<td>
			<input class="text_area" type="text" name="HeDieuHanh" id="HeDieuHanh" size="50" maxlength="250" value="<?php echo $this->product->HeDieuHanh;?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Bộ Xử Lý:
		</td>
		<td>
			<input class="text_area" type="text" name="BoXuLy" id="BoXuLy" size="50" maxlength="250" value="<?php echo $this->product->BoXuLy; ?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Tin Nhắn:
		</td>
		<td>
			<input class="text_area" type="text" name="TinNhan" id="TinNhan" size="50" maxlength="250" value="<?php echo $this->product->TinNhan;?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Trình Duyệt:
		</td>
		<td>
			<input class="text_area" type="text" name="TrinhDuyet" id="TrinhDuyet" size="50" maxlength="250" value="<?php echo $this->product->TrinhDuyet;?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Radio:
		</td>
		<td>
			<input class="text_area" type="text" name="Radio" id="Radio" size="50" maxlength="250" value="<?php echo $this->product->Radio;?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Trò Chơi:
		</td>
		<td>
			<input class="text_area" type="text" name="TroChoi" id="TroChoi" size="50" maxlength="250" value="<?php echo $this->product->TroChoi;?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Màu Sắc:
		</td>
		<td>
			<input class="text_area" type="text" name="MauSac" id="MauSac" size="50" maxlength="250" value="<?php echo $this->product->MauSac;?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Ngôn Ngữ:
		</td>
		<td>
			<input class="text_area" type="text" name="NgonNgu" id="NgonNgu" size="50" maxlength="250" value="<?php echo $this->product->NgonNgu;?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			GPS:
		</td>
		<td>
			<input class="text_area" type="text" name="GPS" id="GPS" size="50" maxlength="250" value="<?php echo $this->product->GPS;?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Java:
		</td>
		<td>
			<?php echo $editor->display( 'Java',  $this->product->Java, '700', '150', '60', '20', array('pagebreak', 'readmore') ) ; ?>
		</td>
	</tr>

	<tr>
		<td width="100" align="right" class="key">
			Pin
		</td>
		<td class="key">			
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Pin Chuẩn:
		</td>
		<td>
			<input class="text_area" type="text" name="PinChuan" id="PinChuan" size="50" maxlength="250" value="<?php echo $this->product->PinChuan; ?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Chờ:
		</td>
		<td>
			<input class="text_area" type="text" name="Cho" id="Cho" size="50" maxlength="250" value="<?php echo $this->product->Cho; ?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Đàm Thoại:
		</td>
		<td>
			<input class="text_area" type="text" name="DamThoai" id="DamThoai" size="50" maxlength="250" value="<?php echo $this->product->DamThoai; ?>" />
		</td>
	</tr>				

	</table>
