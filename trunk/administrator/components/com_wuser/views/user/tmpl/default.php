<?php 
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Administrator Com WUser
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    view user.
*/

defined( '_JEXEC' ) or die( 'Restricted access' ); 

		JToolBarHelper::title( JText::_('User'), 'generic.php');
		JToolBarHelper::editList();
		JToolBarHelper::deleteList('Are you sure you want to remove user ?','remove');
?>
<form action="index.php" method="post" name="adminForm">
<table>
	<tr>
		<td width="100%">
			<?php echo JText::_( 'Keyword' ); ?>:
			<input type="text" name="search" id="search" value="<?php echo $this->search; ?>" class="text_area" onchange="document.adminForm.submit();" title="<?php echo JText::_( 'Filter by title or enter user ID' );?>"/>
			<button onclick="this.form.submit();"><?php echo JText::_( 'Search' ); ?></button>
			<button onclick="document.getElementById('search').value='';this.form.submit();"><?php echo JText::_( 'All Users' ); ?></button>			
		</td>		
	</tr>
</table>

<table class="adminlist">
<thead>
<tr>
<th width="20">
	<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->users ); ?>);" />
</th>
<th class='title'><?php echo JText::_('Name'); ?></th>
<th width="5%" nowrap="nowrap"><?php echo JText::_('Sex'); ?></th>
<th width="40%" nowrap="nowrap"><?php echo JText::_('Address'); ?></th>
<th width="10%" nowrap="nowrap"><?php echo JText::_('City'); ?></th>
<th width="10%" nowrap="nowrap"><?php echo JText::_('Tel'); ?></th>
</tr>
</thead>
<?php
jimport('joomla.filter.filteroutput');
$k = 0;
global $option;
for ($i=0, $n=count( $this->users ); $i < $n; $i++)
{
	$row = $this->users[$i];
	$checked = JHTML::_('grid.id', $i, $row->id );
	$link = JFilterOutput::ampReplace( 'index.php?option=' . $option . '&task=edit&cid[]='. $row->id );	
	
?>
<tr class="<?php echo "row$k"; ?>">
<td>
	<?php echo $checked; ?>
</td>
<td>
<a href="<?php echo $link; ?>">
	<?php echo $row->name; ?></a>
</td>
<td>
	<?php if ($row->sex == 0){
		echo 'female';
	}else {
		echo 'male';
	}	?>
</td>
<td>
	<?php echo $row->address; ?></a>
</td>
<td>
	<?php echo $row->city; ?>
</td>
<td>
	<?php echo $row->tel; ?>
</td>
</tr>
<?php
$k = 1 - $k;
}
?>
<tfoot>
<td colspan="9"><?php echo $this->pageNav->getListFooter(); ?></td>
</tfoot>
</table>
<input type="hidden" name="option" value="<?php echo $option;?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
</form>