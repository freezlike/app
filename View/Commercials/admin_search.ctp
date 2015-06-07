<?php $this->layout = null;  ?>
<?php //debug($resultats)  

 if (!isset($resultats) || empty($resultats)) {
    echo '<tr>Pas de résultat</tr>';
}else{
    

?>

 <?php foreach ($resultats as $user): ?>
<tr>
    <td><?php echo $user['Commerciale']['id']; ?></td>
    <td><?php echo $user['Commerciale']['username']; ?></td>
    <td><?php echo $user['Commerciale']['name']; ?></td>
    <td><?php echo $user['Commerciale']['email']; ?></td>
    <td><?php echo $user['Commerciale']['user_count']; ?></td>
    <td><?php echo$this->time->i18nFormat($user['Commerciale']['created'], '%m/%d/%Y %H:%M'); ?></td>
    <td>
        <a href="<?php echo$this->Html->url(array('action' => 'viewClient', $user['Commerciale']['id'])); ?>" class="btn btn-success">Voir Clients</a>
        <a href="<?php echo$this->Html->url(array('action' => 'edit', $user['Commerciale']['id'])); ?>" class="btn btn-primary"><i class="icon-pencil"></i></a>
        <a href="<?php echo$this->Html->url(array('action' => 'delete', $user['Commerciale']['id'])); ?>" class="btn btn-danger" onclick="return confirm('Are you sure ?')">Delete</a>
    </td>
</tr>
<?php endforeach; ?>

<?php } ?>