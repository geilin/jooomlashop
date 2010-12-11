<?php 
/**
* @version		1.0  - 	Joomla 1.5.x
* @package		Component Administrator Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    view product.
*/

defined( '_JEXEC' ) or die( 'Restricted access' ); 

		//JToolBarHelper::title( JText::_('Phones'), 'generic.php');
		JToolBarHelper::publishList();
		JToolBarHelper::unpublishList();
		
		JToolBarHelper::editList();
		JToolBarHelper::deleteList('Are you sure you want to remove product ?','remove');
		JToolBarHelper::addNew();
		JToolBarHelper::preferences( 'com_products', '250' );
?>
<form action="index.php" method="post" name="adminForm">
<table>
	<tr>
		<td width="100%">
			<?php echo JText::_( 'Từ khóa' ); ?>:
			<input type="text" name="search" id="search" value="<?php echo $this->search; ?>" class="text_area" onchange="document.adminForm.submit();" title="<?php echo JText::_( 'Filter by title or enter product ID' );?>"/>
			<button onclick="this.form.submit();"><?php echo JText::_( 'Tìm Kiếm' ); ?></button>
			<button onclick="document.getElementById('search').value='';this.form.getElementById('cid').value='0';this.form.getElementById('mid').value='0';this.form.getElementById('frontid').value='0';this.form.submit();"><?php echo JText::_( 'All Products' ); ?></button>
			&nbsp; Total Product: <?php echo $this->total; ?>
		</td>
		<td nowrap="nowrap">
		<?php
			echo $this->lists['catid'];					
			echo $this->lists['manufacturerid'];
			echo $this->lists['frontpage'];	
		?>		
		</td>
	</tr>
</table>

<table class="adminlist">
<thead>
<tr>
<th width="2%">
	<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->products ); ?>);" />
</th>
<th class='title'>
	<?php echo JHTML::_('grid.sort',  'Tên sản phẩm', 'p.name', $this->lists['order_Dir'], $this->lists['order'] ); ?>
</th>
<th width="5%" nowrap="nowrap">
	<?php echo JHTML::_('grid.sort',  'Model', 'p.code', $this->lists['order_Dir'], $this->lists['order'] ); ?>
</th>
<th width="10%" nowrap="nowrap">
	<?php echo JHTML::_('grid.sort',  'Giá', 'p.saleprice', $this->lists['order_Dir'], $this->lists['order'] ); ?>
</th>
<th width="10%" nowrap="nowrap">
	<?php echo JHTML::_('grid.sort',  'Giá KM', 'p.spprice', $this->lists['order_Dir'], $this->lists['order'] ); ?>
</th>
<th width="5%" nowrap="nowrap">
	<?php echo JHTML::_('grid.sort',  'Khuyến mãi', 'p.lowprice', $this->lists['order_Dir'], $this->lists['order'] ); ?>
</th>
<th width="6%" nowrap="nowrap">
	<?php echo JHTML::_('grid.sort',  'Trạng thái SP', 'p.stock', $this->lists['order_Dir'], $this->lists['order'] ); ?>
</th>
<th width="15%" nowrap="nowrap">
	<?php echo JHTML::_('grid.sort',  'Danh mục sản phẩm', 'p.catid', $this->lists['order_Dir'], $this->lists['order'] ); ?>
</th>

<th width="5%" nowrap="nowrap">
	<?php echo JHTML::_('grid.sort', JText::_('SP hot'), 'p.frontpage', $this->lists['order_Dir'], $this->lists['order'] ); ?>
</th>
<th width="5%" nowrap="nowrap">
	<?php echo JHTML::_('grid.sort', JText::_('Published'), 'p.published', $this->lists['order_Dir'], $this->lists['order'] ); ?>
</th>
<th width="3%" nowrap="nowrap">
	<?php echo JHTML::_('grid.sort',  JText::_('Id'), 'p.id', $this->lists['order_Dir'], $this->lists['order'] ); ?>
</th>
</tr>
</thead>
<?php
jimport('joomla.filter.filteroutput');
$k = 0;
global $option;
for ($i=0, $n=count( $this->products ); $i < $n; $i++)
{
	$row = $this->products[$i];
	$checked = JHTML::_('grid.id', $i, $row->id );
	$link = JFilterOutput::ampReplace( 'index.php?option=' . $option . '&task=edit&cid[]='. $row->id );
	$linkCopy = JFilterOutput::ampReplace( 'index.php?option=' . $option . '&task=copy&cid[]='. $row->id );

	
?>
<tr class="<?php echo "row$k"; ?>">
<td>
	<?php echo $checked; ?>
</td>
<td>
<a href="<?php echo $link; ?>">
	<?php echo $row->name; ?></a> 
<a href="<?php echo $linkCopy; ?>"> [Copy] </a>
</td>
<td>
	<?php echo $row->code; ?>
</td>
<td>
	<?php echo number_format($row->saleprice); ?>
</td>
<td>
	<?php echo number_format($row->spprice); ?>
</td>
<?php if($row->lowprice){ ?>
	<td width="5%" align="center" ><a href="#nolowprice" onclick="return listItemTask('cb<?php echo $i;?>','nolowprice')"><img border="0" alt="Khuyến mãi" src="images/tick.png"/></a></td>
<?php }else{ ?>
	<td width="5%" align="center" ><a href="#lowprice" onclick="return listItemTask('cb<?php echo $i;?>','lowprice')"><img border="0" alt="Không khuyến mãi" src="images/publish_x.png"/></a></td>
<?php } ?>
<?php if($row->stock){ ?>
	<td width="5%" align="center" ><a href="#noproducts" onclick="return listItemTask('cb<?php echo $i;?>','noproducts')"><img border="0" alt="Còn hàng" src="images/tick.png"/></a></td>
<?php }else{ ?>
	<td width="5%" align="center" ><a href="#hasproducts" onclick="return listItemTask('cb<?php echo $i;?>','hasproducts')"><img border="0" alt="Hết hàng" src="images/publish_x.png"/></a></td>
<?php } ?>
<td>
	<?php echo $row->category; ?>
</td>

<?php if($row->frontpage){ ?>
<td width="5%" align="center" ><a href="#nofrontpage" onclick="return listItemTask('cb<?php echo $i;?>','nofrontpage')"><img border="0" alt="Published Product" src="images/tick.png"/></a></td>
<?php }else{ ?>
<td width="5%" align="center" ><a href="#frontpage" onclick="return listItemTask('cb<?php echo $i;?>','frontpage')"><img border="0" alt="Unpublished Product" src="images/publish_x.png"/></a></td>
<?php } ?>
<?php if($row->published){ ?>
<td width="5%" align="center" ><a href="#unpublish" onclick="return listItemTask('cb<?php echo $i;?>','unpublish')"><img border="0" alt="Published Product" src="images/tick.png"/></a></td>
<?php }else{ ?>
<td width="5%" align="center" ><a href="#publish" onclick="return listItemTask('cb<?php echo $i;?>','publish')"><img border="0" alt="Unpublished Product" src="images/publish_x.png"/></a></td>
<?php } ?>
<td>
	<?php echo $row->id; ?>
</td>
</tr>

<?php
$k = 1 - $k;
}
?>
<tfoot>
	<tr>
		<td colspan="9"><?php echo $this->pageNav->getListFooter(); ?></td>
	</tr>
</tfoot>
</table>
<input type="hidden" name="option" value="<?php echo $option;?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
</form>