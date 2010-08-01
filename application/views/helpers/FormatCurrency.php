<?php
	class Zend_View_Helper_FormatCurrency{
		public function formatCurrency($name = 'hello name'){ 
			$output = "<h3>".$name."</h3>";
			return $output;
		}
	}
?>
