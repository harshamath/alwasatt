<?php
/**
 *
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
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>

<div class="row-fluid">
    <div class="span12 header">
        <a href="#."><img src="images/inner_logo.jpg" alt="image" /></a>
        
        <ul>
            <li>
                <a href="#." id="msg"><img src="images/msg_icon.jpg" alt="image" /></a>
                <div class="dropdown-box" style="display:none;" id="drop-down">
                    <div class="dropdown-content">    
                        <div class="dropdown-viewall">
                            <a href="#">View All Messages</a>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <a href="#." id="notifications"><img src="images/info_icon.png" alt="image" /></a>
                <div class="dropdown-box" style="display:none;" id="drop-down2">
                    <div class="dropdown-content">
                        <div class="dropdown-viewall">
                            <a href="#">View All Messages</a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="three">
                <a href="#."><img src="images/user_image.jpg" alt="image" /></a>
                <h2>welcome Admin User</h2><br />
                <ul>
                    <li><a href="#.">Change Password</a></li>
                    <li><a href="#.">Logout</a></li>
                </ul>
            </li>
        </ul>
        <div class="clr"></div>
    </div><!--end span12-->
	<div class="clr"></div>
</div>