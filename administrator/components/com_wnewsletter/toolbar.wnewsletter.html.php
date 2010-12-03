<?php
/**
* @version		1.0
* @package	Component Administrator wNewsLetter
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    class toolbar wnewsletter
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

class TOOLBAR_newsletter{

	function _NEW(){
		JToolBarHelper::title( JText::_('Email Template '), 'generic.png');
		JToolBarHelper::save();
		JToolBarHelper::apply();
		JToolBarHelper::cancel();
	}
	function _SEND(){
		JToolBarHelper::title( JText::_('Send mail'), 'generic.png');
		JToolBarHelper::custom('send','send.png','send_f2.png','Send Mail',false);
		JToolBarHelper::cancel('showNewsLetter');	
	}
	function _DEFAULT(){
		JToolBarHelper::title( JText::_('Email Template'), 'generic.png');
		JToolBarHelper::publishList();
		JToolBarHelper::unpublishList();
		JToolBarHelper::editList();
		JToolBarHelper::deleteList();
		JToolBarHelper::addNew();
	}
}
class TOOLBAR_subscriber {
	function _NEW(){
		JToolBarHelper::title( JText::_('Newsletter Subscriber'), 'generic.png');
		JToolBarHelper::save('saveSubscriber');
		JToolBarHelper::cancel('subscriber');
	}
	function _DEFAULT(){
		JToolBarHelper::title( JText::_('Newsletter Subscriber'), 'generic.png');
		JToolBarHelper::publishList('confirmed');
		JToolBarHelper::unpublishList('unconfirmed');
		JToolBarHelper::editList('editSubscriber');
		JToolBarHelper::deleteList('Are you sure you want to remove subscriber ?','removeSubscriber');
		JToolBarHelper::addNew('addSubscriber');
	}
}
class TOOLBAR_contact{
	function _DEFAULT(){
		JToolBarHelper::title( JText::_('Thông tin chi tiết'), 'generic.png');
		JToolBarHelper::addNew('addContact');
		JToolBarHelper::deleteList('Bạn có muốn xóa thông tin chi tiết của người này kô ?','removeContact');
	}
	function _NEW(){
		JToolBarHelper::title( JText::_('Thong tin chi tiết'), 'generic.png');
		JToolBarHelper::save('saveContact');
		JToolBarHelper::cancel('contact');
	}
}

class TOOLBAR_category{
	function _NEW(){
		JToolBarHelper::title( JText::_('Category'), 'generic.png');
		JToolBarHelper::save('saveCategory');
		JToolBarHelper::cancel('category');
	}
	function _DEFAULT(){
		JToolBarHelper::title('Category', 'generic.png');
		JToolBarHelper::addNew('addCategory');
		JToolBarHelper::editList('editCategory');
		JToolBarHelper::deleteList('Ban co muon xoa category nay ?', 'deleteCategory');
	}
}
?>