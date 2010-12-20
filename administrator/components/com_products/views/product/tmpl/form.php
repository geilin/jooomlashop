<?php 
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Administrator Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    view product.
*/

defined( '_JEXEC' ) or die( 'Restricted access' ); 
	global $option;
	//JToolBarHelper::title( JText::_('Phones'), 'generic.png');
	JToolBarHelper::save();
	JToolBarHelper::apply();
	JToolBarHelper::cancel('product');
	$editor =& JFactory::getEditor();
	JHTML::_('behavior.calendar');
		

?>
  <script src="<?php echo JURI::root();?>components/com_products/js/jquery.min.js"></script>
  <script src="<?php echo JURI::root();?>components/com_products/js/jquery.niceprice.js"></script>
  
  <script type="text/javascript">
  if ($ == jQuery ) { jQuery.noConflict();  }
  function showPrice(id){
		if(id.value =='0'){
			document.getElementById('sp_price').style.display = 'none';
		}else if(id.value =='1'){
			document.getElementById('sp_price').style.display = '';
		}
	}	
  jQuery(document).ready(function() {	  
	  jQuery('#saleprice').niceprice({'display': 'saleprice_format'});
  });
	function submitbutton(pressbutton) {
		var form = document.adminForm;
		if (pressbutton == 'product') {
			submitform( pressbutton );
			return;
		}

		if (pressbutton == 'delImg') {
			submitform( pressbutton );
			return;
		}

		if (pressbutton == 'save' || pressbutton == 'apply') {
			// do field validation
			if (form.name.value == ""){
				alert( "Vui lòng điền tên sản phẩm" );
			} else {
				submitform( pressbutton );
			}	
		}
	}
</script>

<style type="text/css">
#saleprice_format { font-weight:bold; color:red; }
</style>
	<form action="index.php" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
	<div class="col width-70">
	<fieldset class="adminform">
	<legend>Thông tin sản phẩm</legend>

	<table class="admintable">
	<tr>
		<td width="100" align="right" class="key">
			Tên sản phẩm:
		</td>
		<td>
			<input class="text_area" type="text" name="name" id="name" size="50" maxlength="250" value="<?php echo $this->product->name;?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Danh mục sản phẩm:
		</td>
		<td>
		<?php
			echo $this->lists['category'];
		?>
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">Nhà sản xuất:	</td>
		<td><?php echo $this->lists['manufacturer'];?></td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">Giá :</td>
		<td>
			<input class="text_area" type="text" name="saleprice" id="saleprice" size="50" maxlength="250" value="<?php echo $this->product->saleprice;?>" />
			<span id="saleprice_format"></span> <span class="currentcy">VNĐ</span>		
		</td>
	</tr>
	
	<tr>
		<td width="100" align="right" class="key">Khuyến mãi:</td>
		<td><?php echo $this->lists['lowprice'];?></td>
	</tr>
	<?php if($this->product->discount){
		$style = '';
	}else{
		$style = 'none';
	} ?>
	
	<tr id="sp_price" style="display:<?php echo $style ?>" >
		<td width="100" align="right" class="key">Giá ghuyến mãi:</td>
		<td>
			<input class="text_area" type="text" name="discount_price" id="discount_price" size="50" maxlength="250" value="<?php echo $this->product->discount_price;?>" />
			<span id="discount_price_format"></span>
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">Còn hàng:</td>
		<td><?php echo $this->lists['stock'];?></td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">Sản phẩm hot:</td>
		<td><?php echo $this->lists['frontpage'];?></td>
	</tr>
	
	<tr>
		<td width="100" align="right" class="key">
			Mô tả sản phẩm:
		</td>
		<td>
			<?php echo $editor->display( 'intro',  $this->product->intro, '700', '250', '60', '20', array('pagebreak', 'readmore') ) ; ?>
			
		</td>
	</tr>
	
	
	
				
	<tr>
		<td width="100" align="right" class="key">Bật sản phẩm:</td>
		<td><?php	echo $this->lists['published'];	?></td>
	</tr>
	</table> 
	

	</fieldset>
	</div>
	<div class="col width-30">
		<fieldset><legend>Hình ảnh</legend>		
			<?php 
	    	    echo $this->loadTemplate('picture');
	    	?>
		
		</fieldset>
	</div>
	
		<input type="hidden" name="date" value="<?php echo $this->product->date; ?>" />
		<input type="hidden" name="id" id="product_id" value="<?php echo $this->product->id; ?>" />
		<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" id="image" name="image" value="<?php echo $this->product->image; ?>" />
		<input type="hidden" id="imgName" name="imgName" value="" />
		<input type="hidden" name="task" value="" />
		<div class="clr"></div>
	</form>
	<div class="clr"></div>