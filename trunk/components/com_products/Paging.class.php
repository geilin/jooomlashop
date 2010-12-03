<?php
/**
* @author: Le Van Hen
* @release: Wamp Group
*/


class Paging {

	function createPaging($total, $current, $perPage, $url = ''){
		$numPage = floor($total/ $perPage);
		if (($total/ $perPage) - $numPage > 0){
			$numPage += 1;
		}
		$html = '';
		if ($numPage == 1){
			return '';
		}
		if ($current == 1){
			$html .= 'Start | ';
			$html .= 'Back | ';
		} else {
			$html .= "<a href='$url&p=1'>Start</a> | ";
			$html .= "<a href='$url&p=".($current - 1). "'>Back</a> | ";
		}
		if($current <=3){
			for($i=1; ($i<=5) and ($i <= $numPage); $i++){
				if ($i == $current){
					$html .= $i. ' | ';
				}else{
					$html .= "<a href='$url&p=$i'>[$i]</a> | ";
				}
			}
		}else{
			if ($numPage >= $current + 2){
				for($i=$current-2; ($i <=$current+2) and ($i <= $numPage); $i++){
					if ($i == $current){
						$html .= $i. ' | ';
					}else{
						$html .= "<a href='$url&p=$i'>[$i]</a> | ";
					}
				}
			}else{
				for($i = $numPage - 4;$i <= $numPage; $i++){
					if($i > 0){
						if ($i == $current){
							$html .= $i. ' | ';
						}else{
							$html .= "<a href='$url&p=$i'>[$i]</a> | ";
						}
					}						
				}
			}
		}
		
		if ($current == $numPage){
			$html .= 'Next | ';
			$html .= 'End';
		} else {
			$html .= "<a href='$url&p=".($current + 1). "'>Next</a> | ";
			$html .= "<a href='$url&p=$numPage'>End</a>";
		}
		return $html;
	}
	
	function createPagingAjax($total, $current, $perPage, $newsId = 1){
		$numPage = floor($total/ $perPage);
		if (($total/ $perPage) - $numPage > 0){
			$numPage += 1;
		}
		$html = '';
		$html = "<div class=\"wampvn_paging\" >
				<div class=\"wampvn_paging_warp wampvn_paging_ajax\">";
		if ($numPage == 1){
			return '';
		}
		if ($current == 1){
			$html .= '<span>&lt; trước</span> ';
		} else {

			$html .= "<a class='text_apage' href='javascript:void(0)' onClick='showAjaxList(".($current - 1). ");'>&lt; trước</a> ";
		}
		if($current <=3){
			for($i=1; ($i<=5) and ($i <= $numPage); $i++){
				if ($i == $current){
					$html .= '<span class="blue_bold">'.$i. '</span> | ';
				}else{
					$html .= "<a href='javascript:void(0)' onClick='showAjaxList($i);'>$i</a> | ";
				}
			}
		}else{
			if ($numPage >= $current + 2){
				for($i=$current-2; ($i <=$current+2) and ($i <= $numPage); $i++){
					if ($i == $current){
						$html .= '<span class="blue_bold">'.$i. '</span> | ';
					}else{
						$html .= "<a href='javascript:void(0)' onClick='showAjaxList($i);'>$i</a> | ";
					}
				}
			}else{
				for($i = $numPage - 4;$i <= $numPage; $i++){
					if($i > 0){
						if ($i == $current){
							$html .= '<span class="blue_bold">'.$i. '</span> | ';
						}else{
							$html .= "<a href='javascript:void(0)' onClick='showAjaxList($i);'>$i</a> | ";
						}
					}						
				}
			}
		}
		
		if ($current == $numPage){
			$html .= '<span>sau &gt;</span>';
		} else {
			$html .= "<a href='#showAjaxList' class='text_apage' onClick='showAjaxList(".($current + 1). ");'>sau &gt;</a> ";
		}
		$html .= "<input type='hidden' value='".$current."' id='curpage' />";
		$html .= "</div></div>";
		return $html;
	}
}



?>