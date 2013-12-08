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

//$projDescription = __d('alwassat_social', 'Al-Wassat Social');
?>
<!DOCTYPE html>
<html>
<head>
	<?php // echo $this->Html->charset(); ?>
	<title>
		<?php // echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
	/*
		echo $this->Html->meta('icon');
		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	*/	
	?>

    <?=$this->Html->css('bootstrap.css')?>
	<?=$this->Html->css('bootstrap-responsive.css')?>
	
	<?=$this->Html->script('jquery-1.10.2.min'); ?>
    <?=$this->Html->script('bootstrap/bootstrap-transition'); ?>
    <?=$this->Html->script('bootstrap/bootstrap-alert'); ?>
    <?=$this->Html->script('bootstrap/bootstrap-modal'); ?>
    <?=$this->Html->script('bootstrap/bootstrap-dropdown'); ?>
    <?=$this->Html->script('bootstrap/bootstrap-scrollspy'); ?>
    <?=$this->Html->script('bootstrap/bootstrap-tab'); ?>
    <?=$this->Html->script('bootstrap/bootstrap-tooltip'); ?>
    <?=$this->Html->script('bootstrap/bootstrap-popover'); ?>
    <?=$this->Html->script('bootstrap/bootstrap-button'); ?>
    <?=$this->Html->script('bootstrap/bootstrap-collapse'); ?>
    <?=$this->Html->script('bootstrap/bootstrap-carousel'); ?>
    <?=$this->Html->script('bootstrap/bootstrap-typeahead'); ?>
    <?=$this->Html->script('bootstrap/bootstrap-affix'); ?>
    <?=$this->Html->script('holder/holder'); ?>
    <?=$this->Html->script('google-code-prettify/prettify'); ?>
    <?=$this->Html->script('application'); ?>
	
<script>

	$(document).ready(function(){
		$("#msg").click(function(){
			$("#drop-down").toggle();
		});
		$("#notifications").click(function(){
			$("#drop-down2").toggle();
		});
		$("#lft_nav").click(function(){
			$("#lft_sub").slideToggle();
		});
	});
	
	
</script>    
</head>

<body>
	<div id="container">
		<div id="content">
        	<?php echo $this->element('admin/top_header'); ?>
            <?php echo $this->element('admin/left_nav'); ?>
			<?php echo $content_for_layout;?>
		</div>
		<div id="footer">
		</div>
	</div>
	<?php // echo $this->element('sql_dump'); ?>
</body>
</html>
