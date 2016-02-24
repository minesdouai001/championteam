<?php
	
	class UserView extends View{
		protected $args;
		protected $templateNames;
		
		public function __construct($controller, $templateName, $args = array()){
			parent::__construct($controller, $templateName, $args);
			$this->templateNames['top']     ='userTop';
			$this->templateNames['menu']    ='userMenu';
			
			if(!$this->args['user'])
			throw new Exception('a user must be defined');
		}
	}

?>