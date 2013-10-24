<p>display log in options, users need to log into various social media applications to be able to access the site.</p>

<?php if(!$loggedIn) { ?>
<p>log into facebook: <a href="/login/facebook">Login</a></p>
<?php } else { ?>
<p>log out: <a href="/logout">Logout</a></p>



<p>Want to display a list of armies using Angular server calling, then look at angular's templating</p>

<div ng-app="tool">

	<div ng-view></div>

</div>

<?php } ?>


<?php
	echo $this->Html->scriptBlock(
	    'var $sid = '.$user['id'],
	    array('inline' => false)
	);
	echo $this->Html->script('libs/angular/service/list.module', array('inline' => false));
	echo $this->Html->script('libs/angular/service/filters.module', array('inline' => false));
	echo $this->Html->script('libs/angular/service/listServices.module', array('inline' => false));
	echo $this->Html->script('libs/angular/service/routeHelper.module', array('inline' => false));
	echo $this->Html->script('libs/angular/service/ngConfirmClick.directive', array('inline' => false));

	echo $this->Html->script('libs/angular/controller/Add.ctrl', array('inline' => false));
	echo $this->Html->script('libs/angular/controller/Display.ctrl', array('inline' => false));
	echo $this->Html->script('libs/angular/controller/Edit.ctrl', array('inline' => false));

?>