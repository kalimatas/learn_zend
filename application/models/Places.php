<?php
class Places extends Zend_Db_Table{
	protected $_name = 'places';

	function fetchLatest($count = 10){
		return $this->fetchAll(null,'date_created DESC', $count);
	}
}
?>
