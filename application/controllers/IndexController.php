<?php
class IndexController extends Zend_Controller_Action{

    public function init()
    {
        $this->view->initvar = 'This is init Var';
        $this->view->headMeta()->setName('Content-Type','text/html; charset=utf-8');
        //$this->view->headLink()->appendStylesheet('/css/site.css');
        //$this->_helper->layout->setLayout('layout1');
    }

    public function preDispatch()
    {
        $this->view->prevar = 'This is pre var!';
    }

    public function indexAction()
    {
        $this->view->headTitle('Welcome');
        $placeFinder = new Places();
        $this->view->places = $placeFinder->fetchLatest();
    }

    public function myAction()
    {
        $this->view->title = 'My Action';
    }

    public function menuAction()
    {
        $mainMenu = array(
            array('title' => 'Home',
            'url'=>$this->view->url(array(),null,true)),
            array('title'=>'Browse Places',
            'url'=>$this->view->url(array('controller'=>'place','action'=>'browse'),null,true)),
            array('title'=>'Articles',
            'url'=>$this->view->url(array('controller'=>'articles'),null,true)),
            array('title'=>'About',
            'url'=>$this->view->url(array('controller'=>'about'),null,true))
        );
        $this->view->menu = $mainMenu;
        $this->_helper->viewRenderer->setResponseSegment('menu');
    }

    public function advertAction()
    {
        $this->_helper->viewRenderer->setResponseSegment('advert');
    }

}
?>
