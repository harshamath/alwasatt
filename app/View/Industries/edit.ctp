<ul class="breadcrumb">
    <li><a href="#">Dashboard</a> <span class="divider">>></span></li>
    <li><?php echo $this->Html->link(__('List Industries'), array('action' => 'index')); ?> <span class="divider">>></span></li>
    <li><a href="#"></a> <span class="divider"><?php echo __('Edit Industry'); ?></span></li>
</ul>
<div class="clr"></div>
<div class="inner_hdng"><h2><?php echo __('Edit Industry'); ?></h2></div>
<div class="clr"></div>
<?php echo $this->Session->flash(); ?>
<div class="advertismnt_banner">
    <div class="lft_section">
        <h2><?php echo __('Edit Industry'); ?></h2>
        <div class="clr"></div>
    </div>
    <div class="right_section admin_role_bg">
        <?php echo $this->Form->create('Industry'); ?>
        <fieldset>
            <?php
            echo $this->Form->input('id');
            echo $this->Form->input('name');
            ?>
        </fieldset>
        <?php echo $this->Form->end(__('Submit')); ?>
        <div class="clr"></div>
    </div>
    <div class="clr"></div>
</div>
