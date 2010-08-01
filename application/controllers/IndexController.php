<?php
	class IndexController extends Zend_Controller_Action{
		public function init(){
			$this->view->initvar = 'This is init Var';
		}
		public function preDispatch(){
			$this->view->prevar = 'This is pre var!';
		}
		public function indexAction(){
			$this->view->title = 'Welcome';
			$placeFinder = new Places();
			$this->view->places = $placeFinder->fetchLatest();

		}

	}
?>
