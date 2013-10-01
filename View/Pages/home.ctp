<p>display log in options, users need to log into various social media applications to be able to access the site.</p>

<?php if(!$loggedIn) { ?>
<p>log into facebook: <a href="/login/facebook">Login</a></p>
<?php } else { ?>
<p>log out: <a href="/logout">Logout</a></p>



<p>Want to display a list of armies using Angular server calling, then look at angular's templating</p>

<div ng-app="tool">

	<?php
		echo $this->Html->scriptBlock(
		    'var $sid = '.$user['id'],
		    array('inline' => false)
		);
		echo $this->Html->script('libs/angular/angular.module', array('inline' => false));
		echo $this->Html->script('libs/angular/angular.ctrl', array('inline' => false));
	?>

	<div ng-view></div>

</div>

<?php } ?>


