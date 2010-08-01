<?php
        // comment
	require_once ('../application/bootstrap.php');
	$configSection = getenv('PLACES_CONFIG') ? getenv('PLACES_CONFIG') : 'general';
	$bootstrap = new Bootstrap($configSection);
	$bootstrap->runApp();
?>


