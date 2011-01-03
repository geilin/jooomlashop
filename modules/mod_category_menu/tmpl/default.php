<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

?>
<?php  if ( $categories ): ?>
	<ul class="menu">
		<?php foreach($categories as $cat):?>
		<?php if  ( $catid == $cat->id ) :?>
		<li class="active">
			<a href="<?php echo JRoute::_('index.php?option=com_products&view=category&catid=' . $cat->id);?>"><?php echo $cat->name; ?></a>
		</li>
		<?php else: ?>
		<li>
			<a href="<?php echo JRoute::_('index.php?option=com_products&view=category&catcat->id=' . $cat->id);?>"><?php echo $cat->name; ?></a>
		</li>		
		<?php endif; ?>
		
		<?php endforeach;?>
	<ul class="menu"> 
 <?php endif;?>