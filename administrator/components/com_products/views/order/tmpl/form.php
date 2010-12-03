<?php 
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Administrator Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    view category.
*/

defined( '_JEXEC' ) or die( 'Restricted access' ); 
global $option;
		JToolBarHelper::title( JText::_('Category'), 'generic.png');
		JToolBarHelper::save('save');
		JToolBarHelper::cancel();
?>
	<form action="index.php" method="post" name="adminForm" id="adminForm">
	<fieldset class="adminform">
	<legend>Add and Edit Category</legend>
	<table class="admintable">
	<tr>
		<td width="100" align="right" class="key">
		Tình trạng đơn hàng	
		</td>
		<td align="center">
			<table>
			   <tr>
			   <?php 
			   	echo $this->lists['status'];
			   ?>
			   </tr>
			</table>
		</td>
	</tr>	
	<tr>
		<td width="100" align="right" class="key">
			
		</td>
		<td align="center">
			<table width="700" border=1 cellspacing=0 cellpadding=0>
			 <tr>
			   <td colspan="2" align="center" valign="middle"><h2>QUẢN LÝ ĐƠN HÀNG</h2></td>
			 </tr>
			 <tr><td colspan="2" align="left" valign="middle"><h4>I. THÔNG TIN KHÁCH HÀNG</h4></td></tr>
			 <tr>
			   <td colspan = "2">
				   <p><span style="font-weight:bold;color:brown">Họ và tên: </span><span style="font-size:13px;"><?php echo $this->order->name?></span></p>
				   <p><span style="font-weight:bold;color:brown">Ngày đặt hàng: </span><span style="font-size:13px;"><?php echo date("d/m - Y", strtotime($this->order->date));?></span></p>
				   <p><span style="font-weight:bold;color:brown">Phone: </span><span style="font-size:13px;"><?php echo $this->order->phone?></span></p>
				   <p><span style="font-weight:bold;color:brown">Email: </span><span style="font-size:13px;"><?php echo $this->order->email?></span></p>
				   <p><span style="font-weight:bold;color:brown">Address: </span><span style="font-size:13px;"><?php echo $this->order->address?></span></p>
			   </td>
			 </tr>
			 <tr><td colspan="2" align="left" valign="middle"><h4>II. THÔNG TIN ĐẶT HÀNG</h4></td></tr>
			 <tr>
			   <td colspan="2"><?php echo $this->order->cartinfo?></td>
			 </tr>
		 
			</table>
		</td>
	</tr>
	</table>
	</fieldset>
		<input type="hidden" name="id" value="<?php echo $this->order->id?>" />
		<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" name="controller" value="order" />
		<input type="hidden" name="task" value="" />
	</form>