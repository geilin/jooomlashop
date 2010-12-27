<?php
// no direct access
defined('_JEXEC') or die('Restricted access'); 
?>
<style type="text/css">
ul.mod_support { line-height:30px; padding:0; margin:0;}
ul.mod_support li { padding:0; margin:0; }
ul.mod_support li a  {
	display:block; 
	font-weight:bold;
	text-decoration: none;
	background-position: 0 center;
    background-repeat: no-repeat;
	margin:0;
    padding:0 0 0 75px;
	color:#000;
	}
</style>
<?php if ( count($yh_supports) ) : ?>
	<ul class="mod_support">
	<?php foreach ( $yh_supports as $sp ) : ?>
		<li>						
			<a style="background-image: url('http://opi.yahoo.com/online?u=<?php echo $sp['yh_id']; ?>&amp;t=1&amp;l=us');" href="ymsgr:sendIM?<?php echo $sp['yh_id']; ?>&amp;m=Chao+ban%2C+toi+muon+hoi+"><?php echo $sp['yh_name']; ?></a>
						
		</li>
	
	<?php endforeach; ?>
	</ul>
<?php endif; ?>
