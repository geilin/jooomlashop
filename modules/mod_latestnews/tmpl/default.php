<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<ul class="latestnews<?php echo $params->get('moduleclass_sfx'); ?>">
<?php 
	$count_list = count($product);
	$i = 0 ;
	foreach ($product as $item) :  
	$i++; 
?>
	<li class="latestnews<?php echo $params->get('moduleclass_sfx'); ?> <? if ($i== $count_list) echo 'li_last'?>">
		<a href="<?php echo $item->link; ?>" class="latestnews<?php echo $params->get('moduleclass_sfx'); ?>">
			<?php echo $item->text; ?></a>
	</li>
<?php endforeach; ?>
</ul>