<?php
// no direct access
defined('_JEXEC') or die('Restricted access'); 
?>
<style type="text/css">
.module_content_wrapper { padding:10px 10px 0; line-height:25px;  }
.site_statistic_line span { font-weight:bold; }
</style>
<div class="module_content_wrapper">
	<p class="site_statistic_line">Số người đang online: <span><?php echo $totalonline; ?></span></p>
	<p class="site_statistic_line">Tổng số lượt truy cập: <span><?php echo $total_visited; ?></span></p>
</div>
