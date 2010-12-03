<?php
/** $Id: default_form.php 11328 2008-12-12 19:22:41Z kdevine $ */
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<div class="warp_left_form">

<form action="<?php echo JRoute::_( 'index.php' );?>" method="post"
	name="emailForm" id="emailForm" class="form-validate"><?php
	// ERROR
	if(isset($this->error)) : ?>
<p style="color: red; padding: 5px;"><?php echo $this->error; ?></p>
<?php endif; ?> <label><?php echo JText::_( 'Enter your name' );?>:</label><br />
<input type="text" id="contact_name" name="name" class="input_text"
	style="width: 185px;" />
<div class="h_10"></div>

<label><?php echo JText::_( 'Email address' );?>:</label><br />
<input type="text" id="contact_email" name="email"
	class="input_text required validate-email" style="width: 185px;" />
<!-- 
<div class="h_10"></div>
<label><?php echo JText::_( 'ADDRESS' );?>:</label><br />
<input type="text" id="contact_address" name="address"
	class="input_text" style="width: 185px;" />

<div class="h_10"></div>
<label><?php echo JText::_( 'PHONE' );?>:</label><br />
<input type="text" id="contact_phone" name="phone" class="input_text"
	style="width: 185px;" />
 -->
<div class="h_10"></div>
<label><?php echo JText::_( 'Message subject' );?>:</label><br />
<input type="text" id="contact_subject" name="subject"
	class="input_text required" style="width: 185px;" />

<div class="h_10"></div>
<label><?php echo JText::_( 'Enter your message' );?>:</label><br />
<textarea style="width: 320px" name="text" id="contact_text"
	class="required" cols="45" rows="10"></textarea> <input type="hidden"
	name="option" value="com_contact" /> <input type="hidden" name="view"
	value="contact" /> <input type="hidden" name="id"
	value="<?php echo $this->contact->id; ?>" /> <input type="hidden"
	name="task" value="submit" /> <?php echo JHTML::_( 'form.token' ); ?>
<div class="h_10"></div>
<div class="contact_bt_wrap">
<p class="send_btn"><input type="submit" name="btnsend"
	value="<?php echo JText::_('Send'); ?>" class="send_bt margin_right_10" />
<input type="reset" class="reset_bt"
	value="<?php echo JText::_('RESET_BT'); ?>" name="btnreset"></p>
</div>
</form>
</div>
