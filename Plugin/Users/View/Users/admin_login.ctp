<div class="page-header">
    <h1><?php echo __d('users', 'Login'); ?></h1>
</div>
<?php
    echo $this->Form->create($model);
    echo $this->Form->input('email', array('placeholder' => 'Email', 'label' => 'Username'));
    echo $this->Form->input('password', array('placeholder' => 'Password', 'label' => 'Password'));
    // echo $this->Form->input('remember_me', array('opt-label' => __d('users', 'Remember Me'), 'type' => 'checkbox'));
    echo $this->Form->hidden('User.return_to', array('value' => $return_to));
?>
<div class="row">
	<p class="col-md-offset-2" style="padding-left: 15px;">
	    <?php echo $this->Html->link(__d('users', 'I forgot my password'), array('action' => 'reset_password')); ?>
	</p>
</div>
<?php echo $this->Form->submit(__('Login')); ?>
<?php echo $this->Form->end(); ?>
