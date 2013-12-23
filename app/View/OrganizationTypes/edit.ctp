<ul class="breadcrumb">
    <li><a href="#">Dashboard</a> <span class="divider">>></span></li>
    <li><?php echo $this->Html->link(__('List Organization Types'), array('action' => 'index')); ?> <span class="divider">>></span></li>
    <li><a href="#"></a> <span class="divider"><?php echo __('Edit Organization Type'); ?></span></li>
</ul>
<div class="clr"></div>
<div class="inner_hdng"><h2><?php echo __('Edit Organization Type'); ?></h2></div>
<div class="clr"></div>
<?php echo $this->Session->flash(); ?>
<div class="advertismnt_banner">
    <div class="lft_section">
        <h2><?php echo __('Edit Organization Type'); ?></h2>
        <p>Provide users a list of skills to choose.</p>
        <div class="clr"></div>
    </div>
    <div class="right_section admin_role_bg">
        <?php echo $this->Form->create('OrganizationType'); ?>
        <fieldset>
            <legend><?php echo __('Edit Organization Type'); ?></legend>
            <?php
            echo $this->Form->input('id');
            echo $this->Form->input('name');
            echo $this->Form->input('active');
            ?>
        </fieldset>
        <?php echo $this->Form->end(__('Submit')); ?>
        <div class="clr"></div>
    </div>
    <div class="clr"></div>
</div>