<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package		Module Product Search
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    tpl.
* <script type="text/javascript">
jQuery(function() { 
	if (jQuery('#keyword.searchtext').val()=='') {
		jQuery('#modsearch_bt').attr('disabled', 'disabled');
	}
	jQuery('#keyword.searchtext').keypress(function() {
		if (jQuery(this).val()!='') {
			jQuery('#modsearch_bt').attr('disabled', '').css('cursor','pointer');
		} else {
			jQuery('#modsearch_bt').attr('disabled', 'disabled').css('cursor','default');
		}
	});
});
</script>
*/
defined('_JEXEC') or die('Restricted access');
global $option;

?>
<h3>Bibishop</h3>
<form name="search" action="<?php echo JRoute::_('index.php');?>" method="get" class="search-form"/>
	<input type="hidden" name="option" value="com_products" />
	<input type="hidden" name="view" value="search" />
	<input id="keyword" class="search-tb" type="text" name="keyword" value="<?php echo JRequest::getVar('keyword', ''); ?>" />
	<input  type="submit"  class="search-button" value="Tìm"/>
</form>