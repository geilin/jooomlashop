<?php

// no direct access
defined('_JEXEC') or die('Restricted access'); 
?>
<?php

jimport( 'joomla.application.component.view');
 
/**
 * HTML View class for the VVisitCounter Component
 *
 * @package    Vinaora.Visitors.Counter
 */
 
class VVisitCounterViewVVisitCounter extends JView
{
    /**
     * VVisitCounter view display method
     * @return void
     **/
    function display($tpl = null)
    {
        JToolBarHelper::title( JText::_( 'Site Statistic Help' ), 'generic.png' );
        parent::display($tpl);
    }
}

?>