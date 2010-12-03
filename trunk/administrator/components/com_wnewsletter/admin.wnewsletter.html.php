<?php
/**
* @version		1.0
* @package	Component Administrator wNewsletter
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    template com wNewsletter
*/

// no direct access
defined('_JEXEC') or die('Restricted access');
class HTML_newsletter
{
	function editNewsLetter( $row, $lists, $option )
	{
		$editor =& JFactory::getEditor();
		JHTML::_('behavior.calendar');
?>
	<form action="index.php" method="post" name="adminForm" id="adminForm">
	<fieldset class="adminform">
	<legend>Thêm và chỉnh sửa Email</legend>
	<table class="admintable" width="100%">
	<tr>
		<td width="100" align="right" class="key">
			Email Người Gởi:
		</td>
		<td>
			<input class="text_area" type="text" name="sender" id="sender" size="50" maxlength="250" value="<?php echo $row->sender;?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Tiêu đề:
		</td>
		<td>
			<input class="text_area" type="text" name="subject" id="sunject" size="50" maxlength="250" value="<?php echo $row->subject;?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Header:
		</td>
		<td>
			<input class="text_area" type="text" name="header" id="header" size="50" maxlength="250" value="<?php echo $row->header;?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Category:
		</td>
		<td>
			<?php echo $lists['category']; ?>
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Email HTML:
		</td>
		<td>
			<?php echo $editor->display( 'html_message',  $row->html_message, '100%', '600', '200', '20', array('pagebreak', 'readmore') ) ; ?>
		</td>
	</tr>
	<tr>
	<td width="100" align="right" class="key">
			Email Text:
		</td>
		<td>
			<textarea rows="5" cols="80" name="message" id="message" class="text_area"><?php echo $row->message;?></textarea>
		</td>
	</tr>

	<tr>
		<td width="100" align="right" class="key"></td><td><hr/></td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Số lần gởi:
		</td>
		<td>
			<input class="text_area" type="text" name="hits" id="hits" size="50" maxlength="250" value="<?php echo $row->hits;?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Giới hạn số mail:
		</td>
		<td>
			<input class="text_area" type="text" name="limit" id="limit" size="50" maxlength="250" value="<?php echo $row->limit;?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
		Ngày tạo:
		</td>
		<td>
					<?php 
						echo JHTML::_('calendar', $row->created , 'date', 'date', '%Y-%m-%d %H:%m', array('class'=>'inputbox', 'size'=>'25',  'maxlength'=>'19', 'readonly'=>'readonly', 'type'=>'text', 'style'=>"width:120px;font: 11px Tahoma;border: 1px solid #14678f;"));  
					?> 
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Hoạt động:
		</td>
		<td>
		<?php
			echo $lists['published'];
		?>
		</td>
	</tr>
	</table>
	</fieldset>
		<input type="hidden" name="id" value="<?php echo $row->id; ?>" />
		<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" name="task" value="" />
	</form>
<?php
	}

	function showNewsLetter( $option, &$rows, &$pageNav)
	{
?>
<form action="index.php" method="post" name="adminForm">

<table>
	<tr>
		<td width="100%">
			<?php echo JText::_( 'Từ khóa' ); ?>:
			<input type="text" name="search" id="search" value="<?php echo $lists['search'];?>" class="text_area" onchange="document.adminForm.submit();" title="<?php echo JText::_( 'Filter by sin or enter ID' );?>"/>
			<button onclick="this.form.submit();"><?php echo JText::_( 'Tìm Kiếm' ); ?></button>
			<button onclick="document.getElementById('search').value='';this.form.getElementById('filter_sectionid').value='-1';this.form.getElementById('catid').value='0';this.form.getElementById('filter_authorid').value='0';this.form.getElementById('filter_state').value='';this.form.submit();"><?php echo JText::_( 'Reset' ); ?></button>
		</td>
	</tr>
</table>
			
<table class="adminlist">
<thead>
<tr>
<th width="20">
	<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $rows ); ?>);" />
