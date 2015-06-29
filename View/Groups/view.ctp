<div class="groups view">
<h2><?php echo __('Group'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($group['Group']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($group['Group']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Group'), array('action' => 'edit', $group['Group']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Group'), array('action' => 'delete', $group['Group']['id']), array(), __('Are you sure you want to delete # %s?', $group['Group']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Evenements'), array('controller' => 'evenements', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evenement'), array('controller' => 'evenements', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Evenements'); ?></h3>
	<?php if (!empty($group['Evenement'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Relevance'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Date Debut'); ?></th>
		<th><?php echo __('Date Fin'); ?></th>
		<th><?php echo __('Group Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($group['Evenement'] as $evenement): ?>
		<tr>
			<td><?php echo $evenement['id']; ?></td>
			<td><?php echo $evenement['name']; ?></td>
			<td><?php echo $evenement['relevance']; ?></td>
			<td><?php echo $evenement['created']; ?></td>
			<td><?php echo $evenement['date_debut']; ?></td>
			<td><?php echo $evenement['date_fin']; ?></td>
			<td><?php echo $evenement['group_id']; ?></td>
			<td><?php echo $evenement['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'evenements', 'action' => 'view', $evenement['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'evenements', 'action' => 'edit', $evenement['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'evenements', 'action' => 'delete', $evenement['id']), array(), __('Are you sure you want to delete # %s?', $evenement['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Evenement'), array('controller' => 'evenements', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($group['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Matricule'); ?></th>
		<th><?php echo __('Cnss'); ?></th>
		<th><?php echo __('Cin'); ?></th>
		<th><?php echo __('Situation Id'); ?></th>
		<th><?php echo __('Group Id'); ?></th>
		<th><?php echo __('Departement Id'); ?></th>
		<th><?php echo __('Societe Id'); ?></th>
		<th><?php echo __('Poste Id'); ?></th>
		<th><?php echo __('Commerciale Id'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('Born Day'); ?></th>
		<th><?php echo __('Telephone'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Permis'); ?></th>
		<th><?php echo __('Cv Url'); ?></th>
		<th><?php echo __('Hire Date'); ?></th>
		<th><?php echo __('Rib'); ?></th>
		<th><?php echo __('Banque'); ?></th>
		<th><?php echo __('User Count'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($group['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td><?php echo $user['modified']; ?></td>
			<td><?php echo $user['matricule']; ?></td>
			<td><?php echo $user['cnss']; ?></td>
			<td><?php echo $user['cin']; ?></td>
			<td><?php echo $user['situation_id']; ?></td>
			<td><?php echo $user['group_id']; ?></td>
			<td><?php echo $user['departement_id']; ?></td>
			<td><?php echo $user['societe_id']; ?></td>
			<td><?php echo $user['poste_id']; ?></td>
			<td><?php echo $user['commerciale_id']; ?></td>
			<td><?php echo $user['first_name']; ?></td>
			<td><?php echo $user['last_name']; ?></td>
			<td><?php echo $user['born_day']; ?></td>
			<td><?php echo $user['telephone']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['permis']; ?></td>
			<td><?php echo $user['cv_url']; ?></td>
			<td><?php echo $user['hire_date']; ?></td>
			<td><?php echo $user['rib']; ?></td>
			<td><?php echo $user['banque']; ?></td>
			<td><?php echo $user['user_count']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), array(), __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
