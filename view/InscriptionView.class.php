<?php
	
	class InscriptionView extends View{
		protected $args;
		protected $templateNames;
		
		public function __construct($controller, $templateName, $args = array()){
			$this->templateNames              = array();
			$this->templateNames['head']    ='head';
			$this->templateNames['top']     ='top';
			$this->templateNames['menu']    ='menu';
			$this->templateNames['foot']    ='foot';
			$this->templateNames['content'] = $templateName;
			$this->args                       = $args;
			$this->args['controller']       = $controller;		
		}
		
		public function render(){
			parent::render();
		}
	}
	
?>