</th>
<th class='title'>Tiêu đề</th>
<th width="5%">Send</th>
<th class='title'>Phân loại</th>
<th class='title'>Ngày tạo</th>
<th class='title'>Ngày gởi</th>
<th class='title'>Số lần gởi</th>
<th width="5%" nowrap="nowrap">Hoạt động</th>
</tr>
</thead>
<?php
jimport('joomla.filter.filteroutput');
$k = 0;
for ($i=0, $n=count( $rows ); $i < $n; $i++)
{
	$row = &$rows[$i];
	$checked = JHTML::_('grid.id', $i, $row->id );
	$published = JHTML::_('grid.published', $row, $i );
	$link = JFilterOutput::ampReplace( 'index.php?option=' . $option . '&task=edit&cid[]='. $row->id );
	$linksend = JFilterOutput::ampReplace( 'index.php?option=' . $option . '&task=sendMail&cid[]='. $row->id );
?>
<tr class="<?php echo "row$k"; ?>">
<td>
<?php echo $checked; ?>
</td>
<td>
<a href="<?php echo $link; ?>">
<?php echo $row->subject; ?></a>
</td>
<td>
	<a href="<?php echo $linksend; ?>"> Send </a>
</td>
<td>
<?php echo $row->name; ?></a>
</td>
<td>
<?php echo $row->created; ?>
</td>
<td>
<?php echo $row->send; ?>
</td>
<td>
<?php echo $row->hits; ?>
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
<td colspan="7"><?php echo $pageNav->getListFooter(); ?></td>
</tfoot>
</table>
<input type="hidden" name="option" value="<?php echo $option;?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
</form>
<?php
	}
	function showSubscriber( $option, &$rows, &$pageNav )
	{
?>
<form action="index.php?option=com_wnewsletter&task=subscriber" method="post" name="adminForm">

<table>
	<tr>
		<td width="100%">
			<?php echo JText::_( 'Từ khóa' ); ?>:
			<input type="text" name="search" id="search" value="<?php echo $lists['search'];?>" class="text_area" onchange="document.adminForm.submit();" title="<?php echo JText::_( 'Filter by sin or enter ID' );?>"/>
			<button onclick="this.form.submit();"><?php echo JText::_( 'Tìm Kiếm' ); ?></button>
			<button onclick="document.getElementById('search').value='';this.form.submit();"><?php echo JText::_( 'Reset' ); ?></button>
		</td>
	</tr>
</table>

<table class="adminlist">
<thead>
<tr>
<th width="20">
	<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $rows ); ?>);" />
</th>
<th class='title'>Tên</th>
<th class="title">Email</th>
<th class="title">date</th>
<th class="title">Phân loại</th>
<th width="5%" nowrap="nowrap">Cho phép</th>
</tr>
</thead>
<?php
jimport('joomla.filter.filteroutput');
$k = 0;
for ($i=0, $n=count( $rows ); $i < $n; $i++)
{
	$row = &$rows[$i];
	$checked = JHTML::_('grid.id', $i, $row->id );
	$link = JFilterOutput::ampReplace( 'index.php?option=' . $option . '&task=editSubscriber&cid[]='. $row->id );
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
	<?php echo $row->email; ?>
</td>
<td>
	<?php echo $row->date; ?>
</td>
<td>
	<?php echo $row->cat_id; ?>
</td>
		<?php if($row->confirmed){ ?>
		<td width="5%" align="center" ><a href="#unconfirmed" onclick="return listItemTask('cb<?php echo $i;?>','unconfirmed')"><img border="0" alt="confirmed" src="images/tick.png"/></a></td>
		<?php }else{ ?>
		<td width="5%" align="center" ><a href="#confirmed" onclick="return listItemTask('cb<?php echo $i;?>','confirmed')"><img border="0" alt="Unconfirmed" src="images/publish_x.png"/></a></td>
		<?php } ?>
</tr>
<?php
$k = 1 - $k;
}
?>
<tfoot>
<td colspan="7"><?php echo $pageNav->getListFooter(); ?></td>
</tfoot>
</table>
<input type="hidden" name="option" value="<?php echo $option;?>" />
<input type="hidden" name="task" value="subscriber" />
<input type="hidden" name="boxchecked" value="0" />
</form>
<?php
	}
	function editSubscriber( $row, $lists, $option)
	{
	$editor =& JFactory::getEditor();
?>
	<form action="index.php" method="post" name="adminForm" id="adminForm">
	<fieldset class="adminform">
	<legend>Thêm và chỉnh sửa Subscriber</legend>
	<table class="admintable">
	<tr>
		<td width="100" align="right" class="key">
			Họ và Tên:
		</td>
		<td>
			<input class="text_area" type="text" name="name" id="name" size="50" maxlength="250" value="<?php echo $row->name;?>" />
		</td>
	</tr>	
	<tr>
		<td width="100" align="right" class="key">
			Email:
		</td>
		<td>
			<input class="text_area" type="text" name="email" id="email" size="50" maxlength="250" value="<?php echo $row->email;?>" />
		</td>
	</tr>	
	<tr>
		<td width="100" align="right" class="key">
		Ngày subscriber:
		</td>
		<td>
					<?php 
						echo JHTML::_('calendar', $row->date , 'date', 'date', '%Y-%m-%d %H:%m', array('class'=>'inputbox', 'size'=>'25',  'maxlength'=>'19', 'readonly'=>'readonly', 'type'=>'text', 'style'=>"width:120px;font: 11px Tahoma;border: 1px solid #14678f;"));  
					?> 
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Cho phép:
		</td>
		<td>
		<?php
			echo $lists['confirmed'];
		?>
		</td>
	</tr>
	</table>
	</fieldset>
		<input type="hidden" name="id" value="<?php echo $row->id; ?>" />
		<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" name="task" value="" />
	</form>
<?php	
	}
		function showContact( $option, &$rows, &$pageNav )
	{
?>
<form action="index.php?option=com_wnewsletter&task=contact" method="post" name="adminForm">

<table>
	<tr>
		<td width="100%">
			<?php echo JText::_( 'Từ khóa' ); ?>:
			<input type="text" name="search" id="search" value="" class="text_area" onchange="document.adminForm.submit();" title="<?php echo JText::_( 'Filter by sin or enter ID' );?>"/>
			<button onclick="this.form.submit();"><?php echo JText::_( 'Tìm Kiếm' ); ?></button>
			<button onclick="document.getElementById('search').value='';this.form.submit();"><?php echo JText::_( 'Reset' ); ?></button>
		</td>
	</tr>
</table>
<table class="adminlist">
<thead>
<tr>
<th width="20">
	<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $rows ); ?>);" />
