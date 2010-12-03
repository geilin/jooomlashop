<?php
/**
 * $Id: default.php  $
 */
defined( '_JEXEC' ) or die( 'Restricted access' );

$cparams = JComponentHelper::getParams ('com_media');
?>
 <div class="block-page-content">



<h1 class="title_page_sub head_com"><?php echo $this->params->get( 'page_title' ); ?></h1>
<div class="block_left_ct">
<div class="contact_bg"><?php if ( $this->contact->con_position && $this->contact->params->get( 'show_position' ) ) : ?>
<!-- NAME CONTACT -->
	<h2 class="margin_left_contact"><?php echo $this->escape($this->contact->con_position); ?></h2>
<!-- END: NAME CONTACT --> <?php endif; ?> <?php
// LOAD FORM HERE
if ( $this->contact->params->get('show_email_form')&& ($this->contact->email_to || $this->contact->user_id))
	echo $this->loadTemplate('form');

// LOAD ADDRESS LAYOUT
	echo $this->loadTemplate('address');
?>
<div class="clearfix"></div>
</div>
</div>



</div>

