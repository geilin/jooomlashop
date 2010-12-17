<?php

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class modSiteStatisticHelper {

	function getTotalOnline( $duration=900 ) {
		$db		  =& JFactory::getDBO();
		$now		=	mktime();
		$duration	=	(int) $duration;
		$time		=	$now-$duration;		
		

		$query = "SELECT COUNT(guest) AS total".
					" FROM #__session" .
					" WHERE client_id = 0" . 
					" AND time > $time";
        return $db->GetOne($query);        
		
	}
	
	function getTotalVisited() {
		$db		  =& JFactory::getDBO();
		$query = 'SELECT `site_counter` AS total' .
					' FROM #__site_statistic';
        return $db->GetOne($query);        
		
	}
	
	function addVisitor() {
		$db		  =& JFactory::getDBO();
		$query = 'UPDATE #__site_statistic' .
				 ' SET `site_counter`=(`site_counter`+1)';
				 
		$db->setQuery( $query );
		if(!$db->query()) {
			JError::raiseError( 500, $db->stderror());
		}       
		
	}	
	
}