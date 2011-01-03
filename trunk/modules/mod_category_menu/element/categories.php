<?php

class JElementCategories extends JElement {

  var   $_name = 'Categories';

  function fetchElement($name, $value, &$node, $control_name)
  {
    $db = &JFactory::getDBO();
	
	$query = 'SELECT c.id AS value, c.name AS text' .
        ' FROM #__w_categories AS c' .
        ' WHERE c.published = 1 AND c.parentid=0';
	
	
    $db->setQuery($query);
    $options = $db->loadObjectList();
    
    /*$optionlist = array();
    $optgroup   = array();
    foreach ( $options as $opt ) {
        
        if ( $opt->parentid == 0 ) {
            $optgroup[$opt->value] = $opt;
        }
        else 
		{
            if ($optgroup[$opt->parentid]) {
                $optionlist[] = JHTML::_('select.optgroup', $optgroup[$opt->parentid]->text);;
                $optgroup[$opt->parentid] = FALSE;
            }
            $optionlist[] = JHTML::_('select.option', $opt->value . '#' . $opt->text, $opt->text);
        }

    }  
    
    return JHTML::_(
     'select.genericlist', // Because we are creating a 'select' element
     $optionlist,             // The options we created above
     $control_name.'['.$name.'][]',        // The name your select element should have in your HTML 
     'class="inputbox" size="15" multiple="multiple"',          // Extra parameters to add to your element
     'value',              // The name of the object variable for the option value
     'text',               // The name of the object variable for the option text
     $value,       // The key that is selected (accepts an array or a string)
     false                 // Translate the option results?
    );*/
	
    return JHTML::_('select.genericlist',  $options, ''.$control_name.'['.$name.'][]', 
      'class="inputbox"',
      'value', 'text', $value, $control_name.$name);
  
  }
}