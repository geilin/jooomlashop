<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>


<form action="index.php" method="post"><?php
$output = '<input name="searchword" id="mod_search_searchword"  maxlength="'.$maxlength.'" alt="'.$button_text.'" class="searchtext inputbox'.$moduleclass_sfx.'" type="text" size="'.$width.'" value="'.$text.'"  onblur="if(this.value==\'\') this.value=\''.$text.'\';" onfocus="if(this.value==\''.$text.'\') this.value=\'\';" />';

if ($button) :
if ($imagebutton) :
$button = '<input type="image" value="'.$button_text.'" class="button'.$moduleclass_sfx.'" src="'.$img.'" onclick="this.form.searchword.focus();"/>';
else :
$button = '<input type="submit" value="'.$button_text.'" class="button'.$moduleclass_sfx.'" onclick="this.form.searchword.focus();"/>';
endif;
endif;

switch ($button_pos) :
case 'top' :
	$button = $button.'<br />';
	$output = $button.$output;
	break;

case 'bottom' :
	$button = '<br />'.$button;
	$output = $output.$button;
	break;

case 'right' :
	$output = $output.$button;
	break;

case 'left' :
default :
	$output = $button.$output;
	break;
	endswitch;

	echo $output;
	?> <input type="hidden" name="task" value="search" /> <input
	type="hidden" name="option" value="com_search" /> <input type="hidden"
	name="Itemid" value="<?php echo $mitemid; ?>" /></form>