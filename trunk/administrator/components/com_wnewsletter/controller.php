<?php
/**
* @version		1.0
* @package	Component Administrator wNewsLetter
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    controller.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.controller' );
class wNewsLetterController extends JController
{
function __construct( $default = array() )
{
	parent::__construct( $default );
	$this->registerTask( 'add' , 'edit');
	$this->registerTask( 'apply', 'save' );
	$this->registerTask( 'unpublish', 'publish' );	

}

/************************************************************/
/*                          Khu vuc newsletter                                              */
/************************************************************/
function publish()
{
	global $option;
	$cid = JRequest::getVar( 'cid', array(), '', 'array' );
	if( $this->_task == 'publish')
	{
		$publish = 1;
	}
	else
	{
		$publish = 0;
	}
	$newsletterTable =& JTable::getInstance('newsletter', 'Table');
	$newsletterTable->publish($cid, $publish);
	$this->setRedirect( 'index.php?option=' . $option );
}
function edit()
{
	global $option;
	$row =& JTable::getInstance('newsletter', 'Table');

	$cid = JRequest::getVar( 'cid', array(0), '', 'array' );
	$id = $cid[0];
	$row->load($id);
	// get category
	$db =& JFactory::getDBO();
	$query = "SELECT * FROM #__w_newsletter_categories";
	$db->setQuery($query);
	$results = $db->loadObjectList();
	$category = array();	
	foreach ($results as $result)
	{
		$category[] = array('value' => $result->id, 'text' => $result->name);		
	}	
	$lists = array();	
	$lists['category'] = JHTML::_('select.genericlist',
		$category, 'cat_id', 'class="inputbox" '. '',	'value', 'text', $row->cat_id );
	$lists['published'] = JHTML::_('select.booleanlist', 'published', 'class="inputbox"', $row->published);
	
	HTML_newsletter::editNewsLetter($row, $lists, $option);
}

function save()
{
	
	global $option;
	$row =& JTable::getInstance('newsletter', 'Table');
	if (!$row->bind(JRequest::get('post')))
	{
		echo "<script> alert('".$row->getError()."');
		window.history.go(-1); </script>\n";
		exit();
	}
	$row->html_message = JRequest::getVar( 'html_message', '', 'post', 'string', JREQUEST_ALLOWRAW );
	
	if(empty($row->created)) $row->created = date( 'Y-m-d H:m:s' );
	if (!$row->store()) {
		echo "<script> alert('".$row->getError()."'); window.history. go(-1); </script>\n";
		exit();
		}
	switch ($this->_task)
	{
		case 'apply':
		$msg = 'Changes to Email Template saved';
		$link = 'index.php?option=' . $option .	'&task=edit&cid[]='. $row->id;
		break;
		case 'save':
		default:
		$msg = 'Email Template saved';
		$link = 'index.php?option=' . $option;
		break;
	}	
	$this->setRedirect($link, $msg);
}
function showNewsLetter()
{
	global $option, $mainframe;
	$db =& JFactory::getDBO();
	$context			= 'com_wnewsletter.shownewsletter';
	$search				= $mainframe->getUserStateFromRequest( $context.'search',			'search',			'',	'string' );
	$search				= JString::strtolower($search);
	
	// Keyword filter
	if ($search) {		
		$where = 'WHERE (LOWER( n.subject ) LIKE '.$db->Quote( '%'.$db->getEscaped( $search, true ).'%', false ) .
			' OR n.id = ' . (int) $search . ')';
	}
	
	$limit = JRequest::getVar('limit',$mainframe->getCfg('list_limit'));
	$limitstart = JRequest::getVar('limitstart', 0);
	
	$query = "SELECT count(*) FROM #__w_newsletter ". $where;
	$db->setQuery( $query );
	$total = $db->loadResult();
	$query = "SELECT n.*, c.name FROM #__w_newsletter as n
		INNER JOIN #__w_newsletter_categories as c 
		ON n.cat_id = c.id
	". $where;
	$db->setQuery( $query, $limitstart, $limit );
	$rows = $db->loadObjectList();
	if ($db->getErrorNum()) {
		echo $db->stderr();
		return false;
	}
	
jimport('joomla.html.pagination');
$pageNav = new JPagination($total, $limitstart, $limit);
HTML_newsletter::showNewsLetter( $option, $rows, $pageNav);
}

function remove(){
	global $option;
	$cid = JRequest::getVar( 'cid', array(), '', 'array' );
	$db =& JFactory::getDBO();
	if(count($cid))
	{
		$cids = implode( ',', $cid );
		$query = "DELETE FROM #__w_newsletter WHERE id IN ( $cids )";
		$db->setQuery( $query );if (!$db->query()) {
			echo "<script> alert('".$db->getErrorMsg()."'); window.history.go(-1); </script>\n";
		}
	}
	$this->setRedirect( 'index.php?option=' . $option );
}

