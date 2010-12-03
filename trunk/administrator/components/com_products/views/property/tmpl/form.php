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
		JToolBarHelper::title( JText::_('Category'), 'generic.png');
		JToolBarHelper::save('save');
		JToolBarHelper::cancel();				
?>
		<script language="javascript" type="text/javascript">
		function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}

			// do field validation
			if (form.label.value == '') {
				alert( "<?php echo JText::_( 'DETAIL_PROPERTY_CHECK_ERROR', true ); ?>" );
			} else {
				submitform( pressbutton );
			}
		}
		</script>

		<form action="index.php" method="post" name="adminForm">

		<div class="col100">
			<fieldset class="adminform">
				<legend><?php echo JText::_( 'DETAILS' ); ?></legend>

				<table class="admintable">
				<tr>
					<td width="170" class="key">
						<label for="label">
							<?php echo JText::_( 'Tên Thuộc tính' ); ?>
						</label>
					</td>
					<td>
						<input class="inputbox" type="text" size="40" name="label" id="label" value="<?php echo $this->property->label; ?>" />
					</td>
				</tr>
				<tr>
					<td width="100" align="right" class="key">
						Kiểu dữ liệu nhập:
					</td>
					<td>
					<?php
						echo $this->lists['datatype'];
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
				<tr>
					<td colspan="2" align="center">
					</td>
				</tr>
				</table>
			</fieldset>
		</div>
		<div class="clr"></div>

		<input type="hidden" name="id" value="<?php echo $this->property->id; ?>" />
		<input type="hidden" name="cid[]" value="<?php echo $this->property->id; ?>" />
		<input type="hidden" name="option" value="com_products" />
		<input type="hidden" name="controller" value="property" />
		<input type="hidden" name="task" value="" />
		<?php echo JHTML::_( 'form.token' ); ?>
		</form>