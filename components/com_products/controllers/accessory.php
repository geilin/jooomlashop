<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package		Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    controller accessory.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.controller' );

class ProductControllerAccessory extends ProductController
{
	function display()
	{
		$viewName = JRequest::getVar('view', 'accessory');
		$layout = JRequest::getVar('layout', 'default');
		$view = &$this->getView($viewName, 'html');
		$model =& $this->getModel( $viewName, 'ModelProduct' );

		if (!JError::isError( $model )) {
			$view->setModel( $model, true );
		}

		if ($viewName == 'search'){
			$layout = 'default';
		}

		$view->setLayout($layout);
		// Display the view
		if (true) {
			global $option;
			$cache =& JFactory::getCache($option, 'view');
			$cache->get($view, 'display');
		} else {
			$view->display();
		}
	}


}

// end file