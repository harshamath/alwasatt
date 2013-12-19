<?php
/*
 * Handles System wide services related to User Education / Experiences / Skills sections
 * @filesource
 * @copyright		Copyright 2013, Alwasatt
 * @link			TBD
 * @package			Alwasatt
 * @subpackage		app.plugins.api.controllers.components
 * @version			1.0
 * @createdOn 		$Date: 2013-12-19
 * @copyright Copyright (c) 2013, Alwasatt
 * @author WaQaR Aziz
*/

class ProfileComponent extends Component {

	public function initialize(Controller $controller) {
		// Fired before the controller's beforeFilter method.
		$this->controller = $controller;
	}
	
	public function startup(Controller $controller) { 
		// Fired after the controller's beforeFilter method.	
	}
	
}
?>