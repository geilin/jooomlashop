<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<ul class="latestnews<?php echo $params->get('moduleclass_sfx'); ?>">
<?php 
	$count_list = count($list);
	$i = 0 ;
	foreach ($list as $item) :  
	$i++; 
?>
	<li class="latestnews<?php echo $params->get('moduleclass_sfx'); ?> <? if ($i== $count_list) echo 'li_last'?>">
		<a href="<?php echo $item->link; ?>" class="latestnews<?php echo $params->get('moduleclass_sfx'); ?>">
			<?php echo $item->text; ?></a>
	</li>
<?php endforeach; ?>
</ul>