</th>
<th class='title'>Công ty</th>
<th class="title">Phone</th>
<th class="title">Địa chỉ</th>
<th class="title">hoby</th>
<th class="title">Họ và Tên</th>
</tr>
</thead>
<?php
jimport('joomla.filter.filteroutput');
$k = 0;
for ($i=0, $n=count( $rows ); $i < $n; $i++)
{
	$row = &$rows[$i];
	$checked = JHTML::_('grid.id', $i, $row->id );
	$link = JFilterOutput::ampReplace( 'index.php?option=' . $option . '&task=editContact&cid[]='. $row->id );
?>
<tr class="<?php echo "row$k"; ?>">
<td>
	<?php echo $checked; ?>
</td>
<td>
	<a href="<?php echo $link; ?>" title="<?php echo $row->company; ?>"><?php echo $row->company; ?></a>
</td>
<td>
	<?php echo $row->phone; ?>
</td>
<td>
	<?php echo $row->address; ?>
</td>
<td>
	<?php echo $row->hobby; ?>
</td>
<td>
	<?php echo $row->name; ?>
</td>
</tr>
<?php
$k = 1 - $k;
}
?>
<tfoot>
<td colspan="7"><?php echo $pageNav->getListFooter(); ?></td>
</tfoot>
</table>
<input type="hidden" name="option" value="<?php echo $option;?>" />
<input type="hidden" name="task" value="contact" />
<input type="hidden" name="boxchecked" value="0" />
</form>
<?php
	}
	function editContact( $row, $option)
	{
	$editor =& JFactory::getEditor(); 
?>
	<form action="index.php" method="post" name="adminForm" id="adminForm">
	<fieldset class="adminform">
	<legend>Thêm và chỉnh sửa Contact</legend>
	<table class="admintable">
	<tr>
		<td width="100" align="right" class="key">
			Tên công ty:
		</td>
		<td>
			<input class="text_area" type="text" name="company" id="conpany" size="50" maxlength="250" value="<?php echo $row->company;?>" />
		</td>
	</tr>	
	<tr>
		<td width="100" align="right" class="key">
			Phone:
		</td>
		<td>
			<input class="text_area" type="text" name="phone" id="phone" size="50" maxlength="250" value="<?php echo $row->phone;?>" />
		</td>
	</tr>	
	<tr>
		<td width="100" align="right" class="key">
		Địa chỉ:
		</td>
		<td>
					<input class="text_area" type="text" name="address" id="address" size="50" maxlength="250" value="<?php echo $row->address;?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Hobby:
		</td>
		<td>
			<input class="text_area" type="text" name="hobby" id="hobby" size="50" maxlength="250" value="<?php echo $row->hobby;?>" />
		</td>
	</tr>	
	<tr>
		<td width="100" align="right" class="key">
			Note:
		</td>
		<td>
			<textarea rows="5" cols="40" name="note" id="note" class="text_area"><?php echo $row->note;?></textarea>
		</td>
	</tr>
	</table>
	</fieldset>
		<input type="hidden" name="id" value="<?php echo $row->id; ?>" />
		<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" name="task" value="" />
	</form>
<?php
	}
	function sendMail( $option, $row, $lists)
	{
		$editor =& JFactory::getEditor();
	?>
	<form action="index.php" method="post" name="adminForm" id="adminForm">
	<div class="col width-70">
	<fieldset class="adminform">
	<legend>Send Mail</legend>
	<table class="admintable">
	<tr>
		<td width="100" align="right" class="key">
			Email Người Gởi:
		</td>
		<td>
			<input class="text_area" type="text" name="sender" id="sender" size="50" maxlength="250" value="<?php echo $row->sender;?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Tiêu đề:
		</td>
		<td>
			<input class="text_area" type="text" name="subject" id="sunject" size="50" maxlength="250" value="<?php echo $row->subject;?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Header:
		</td>
		<td>
			<input class="text_area" type="text" name="header" id="header" size="50" maxlength="250" value="<?php echo $row->header;?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Giới hạn số mail:
		</td>
		<td>
			<input class="text_area" type="text" name="limit" id="limit" size="50" maxlength="250" value="<?php echo $row->limit;?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Category:
		</td>
		<td>
			<?php echo $lists['category']; ?>
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Email HTML:
		</td>
		<td>
			<?php echo $editor->display( 'html_message',  $row->html_message, '100%', '350', '40', '20', array('pagebreak', 'readmore') ) ; ?>
		</td>
	</tr>
	<tr>
	<td width="100" align="right" class="key">
			Email Text:
		</td>
		<td>
			<textarea rows="5" cols="80" name="message" id="message" class="text_area"><?php echo $row->message;?></textarea>
		</td>
	</tr>

	</table>
	</fieldset>
	</div>
		<div class="col width-30">
			<fieldset class="adminform">
				<legend>Subscriber</legend>

				<table class="admintable">
				<tr>
					<td class="key">
						<label for="subscriber">
							Send mail to subscriber
						</label>
					</td>
					<td>
						<input type="checkbox" name="subscriber" id="subscriber" value="1" checked="checked" />
					</td>
				</tr>
				<tr>
					<td valign="top" class="key">
						<label for="mm_group">
							Send mail to group
						</label>
					</td>
					<td>
					</td>
				</tr>
				<tr>
					<td colspan="2" valign="top">
						<?php echo $lists['gid']; ?>
					</td>
				</tr>


				</table>
			</fieldset>
		</div>	
	
		<input type="hidden" name="id" value="<?php echo $row->id; ?>" />
		<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" name="task" value="" />
	</form>
<?php 	
	}
	function showCategory( $option, &$rows, &$pageNav )
	{
?>
<form action="index.php" method="post" name="adminForm">
<table class="adminlist">
<thead>
<tr>
<th width="20">
	<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $rows ); ?>);" />
