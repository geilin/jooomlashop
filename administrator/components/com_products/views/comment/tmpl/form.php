<?php 
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Administrator Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    view comments.
*/

defined( '_JEXEC' ) or die( 'Restricted access' ); 
global $option;
		JToolBarHelper::title( JText::_('Comment'), 'generic.png');
		JToolBarHelper::save('save');
		JToolBarHelper::cancel();
		$editor =& JFactory::getEditor();
		JHTML::_('behavior.calendar');
?>
	<form action="index.php" method="post" name="adminForm" id="adminForm">
	<fieldset class="adminform">
	<legend>Add and Edit Comment</legend>
	<table class="admintable">
	<tr>
		<td width="100" align="right" class="key">
			Name:
		</td>
		<td>
			<input class="text_area" type="text" name="name" id="name" size="50" maxlength="250" value="<?php echo $this->comment->name;?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Content:
		</td>
		<td>
			<?php echo $editor->display( 'content',  $this->comment->content , '550', '250', '60', '20', array('pagebreak', 'readmore', 'image') ) ; ?>
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
		Date:
		</td>
		<td>
					<?php 
						echo JHTML::_('calendar', $this->comment->date , 'date', 'date', '%Y-%m-%d', array('class'=>'inputbox', 'size'=>'25',  'maxlength'=>'19', 'type'=>'text', 'style'=>"width:120px;font: 11px Tahoma;border: 1px solid #14678f;"));  
					?> 
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
		<input type="hidden" name="id" value="<?php echo $this->comment->id; ?>" />
		<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" name="controller" value="comment" />
		<input type="hidden" name="task" value="" />
	</form>