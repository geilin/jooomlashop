<?php 
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Administrator Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    view manufacturer.
*/

defined( '_JEXEC' ) or die( 'Restricted access' ); 
		//JToolBarHelper::title( JText::_('Manufacturer'), 'generic.png');
		JToolBarHelper::save('save');
		JToolBarHelper::cancel();
		$editor =& JFactory::getEditor();
		JHTML::_('behavior.calendar');
		$linkDelete = JFilterOutput::ampReplace( 'index.php?option=com_products&controller=manufacturer&task=removeManufacturerImage&cid[]='. $this->manufacturer->id );
?>
  <script>
	function submitbutton(pressbutton) {
		var form = document.adminForm;
		if (pressbutton == 'cancel') {
			submitform( pressbutton );
			return;
		}

		if (pressbutton == 'save' || pressbutton == 'apply') {
			// do field validation
			if (form.name.value == ""){
				alert( "Vui lòng điền tên Nhà sản xuất" );
			} else {
				submitform( pressbutton );
			}	
		}
	}
  </script>
  
	<form action="index.php" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
	<fieldset class="adminform">
	<legend>Add and Edit Manufacturer</legend>
	<table class="admintable">
	<tr>
		<td width="100" align="right" class="key">
			Name:
		</td>
		<td>
			<input class="text_area" type="text" name="name" id="name" size="50" maxlength="250" value="<?php echo $this->manufacturer->name;?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Description:
		</td>
		<td>
			<?php echo $editor->display( 'description',  $this->manufacturer->description, '550', '250', '60', '20', array('pagebreak', 'readmore') ) ; ?>
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Image:
		</td>
		<td>
			<input class="text_area" type="file" name="image" id="image" size="50" maxlength="250"/>  [<a href=<?php echo $linkDelete; ?> >delete</a>]<br/>
			<?php if (!empty($this->manufacturer->image)) {
				echo '<img src="'. JURI::root().'images/manufacturer/'.$this->manufacturer->image .'" height="100"/><br/>';			
			?>
			<input type="hidden" name="old_image" value="<?php echo $this->manufacturer->image; ?>" />
			<?php } ?>
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
		<input type="hidden" name="id" value="<?php echo $this->manufacturer->id; ?>" />
		<input type="hidden" name="option" value="com_products" />
		<input type="hidden" name="controller" value="manufacturer" />
		<input type="hidden" name="task" value="" />
	</form>