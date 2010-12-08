<?php
/*
	Raymond Fain
	Used for PHP5 Sockets with Flash 8 Tutorial for Kirupa.com
	For any questions or concerns, email me at ray@obi-graphics.com
	or simply visit the site, www.php.net, to see if you can find an answer.
*/


// E_ALL is a named constant (bit of 2047)
// error_reporting(E_ALL) ensures any errors will be displayed
error_reporting(E_ALL);

// set_time_limit() is set to 0 to impose no time limit
set_time_limit(0);

// ob_implicit_flush() will push the whole message to flash (including any extra markups like terminating zeros)
ob_implicit_flush();

// address set to internal port for the socket to bind to and port set to something above 1024 so flash will connect
$address = '10.254.54.27';
$port = 9999;

//---- Function to Send out Messages to Everyone Connected ----------------------------------------
// $allclient is an array of resource id's that php will refer to for the sockets
// $socket contains the resource id for the flash client who sent the message
// $buf is just the message they sent, we are sending to everyone using a foreach loop
function send_Message($allclient, $socket, $buf) {
   foreach($allclient as $client) {
   		
		// socket_write uses the $client resource id (which calls on the socket) and sends it our message (which is the second flag)
       socket_write($client, "$socket wrote: $buf");
   }
}



//---- Start Socket creation for PHP 5 Socket Server -------------------------------------

// socket_create function is pretty simple, depending on what you want it to do, you can just rig it for that,
// AF_INET is a "kind of" default address/protocol family that I have used,
// then socket_create takes and uses SOCK_STREAM, another default available socket type, 
// and uses a SOL_TCP protocol to have a guaranteed data sending. 
if (($master = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) < 0) {
   echo "socket_create() failed, reason: " . socket_strerror($master) . "\n";
}

// this little beauty is hard to understand, but very useful to our kind of chat
// we want to be able to reuse our sockets, so we set our $master socket with a level at SOL_SOCKET, 
// with it reusable (SO_REUSEADDR), and a "1" in the mixed optval spot to make it true.
socket_set_option($master, SOL_SOCKET,SO_REUSEADDR, 1);

// now we need to bind our socket to the address and port specified.
if (($ret = socket_bind($master, $address, $port)) < 0) {
   echo "socket_bind() failed, reason: " . socket_strerror($ret) . "\n";
}

// to allow our socket server to listen for incoming calls made by our flash client, we need
// to use socket_listen on our $master socket. The next flag indicates that only 5 calls at a time.
// any others will be refused until there is sufficient room to process a new call.
if (($ret = socket_listen($master, 5)) < 0) {
   echo "socket_listen() failed, reason: " . socket_strerror($ret) . "\n";
}


// this will allow an easy way to keep track of sockets connected to our server
$read_sockets = array($master);

//---- Create Persistent Loop to continuously handle incoming socket messages ---------------------
while (true) {
   $changed_sockets = $read_sockets;
   
   // socket_select is used here to see if there were any changes with the sockets that were connected before
   // $num_changed_sockets is here so you can check to see if the change is true or not with a subsequent function
   $num_changed_sockets = socket_select($changed_sockets, $write = NULL, $except = NULL, NULL);
   
   // we run a foreach function on $changed_sockets to see whether it needs to be added (if new), determine the message it sent
   // or determine if there was a socket disconnect
   foreach($changed_sockets as $socket) {
   		
		// now if the $socket currently being checked is the $master socket, we need to run some checks
		// if not then we will skip down to else and check the messages that were sent
       if ($socket == $master) {
	   		
			// socket_accept will accept any incoming connections on $master, and if true, it will return a resource id
			// which we have set to $client. If this did not work then return an error, but if it worked, then add in 
			// $client to our $read_sockets array at the end.
           if (($client = socket_accept($master)) < 0) {
               echo "socket_accept() failed: reason: " . socket_strerror($msgsock) . "\n";
               continue;
           } else {
               array_push($read_sockets, $client);
           }
       } else {
	   
	   		// socket_recv just receives data from $socket as $buffer, with an integer length of 2048, and a mystery flag set to 0
			// that mystery flag has no real documentation so setting it to 0 will solve it as others have done.
			// we've also set it as a var $bytes in case we need to ensure data sending with socket_write, which is optional
           $bytes = socket_recv($socket, $buffer, 2048, 0);
		   
		   // if the $bytes we have is 0, then it is a disconnect message from the socket
		   // we will just search for it as an index and unset that socket from our $read_sockets and
		   // finish up with using socket_close to ensure it is closed off
           if ($bytes == 0) {
               $index = array_search($socket, $read_sockets);
               unset($read_sockets[$index]);
               socket_close($socket);
           }else{
		        
				// we need to make sure $read_sockets isn't messed with, so setting up a new variable called $allclients
				// will ensure this. We then shift the array so that our $master socket is not included to the count when
				// we send our data to all the other sockets in $allclients.
		  		$allclients = $read_sockets;
           		array_shift($allclients);
				
				// just a simple call on our premade function 'send_Message' with $allclients, $socket (current one), and $buffer (the message)
           		send_Message($allclients, $socket, $buffer);
			}
       }
      
   }
}
