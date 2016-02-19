<div class="timelossReasons form">
<?php echo $this->Form->create(null,array(
	'url' => array('controller' => 'TimeLossReasons', 'action' => 'add'),
    'class' => 'form-horizontal',
    'inputDefaults' => array(
        'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
        'div' => array('class' => 'control-group'),
        'label' => array('class' => ' col-sm-2 control-label'),
        'between' => '<div class="col-xs-10">',
        'after' => '</div>',
        'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
    )));//('TimelossReason'); ?>
	<fieldset>
		<legend><?php echo __('Add Reason for Time Loss'); ?></legend>
	<?php
		echo $this->Form->input('type', array(
			'options' => array('LossHour'=>'LossHour','BreakDown'=>'BreakDown'),
			'empty' => 'Select one'
		));
		echo $this->Form->input('reason');

		echo $this->Form->input('department', array(
			'options' => array('laminating'=>'laminating','calender'=>'calender','printing'=>'printing','rexin'=>'rexin'),
			'empty' => 'Select one'
		));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Reasons for Time Loss'), array('action' => 'index')); ?></li>
	</ul>
</div>