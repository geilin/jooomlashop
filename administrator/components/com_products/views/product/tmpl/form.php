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
  <link href="<?php echo JURI::root();?>components/com_products/css/jquery-ui-1.8.1.custom.css" rel="stylesheet" type="text/css"/>
  <script src="<?php echo JURI::root();?>components/com_products/js/jquery.min.js"></script>
  <script src="<?php echo JURI::root();?>components/com_products/js/jquery-ui.min.js"></script>
  
  <script>

	function showPrice(id){
		if(id.value =='0'){
			document.getElementById('sp_price').style.display = 'none';
		}else if(id.value =='1'){
			document.getElementById('sp_price').style.display = '';
		}
	}


  
  jQuery.noConflict();  
  jQuery(document).ready(function() {
	  jQuery("#tabs").tabs();
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

	<form action="index.php" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
	<fieldset class="adminform">
	<legend>Add and Edit Product</legend>
	
	<div id="tabs">
	    <ul>
	        <li><a href="#tab-1"><span>General</span></a></li>
	        <li><a href="#tab-3"><span>Picture</span></a></li>
	    </ul>
	    <div id="tab-1">
	<table class="admintable">
	<tr>
		<td width="100" align="right" class="key">
			Name:
		</td>
		<td>
			<input class="text_area" type="text" name="name" id="name" size="50" maxlength="250" value="<?php echo $this->product->name;?>" />
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">
			Category:
		</td>
		<td>
		<?php
			echo $this->lists['category'];
		?>
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">Manufacturer:	</td>
		<td><?php echo $this->lists['manufacturer'];?></td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">Giá :</td>
		<td>
			<input class="text_area" type="text" name="saleprice" id="saleprice" size="50" maxlength="250" value="<?php echo $this->product->saleprice;?>" />			
		</td>
	</tr>
	
	<tr>
		<td width="100" align="right" class="key">Khuyến mãi:</td>
		<td><?php echo $this->lists['lowprice'];?></td>
	</tr>
	<?php if($this->product->lowprice){
		$style = '';
	}else{
		$style = 'none';
	} ?>
	
	<tr id="sp_price" style="display:<?php echo $style ?>" >
		<td width="100" align="right" class="key">Giá ghuyến mãi:</td>
		<td>
			<input class="text_area" type="text" name="spprice" id="spprice" size="50" maxlength="250" value="<?php echo $this->product->spprice;?>" />			
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
		<td width="100" align="right" class="key">Weight (g):	</td>
		<td>
			<input class="text_area" type="text" name="weight" id="weight" size="50" maxlength="250" value="<?php echo $this->product->weight;?>" />			
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">Enclosure Material:	</td>
		<td>
			<input class="text_area" type="text" name="material" id="material" size="50" maxlength="250" value="<?php echo $this->product->material;?>" />			
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">Impedance (ohms):	</td>
		<td>
			<input class="text_area" type="text" name="impedance" id="impedance" size="50" maxlength="250" value="<?php echo $this->product->impedance;?>" />			
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">Frequency Respones (Hz):	</td>
		<td>
			<input class="text_area" type="text" name="frequency" id="frequency" size="50" maxlength="250" value="<?php echo $this->product->frequency;?>" />			
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">Connector:	</td>
		<td>
			<input class="text_area" type="text" name="connector" id="connector" size="50" maxlength="250" value="<?php echo $this->product->connector;?>" />			
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">Driver Type:	</td>
		<td>
			<input class="text_area" type="text" name="driver" id="driver" size="50" maxlength="250" value="<?php echo $this->product->driver;?>" />			
		</td>
	</tr>
	<tr>
		<td width="100" align="right" class="key">Isolation (dB):	</td>
		<td>
			<input class="text_area" type="text" name="isolation" id="isolation" size="50" maxlength="250" value="<?php echo $this->product->isolation;?>" />			
		</td>
	</tr>

<tr>
		<td width="100" align="right" class="key">Cable Length (cm):	</td>
		<td>
			<input class="text_area" type="text" name="cable" id="cable" size="50" maxlength="250" value="<?php echo $this->product->cable;?>" />			
		</td>
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
		<td width="100" align="right" class="key">Published:</td>
		<td><?php	echo $this->lists['published'];	?></td>
	</tr>
	</table>
	    </div>
	    <!-- ket thuc tab 1 -->

	    <div id="tab-3">
	    	    <?php 
	    	    	echo $this->loadTemplate('picture');
	    	    ?>
	    </div>
	
	</div>
	
	

	</fieldset>
		<input type="hidden" name="date" value="<?php echo $this->product->date; ?>" />
		<input type="hidden" name="id" value="<?php echo $this->product->id; ?>" />
		<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" id="imgId" name="imgId" value="" />
		<input type="hidden" id="imgName" name="imgName" value="" />
		<input type="hidden" name="task" value="" />
	</form>