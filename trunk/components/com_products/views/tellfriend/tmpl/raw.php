<?php 
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    tpl raw cart.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
?>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<script type="text/javascript" src="<?php echo JURI::base(); ?>templates/wp_hangdientu/js/checkform.js"></script>
		<script type="text/javascript" src="<?php echo JURI::base(); ?>components/com_products/js/vietuni.js"></script>
		<style>
		label {
			display: block;
		}
		</style>


  </head>
  <body>
	<form method="post" action="index.php" onsubmit="return checkTellAFriend(this);">
   
   <div id="container">
   <table cellspacing="2" cellpadding="0" width="100%">
	<tr>
		<td width="120px"><label for="tell_name">Tên người gởi</label></td>
		<td><input type="text" name="tell_name" onkeyup="javascript:initTyper(this);" id="tell_name" /></td>
	</tr>
	<tr>
		<td><label for="tell_email">Email người gởi</label></td>
		<td><input type="text" name="tell_email" id="tell_email" onkeyup="javascript:initTyper(this);" /></td>
	</tr>
	<tr>
		<td><label for="tell_emailfriend">Email người nhận</label></td>
		<td><input type="text" name="tell_emailfriend" id="tell_emailfriend" onkeyup="javascript:initTyper(this);" /></td>
	</tr>
	<tr>
		<td valign="top"><label for="tell_content">Nội dung</label>
		</td>
		<td><textarea style="width:240px" rows="5" cols="30" name="tell_content" id="tell_content" onkeyup="javascript:initTyper(this);"></textarea></td>
	</tr>
	<tr>
		<td style=" padding-bottom:5px;"></td>
		<td align="right" style=" padding-bottom:5px;">
		Kiểu gõ:
			<input type="radio" checked="" value="0" onfocus="setTypingMode(0);" name="optInput"/>
			Off
			<input type="radio" onfocus="setTypingMode(1);" value="1" name="optInput"/>
			Telex
			<input type="radio" value="2" onfocus="setTypingMode(2);" name="optInput"/>
			VNI
			<input type="radio" onfocus="setTypingMode(3);" value="3" name="optInput"/>
			VIQR   
		</td>
	</tr>
	
   </table>
   <div style="border-top:1px solid #ccc;">
   <table cellspacing="0" cellpadding="0" width="100%">
	<tr>
		<td valign="middle" align="left" style=" padding:8px 0;">
			www.bbsaigon.com
		</td>
		<td style=" padding-top:5px;" valign="middle" align="right">
			<input type="hidden" name="option" id="option" value="com_products" />
			<input type="hidden" name="task" id="task" value="send" />
			<input type="submit" name="submit" class="bt_guidi" id="submit" value="" />&nbsp;
			<input type="button" class="bt_huybo" id="button" value="" onclick="this.form.reset();" />
		</td>
	</tr>
	</table>
	</div>
	</div>
	</form>
  </body>
</html>

