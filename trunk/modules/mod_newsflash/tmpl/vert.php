<?php defined('_JEXEC') or die('Restricted access'); ?>

<?php for ($i = 0, $n = count($product); $i < $n; $i ++) :
	modNewsFlashHelper::renderItem($product[$i], $params, $access);
	if ($n > 1 && (($i < $n - 1) || $params->get('showLastSeparator'))) : ?>
		<span class="article_separator">&nbsp;</span>
 	<?php endif; ?>
<?php endfor; ?>
