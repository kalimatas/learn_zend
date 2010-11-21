<?php
/**
 * Controller Plugin
 */    
class Places_Controller_Plugin_ViewSetup extends Zend_Controller_Plugin_Abstract
{
    /**
     * @var Zend_View
     */
    protected $_view;

    public function dispatchLoopStartup(Zend_Controller_Request_Abstract $request)
    {
        // initializes ViewRenderer
        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');    
        $viewRenderer->init();
        $view = $viewRenderer->view;
        $this->_view = $view;

        // Sets variables
        $view->originalModule = $request->getModuleName();
        $view->originalController = $request->getControllerName();
        $view->originalAction = $request->getActionName();

        // Set doctype for view helpers
        $view->doctype('XHTML1_TRANSITIONAL');

        // Adds new helper path to Places view helpers
        $prefix = 'Places_View_Helper';
        $dir = dirname(__FILE__) . '/../../View/Helper';
        $view->addHelperPath($dir, $prefix);

        $view->headMeta()->setName('Content-Type','text/html; charset=utf-8');
        //$view->headLink()->appendStylesheet($view->baseUrl().'/css/site.css');
        /*
         *$request = Zend_Controller_Front::getInstance()->getRequest();
         *$view->headTitle($request->getActionName())
         *     ->headTitle($request->getControllerName());
         *$view->headTitle('Page Title');
         */
    }

    public function postDispatch(Zend_Controller_Request_Abstract $request)
    {
        if (!$request->isDispatched()){
            return;
        }
        $view = $this->_view;
        if (count($view->headTitle()->getValue()) == 0){
            $view->headTitle($view->title);
        }
        $view->headTitle()->setSeparator(' - ');
        $view->headTitle('Places to take the monsters!');
    }

    public function dispatchLoopShutdown()
    {
        //$this->getResponse()->appendBody("<p>Shutdown!</p>");
    }
}
?>
