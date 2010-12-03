<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    controller.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.controller' );

class ProductControllerProduct extends ProductController
{
	function display()
	{
		$viewName = JRequest::getVar('view', 'category');
		$layout = JRequest::getVar('layout', 'default');
		$view = &$this->getView($viewName, 'html');
		$model =& $this->getModel( $viewName, 'ModelProduct' );

		if (!JError::isError( $model )) {
			$view->setModel( $model, true );
		}

		if ($viewName == 'search'){
			$layout = 'default';
		}

		$view->setLayout($layout);
		// Display the view
		if (true) {
			global $option;
			$cache =& JFactory::getCache($option, 'view');
			$cache->get($view, 'display');
		} else {
			$view->display();
		}
	}

	/// AJAX task
	function listApp() {
		
		$this->buildAppListAjax();
	}
	function listGroupApp() {
	
		$this->buildGroupAppListAjax();
	}
	// --------- function AJAX Helper -----------------
	function buildGroupAppListAjax() {
		global $option, $mainframe;
		include_once JPATH_SITE.DS.'components'.DS.'com_products'.DS.'Paging.class.php';
		
		$limit = 6;
		$limitstart = 0;
		
		$model =& $this->getModel( 'detail', 'ModelProduct' );
		$catid = JRequest::getVar('cid', 0);
		$gid = JRequest::getVar('gid', 0);
		
		$listApp = $model->getDownloads($catid,$gid, $limit, $limitstart);
		$total   = $model->getcountDownloads($catid,$gid);
		// -----------------------------------------------
		$listApp = $this->htmlListApp($listApp);
		$paging  = $this->htmlPaging($total,$limit,1);
		if (!empty($listApp)) {
			echo $listApp;
			echo '<input type="hidden" name="cid" id="cid" value="'.$catid.'" />';
			if ($paging) { 
				echo '<script type="text/javascript">';
					echo 'jQuery(document).ready(function() {';
					echo 'jQuery("#space_h").show().css("height","30px"); });';
				echo '</script>';
				echo $paging;
			} else {
				echo '<script type="text/javascript">';
					echo 'jQuery(document).ready(function() {';
					echo 'jQuery("#space_h").hide()});';
				echo '</script>';
			}
		} else {
			echo 'stop';
		}
		exit;
		
	}
	function buildAppListAjax() {
		global $option, $mainframe;
		include_once JPATH_SITE.DS.'components'.DS.'com_products'.DS.'Paging.class.php';
				
		$limit = 6;
		$limitstart = (JRequest::getVar('page', 1)-1)*$limit;
		
		$model =& $this->getModel( 'detail', 'ModelProduct' );
		$catid = JRequest::getVar('cid', 0);
		$gid = JRequest::getVar('gid', 0);
		$listApp = $model->getDownloads($catid,$gid, $limit, $limitstart);
		$total   = $model->getcountDownloads($catid,$gid);
		// -----------------------------------------------
		$listApp = $this->htmlListApp($listApp);
		$paging  = $this->htmlPaging($total,$limit,JRequest::getVar('page', 1));
		if (!empty($listApp)) {
			echo $listApp;
			echo '<input type="hidden" name="cid" id="cid" value="'.$catid.'" />';
			echo $paging;
		} else {
			echo 'stop';
		}
		exit;
	}
	