/************************************************************/
/*                          Khu vuc subscriber                                            */
/************************************************************/
function subscriber()
{
	global $option, $mainframe;
	$db =& JFactory::getDBO();
	$context			= 'com_wnewsletter.showsubscriber';
	$search				= $mainframe->getUserStateFromRequest( $context.'search',			'search',			'',	'string' );
	$search				= JString::strtolower($search);

	// Keyword filter
	if ($search) {		
		$where = 'WHERE (LOWER( name ) LIKE '.$db->Quote( '%'.$db->getEscaped( $search, true ).'%', false ) .
			' OR LOWER( email ) LIKE ' . $db->Quote( '%'.$db->getEscaped( $search, true ).'%', false )  . ')';
	}

	$limit = JRequest::getVar('limit',$mainframe->getCfg('list_limit'));
	$limitstart = JRequest::getVar('limitstart', 0);
	$db =& JFactory::getDBO();
	$query = "SELECT count(*) FROM #__w_newsletter_subscribers ". $where;
	$db->setQuery( $query );
	$total = $db->loadResult();
	$query = "SELECT * FROM #__w_newsletter_subscribers ".$where;
	$db->setQuery( $query, $limitstart, $limit );
	$rows = $db->loadObjectList();
	if ($db->getErrorNum()) {
	echo $db->stderr();
	return false;
}
jimport('joomla.html.pagination');
$pageNav = new JPagination($total, $limitstart, $limit);
HTML_newsletter::showSubscriber( $option, $rows, $pageNav );
}

function editSubscriber(){
	global $option;
	$row = JTable::getInstance('subscriber', 'Table');
	$cid = JRequest::getVar( 'cid', array(0), '', 'array');
	$id = $cid[0];
	$row->load($id);
	$lists = array();	
	$lists['confirmed'] = JHTML::_('select.booleanlist', 'confirmed', 'class="inputbox"', $row->confirmed);	
	HTML_newsletter::editSubscriber($row, $lists, $option);
}
function addSubscriber(){
	$this->editSubscriber();
}
function saveSubscriber(){
	global $option;
	$row = JTable::getInstance('subscriber', 'Table');
	if (!$row->bind(JRequest::get('post'))){
		echo "<script> alert('". $row->getError() ."');
			window.history.go(-1); 
			</script>\n";
		exit();
	}
	if (!$row->store()) {
		echo "<script> alert('".$row->getError()."');
		window.history.go(-1);
		</script>\n";
		exit();
	}
	$this->setRedirect('index.php?option=' . $option . '&task=subscriber', 'Subscriber changes saved');
}
function removeSubscriber(){	
	global $option;
	$cid = JRequest::getVar( 'cid', array(), '', 'array');
	$db =& JFactory::getDBO();
	if (count($cid)){
		$cids = implode(',', $cid);
		$query = "DELETE FROM #__w_newsletter_subscribers WHERE id IN ( $cids ) ";
		$db->setQuery($query);
		if (!$db->query()){
			echo "<script> alert('loi roi ". $db->getErrorMsg() ."');
			window.history.go(-1); \n </script>";			
		}
	}
	$this->setRedirect('index.php?option='. $option .'&task=subscriber');
}

/************************************************************/
/*                          Khu vuc contact                                                */
/************************************************************/
function contact()
{
	global $option, $mainframe;
	$db =& JFactory::getDBO();
	$context			= 'com_wnewsletter.showcontact';	
	$search				= $mainframe->getUserStateFromRequest( $context.'search',			'search',			'',	'string' );
	$search				= JString::strtolower($search);

	if ($search) {		
		$where = ' WHERE (LOWER( s.name ) LIKE '.$db->Quote( '%'.$db->getEscaped( $search, true ).'%', false ) .
			' OR LOWER( c.company ) LIKE '.$db->Quote( '%'.$db->getEscaped( $search, true ).'%', false ) . ')';
	}
	
	$limit = JRequest::getVar('limit',$mainframe->getCfg('list_limit'));
	$limitstart = JRequest::getVar('limitstart', 0);
	$db =& JFactory::getDBO();
	$query = "SELECT count(*) FROM #__w_newsletter_contacts ". $where;
	$db->setQuery( $query );
	$total = $db->loadResult();
	$query = "SELECT c.*, s.name FROM #__w_newsletter_contacts as c
	INNER JOIN #__w_newsletter_subscribers as s 
	ON c.subscriber_id = s.id
	 ". $where;
	$db->setQuery( $query, $limitstart, $limit );
	$rows = $db->loadObjectList();
	if ($db->getErrorNum()) {
	echo $db->stderr();
	return false;
}
jimport('joomla.html.pagination');
$pageNav = new JPagination($total, $limitstart, $limit);
HTML_newsletter::showContact( $option, $rows, $pageNav );
}

function editContact(){
	global $option;
	$row = JTable::getInstance('contact', 'Table');
	$cid = JRequest::getVar('cid', array(0), '', 'array');
	$id = $cid[0];
	$row->load($id);
	HTML_newsletter::editContact( $row, $option );	
}

