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
  
  <script type="text/javascript">
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


<?php 
/*
// Define arrays filled with test data; would normally come from your database
$cars = array('Ferrari', 'Bugatti', 'Porsche');
$babes = array('Megan Fox', 'Alyssa Milano', 'Doutzen Kroes');
// Create an empty array to be filled with options
$options = array();
// Create the initial option
$options[] = JHTML :: _('select.option', '', '- What do you like most -');
// Open our 'Cars' optgroup
$options[] = JHTML::_('select.optgroup', 'Cars');
// Loop through the 'Cars' data
foreach($cars as $key => $text) {
 // Create each option tag within this optgroup
 $options[] = JHTML::_('select.option', $key, $text);
}
// Use the hack below to close the optgroup
$options[] = JHTML::_('select.option', '');
// Now open our 'Babes' optgroup
$options[] = JHTML::_('select.optgroup', 'Babes');
// Loop through the 'Babes' data this time
foreach($babes as $key => $text) {
 // Create each option tag within this optgroup
 $options[] = JHTML::_('select.option', $key, $text);
}
// Use the hack below to close this last optgroup
$options[] = JHTML::_('select.option', '');
// Generate the select element with our parameters
$select = JHTML::_(
 'select.genericlist', // Because we are creating a 'select' element
 $options,             // The options we created above
 'select_name',        // The name your select element should have in your HTML 
 'size="1" ',          // Extra parameters to add to your element
 'value',              // The name of the object variable for the option value
 'text',               // The name of the object variable for the option text
 'selected_key',       // The key that is selected (accepts an array or a string)
 false                 // Translate the option results?
);
 

echo "<pre>";
			print_r($options);
			echo "</pre>";

// Display our select box
echo $select;

*/
?>

	<form action="index.php" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">

	
	<div id="tabs">
	    <ul>
	        <li><a href="#tab-1"><span>Thông tin sản phẩm</span></a></li>
	        <li><a href="#tab-3"><span>Hình ảnh</span></a></li>
	    </ul>
	    <div id="tab-1">
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
	<!--
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
	
	-->
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
	    </div>
	    <!-- ket thuc tab 1 -->

	    <div id="tab-3">
	    	    <?php 
	    	    	echo $this->loadTemplate('picture');
	    	    ?>
	    </div>
	
	</div>
	
	
		<input type="hidden" name="date" value="<?php echo $this->product->date; ?>" />
		<input type="hidden" name="id" value="<?php echo $this->product->id; ?>" />
		<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" id="imgId" name="imgId" value="" />
		<input type="hidden" id="imgName" name="imgName" value="" />
		<input type="hidden" name="task" value="" />
	</form>