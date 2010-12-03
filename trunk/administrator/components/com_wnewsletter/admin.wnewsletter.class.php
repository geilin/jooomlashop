<?php
/**
* @version		1.0
* @package		Component Administrator wNewsletter
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    com wNewsletter class. 
*/

class SendMail{

	function send(){
		global $mainframe;
		$db 		=& JFactory::getDBO();
		$user		=& JFactory::getUser();
		$acl 		=& JFactory::getACL();
		
		//get thong tin mail		
		$start          	= JRequest::getInt( 'start', 0 );
		$option             = JRequest::getVar( 'option', 'com_enewsletter' );		
		$id  		        = JRequest::getVar( 'id', '' );
		$subscriber			= JRequest::getVar( 'subscriber', 0);
		$group				= JRequest::getVar( 'mm_group', '0', 'post', 'int' );
		$sender 	        = JRequest::getVar( 'sender', null );				
		$subject			= JRequest::getVar( 'subject', null );
		$header				= JRequest::getVar( 'header', null );
		$html_message		= JRequest::getVar( 'html_message', '', 'post', 'string', JREQUEST_ALLOWRAW );
		$message			= JRequest::getVar( 'message', null );
		$limit 				= JRequest::getInt( 'limit', 1 );
		
		if ($limit == 0) { $limit = 1; }
		if (!empty($header)){
				$senderArray = array ($sender, $header);
			} else {
				$senderArray = $sender;
			}
		// tao thong tin mail
		if (!empty($html_message)){			
			$body_message = '';
			$body_message = stripslashes($html_message);
		} else {
			$body_message = $message;
		}
		

		//send mail
		// Create the PHPMailer Object		
		$send =& JFactory::getMailer();
		$send->setSender($senderArray);
		$send->setSubject($subject);
		$send->setBody($body_message);
		$send->IsHTML(true);  //send mail HTML
		$i = 0;
		$error = 0;		
		$sented = 0;
				//get list mail
		if ($subscriber){			
			$query = "SELECT name,email FROM #__w_newsletter_subscribers WHERE confirmed = '1' LIMIT 0,$limit";
			$db->setQuery($query);
			$rows = $db->loadObjectList();				
			foreach ($rows as $row) {	
				$send->ClearAddresses();
				$send->AddAddress( $row->email, $row->name );
				if( $send->Send()) {
					$i++;
					$sented ++;
				}
				else {
					$i++; // Added to prevent double mailings when errors occur
					$errors++;
				}		
			}
		}
		
		if ($group){
			// get users in the group out of the acl
			$to = $acl->get_group_objects( $group, 'ARO', 'RECURSE' );
			JArrayHelper::toInteger($to['users']);
			// Get all users email and group except for senders
			$query = 'SELECT email'
			. ' FROM #__users'
			. ' WHERE id != '.(int) $user->get('id')
			. ( $group !== 0 ? ' AND id IN (' . implode( ',', $to['users'] ) . ')' : '' )
			;
			$db->setQuery( $query );
			$rows = $db->loadObjectList();
			foreach ($rows as $row) {	
				$send->ClearAddresses();
				$send->AddAddress( $row->email);

				if( $send->Send()) {
					$i++;
					$sented ++;
				}
				else {
					$i++; // Added to prevent double mailings when errors occur
					$errors++;
				}		
			}			
		}
		
		$msg = '';
		if( $errors > 0) {
			$msg = $send->ErrorInfo.' =&gt; '.$errors.' Errors';
		} else {
			$msg = 'So mail da send : '. $sented;
		}
		
		// update hits
		$date = date( 'Y-m-d H:m:s' );
		$db->setQuery( "UPDATE `#__w_newsletter` SET hits= hits + $sented  WHERE id=".$id);		
		if ($db->query()){
			echo "<script> alert('". $db->getErrorMsg() ."');
				window.history.go(-1); \n </script>";			
		}
		$db->setQuery( "UPDATE `#__w_newsletter` SET send = '$date'  WHERE id=".$id);
		if ($db->query()){
			echo "<script> alert('". $db->getErrorMsg() ."');
				window.history.go(-1); \n </script>";			
		}
		$mainframe->redirect( $_SERVER['PHP_SELF']."?option=$option", $msg );		
	}
}
?>