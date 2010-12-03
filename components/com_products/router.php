<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
function productsBuildRoute(&$query)
{
	$segments = array();
	
	if(isset($query['controller']))
	{
		if ($query['controller'] == 'accessory'){
			$segments[] = $query['controller'];	
		} elseif ($query['controller'] == 'download') {
			$segments[] = $query['controller'];
		} elseif ($query['controller'] == 'compare'){
			$segments[] = $query['controller'];	
		} else {
			$segments[] = $query['controller'];
		}		
		unset($query['controller']);
	}
	
	if (isset($query['task'])) {
		//if ($query['task'] == 'download'){
				$segments[] = $query['task'];
				unset($query['task']);
	//	}
	}
	if (isset($query['view'])) {
		if ($query['view'] == 'adetail'){
			$query['view'] = $query['view'];
		} elseif ($query['view'] == 'ddetail'){
			$query['view'] = $query['view'];
		} elseif ($query['view'] == 'detail'){
			$query['view'] = $query['view'];
		} elseif ($query['view'] == 'compare'){
			$query['view'] = $query['view'];
		} elseif ($query['view'] == 'warranty'){
			$query['view'] = $query['view'];
		} elseif ($query['view'] == 'download'){
			$query['view'] = $query['view'];
		}
		$segments[] = $query['view'];
		unset($query['view']);
	}
	if(isset($query['id']))
	{
		$segments[] = $query['id'];
		unset($query['id']);
	}
	if(isset($query['catid']))
	{
		$segments[] = $query['catid'];
		unset($query['catid']);
	}
	if(isset($query['cid']))
	{
		$segments[] = $query['cid'];
		unset($query['cid']);
	}
		
        
	return $segments;
}

function productsParseRoute($segments)
{
	$vars = array();

	if ($segments[0] != 'accessory' AND $segments[0] != 'download' AND $segments[0] != 'compare'){	
		
		if ($segments[0] == 'detail'){
			$vars['view'] = 'detail';
			$arr = explode(':', $segments[1]);
			$vars['id'] = $arr[0];
		} elseif ($segments[0] == 'category'){
			$vars['view'] = 'category';
			$arr = explode(':', $segments[1]);
			$vars['catid'] = $arr[0];
		} elseif ($segments[0] == 'download'){
			$vars['view'] = 'download';
			$vars['catid'] = $segments[1];
		} elseif ($segments[0] == 'compare'){
			$vars['view'] = 'compare';			
		} elseif ($segments[0] == 'warranty'){
			$vars['view'] = 'warranty';			
		}else {
			$arr = explode(':', $segments[0]);
			if (!empty($arr[1])){
				$vars['catid'] = $arr[0];
			} else {
				$vars['view'] = $segments[0];
			}
		}

	} else {
		$vars['controller'] = $segments[0];
		if ($vars['controller'] == 'accessory'){
			$vars['controller'] = 'accessory';
			if ($segments[1] == 'adetail'){
				$vars['view'] = 'adetail';
				$arr = explode(':', $segments[2]);
				$vars['id'] = $arr[0];
			} else {
				$arr = explode(':', $segments[1]);
				$vars['cid'] = $arr[0];
			}			
		} elseif ($vars['controller'] == 'download'){
			$vars['controller'] = 'download';
			if ($segments[1] == 'ddetail'){
				$vars['view'] = 'ddetail';
				$arr = explode(':', $segments[2]);
				$vars['id'] = $arr[0];
			} elseif ($segments[1] == 'download') {
				$vars['task'] = $segments[1];
				$vars['id'] = $segments[2];
			}else {
				$arr = explode(':', $segments[1]);
				$vars['cid'] = $arr[0];
			}	
		} elseif ($vars['controller'] == 'compare'){
		
			if (!empty($segments[1])) {
				if (count($segments) > 3) {
					$vars['task'] = $segments[1];
					$vars['id'] = $segments[3];
				} else {
					$vars['task'] = $segments[1];
					$vars['id'] = $segments[2];
				}
			}			
		}
	}
//var_dump($segments);
 //var_dump($vars);
// exit;
return $vars;
}
?>