<ul class="breadcrumb">
    <li><a href="#">Dashboard</a> <span class="divider">>></span></li>
    <li><?php echo $this->Html->link(__('List Skills'), array('action' => 'index')); ?> <span class="divider">>></span></li>
    <li><a href="#"></a> <span class="divider"><?php echo __('Add Skill'); ?></span></li>
</ul>
<div class="clr"></div>
<div class="inner_hdng"><h2><?php echo __('Add Skill'); ?></h2></div>
<div class="clr"></div>
<?php echo $this->Session->flash(); ?>
<div class="advertismnt_banner">
    <div class="lft_section">
        <h2><?php echo __('Add Skill'); ?></h2>
        <p>Provide users a list of skills to choose.</p>
        <div class="clr"></div>
    </div>
    <div class="right_section admin_role_bg">
        <?php echo $this->Form->create('Skill'); ?>
        <fieldset>
            <?php
            echo $this->Form->input('name');
            ?>
        </fieldset>
        <?php echo $this->Form->end(__('Submit')); ?>
        <div class="clr"></div>
    </div>
    <div class="clr"></div>
</div>