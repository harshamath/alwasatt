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
?>
<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $title_for_layout; ?>
        </title>
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>    
        <?php echo $this->Html->script('html5shiv'); ?>
        <![endif]-->
        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css('cake.generic');
        echo $this->Html->css('bootstrap');
        echo $this->Html->css('bootstrap-responsive');
        echo $this->Html->script('jquery');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
        <script>

            $(document).ready(function() {
                $("#msg").click(function() {
                    $("#drop-down").toggle();
                });
                $("#notifications").click(function() {
                    $("#drop-down2").toggle();
                });
                $("#lft_nav").click(function() {
                    $("#lft_sub").slideToggle();
                });
            });


        </script>
    </head>
    <body>
        <?php echo $this->element('admin/top_header'); ?>
        <div class="row-fluid bg">
            <?php echo $this->element('admin/left_nav'); ?>
            <div class="span10">                
                <?php echo $this->fetch('content'); ?>
            </div>

            <div class="clr"></div>
            <div class="footer"><p class="copy">Copyrights 2013. Alwasatt All rights reserved</p></div><!--end footer-->
            <div class="clr"></div>
        </div>


        <?php // echo $this->element('sql_dump');  ?>

        <!-- Placed at the end of the document so the pages load faster -->
        <?php
        echo $this->Html->script('widgets');
        echo $this->Html->script('jquery');
        echo $this->Html->script('bootstrap/bootstrap-transition');
        echo $this->Html->script('bootstrap/bootstrap-alert');
        echo $this->Html->script('bootstrap/bootstrap-modal');
        echo $this->Html->script('bootstrap/bootstrap-dropdown');
        echo $this->Html->script('bootstrap/bootstrap-scrollspy');
        echo $this->Html->script('bootstrap/bootstrap-tab');
        echo $this->Html->script('bootstrap/bootstrap-tooltip');
        echo $this->Html->script('bootstrap/bootstrap-popover');
        echo $this->Html->script('bootstrap/bootstrap-button');
        echo $this->Html->script('bootstrap/bootstrap-collapse');
        echo $this->Html->script('bootstrap/bootstrap-carousel');
        echo $this->Html->script('bootstrap/bootstrap-typeahead');
        echo $this->Html->script('bootstrap/bootstrap-affix');
        echo $this->Html->script('holder/holder');
        echo $this->Html->script('google-code-prettify/prettify');
        echo $this->Html->script('application');
        ?>
    </body>
</html>
