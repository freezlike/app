<div class="factures form">
<?php echo $this->Form->create('Facture'); ?>
	<fieldset>
		<legend><?php echo __('Edit Facture'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('limit_date');
		echo $this->Form->input('ht');
		echo $this->Form->input('ttc');
		echo $this->Form->input('user_id');
		echo $this->Form->input('accompte');
		echo $this->Form->input('payment_id');
		echo $this->Form->input('devise_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Facture.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Facture.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Factures'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payments'), array('controller' => 'payments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payment'), array('controller' => 'payments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Devises'), array('controller' => 'devises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Devise'), array('controller' => 'devises', 'action' => 'add')); ?> </li>
	</ul>
</div>
