<?php $this->layout = false; ?>
<?php if (!empty($resultats)): ?>
    <?php foreach ($resultats as $facture): ?>
        <tr>
            <td><?php echo $facture['Facture']['id']; ?></td>
            <td><?php echo $facture['User']['display_name']; ?></td>
            <td><?php echo$this->time->i18nFormat($facture['Facture']['created'], '%m/%d/%Y %H:%M'); ?></td>
            <td><?php echo $facture['Facture']['limit_date']; ?></td>
            <td><?php echo $facture["Facture"]["ht"] ?></td>
            <td><?php echo $facture["Facture"]["ttc"] ?></td>
            <td>
                <a href="<?php echo$this->Html->url(array('action' => 'edit', $facture['Facture']['id'])); ?>" class="btn btn-primary">Edit</a>
                <a href="<?php echo$this->Html->url(array('action' => 'delete', $facture['Facture']['id'])); ?>" class="btn btn-danger" onclick="return confirm('Are you sure ?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>

<?php endif; ?>
