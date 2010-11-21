<?php
class Zend_View_Helper_DisplayDate
{
    function displayDate($timestamp,$format=Zend_Date::DATE_LONG)
    {
        $date = new Zend_Date($timestamp,'en_GB');
        return $date->get($format);
    }
}
?>
