<?php
/*------------------WAMP Co., Ltd-----------------*/
/*     Kien Thuc Kinh Te - kienthuckinhte.com     */
/*     MAIN CSS - WAMP Developed                  */
/*     Email: minhnguyen@wampvn.com               */
/*------------------------------------------------*/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

function getParam ($params,$param, $default = '') {
	return $params->get($param, $default);
}
$titlePage  = (trim(getParam($this->params,'titlePage'))=='') ? JText::_('BV HOMECINEMA') : getParam($this->params,'titlePage');

// define PATH to template
$site_path     =  JURI::Base();
$tmpl_sys_path =  $site_path.'templates/system/';
$app =& JFactory::getApplication();
$tmpl_path = JURI::base() . 'templates/' . $app->getTemplate().'/';
define( 'WPPATH_TEMPL',	$tmpl_path );
// Define Explore
// Opera - Safari - IE ... if(ereg("opera", $br)) {}
$br 		   = strtolower($_SERVER['HTTP_USER_AGENT']);
?>