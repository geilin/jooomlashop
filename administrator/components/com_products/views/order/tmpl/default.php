<?php 
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Administrator Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    view order.
*/

defined( '_JEXEC' ) or die( 'Restricted access' ); 

		JToolBarHelper::title( JText::_('Order'), 'generic.php');
		JToolBarHelper::publishList('publish');
		JToolBarHelper::unpublishList('unpublish');
		JToolBarHelper::deleteList('Are you sure you want to remove order ?','remove');
		JHTML::_('behavior.calendar');
?>

<form action="index.php" method="post" name="adminForm">

<table>
	<tr>
		<td width="60%">
			<?php echo JText::_( 'Từ khóa' ); ?>:
			<input type="text" name="search" id="search" value="<?php echo $this->search;?>" class="text_area" onchange="document.adminForm.submit();" title="<?php echo JText::_( 'Filter by title or enter product ID' );?>"/>
			<button onclick="this.form.submit();"><?php echo JText::_( 'Tìm Kiếm' ); ?></button>
			<button onclick="document.getElementById('search').value='';this.form.submit();"><?php echo JText::_( 'All Order' ); ?></button>
			&nbsp; Total Product: <?php echo $this->total; ?>
		</td>
		<td>Từ ngày: 
			<?php echo JHTML::_('calendar', '' , 'from', 'from', '%Y-%m-%d', array('class'=>'inputbox', 'size'=>'25',  'maxlength'=>'19', 'readonly'=>'readonly', 'type'=>'text', 'style'=>"width:120px;font: 11px Tahoma;border: 1px solid #14678f;")); ?>
			Đến ngày: 
			<?php echo JHTML::_('calendar', '' , 'to', 'to', '%Y-%m-%d', array('class'=>'inputbox', 'size'=>'25',  'maxlength'=>'19', 'readonly'=>'readonly', 'type'=>'text', 'style'=>"width:120px;font: 11px Tahoma;border: 1px solid #14678f;")); ?>
			<button onclick="this.form.submit();"><?php echo JText::_( 'Lọc kết quả' ); ?></button>
			<button onclick="this.form.submit();"><?php echo JText::_( 'Làm lại' ); ?></button>
		</td>
	</tr>
</table>

<table class="adminlist">
<thead>
<tr>
<th width="20">
	<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->orders ); ?>);" />
</th>
<th class='title'>
	<?php echo JHTML::_('grid.sort',  'Name', 'name', $this->lists['order_Dir'], $this->lists['order'] ); ?>
</th>
<th class='title'><?php echo JText::_('Message'); ?></th>
<th class='title'><?php echo JText::_('Cart Info'); ?></th>
<th class='title'>
	<?php echo JHTML::_('grid.sort',  'Date', 'date', $this->lists['order_Dir'], $this->lists['order'] ); ?>
</th>
<th class='title'>
	<?php echo JHTML::_('grid.sort',  'Status', 'status', $this->lists['order_Dir'], $this->lists['order'] ); ?>
</th>
<th width="5%" nowrap="nowrap">
	<?php echo JHTML::_('grid.sort',  'Published', 'published', $this->lists['order_Dir'], $this->lists['order'] ); ?>
</th>
</tr>
</thead>
<?php
jimport('joomla.filter.filteroutput');
$k = 0;
global $option;
for ($i=0, $n=count( $this->orders ); $i < $n; $i++)
{
	$row = $this->orders[$i];
	$checked = JHTML::_('grid.id', $i, $row->id );	
	$link = JFilterOutput::ampReplace( 'index.php?option=' . $option . '&controller=order&task=edit&cid[]='. $row->id );	
	
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
	<?php echo $row->message; ?>
</td>
<td>
	<?php echo $row->cartinfo; ?>
</td>
<td align="center">
	<?php echo date("d/m - Y", strtotime($row->date));?>
</td>
<td align="center">
	<?php
		switch ($row->status){
			case 0:
				echo '<span style="color:red;font-weight:bold">Chưa xử lý</span>';
				break;
			case 1:
				echo '<span style="color:blue;font-weight:bold">Chưa thanh toán</span>';
				break;
			case 2:
				echo '<span style="color:green;font-weight:bold">Đã thanh toán</span>';
				break;
		}
		
	?>
</td>
		<?php if($row->published){ ?>
		<td width="5%" align="center" ><a href="#unpublish" onclick="return listItemTask('cb<?php echo $i;?>','unpublish')"><img border="0" alt="Published Order" src="images/tick.png"/></a></td>
		<?php }else{ ?>
		<td width="5%" align="center" ><a href="#publish" onclick="return listItemTask('cb<?php echo $i;?>','publish')"><img border="0" alt="Unpublished Order" src="images/publish_x.png"/></a></td>
		<?php } ?>
</tr>
<?php
$k = 1 - $k;
}
?>
<tfoot>
	<tr>
		<td colspan="7"><?php echo $this->pageNav->getListFooter(); ?></td>
	</tr>
</tfoot>
</table>
<input type="hidden" name="option" value="<?php echo $option;?>" />
<input type="hidden" name="controller" value="order" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
</form>