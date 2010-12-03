<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package		Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    view by category.
*/
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
jimport('joomla.html.pagination');
class ProductViewFrontpage extends JView
{
	function display($tpl = null)
	{
		global $option, $mainframe;
		
		// config 
		//$params =& $mainframe->getPageParameters('com_products');
		
		$limit = 12;

		
		$model = &$this->getModel();
		
	
	}
	
	function checkImage($proid){
		$model = &$this->getModel();
		$imgDefault = $model->getImageDefault($proid);
		return $imgDefault->filename;
	}
	
}
?>