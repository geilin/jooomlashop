<?php 
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    tpl raw cart.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
?>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" src="<?php echo JURI::base(); ?>components/com_products/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo JURI::base(); ?>templates/wp_hangdientu/js/checkform.js"></script>
		<script type="text/javascript" src="<?php echo JURI::base(); ?>components/com_products/js/vietuni.js"></script>
		<style>
		label {
			display: block;
		}
		</style>
	    <script type="text/javascript">
		  $(function() {
			$('#submit').click(function() {
				var name = $('#tell_name').val();
				var email = $('#tell_email').val();
				var emailfriend = $('#tell_emailfriend').val();
				var content = $('#tell_content').val();
			$('#container').empty();
			$('#container').append('<img src="loading.gif" alt="Currently Loading" id="loading" />');
			

				
				$.ajax({
					url: 'index.php',
					type: 'POST',
					data: 'option=products&task=send&name=' + name + '&emailfriend=' + emailfriend +'&email=' + email + '&content=' + content,
					
					success: function(result) {
						$('#response').remove();
						$('#container').append('<p id="response">' + result + '</p>');
						$('#loading').fadeOut(500, function() {
							$(this).remove();
						});
						
					}
				});
				
				return false;
			});
			
		  });
		</script>

  </head>
  <body>
	<form method="post" action="index.php" onsubmit="return checkTellAFriend(this);">
   
   <div id="container">
	<p>
        <label for="tell_name">Tên của bạn</label>
		<input type="text" name="tell_name" onkeyup="javascript:initTyper(this);" id="tell_name" />
	</p>
	<p>
        <label for="tell_email">Email của bạn</label>
		<input type="text" name="tell_email" id="tell_email" onkeyup="javascript:initTyper(this);" />	
	</p>
	<p>
		<label for="tell_emailfriend">Email giới thiệu</label>
		<input type="text" name="tell_emailfriend" id="tell_emailfriend" onkeyup="javascript:initTyper(this);" />		
	</p>
	<p>
		<label for="tell_content">Nội dung</label>
		<textarea rows="5" cols="35" name="tell_content" id="tell_content" onkeyup="javascript:initTyper(this);"></textarea>
	</p>
		<br />
			Kiểu gõ:
			<input type="radio" checked="" value="0" onfocus="setTypingMode(0);" name="optInput"/>
			Off
			<input type="radio" onfocus="setTypingMode(1);" value="1" name="optInput"/>
			Telex
			<input type="radio" value="2" onfocus="setTypingMode(2);" name="optInput"/>
			VNI
			<input type="radio" onfocus="setTypingMode(3);" value="3" name="optInput"/>
			VIQR   
			<br/>
		<input type="hidden" name="option" id="option" value="com_products" />
		<input type="hidden" name="task" id="task" value="send" />
		<input type="submit" name="submit" id="submit" value="Gởi đi" />
    
	</div>
	</form>
  </body>
</html>

