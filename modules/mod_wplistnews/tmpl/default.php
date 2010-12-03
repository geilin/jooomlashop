<?php // no direct access
defined('_JEXEC') or die('Restricted access'); 
?>
<div class="wpmod_warp">
<?php
$count = count($list); 
foreach ($list as $i => $item) { ?>
	<div class="wp_mod_right_ct_item">
		<?php if ($item->img) { ?>
		<div class="pic_a">
			<a class="pic_a_warp" href="<?php echo $item->link; ?>">
				<span>
				<img src="<?php echo $item->img; ?>" />
				</span>
			</a>
		</div>
		<?php } else { ?>
		<div class="no_image_small">
			<a href="<?php echo $item->link; ?>" class="no_image_small_a">
				<span>NO IMAGE</span>
			</a>
		</div>
		<?php } ?>
		<div class="p_a">
			<a  href="<?php echo $item->link; ?>">
			<?php 
				$word_nb = 6;
				$text_arr = explode(" ", $item->text);
				if ( count($text_arr) > intval($word_nb) ) {
						$item->text = implode(" ", array_slice($text_arr, 0, $word_nb)) .'...';
				}
				echo $item->text;
			?>
			</a>
		</div>
		<?php if ($i < ($count-1)) {?>
		<div class="clr h_5"></div>
		<div class="clr h_5 border_bot"></div>
		<?php } else { ?>
		<div class="clr h_10"></div>
		<?php } ?>
	</div>
<?php } ?>
</div>