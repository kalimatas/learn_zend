<?php
class IndexController extends Zend_Controller_Action{
    public function init()
    {
        $this->view->initvar = 'This is init Var';
        $this->view->headMeta()->setName('Content-Type','text/html; charset=utf-8');
        $this->view->doctype('XHTML1_STRICT');
        $this->view->headLink()->appendStylesheet('/css/site.css');
        $this->view->headTitle('Zend Framework');
    }

    public function preDispatch()
    {
        $this->view->prevar = 'This is pre var!';
    }

    public function indexAction()
    {
        $this->view->title = 'Welcome';
        $placeFinder = new Places();
        $this->view->places = $placeFinder->fetchLatest();

    }

    public function myAction()
    {
        $this->view->title = 'My Action';
    }

}
?>
