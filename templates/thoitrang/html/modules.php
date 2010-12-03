<?php
/*------------------WAMP Co., Ltd-----------------*/
/*     Kien Thuc Kinh Te - kienthuckinhte.com     */
/*     MAIN CSS - WAMP Developed                  */
/*     Email: minhnguyen@wampvn.com               */
/*------------------------------------------------*/

// no direct access
defined('_JEXEC') or die('Restricted access');

/**
 * This is a file to add template specific chrome to module rendering.  To use it you would
 * set the style attribute for the given module(s) include in your template to use the style
 * for each given modChrome function.
 *
 * eg.  To render a module mod_test in the sliders style, you would use the following include:
 * <jdoc:include type="module" name="test" style="slider" />
 *
 * This gives template designers ultimate control over how modules are rendered.
 *
 * NOTICE: All chrome wrapping methods should be named: modChrome_{STYLE} and take the same
 * two arguments.
 */


/*
 * Module chrome that allows for rounded corners by wrapping in nested div tags
 */
function modChrome_leftmod($module, &$params, &$attribs)
{
	if ($module->content) {
		if ($params->get('moduleclass_sfx')=='modbanner'){
			?>
<div class="bonus_img"><?php echo $module->content; ?></div>
			<?php } else {?>
<div
	class="left_mod_dltn <?php echo $params->get('moduleclass_sfx'); ?>">
<div class="left_mod">
<h2 class="title_left_mod"><?php echo $module->title; ?></h2>
<div class="post_dltn"><?php  echo $module->content; ?></div>
</div>
</div>
			<?php
			} /// END IF $params->get('moduleclass_sfx')=='modbanner'
	} /// END IF $module->content
}

function modChrome_wpthongke($module, &$params, &$attribs)
{
	if ($module->content) {
		?>
<fieldset class="fieldset"><legend><?php echo $module->title; ?></legend>
<div class="wp_mod_right_ct_wrapper"><?php echo $module->content; ?></div>
</fieldset>
		<?php

	} /// END IF $module->content
}

function modChrome_wpsearch($module, &$params, &$attribs)
{
	if ($module->content) {
		?>
<div class="wpsearch">
<h3 class="title_mod"><?php echo $module->title; ?></h3>
		<?php echo $module->content; ?></div>
		<?php

	} /// END IF $module->content
}

function modChrome_rightmod($module, &$params, &$attribs)
{
	if ($module->content) {
		if ($params->get('moduleclass_sfx')=='raw'){
			?>
<div class="raw"><?php echo $module->content; ?></div>
			<?php } else { ?>
<div class="right_mod <?php echo $params->get('moduleclass_sfx'); ?>">
<h2 class="title_right_mod"><?php echo $module->title; ?></h2>
<div class="right_mod_content"><?php echo $module->content; ?></div>
</div>
			<?php
			} /// END IF $params->get('moduleclass_sfx')=='modbanner'
	} /// END IF $module->content
}
