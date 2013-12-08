<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <!--[if lt IE 7 ]><html lang="en" class="no-js ie6"> <![endif]-->
 <!--[if IE 7 ]><html lang="en" class="no-js ie7"> <![endif]-->
 <!--[if IE 8 ]><html lang="en" class="no-js ie8"> <![endif]-->
 <!--[if IE 9 ]><html lang="en" class="no-js ie9"> <![endif]-->
 <!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->

<head>
    <title> <? __sc('transitions_lifetstyle'); ?> </title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Transitions lifestyle system" />
    <meta name="keywords" content="transitions lifestyle system" />
    
	<? $cTime = time(); ?>
    <?=$javascript->link('jquery-1.4.4.min.js')?>
    <?=$javascript->link('hoverIntent')?>
    <?php echo $html->css('transition_reset.css?t='.$cTime); ?>
    <?php echo $html->css('transition_search.css?t='.$cTime); ?>
    <?php echo $html->css('transition_t.css?t='.$cTime); ?>
    <?php echo $html->css('transition_nav.css?t='.$cTime); ?>
	<?php echo $html->css('jquery-ui-1.8.9.custom.css?t='.$cTime); ?>

</head>

<body>
	<div id="container">
		<? echo $this->element('transation_header') ?>
		<?=$content_for_layout?>
    	<div class="clear"></div>
		<? echo $this->element('transation_footer') ?>
        <div class="clear"></div>
    </div>
</body>

</html>