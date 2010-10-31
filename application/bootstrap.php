<?php
/**
 * Bootstrap file 
 */ 
class Bootstrap{
	public function __construct($configSection){
		error_reporting(E_ALL|E_STRICT);
		ini_set('displya_errors','on');

		// root dir
		$rootdir =  dirname(dirname(__FILE__));
		define('ROOT_DIR',$rootdir);
		// include path
		set_include_path(ROOT_DIR . '/library' . 
		PATH_SEPARATOR  . ROOT_DIR . '/application/models' . 
		PATH_SEPARATOR . get_include_path());
		// autoload
		require_once('Zend/Loader/Autoloader.php');
		$autoloader = Zend_Loader_Autoloader::getInstance();
		$autoloader->setFallbackAutoloader(true); 
		
		// configuration
		Zend_Registry::set('configSection',$configSection);
		$config = new Zend_Config_Ini(ROOT_DIR .'/application/config.ini',$configSection);
		Zend_Registry::set('config',$config);
		date_default_timezone_set($config->date_default_timezone);
        // db configs
        $db = Zend_Db::factory($config->db);
        Zend_Db_Table_Abstract::setDefaultAdapter($db);
        Zend_Registry::set('db',$db);
	}

    /**
     * Configure Front Controller
     */ 
	public function configFront(){
		$front = Zend_Controller_Front::getInstance();
		$front->setControllerDirectory(ROOT_DIR . '/application/controllers');
        $front->registerPlugin(new Places_Controller_Plugin_ViewSetup());
        //$front->registerPlugin(new Places_Controller_Plugin_ActionSetup(), 98);
	}

    /**
     * Run Application
     */ 
	public function runApp(){
		$this->configFront();
        // setup layout
        /*
         *Zend_Layout::startMvc(
         *    array('layoutPath' => ROOT_DIR . '/application/views/layouts')
         *);
         */
        $config = Zend_Registry::get('config');
        Zend_Layout::startMvc($config->layout);
		$front = Zend_Controller_Front::getInstance();
		$front->dispatch();
	}
}
?>
