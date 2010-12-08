<?php
/**
 * @version		$Id: modules.php 14401 2010-01-26 14:10:00Z louis $
 * @package		Joomla
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

/**
 * render module
 * @param object $module
 * @param type $params
 * @param type $attribs 
 */
function modChrome_missishop($module, &$params, &$attribs)
{ ?>		
    <div class="nissi_module module<?php echo $params->get('moduleclass_sfx'); ?>" id="module_<?php echo $module->id; ?>">
        <div class="module_header">
            <?php if ($module->showtitle != 0) : ?>
            <h3 class="module_title"><span><?php echo $module->title; ?></span></h3>
            <?php endif; ?>
        </div>
        <div class="module_content">
            <?php echo $module->content; ?>
        </div>
        <div class="module_footer"><span></span></div>
    </div>       
	<?php
}

