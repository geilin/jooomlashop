<?php
/**
 * @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<jdoc:include type="head" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/offline.css" type="text/css" />
	<?php if($this->direction == 'rtl') : ?>
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/offline_rtl.css" type="text/css" />
	<?php endif; ?>
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
</head>
<body>
<jdoc:include type="message" />
<div align="center">
	<img src="images/we-will-be-back-soon.jpg" alt="we will come back soon" />
</div>

	<div class="bb_form">
	<?php if(JPluginHelper::isEnabled('authentication', 'openid')) : ?>
		<?php JHTML::_('script', 'openid.js'); ?>
	<?php endif; ?>
	<form action="index.php" method="post" name="login" id="form-login">
	<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td><label for="username"><?php echo JText::_('Username') ?></label></td>
			<td><label for="passwd"><?php echo JText::_('Password') ?></label></td>
			<td></td>
		</tr>
		<tr>
			<td>
				<input name="username" id="username" type="text" class="inputbox" alt="<?php echo JText::_('Username') ?>" size="18" />
			</td>
			<td>
				<input type="password" name="passwd" class="inputbox" size="18" alt="<?php echo JText::_('Password') ?>" id="passwd" />
			</td>
			<td>
				<input type="submit" name="Submit" class="button sign_bt" value="" />
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<input style="float:left; padding:0; margin:6px 10px 2px 0;" type="checkbox" name="remember" class="inputbox" value="yes" alt="<?php echo JText::_('Remember me') ?>" id="remember" />
				<label for="remember">Lưu lại thông tin</label>
			</td>
		</tr>
	</table>
	<input type="hidden" name="option" value="com_user" />
	<input type="hidden" name="task" value="login" />
	<input type="hidden" name="return" value="<?php echo base64_encode(JURI::base()) ?>" />
	<?php echo JHTML::_( 'form.token' ); ?>
	</form>
	</div>

</body>
</html>