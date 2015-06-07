<?php $this->layout = false; ?>
<ol class="dd-list ui-sortable">
    <li class="dd-item ui-sortable-handle" style="">
        <?php foreach ($tachs2 as $t): ?>
            <div class="dd-handle" data-id="2" data-state="2" style="width: 300px;"><?php echo $t['Tache']['name']; ?></div>
        <?php endforeach; ?>
    </li>
</ol>
<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
initSorte();
<?php echo $this->Html->scriptEnd(); ?>