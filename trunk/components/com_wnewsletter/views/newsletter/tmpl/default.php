<?php 
/**
* @version		1.0
* @package		Component Newsletter
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    com newsletter.
*/
defined( '_JEXEC' ) or die( 'Restricted access' ); 
	
echo '<div class="componentheading">Đăng Ký NewsLetter</div>';
?>
<script type="text/javascript" src="components/com_wnewsletter/livevali.js"></script>

<form action="index.php" method="post" name="subscriber">
<table>
<tr><td>
	<strong>Họ và Tên:</strong></td> <td><input class="text_area"
type="text" name="name" id="name" value="" />
			<script type="text/javascript">
		        var name = new LiveValidation('name');
				name.add(Validate.Presence);
		    </script>  
</td></tr>
<tr><td>
	<strong>Email:</strong></td> <td><input class="text_area"
type="text" name="email" id="email" value="" />
			<script type="text/javascript">
		        var email = new LiveValidation('email');
				email.add( Validate.Presence );
				email.add( Validate.Email );
		    </script> 
</td></tr>
<tr>
<td></td>
	<td>		
	<input type="hidden" name="productid" value="<?php echo $this->id; ?>" />	
	<input type="hidden" name="task" value="subscriber" />
	<input type="hidden" name="option" value="<?php echo $option; ?>" />
	<input type="submit" class="button" id="button" value="Save" />
	</td>
</tr>
</table>

</form>