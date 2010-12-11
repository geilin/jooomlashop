<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<?php foreach ($product as $item) : ?>
<span class="module_key"><?php echo $item->title ?></span> : <?php echo $item->data ?><br />
<?php endforeach; ?>
