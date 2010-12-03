<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    view cart.
*/
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
jimport('joomla.html.pagination');
class ProductViewCart extends JView
{
	function display($tpl = null)
	{
		global $option, $mainframe;
		// SEO
		$doc =& JFactory::getDocument();
		$doc->setTitle('Giỏ hàng của bạn');		
		parent::display($tpl);
	}
	
	function getImage($proid){
		$model = &$this->getModel();
		$imgDefault = $model->getImageDefault($proid);
		return $imgDefault;
	}
	
}
?>