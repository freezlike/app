<!--<div class="row" id="alertctp">
    <div class="col-md-12">
        <div class="center alert <?php echo (isset($type) && $type === 'error') ? 'alert-danger' : 'alert-success'; ?> alert-dismissable" style="width: 28%;margin: 0 auto 0 544px;">
            <button type="button" class="close" aria-hidden="true">×</button>
            <p style="text-align: center;"><?php echo $message; ?></p>
        </div>

    </div>
</div>-->
<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
 $.simplyToast("<?php echo $message; ?>","<?php echo (isset($type) && $type === 'error') ? 'danger' : 'success'; ?>");
<?php echo $this->Html->scriptEnd(); ?>