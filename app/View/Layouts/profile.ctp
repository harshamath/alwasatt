<?php
/**
 *
 * PHP 5
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
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
$cakeDescription = __d('cake_dev', 'Alwasatt');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $cakeDescription ?>:
            <?php echo $title_for_layout; ?>
        </title>
         <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css('bootstrap');
        echo $this->Html->css('theme');
		echo $this->Html->css('custom');
        
        echo $this->Html->script('jquery');
        
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
		
        ?>
    </head>
    <body>
    <?php echo $this->element('header_new'); ?>
<div class="container">
    <div class="row">
		  <?php echo $this->element('profile_side'); ?> 
          <?php echo $this->fetch('content'); ?>      
        
    </div>
</div>

<div class="container">
  <div class="footer">
    <div class="row">
      <div class="col-lg-9">
        <ul class="nav nav-pills">
          <li><a href="javascript:;">Home</a></li>
          <li><a href="javascript:;">Why Alwasatt</a></li>
          <li><a href="javascript:;">Contact Us</a></li>
          <li><a href="javascript:;">العربية</a></li>
        </ul>
        <div class="cntnt-footr"> <a class="click_img" href="javascript:;"> <img alt="" src="<?php echo $this->Html->url('/images/footer_logo.jpg')?>"> </a>
          <p> © Alwasatt 2010-2012 -By signing up and using Alwasatt, you are indicating that you have read,understood and agreed to the <a href="#">Tearms and Conditions</a> <a href="#">Copyright Policies,</a> and <a href="#">Confidentiality Agreement</a> of the website. </p>
        </div>
      </div>
      <div class="col-lg-3">
        <ul class="social">
          <li><a href="#" target="_blank" class="tw">Twitter</a></li>
          <li><a href="#" target="_blank" class="fb">Facebook</a></li>
          <li><a href="#" target="_blank" class="in">Linkedin</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
</body>
</html>
