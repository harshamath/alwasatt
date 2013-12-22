<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
	
	Router::connect('/edu_degrees', array('plugin' => 'Api', 'controller' => 'ProfileServices', 'action' => 'list_degrees'));
	Router::connect('/edu_majors', array('plugin' => 'Api', 'controller' => 'ProfileServices', 'action' => 'major_fields_of_study'));
	Router::connect('/search_college', array('plugin' => 'Api', 'controller' => 'ProfileServices', 'action' => 'college_search'));
	Router::connect('/search_companies', array('plugin' => 'Api', 'controller' => 'ProfileServices', 'action' => 'companies'));
	Router::connect('/occupations', array('plugin' => 'Api', 'controller' => 'ProfileServices', 'action' => 'occupations'));
	Router::connect('/skills', array('plugin' => 'Api', 'controller' => 'ProfileServices', 'action' => 'skills'));
	
	Router::connect('/rem_user_skill/*', array('plugin' => 'Api', 'controller' => 'ProfileServices', 'action' => 'remove_user_skill'));
	Router::connect('/add_user_skill', array('plugin' => 'Api', 'controller' => 'ProfileServices', 'action' => 'add_user_skill'));
	
	
?>