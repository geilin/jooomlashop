<?php
	defined('_JEXEC') or die('Restricted access');

	// Include the statistic helper functions only once
	require_once (dirname(__FILE__).DS.'helper.php');

	$totalonline  		= modSiteStatisticHelper::getTotalOnline();
	$total_visited		= modSiteStatisticHelper::getTotalVisited();

	$more_visitor		= (int)$params->get('more_visitor');
	$more_user_online	= (int)$params->get('more_user_online');


	$session = &JFactory::getSession();
	$user_has_visited = $session->get('user_has_visited', false );
	if ($user_has_visited === false) {
		$session->set('user_has_visited', true );		
		modSiteStatisticHelper::addVisitor();
		$total_visited = $total_visited+1;
	}

	$totalonline = $totalonline + $more_user_online; 

	$total_visited = $total_visited + $more_visitor;

	require(JModuleHelper::getLayoutPath('mod_site_statistic'));

?>