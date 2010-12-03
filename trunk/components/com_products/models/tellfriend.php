<?php

/**

* @version		1.0  - 	Joomla 1.5.x

* @package	Component Com Products

* @copyright	Wampvn Group

* @license		GNU/GPL

* @website          http://wampvn.com

* @description    model tellfriend.

*/



defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.model' );



class ModelProductTellFriend extends JModel

{

	

	function __construct()

	{

		parent::__construct();

	}

	

	function send($productid = 0)

	{		

		$name = JRequest::getVar('tell_name', '');

		$email = trim(JRequest::getString('tell_email', ''));

		$to = trim(JRequest::getString('tell_emailfriend', ''));

		$content = JRequest::getVar('tell_content', '');

		//$productid = JRequest::getVar('productid', '');



		$body = "<h4>Chào Bạn !<h4><br/><p> $name đã giới thiệu với bạn về website <a href='http://www.hangdientu.vn'>http://www.hangdientu.vn</a></p><br/>";

		$body .= "<h4>Nội dung :<h4><p> $content </p>";		

		
		
		// subject
		$subject = $name. ' giới thiệu với bạn http://www.hangdientu.vn';

		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

		// Additional headers
		$headers .= 'To: <'.$to.'>' . "\r\n";
		$headers .= 'From: '.$name.' <'.$email.'>' . "\r\n";

		// Mail it
		mail($to, $subject, $body, $headers);

	}	

}



// end file

