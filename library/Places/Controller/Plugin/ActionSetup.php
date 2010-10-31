<?php

class Places_Controller_Plugin_ActionSetup extends 
      Zend_Contoller_Plugin_Abstract
{
    public function dispatchLookStartup(
                Zend_Contoller_Request_Abstract $request)
    {
        $front = Zend_Controller_Front::getInstance();
        if ( !$front->hasPlugin('Zend_Controller_Plugin_ActionStack') ){
            $actionStack = new Zend_Controller_Plugin_ActionStack();
            $front->registerPlugin($actionStack, 97);
        } else {
            $actionStack = $front->getPlugin('Zend_Controller_Plugin_ActionStack');
        }

        $menuAction = clone($request);
        $menuAction->setActionName('menu')
                   ->setControllerMenu('index');
        $actionStack->pushStack($menuAction);

        $advertAction = clone($request);
        $advertAction->setActionName('advert')
                   ->setControllerMenu('index');
        $actionStack->pushStack($advertAction);
    }
}

?>