</th>
<th class='title'>Tên phân loại</th>
<th class="title">diễn tả</th>
<th width="5%">vị trí <a href="javascript:saveorder(1, 'saveordercat')" title="Save Order Category"><img src="/joomla15/administrator/images/filesave.png" alt="Save Order"  /></a></th>
</tr>
</thead>
<?php
jimport('joomla.filter.filteroutput');
$k = 0;
for ($i=0, $n=count( $rows ); $i < $n; $i++)
{
	$row = &$rows[$i];
	$checked = JHTML::_('grid.id', $i, $row->id );	
	$link = JFilterOutput::ampReplace( 'index.php?option=' . $option . '&task=editCategory&cid[]='. $row->id );
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
	<?php echo $row->description; ?>
</td>
<td>
	<input type="text" name="order[]" size="5" value="<?php echo $row->ordering;?>" class="text_area" style="text-align: center" />
</td>
</tr>
<?php
$k = 1 - $k;
}
?>
<tfoot>
<td colspan="7"><?php echo $pageNav->getListFooter(); ?></td>
</tfoot>
</table>
<input type="hidden" name="option" value="<?php echo $option;?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
</form>
<?php
	}
	function editCategory( $row, $option)
	{
	$editor =& JFactory::getEditor();
?>
	<form action="index.php" method="post" name="adminForm" id="adminForm">
	<fieldset class="adminform">
	<legend>Thêm và chỉnh sửa phân loại</legend>
	<table class="admintable">
	<tr>
		<td width="100" align="right" class="key">
			Tên phân loại:
		</td>
		<td>
			<input class="text_area" type="text" name="name" id="name" size="50" maxlength="250" value="<?php echo $row->name;?>" />
		</td>
	</tr>	
	<tr>
		<td width="100" align="right" class="key">
			Diễn tả
		</td>
		<td>
			<?php echo $editor->display( 'description', $row->description , '100%', '150', '40', '5', array('pagebreak', 'readmore') ) ; ?>
		</td>
	</tr>
	</table>
	</fieldset>
		<input type="hidden" name="id" value="<?php echo $row->id; ?>" />
		<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" name="task" value="" />
	</form>
<?php	
	}
	
	//end class
}
?>