<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->create('User'); ?>
        <?php echo $this->Form->input('username');?>
        <?php echo $this->Form->input('password');?>
        <?php echo $this->Form->input('commerciale_id',array('type'=>'hidden','value'=>$this->Session->read('Auth.User.id'))); ?>
        <?php echo $this->Form->input('group_id',array('type'=>'hidden','value'=>5)); ?>
        <?php echo $this->Form->submit(__("Add")); ?>        
    </div>
</div>