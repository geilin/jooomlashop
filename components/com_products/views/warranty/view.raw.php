<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package		Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    view warranty.
*/
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
class ProductViewWarranty extends JView
{
	function display($tpl = null)
	{
		$imei = JRequest::getVar('imei', 0);
		$pin = JRequest::getVar('pin', 0);
		
		$model = &$this->getModel();
		$warranty = $model->getWarranty($imei, $pin);			
		if ($warranty) {
			$warranty->date = JHTML::_('date',  $warranty->date, '%d-%m-%Y' );
			$warranty->expired = JHTML::_('date',  $warranty->expired, '%d-%m-%Y' );
			
			$todays_date = date("Y-m-d"); 
			$today = strtotime($todays_date); 
			$expiration_date = strtotime($warranty->expired); 
			if ($expiration_date < $today) { 
				$warranty->expired = 'Hết hạn bảo hành';
			}
			echo json_encode($warranty);	
		} else {
			echo 0;
		}
	}
}
?>