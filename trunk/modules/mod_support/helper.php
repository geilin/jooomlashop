<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class modSupportHelper {
	static $_default_name = 'Nissi Audio';
	
	static $_delimiter = ',';
	
	public static function proccess_yahoo_support($yahoos, $names) {	
		$supports = array();
		if (strlen($yahoos)) {
			$yahoos = explode(self::$_delimiter, $yahoos);
			$names = explode(self::$_delimiter, $names);
			$total = count($yahoos);
			if ($total) {
				for( $i = 0; $i < $total; $i++) {			
					$supports[$i]['yh_id'] = trim($yahoos[$i]);
					$supports[$i]['yh_name'] = isset($names[$i])? trim($names[$i]): self::$_default_name .' '. $i;
				}
			}
		}
		return $supports;
	}
	
}