<?php 

defined( '_JEXEC' ) or die( 'Restricted access' ); 

		//JToolBarHelper::title( JText::_('manufacturer'), 'generic.php');
		JToolBarHelper::publishList('publish');
		JToolBarHelper::unpublishList('unpublish');
		JToolBarHelper::editList('edit');
		JToolBarHelper::deleteList('Are you sure you want to remove manufacturer ?','remove');
		JToolBarHelper::addNew('add');
?>
<div>Total Manufacturer: <?php echo $this->total; ?></div>
<br/>
<form action="index.php" method="post" name="adminForm">
	<table class="adminlist">
		<thead>
		<tr>
		<th width="5">
			<?php echo JText::_( 'Num' ); ?>
		</th>
		<th width="20">
			<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->manufacturers ); ?>);" />
		</th>
		<th class='title'>
			<?php echo JHTML::_('grid.sort', JText::_('Name'), 'name', $this->lists['order_Dir'], $this->lists['order'] ); ?>
		</th>
		<th width="7%">
		<?php echo JHTML::_('grid.sort', JText::_('Ordering'), 'ordering', $this->lists['order_Dir'], $this->lists['order'] ); ?>

		<?php echo JHTML::_('grid.order',  $this->manufacturers ); ?>
		<!--<a href="javascript:saveorder(1, 'saveOrder')" title="Save Order manufacturer"><img src="images/filesave.png" alt="Save Order"  /></a>-->
		</th>
		<th width="5%" nowrap="nowrap"><?php echo JText::_('Published'); ?></th>
		<th width="3%" nowrap="nowrap">
			<?php echo JHTML::_('grid.sort',  JText::_('ID'), 'id', $this->lists['order_Dir'], $this->lists['order'] ); ?>
		</th>
		</tr>
		</thead>
		
		<tfoot>
			<tr>
			<td colspan="6"><?php echo $this->pageNav->getListFooter(); ?></td>
			</tr>
		</tfoot>
		
		<tbody>
		<?php
		jimport('joomla.filter.filteroutput');
		$k = 0;
		global $option;
		for ($i=0, $n=count( $this->manufacturers ); $i < $n; $i++)
		{
			$row = $this->manufacturers[$i];
			$checked = JHTML::_('grid.id', $i, $row->id );
			$link = JFilterOutput::ampReplace( 'index.php?option=com_products&controller=manufacturer&task=edit&cid[]='. $row->id );
			
		?>
		<tr class="<?php echo "row$k"; ?>">
			<td>
				<?php echo $this->pageNav->getRowOffset( $i ); ?>
			</td>
			<td>
				<?php echo $checked; ?>
			</td>
			<td>
			<a href="<?php echo $link; ?>">
				<?php echo $row->name; ?></a>
			</td>
			<td>
				<input type="text" name="order[]" size="5" value="<?php echo $row->ordering;?>" class="text_area" style="text-align: center" />
			</td>
					<?php if($row->published){ ?>
					<td width="5%" align="center" ><a href="#unpublish" onclick="return listItemTask('cb<?php echo $i;?>','unpublish')"><img border="0" alt="Published" src="images/tick.png"/></a></td>
					<?php }else{ ?>
					<td width="5%" align="center" ><a href="#publish" onclick="return listItemTask('cb<?php echo $i;?>','publish')"><img border="0" alt="Unpublished" src="images/publish_x.png"/></a></td>
					<?php } ?>
			 <td>
				<?php echo $row->id; ?>
			</td>
		</tr>
		<?php
		$k = 1 - $k;
		}
		?>
		</tbody>
	</table>
	<input type="hidden" name="option" value="<?php echo $option;?>" />
	<input type="hidden" name="controller" value="manufacturer" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />

	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
	<input type="hidden" name="boxchecked" value="0" />
</form>