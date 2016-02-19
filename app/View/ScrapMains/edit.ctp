<div class="scrapMains form">
<?php echo $this->Form->create(null,array(
	'url' => array('controller' => 'ScrapMains', 'action' => 'edit'),
    'class' => 'form-horizontal',
    'inputDefaults' => array(
        'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
        'div' => array('class' => 'control-group'),
        'label' => array('class' => ' col-sm-2 control-label'),
        'between' => '<div class="col-xs-10">',
        'after' => '</div>',
        'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
    )));//('ScrapMain'); ?>
	<fieldset>
		<legend><?php echo __('Edit Scrap Main'); ?></legend>
	<?php
		echo $this->Form->input('date',array('class'=>'input-ms'));
		echo $this->Form->input('type',array('class'=>'input-ms'));
		echo $this->Form->input('scap_quantity',array('class'=>'input-ms'));
		echo $this->Form->input('segregated_waste',array('class'=>'input-ms'));
		echo $this->Form->input('magnetic_waste',array('class'=>'input-ms'));
		echo $this->Form->input('scrap_out',array('class'=>'input-ms'));
		echo $this->Form->input('id',array('class'=>'input-ms'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ScrapMain.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ScrapMain.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Scrap Mains'), array('action' => 'index')); ?></li>
	</ul>
</div>
