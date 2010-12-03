<?php 
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Administrator Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    view comment.
*/

defined( '_JEXEC' ) or die( 'Restricted access' ); 

		JToolBarHelper::title( JText::_('Comment'), 'generic.php');
		JToolBarHelper::publishList('publish');
		JToolBarHelper::unpublishList('unpublish');
		JToolBarHelper::preferences( 'com_products', '450' );
		JToolBarHelper::editList('edit');
		JToolBarHelper::deleteList('Are you sure you want to remove comment ?','remove');
?>

<form action="index.php" method="post" name="adminForm">

<table>
	<tr>
		<td width="80%">
			<?php echo JText::_( 'Từ khóa' ); ?>:
			<input type="text" name="search" id="search" value="<?php echo $this->search;?>" class="text_area" onchange="document.adminForm.submit();" title="<?php echo JText::_( 'Filter by title or enter product ID' );?>"/>
			<button onclick="this.form.submit();"><?php echo JText::_( 'Tìm Kiếm' ); ?></button>
			<button onclick="document.getElementById('search').value='';this.form.submit();"><?php echo JText::_( 'All Comments' ); ?></button>
			
		</td width="20%">
		<td>
			Total Comment: <?php echo $this->total; ?>
		</td>
	</tr>
</table>

<table class="adminlist">
<thead>
<tr>
<th width="20">
	<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->comments ); ?>);" />
</th>
<th width="10%"><?php echo JText::_('Name'); ?></th>
<th class='title'><?php echo JText::_('Comment'); ?></th>
<th class='title'><?php echo JText::_('Product'); ?></th>
<th class='title'><?php echo JText::_('Rating'); ?></th>
<th width="5%" nowrap="nowrap"><?php echo JText::_('Published'); ?></th>
</tr>
</thead>
<?php
jimport('joomla.filter.filteroutput');
$k = 0;
global $option;
for ($i=0, $n=count( $this->comments ); $i < $n; $i++)
{
	$row = $this->comments[$i];
	$checked = JHTML::_('grid.id', $i, $row->id );
	$link = JFilterOutput::ampReplace( 'index.php?option=' . $option . '&controller=comment&task=edit&cid[]='. $row->id );
	$linkProduct = JFilterOutput::ampReplace( 'index.php?option=' . $option . '&search='. $row->productid );
	
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
	<?php echo $row->content; ?>
</td>
<td>
	<a href="<?php echo $linkProduct; ?>"><?php echo $row->product; ?></a>
</td>
<td>
	<?php echo $row->rating; ?>
</td>
		<?php if($row->published){ ?>
		<td width="5%" align="center" ><a href="#unpublish" onclick="return listItemTask('cb<?php echo $i;?>','unpublish')"><img border="0" alt="Published" src="images/tick.png"/></a></td>
		<?php }else{ ?>
		<td width="5%" align="center" ><a href="#publish" onclick="return listItemTask('cb<?php echo $i;?>','publish')"><img border="0" alt="Unpublished" src="images/publish_x.png"/></a></td>
		<?php } ?>
</tr>
<?php
$k = 1 - $k;
}
?>
<tfoot>
<td colspan="7"><?php echo $this->pageNav->getListFooter(); ?></td>
</tfoot>
</table>
<input type="hidden" name="option" value="<?php echo $option;?>" />
<input type="hidden" name="controller" value="comment" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
</form>