<?php


// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin');

/**
 * products For Joomla SEF Plugin
 *
 * @package 		products
 * @subpackage	System
 */
class plgSystemProductsSef extends JPlugin
{
	/**
	 * Constructor
	 *
	 * For php4 compatability we must not use the __constructor as a constructor for plugins
	 * because func_get_args ( void ) returns a copy of all passed arguments NOT references.
	 * This causes problems with cross-referencing necessary for the observer design pattern.
	 *
	 * @param	object		$subject The object to observe
	 * @param 	array  		$config  An array that holds the plugin configuration
	 * @since	1.0
	 */
	function plgSystemProductsSef(&$subject, $config)  {
		parent::__construct($subject, $config);
	}

	function onAfterInitialise(){
		$app =& JFactory::getApplication();
		if($app->getName() != 'site') {
			return true;
		}
		$uir=$_SERVER['REQUEST_URI'];
		if(strpos($uir,'/products/')!==false&&strpos($uir,'/component/products/')===false){
			$_SERVER['REQUEST_URI']=str_replace('/products/','/component/products/',$uir);
			$this->prehandle($uir);

		}else if(strpos($uir,'products/')===0){
			$_SERVER['REQUEST_URI']=str_replace('products/','component/products/',$uir);
			$this->prehandle($uir);
		}
		return true;
	}

	function prehandle($uir){
		$lastSplash=strrpos($uir,'/');
		$products=substr($uir,$lastSplash+1);
		if(strpos($products,'.')){
			$products=substr($products,0,strrpos($products,'.'));
		}
		JRequest::setVar('products',$products);
	}

	/**
	 * Converting the site URL to fit to the HTTP request
	 */
	function onAfterRender()
	{
		$app =& JFactory::getApplication();

		if($app->getName() != 'site') {
			return true;
		}
		$buffer = JResponse::getBody();
		$regex  = '#component/products/#m';
		$buffer=preg_replace($regex,'products/',$buffer);
		JResponse::setBody($buffer);
		return true;
	}


}
