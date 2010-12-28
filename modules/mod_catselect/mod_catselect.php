<?php
//CatSelect//
/**
* CatSelect Module
* @package Joomla
* @copyright Copyright (C) Kulendra Janaka. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* Joomla! is free software and parts of it may contain or be derived from the
* GNU General Public License or other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
 
defined('_JEXEC') or die('Restricted access');
global $mainframe;



$catids	= $params->get('catids');

if ($catids)
{ 
    if( is_array( $catids ) ) {
        $catCondition = ' AND c.id IN (' . implode( ',', $catids ) . ')';
    } 
    else
    {
        $catCondition = ' AND (c.id = '.$catids.')';
	}	
}


$database = & JFactory::getDBO();

//echo $catCondition; 

$query = "SELECT c.id, c.name FROM #__w_categories AS c" .
		" WHERE c.published=1" . $catCondition;
 
$database->setQuery($query);
$categories = $database->loadObjectList();
?>
<ul class="menu"><?php foreach($categories as $category):?>
<li><a href="<?php echo JRoute::_('index.php?option=com_products&view=category&catid=' . $category->id);?>"><?php echo $category->name; ?></a></li>
<?php endforeach;?>
</ul>
<?php 
/*


$itemid = trim($params->get('linkmenu'));

// select the published sections
$query = "SELECT s.id, s.title FROM #__sections AS s WHERE s.published=1";

$database->setQuery($query);
$sections = $database->loadObjectList();
 
$query = "SELECT c.id, c.title, c.section FROM #__categories AS c "
		."WHERE c.published=1";
 
$database->setQuery($query );
$categories = $database->loadObjectList();

// Generate javascript functions and varaibles
echo ("
<script language=\"javascript\" type=\"text/javascript\">
	var jsCat = [];
	
	jsCat=[");
	foreach ($categories as $item)
	{
		echo("[".$item->id.",\"".$item->title."\",\"".$item->section."\"],");
	}
echo("[0,\"Select Category\",\"0\"]]; \n

var iItemID=");
echo($itemid);
echo("
var jsLiveSite='");
echo(JURI::base());
echo("'; \n

function jsRemoveAll(cControl)
{
	var cCat = document.getElementById(cControl);

	for( var i=(cCat.options.length - 1); i >=0 ; i--)
	{
		cCat.remove(i);
	}
}

function jsOnSecSelect()
{
	jsRemoveAll('catselect_cat');
	
	var cSec = document.getElementById('catselect_sec');
	var cCat = document.getElementById('catselect_cat');
	
	var iSecID = cSec.options[cSec.selectedIndex].value;
	
	for (var i=0; i<jsCat.length; i++)
	{
		if (jsCat[i][2] == iSecID)
		{
			var cOpt = document.createElement(\"option\");
			cOpt.value = jsCat[i][0];
			cOpt.text = jsCat[i][1];
			cOpt.secID	= jsCat[i][2];
			cCat.options.add(cOpt);
		}
	}
}

function jsOnFormSubmit()
{
	
	var iCatID = document.getElementById('catselect_cat').value;
	var iSecID = document.getElementById('catselect_sec').value;
	if (iCatID != 0)
		window.location= jsLiveSite+'index.php?option=com_content&view=category&layout=blog&id='+iCatID+'&Itemid='+iItemID;
	else
		alert('Please select a section and a category');
}
");

echo("</script>");
//Generate form
echo("
<form>
<table>
<tr>
<td>
<select id='catselect_sec' onchange=\"jsOnSecSelect()\">
<option value='0'> Select Section</option>");
foreach ($sections as $item)
{
	echo("<option value='".$item->id."'>".$item->title."</option> \n" );
}
echo("
</select>
</td>
<td>
<select id='catselect_cat'> \n
<option value='0'>Select Category</option> \n
</select> \n
</td>
<td>
<input type='Button' name='Go' id='Go' value='Go' onclick='jsOnFormSubmit()'/>
</td>
</tr>
</table>
</form>");

*/
