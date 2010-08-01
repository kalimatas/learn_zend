<?php
	class Zend_View_Helper_MyHelper{
		public function myHelper($name = 'hello name'){ 
			$output = "<h3>".$name."</h3>";
			return $output;
		}
	}
?>
