<?php

class ApiComponent extends Component {
	
	public function initialize(Controller $controller) {
		// Fired before the controller's beforeFilter method.
		$this->controller = $controller;
	}
	
	public function startup(Controller $controller) { 
		// Fired after the controller's beforeFilter method.	
	}
	
}
?>