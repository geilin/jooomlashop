<?php 
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    tpl detail.
*/
defined( '_JEXEC' ) or die( 'Restricted access' ); 
//$path_to_js = JURI::base().'components/com_products/js/phukienslide/';
//$path_to_pk = JURI::base().'/images/accessories/';

if (count($this->properties)>0) {

//$document =& JFactory::getDocument();
//$document->addStyleSheet($path_to_js.'skin.css');
?>
<!--START PROPERTIES -->
<div class="clearfix h_10"></div>
<div class="prp_warp">
<div class="cb"></div>
<div class="properties">
<div class="property_title_mod"><span style="color:#3366CC;"><?php echo JText::_('Một số đặc tính riêng của sản phẩm');?></span></div>
<div class="h_20"></div>
<table width="100%">
	<?php foreach($this->properties as $property){?>
	<tr valign="top">
		<td class="label"><?php echo $property['label']?></td>
		<td class="value"><?php echo $property['value']?></td>
	</tr>
	<?php } ?>
</table>
</div>
<!-- END: Phu kien Slide -->
<div class="clearfix"></div>
</div>
<div class="clearfix h_15" ></div>
<?php } 
// END file ?>

