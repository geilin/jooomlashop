<?php
defined('_JEXEC') or die('Restricted access');
// Yahoo
$yahooID = trim($params->get('yahooID', ''));
$nameYahoo = trim($params->get('nameYahoo', ''));
$telYahoo = trim($params->get('telYahoo', ''));
$showYahoo = intval($params->get('showYahoo', 1));
$typeYahoo = intval($params->get('typeYahoo', 2));
// Skype
$skypeID = trim($params->get('skypeID', ''));
$nameSkype = trim($params->get('nameSkype', ''));
$telSkype = trim($params->get('telSkype', ''));
$showSkype = intval($params->get('showSkype', 0));
// Thông tin khác
$showName = intval($params->get('showName', 1));
$showTel = intval($params->get('showTel', 0));
?>

<?php
Xu_ly_yahoo($yahooID, $nameYahoo, $telYahoo, $showYahoo, $typeYahoo, $showName, $showTel);
?>
<?php
function Xu_ly_yahoo($yahooID, $nameYahoo, $telYahoo, $showYahoo, $typeYahoo, $showName, $showTel)
{
	if($showYahoo==1)
	{
		$array_yahooID = split(',',$yahooID);
		$array_nameYahoo = split(',',$nameYahoo);
		$array_telYahoo = split(',',$telYahoo);
		$count = count($array_yahooID);
		?>
<table>
<?php
for($i=0;$i<$count;$i++)
{
	if ($i % 2 == 0) echo "<tr>";
	?>
	<td>
	<p class="yahooId">
		<a href="ymsgr:sendIM?<?php echo trim($array_yahooID[$i]); ?>"> 
			<img title="" width="80" alt=""	src="http://opi.yahoo.com/online?u=<?php echo trim($array_yahooID[$i]); ?>&amp;m=g&amp;t=<?php echo $typeYahoo; ?>"	border="0"> 
		</a>
	</p>
	<p class="yahooName">
		<?php if($showName==1){ ?> 
			<?php echo $array_nameYahoo[$i];  ?>
		<?php } if($showTel==1){ ?> 
			<?php echo $array_telYahoo[$i];  ?> 
		<?php } ?>
	</p>
	</td>
	<?php
	if($i % 2 == 1) echo "</tr>";
}//end for
?>
</table>
<?php
	}
}

?>