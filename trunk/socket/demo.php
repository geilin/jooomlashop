<html>
<head>
</head>
<body>
<?php
$submit = isset($_POST['submit']);
// form not yet submitted
if (!$submit)
{
?>
<form action="<?php  echo $_SERVER['PHP_SELF'] ; ?>" method="post">
Enter some text:<br>
<input type="Text" name="message" size="15"><input type="submit"
name="submit" value="Send">
</form>
<?php
}
else
{
// form submitted
// where is the socket server?
$host="10.254.54.27";
$port = 1234;
// create socket
$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create
socket\n");
// connect to server
$result = socket_connect($socket, $host, $port) or die("Could not connect
to server\n");
socket_read ($socket, 1024) or die("Could not read server response\n");
// send string to server
socket_write($socket, $_POST['message'], strlen($_POST['message'])) or die("Could not send
data to server\n");
// get server response
$result = socket_read ($socket, 1024) or die("Could not read server
response\n");
// end session
socket_write($socket, "END", 3) or die("Could not end session\n");
// close socket
socket_close($socket);
// clean up result
$result = trim($result);
$result = substr($result, 0, strlen($result)-1);
// print result to browser
?>
Server said: <b><? echo $result; ?></b>
<?
}
?>
</body>
</html>