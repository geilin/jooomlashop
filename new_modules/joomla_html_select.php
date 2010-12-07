<?php
// Define arrays filled with test data; would normally come from your database
$cars = array('Ferrari', 'Bugatti', 'Porsche');
$babes = array('Megan Fox', 'Alyssa Milano', 'Doutzen Kroes');

// Create an empty array to be filled with options
$options = array();

// Create the initial option
$options[] = JHTML :: _('select.option', '', '- What do you like most -');

// Open our 'Cars' optgroup
$options[] = JHTML::_('select.optgroup', 'Cars');

// Loop through the 'Cars' data
foreach($cars as $key => $text) {
 // Create each option tag within this optgroup
 $options[] = JHTML::_('select.option', $key, $text);
}

// Use the hack below to close the optgroup
$options[] = JHTML::_('select.option', '');

// Now open our 'Babes' optgroup
$options[] = JHTML::_('select.optgroup', 'Babes');

// Loop through the 'Babes' data this time
foreach($babes as $key => $text) {
 // Create each option tag within this optgroup
 $options[] = JHTML::_('select.option', $key, $text);
}

// Use the hack below to close this last optgroup
$options[] = JHTML::_('select.option', '');

// Generate the select element with our parameters
$select = JHTML::_(
 'select.genericlist', // Because we are creating a 'select' element
 $options,             // The options we created above
 'select_name',        // The name your select element should have in your HTML 
 'size="1" ',          // Extra parameters to add to your element
 'value',              // The name of the object variable for the option value
 'text',               // The name of the object variable for the option text
 'selected_key',       // The key that is selected (accepts an array or a string)
 false                 // Translate the option results?
);
 
// Display our select box
echo $select;
