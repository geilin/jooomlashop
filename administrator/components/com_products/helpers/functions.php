<?php

	function getTree($parentid,&$array_cat,$separator=""){
		global $mainframe,$option;
		$order = '';
		$filter_order		= $mainframe->getUserStateFromRequest( $option.'filter_order',		'filter_order',		'',	'cmd' );
		$filter_order_Dir	= $mainframe->getUserStateFromRequest( $option.'filter_order_Dir',	'filter_order_Dir',	'',	'word' );
		
		// ensure we have a valid value for filter_order
		if (!in_array($filter_order, array('ordering',  'id','parentid','name')))
		{
			$filter_order = 'parentid';

		}
		
		
		if ($filter_order == 'ordering') {
			$order = ' ORDER BY parentid,ordering,name '. $filter_order_Dir;
		} elseif($filter_order == 'name') {
			$order = ' ORDER BY parentid,name ' .$filter_order_Dir ;
		}else{
			$order = ' ORDER BY parentid, id DESC ' ;
		}
		
		
		
		$db =& JFactory::getDBO();
		$query =' SELECT id, parentid, name, ordering, published FROM #__w_categories ' .
				' WHERE parentid = '.$parentid.
				' ' .$order;
		$db->setQuery($query);
		$cats = $db->loadObjectList();
		if($cats==NULL) return NULL;		
		else {
			$i=1;
			foreach($cats as $cat){
			
				$cat->name_display = $separator.$i.". ".$cat->name ;
				$cat->parent[$i] = 		$cat->name;	
				$array_cat[] = $cat;
				getTree($cat->id,$array_cat,"&nbsp;&nbsp;&nbsp;&nbsp;".$separator.$i.".");
				$i++;
			}
		}
	}
	
	function getTreeCatAccessory($parentid,&$array_cat,$separator=""){
		$db =& JFactory::getDBO();
		$query =' SELECT id, parentid, name, ordering, published FROM #__w_cat_accessories ' .
				' WHERE parentid = '.$parentid.
				' ORDER BY ordering';
		$db->setQuery($query);
		$cats = $db->loadObjectList();
		if($cats==NULL) return NULL;		
		else {
			$i=1;
			foreach($cats as $cat){
				$cat->name_display = $separator.$i.". ".$cat->name ;				
				$array_cat[] = $cat;
				getTreeCatAccessory($cat->id,$array_cat,"&nbsp;&nbsp;&nbsp;&nbsp;".$separator.$i.".");
				$i++;
			}
		}
	}
	
	function getTreeCatDownload($parentid,&$array_cat,$separator=""){
		$db =& JFactory::getDBO();
		$query =' SELECT id, parentid, name, ordering, published FROM #__w_cat_downloads ' .
				' WHERE parentid = '.$parentid.
				' ORDER BY ordering';
		$db->setQuery($query);
		$cats = $db->loadObjectList();
		if($cats==NULL) return NULL;		
		else {
			$i=1;
			foreach($cats as $cat){
				$cat->name_display = $separator.$i.". ".$cat->name ;				
				$array_cat[] = $cat;
				getTreeCatDownload($cat->id,$array_cat,"&nbsp;&nbsp;&nbsp;&nbsp;".$separator.$i.".");
				$i++;
			}
		}
	}
	
	function uploadImage($file, $path, $override = 0)
	{
		//Import filesystem libraries. Perhaps not necessary, but does not hurt
		jimport('joomla.filesystem.file');
		 
		//Clean up filename to get rid of strange characters like spaces etc
		$filenameTmp = JFile::makeSafe($file['name']);
		$ext  = strtolower(JFile::getExt($filenameTmp));		
		$filename = str_replace(' ', '-', JFile::stripExt($filenameTmp)).'.'.$ext; 
		$src = $file['tmp_name'];
		$dest = $path . $filename;
		 
		//First check if the file has the right extension, we need jpg only		
		if ( $ext == 'jpg' or $ext == 'gif' or $ext == 'png' or $ext == 'jpeg' or $ext == 'zip' or $ext = 'rar' or $ext = 'pdf') {			
			//check exits
			if (!$override){
				if (JFile::exists($dest)){					
					$dest = checkExists($filenameTmp, $ext);				
				}				
			}
			if ( JFile::upload($src, $dest) ) {
				return $filename;
		   } else {
			echo "Error upload image";
			exit();
		   }
		} else {
			echo "Chi cho phep cac loai anh: jpg, gif, png";
			exit();
		}
		return false;
	}
	
	function checkExists($filenameTmp, $ext)
	{
			$filename = str_replace(' ', '-', JFile::stripExt($filenameTmp)). '_'. rand(12,89).'.'.$ext;
			$dest = $path . $filename;
			if (JFile::exists($dest)) checkExists($filenameTmp, $ext);
			return 	$dest;			
	}
	
	function createMultiSelect($list, $name, $arr)
	{
		$str = '';
		foreach ($list as $result){	
			$checked = '';
			if (in_array($result->id, $arr)){
				$checked = 'checked = "checked"';
			}			
			$str .= '<label><input type="checkbox" value="'.$result->id.'" name="'.$name.'[]" class="checkbox" '.$checked.' />'.$result->name.'</label><br/>';		
		}
		return $str;
	}
	
	// input URL
	// ouput name file
	function getNameFile($url = '')
	{
		$tmp = explode('/', $url);
		return $tmp[count($tmp) - 1];
	}
	
?>