<div class="dimensiontarget form">
<?php 
	echo $this->Form->create(null,array(

	'url' => array('controller' => 'DimensionTarget', 'action' => 'add'),
    'class' => 'form-horizontal',

    'inputDefaults' => array(
        'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
        'div' => array('class' => 'control-group'),
        'label' => array('class' => ' col-sm-2 control-label'),
        'between' => '<div class="col-xs-10">',
        'after' => '</div>',
        'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
    )));//('Dimension'); ?>
	<fieldset>
		<legend><?php echo __('Add Target'); ?></legend>
	<?php
		echo $this->Form->input('dimension',['type'=>'select','empty'=>'Choose One','required'=>'required']);
		echo $this->Form->input('type',['type'=>'select','empty'=>'Choose One','required'=>'required']);
		echo $this->Form->input('brand',['type'=>'select','empty'=>'Choose One','required'=>'required']);
		echo $this->Form->input('target');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Dimension Target'), array('action' => 'index')); ?></li>
	</ul>
</div>