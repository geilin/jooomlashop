<?php
/**
* @version		$Id: newsfeed.php 10381 2008-06-01 03:35:53Z pasamio $
* @package		Joomla
* @subpackage	Newsfeeds
* @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

/**
* @package		Joomla
* @subpackage	Newsfeeds
*/
class TableProperty extends JTable
{
	/** @var int Primary key */
	var $id					= null;
	/** @var string */
	var $label				= null;
	/** @var string */
	var $datatype			= null;
	/** @var int */
	var $ordering			= null;
	/** @var int */
	var $published			= null;
	/** @var time */
	var $created		= 0;

	/**
	 * @param database A database connector object
	 */
	function __construct( &$db ) {
		parent::__construct( '#__w_property', 'id', $db );
	}

	/**
	 * Overloaded check function
	 *
	 * @access public
	 * @return boolean
	 * @see JTable::check
	 * @since 1.5
	 */
	function check()
	{
	  $db =& JFactory::getDBO();
	  if($this->id){
	    // get old ree_create_date value to update again
	    $sqlOV = "SELECT created FROM #__w_property WHERE id=". (int)$this->id;
	    $db->setQuery( $sqlOV );
  		$dataOV = $db->loadObjectList();
    	if (isset( $dataOV[0]->created )){
        $this->created = $dataOV[0]->created;
      }
    }else{
      $this->created = date("Y-m-d H:i:s");
    }

    // check for valid name
		if(trim($this->label) == '') {
			$this->setError(JText::_( 'DETAIL_PROPERTY_CHECK_ERROR' ));
			return false;
		}
		
		// check existing data
    $sqlCE = "SELECT id FROM #__w_property WHERE label='". $this->label . "'";
    if($this->id) $sqlCE .= "AND id<>". (int)$this->id;
    $db->setQuery( $sqlCE );
		$dataCE = $db->loadObjectList();
  	if (isset( $dataCE[0]->id )){
      $this->setError(JText::_( 'EXISTING_PROPERTY_CHECK_ERROR' ));
			return false;
    }
		
		
	  return true;
	}
	
	function int_property(){
    $vReturn = array('field_name'=>'prp_');
    return $vReturn;
  }
}
