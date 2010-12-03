<?php 
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    tpl detail.
*/
defined( '_JEXEC' ) or die( 'Restricted access' ); 
$path_to_js = JURI::base().'/components/com_products/js/phukienslide/';
$path_to_pk = JURI::base().'/images/accessories/';
?>
<script type="text/javascript">
	var token  = '<?php echo  $this->token; ?>';
	var w_root = '<?php echo JURI::Base(); ?>';
	var groupid  = '<?php echo $this->product->groupid; ?>';
	jQuery(document).ready(function() {changeTab()});
	function changeTab() {
		jQuery('.link_tabs a').click(function () {
			thisa = jQuery(this);
			type = jQuery(this).attr('rel'); 
			aclass = jQuery(this).attr('class');
			if (aclass != 'active_a' || !(aclass)) {
				data    = 'curpage=0'
							+'&page=1'
							+'&gid='+groupid
							+"&cid="+type
							+"&task=listGroupApp&tk="+token;
				$.ajax({
					  type: "POST",
					  url: w_root+"index.php?option=com_products&controller=product",
					  data: data,
					  success: function(data) {
					  	if (data != 'stop') { 
							$("#app_list").html(data);
							jQuery('.link_tabs a[class="active_a"]').removeClass().addClass('a');
							thisa.removeClass().addClass('active_a');
						} 	
					  }
				 }); // ajax
			} 
		});
	}
	//PAGING AJAX-------------------------------
	function showAjaxList(page) {
		catid = jQuery('#cid').val();
		curpage = jQuery('#curpage').val();
		data    = 'curpage='+curpage+'&page='+page+'&gid='+groupid+"&cid="+catid+"&task=listApp&tk="+token;
		$.ajax({
			  type: "POST",
			  url: w_root+"index.php?option=com_products&controller=product",
			  data: data,
			  success: function(data) {
			  	if (data != 'stop') { 
					$("#app_list").html(data);
				} 	
			  }
		 }); // ajax
	}	
</script>
<div class="link_tabs">
	<?php if ($this->download['total'][0]) {?>
	<a href="javascript:void(0)" rel='1' <?php if ($this->download['html']['type'] == '1') echo 'class="active_a"'; else echo 'class="a"'; ?>>
	<?php } else { ?>
		<span class="light_gray">
	<?php } ?> 
		Games
	<?php if ($this->download['total'][0]) {?>	
	</a>
	<?php } else { ?>
		</span>
	<?php } ?> |
	<?php if ($this->download['total'][1]) {?>
	<a href="javascript:void(0)" rel='2' <?php if ($this->download['html']['type'] == '2') echo 'class="active_a"'; else echo 'class="a"'; ?>>
	<?php } else { ?>
		<span class="light_gray">
	<?php } ?> 
		Themes
	<?php if ($this->download['total'][1]) {?>
	</a>
	<?php }  else { ?>
		</span>
	<?php } ?> |
	<?php if ($this->download['total'][2]) {?>
	<a href="javascript:void(0)" rel='3' <?php if ($this->download['html']['type'] == '3') echo 'class="active_a"'; else echo 'class="a"'; ?>>
	<?php } else { ?>
		<span class="light_gray">
	<?php } ?>
		Wallpapers
	<?php if ($this->download['total'][2]) {?>
	</a>
	<?php } else { ?>
		</span>
	<?php } ?> |
	<?php if ($this->download['total'][3]) {?>
	<a href="javascript:void(0)" rel='4' <?php if ($this->download['html']['type'] == '4') echo 'class="active_a"'; else echo 'class="a"'; ?>>
	<?php } else { ?>
		<span class="light_gray">
	<?php } ?>
		Ứng dụng
	<?php if ($this->download['total'][3]) {?>
	</a>
	<?php } else { ?>
		</span>
	<?php } ?>
</div>
<div class="app_warp" id="app_list">
	<?php 
		echo $this->download['html']['value']; ?>
		<input type="hidden" name="cid" id="cid" value="<?php echo $this->download['html']['type']; ?>" />
	<?php 
		if ( $this->download['paging']) {
			echo $this->download['paging'];
		}
		
	?>
</div>
<div id="space_h">
<?php if ( $this->download['paging']) {
			echo '<div style="clear:both; height:30px;"></div>';
		}
?>
</div>
<?php
// END file ?>