	function htmlListApp($obj) {
		$html = '';
		$count_total = count($obj);
		foreach ($obj as $i => $list) {
			$downloadlink = JRoute::_('index.php?option=com_products' .
			'&controller=download&task=download&id=' . $list->id);
			$title = JFilterOutput::stringURLSafe($list->name);
			$title = str_replace(' ', '-', strtolower($title));
			$list->link = JRoute::_('index.php?option=' . $option .
			'&controller=download&view=ddetail&id=' . $list->id. ':'. $title);
			// ---------------------------------------------
			$html .= '<div class="item_down';
				if (($i+1) == $count_total) $html .= '_last'; 
				if ($count_total == 1) $html .= '_one'; 
			$html .= '">';
			$html .= '<div class="pic_download">'
						.'<a href="'.$list->link.'"  >'
							.'<img src="'.JURI::base().'images/softwares/'.$list->thumbnail.'" border="0" '
							   .'alt="'.$list->name.'"  />'
						.'</a></div>'
					.'<div class="info_download">'
					.'<h3><a href="'.$list->link.'" >'
				              .$list->name
					.'</a></h3>';
			if ($list->description) { 
				$html .= '<div class="desc_down">'.$list->description.'</div>';
			} 
			$list->group = $this->getNameGroup($list);	
			
			$html .= '<div style="color:#939393; margin: 3px 0pt 0pt;"';
			 		if (($i+1) == $count_total) $html .= 'style="margin:5px 0 0 0;"';  
			 		$html .= '>';
				$html .= '<a class="blue" href="'.$downloadlink.'">Tải về |</a> '
				            .$list->download.' lượt tải về'; 
			$html .='</div>
				</div>
				<div class="cb"></div>	
			</div>';
			
		}
		return $html;
	}
	function getNameGroup($row) {
		$model =& $this->getModel( 'detail', 'ModelProduct' );
		$group = $model->getGroup($row->id);
		$row->group = '';
			$j = 0;
			foreach($group as $result){
				$j++;
				if ($j > 1){
					$row->group .= ', ';
				}
				$row->group .= $result->name;
			}	
		return $row->group;
	}
	function htmlPaging($total, $limit = 6, $limitstart = 0) {
		// ------paging-AJAX---------------------
		include_once JPATH_SITE.DS.'components'.DS.'com_products'.DS.'Paging.class.php';
		$pagingAjax = new Paging();
		$pageAjax   = $pagingAjax->createPagingAjax($total,$limitstart,$limit);
		
		return $pageAjax;
	}
	function checkTokenTime() {
		$token_time = JRequest::getVar('tk','');
		$a =  md5(session_id());
		if ($token_time == $a) {
			return true;
		} else {
			exit('Loi xam nhap he thong');
		}
	}
	//------------------END AJAX TASK GROUP-------------------------------------------
	
	
	function addtoCart(){
		$productid = JRequest::getInt('id', 0);
		$quantity = JRequest::getInt('quantity', 0);
		global $option;
		$model =& $this->getModel( 'cart', 'ModelProduct' );
		
		$model->insertCart($productid,$quantity);
		//display mod cart
		$document =& JFactory::getDocument();		
		$viewType = $document->getType();		
		$view = &$this->getView('cart', $viewType);		
		$view->setLayout('raw');
		$view->display();	
		
	}
	
	
	
	function addCart()
	{

		$productid = JRequest::getInt('id', 0);
		global $option;
		$model =& $this->getModel( 'cart', 'ModelProduct' );
		$model->addCart($productid);

		$this->setRedirect(JRoute::_('index.php?option=' . $option .'&view=cart'), 'Bạn đã thêm sản phẩm vào giỏ hàng');

	}

	function updateCart()
	{

		global $option;
		$msg = JRequest::getVar('msg', '');
		$model =& $this->getModel( 'cart', 'ModelProduct' );
		$model->updateCart();		
		$this->setRedirect(JRoute::_('index.php?option=' . $option .'&view=cart'), $msg);

	}

	

	function showModCart()
	{

		$document =& JFactory::getDocument();		
		$viewType = $document->getType();		
		$view = &$this->getView('cart', $viewType);		
		$view->setLayout('raw');
		$view->display();			

	}

	

	function tellFriend()

	{

		$view = &$this->getView('tellfriend', 'raw');		
		$view->setLayout('raw');
		$view->display();			

	}
	
