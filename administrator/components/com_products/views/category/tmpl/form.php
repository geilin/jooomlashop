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
		//JToolBarHelper::title( JText::_('Category'), 'generic.png');
		JToolBarHelper::save('save');
		JToolBarHelper::cancel();
?>
	<form action="index.php" method="post" name="adminForm" id="adminForm">
	<fieldset class="adminform">
	<legend>Add and Edit Category</legend>
	<table class="admintable">
	<tr>
		<td width="100" align="right" class="key">
			Name:
		</td>
		<td>
			<input class="text_area" type="text" name="name" id="name" size="50" maxlength="250" value="<?php echo $this->category->name;?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Parent Category:
		</td>
		<td>
			<?php echo $this->lists['category'];?>
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Published:
		</td>
		<td>
		<?php
			echo $this->lists['published'];
		?>
		</td>
	</tr>
	</table>
	</fieldset>
		<input type="hidden" name="id" value="<?php echo $this->category->id; ?>" />
		<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" name="controller" value="category" />
		<input type="hidden" name="task" value="" />
	</form>