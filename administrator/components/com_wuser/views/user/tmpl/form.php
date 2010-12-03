<?php 
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Administrator Com WUser
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    view form user.
*/

defined( '_JEXEC' ) or die( 'Restricted access' ); 
global $option;
		JToolBarHelper::title( JText::_('User'), 'generic.png');
		JToolBarHelper::save();
		JToolBarHelper::apply();
		JToolBarHelper::cancel('user');
?>

	<form action="index.php" method="post" name="adminForm" id="adminForm">
	<fieldset class="adminform">
	<legend>Add and Edit User</legend>
	<table class="admintable">
	<tr>
		<td width="100" align="right" class="key">
			Sex:
		</td>
		<td>
		<?php
			echo $this->lists['sex'];
		?>
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Address:
		</td>
		<td>
			<input class="text_area" type="text" name="address" id="address" size="50" maxlength="250" value="<?php echo $this->user->address;?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			City:
		</td>
		<td>
			<input class="text_area" type="text" name="user" id="user" size="50" maxlength="250" value="<?php echo $this->user->city;?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Tel:
		</td>
		<td>
			<input class="text_area" type="text" name="tel" id="tel" size="50" maxlength="250" value="<?php echo $this->user->tel;?>" />
		</td>
	</tr>
	</table>
	</fieldset>
		<input type="hidden" name="id" value="<?php echo $this->user->id; ?>" />
		<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" name="task" value="" />
	</form>