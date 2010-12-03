<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Com WUser
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    model index.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_wuser'.DS.'tables');	

class ModelWUserIndex extends JModel
{
	function __construct()
	{
		parent::__construct();
	}
	function getUserInfo()
	{
		$user =& JFactory::getUser();
		if (!$user->guest) {
			$userid = $user->id;		  
			$db =& JFactory::getDBO();						
			$query = "SELECT * FROM #__w_users WHERE userid = $userid ";			
			$db->setQuery( $query );				
			$row = $db->loadObject();
		}
		return $row;	
	}
	

	function update()
	{
		$row = JTable::getInstance('user', 'Table');
		if (!$row->bind(JRequest::get('post'))){
			echo "<script> alert('". $row->getError() ."');
				window.history.go(-1); \n";
			exit();
		}
		
		if (!$row->store()) {
			echo "<script> alert('".$row->getError()."');
			window.history.go(-1);
			</script>\n";
			exit();
		}
	}
	
	function changePass()
	{
		$user =& JFactory::getUser(); 
		if (!$user->guest) {			
			// Bind the form fields to the user table
			if (!$user->bind(JRequest::get('post'))) {
				$this->setError($this->_db->getErrorMsg());
				return false;
			}
			$user->password = 'test';
			// Store the web link table to the database
			if (!$user->save()) {
				$this->setError( $user->getError() );
				return false;
			}
		}	
	}
}
?>
