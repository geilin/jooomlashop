<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<?php foreach ($list as $item) : ?>
<span class="module_key"><?php echo $item->title ?></span> : <?php echo $item->data ?><br />
<?php endforeach; ?>