function saveContact(){
	global $option;
	$row = JTable::getInstance('contact', 'Table');
	if(!$row->bind(JRequest::get('post'))){
		echo "<script> alert('". $row->getError() ."');
		window.history.go(-1); 
		</script>\n; ";
		exit();
	}
	if(!$row->store()){
		echo "<script> alert('". $row->getError() ."');
		window.history.go(-1);
		</script>\n; ";
		exit();
	}
	$this->setRedirect('index.php?option='. $option .'&task=contact');
}

function addContact(){
	$this->editContact();
}
function removeContact(){
	global $option;
	$cid = JRequest::getVar( 'cid', array(), '', 'array');
	$db =& JFactory::getDBO();
	if (count($cid)){
		$cids = implode(',', $cid);
		$query = "DELETE FROM #__w_newsletter_contacts WHERE id IN ( $cids ) ";
		$db->setQuery($query);
		if (!$db->query()){
			echo "<script> alert('loi roi ". $db->getErrorMsg() ."');
			window.history.go(-1); \n </script>";			
		}
	}
	$this->setRedirect('index.php?option='. $option .'&task=contact');
}
/************************************************************/
/*                          Khu vuc send mail                                              */
/************************************************************/
function sendMail(){
	global $option;
	$row =& JTable::getInstance('newsletter', 'Table');	
	$cid = JRequest::getVar( 'cid', array(0), '', 'array');
	$id = $cid[0];
	$row->load($id);
	// get category
	$db =& JFactory::getDBO();
	$query = "SELECT * FROM #__w_newsletter_categories";
	$db->setQuery($query);
	$results = $db->loadObjectList();
	$category = array();	
	foreach ($results as $result)
	{
		$category[] = array('value' => $result->id, 'text' => $result->name);		
	}	
	$acl =& JFactory::getACL();
	$gtree = array(
		JHTML::_('select.option',  0, '- '. JText::_( 'Khong su dung' ) .' -' )
	);
	// get list of groups
	$lists = array();
	$gtree = array_merge( $gtree, $acl->get_group_children_tree( null, 'users', false ) );
	$lists['gid'] = JHTML::_('select.genericlist',   $gtree, 'mm_group', 'size="10"', 'value', 'text', 0 );
	$lists['category'] = JHTML::_('select.genericlist',
		$category, 'cat_id', 'class="inputbox" '. '',	'value', 'text', $row->cat_id );
	HTML_newsletter::sendMail($option, $row, $lists);
	}
function send(){
	global $option;
	$db =& JFactory::getDBO();
	$query = "SELECT * FROM #__w_newsletter_subscribers";
	$db->setQuery($query);
	$rows = $db->loadObject();	
	echo $rows->name;
	}

/************************************************************/
/*                          Khu vuc category                                             */
/************************************************************/
function category()
{
	global $option, $mainframe;
	$limit = JRequest::getVar('limit',$mainframe->getCfg('list_limit'));
	$limitstart = JRequest::getVar('limitstart', 0);
	$db =& JFactory::getDBO();
	$query = "SELECT count(*) FROM #__w_newsletter_categories";
	$db->setQuery( $query );
	$total = $db->loadResult();
	$query = "SELECT * FROM #__w_newsletter_categories";
	$db->setQuery( $query, $limitstart, $limit );
	$rows = $db->loadObjectList();
	if ($db->getErrorNum()) {
		echo $db->stderr();
		return false;
	}
jimport('joomla.html.pagination');
$pageNav = new JPagination($total, $limitstart, $limit);
HTML_newsletter::showCategory( $option, $rows, $pageNav );
}

function editCategory(){
	global $option;
	$row = JTable::getInstance('category', 'Table');
	$cid = JRequest::getVar( 'cid', array(0), '', 'array');
	$id = $cid[0];
	$row->load($id);	
	HTML_newsletter::editCategory($row, $option);
}
function addCategory(){
	$this->editCategory();
}
function saveCategory(){
	global $option;
	$row = JTable::getInstance('category', 'Table');
	if (!$row->bind(JRequest::get('post'))){
		echo "<script> alert('". $row->getError() ."');
			window.history.go(-1); \n";
		exit();
	}
	if (!$row->store()) {
		echo "<script> alert('".$row->getError()."');
		window.history.go(-1);
		</script>\n";
		exit();
	}
	$this->setRedirect('index.php?option=' . $option . '&task=category', 'Category changes saved');
}
function deleteCategory(){
	global $option;
	$cid = JRequest::getVar( 'cid', array(), '', 'array');
	$db =& JFactory::getDBO();
	if (count($cid)){
		$cids = implode(',', $cid);
		$query = "DELETE FROM #__w_newsletter_categories WHERE id IN ( $cids ) ";
		$db->setQuery($query);
		if (!$db->query()){
			echo "<script> alert('loi roi ". $db->getErrorMsg() ."');
			window.history.go(-1); \n </script>";			
		}
	}
	$this->setRedirect('index.php?option='. $option .'&task=category');
}	
	//end class
}


?>