	function send()
	{
		global $option;
		$model =& $this->getModel( 'tellfriend', 'ModelProduct' );
		$model->send();		
		$this->setRedirect('index.php', 'Cảm ơn bạn');			
	}



function order(){
		global $option; $mainframe;
		//$user =& JFactory::getUser();
		
		$name = JRequest::getVar('name');		
		$email = JRequest::getVar('email');
		$address =JRequest::getVar('address'); 
		$phone =JRequest::getVar('phone'); 
		
		
		$component = JComponentHelper::getComponent( 'com_products' );
  		$params = new JParameter( $component->params );
		//$params = &JComponentHelper::getParams( 'com_products' );
  		//$params->get( 'headerpic' );
		
		$to = $params->get( 'email_contact' );
		
		//$params =& $mainframe->getPageParameters('com_products');
		
		if(trim($name) == '' ||  $phone =='' || $email ==''){
			$this->setRedirect('index.php?option=com_products&view=cart', 'Xin vui lòng nhập đủ thông tin');
			return;
		}
	
		$row =& JTable::getInstance('order', 'Table');
		if (!$row->bind(JRequest::get('post'))) {
			echo "<script> alert('".$row->getError()."');
				window.history.go(-1); </script>\n";
			exit();
		}

		$Cart = new Shopping_Cart('shopping_cart');
		
		
		$row->cartinfo = 0;
		if ($Cart->hasItems()){
			foreach ( $Cart->getItems() as $id =>$cart ) {		
				$row->cartinfo .= $cart['name'] . ' x '. $cart['count'] . '<br/>';
			}			
		}

		$row->userid = 0;			
		if (!$row->store()) {
			echo "<script> alert('".$row->getError()."');
			window.history.go(-1); </script>\n";
			exit();
		}

		//send email

		
		//$to = 'knigherrant@yahoo.com';
		$name = JRequest::getVar('name');		
		$email = JRequest::getVar('email');	
		
		$message1 = JRequest::getVar('message', '');			
		$product	= $row->cartinfo;
		$date = date("h:i:s A', l, d/m/Y");

		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

		// Additional headers
		$headers .= 'To: <' . $to . '>' . "\r\n";
		$headers .= 'From: HANGDIENTU.vn <'.$to.'>' . "\r\n";

		$message .= JText::_('Địa chỉ: ') . $address . "\r\n";
		$message .= JRequest::getVar('message');	
		
		$subject = $name;
		// Mail it
		mail($to, $subject, $message, $headers);
					
		// send den cho khach hang
		if (!empty($email)){				
			mail($email, $subject, $message, $headers);
		}			

		
		session_unregister($Cart->cart_name);
		session_unregister($Cart->items);
		//session_destroy();  
		$this->setRedirect('index.php', 'Cảm ơn bạn đã đặt hàng của chúng tôi - Chúng tôi sẽ liên hệ với bạn sớm');

	

	}
	

	

	function comment()

	{
		
		global $option, $mainframe;
		$row =& JTable::getInstance('comment', 'Table');
		if (!$row->bind(JRequest::get('post'))) {
			echo "<script> alert('".$row->getError()."');
			window.history.go(-1); </script>\n";
			exit();

		}

		$params =& $mainframe->getPageParameters('com_products');
		$published = $params->get('publised_comment');

		if (!$published){
			$row->published = 0;
		} else {
			$row->published = 1;
		}

		if (!$row->store()) {
			echo "<script> alert('".$row->getError()."');
			window.history.go(-1); </script>\n";
			exit();

		}
		$productid = trim(JRequest::getVar('productid',''));
		$title     = trim(JRequest::getVar('sef_title',''));
		$return_link = 'index.php?option=com_products&view=detail&id=' . $productid .':'.$title;
		$mess = 'Cám ơn bạn đã nhận xét, thông tin sẽ được chúng tôi kiểm duyệt trước khi đưa lên!';
		$mainframe->redirect( $return_link, $mess );
	}
	
	function warranty()
	{
		$view = &$this->getView('warranty', 'raw');		
		$model =& $this->getModel( 'warranty', 'ModelProduct' );
		if (!JError::isError( $model )) {
			$view->setModel( $model, true );
		}
		$view->display();
		exit();
	}

}

?>