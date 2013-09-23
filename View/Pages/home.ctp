<p>display log in options, users need to log into various social media applications to be able to access the site.</p>

<?php if(!$loggedIn) { ?>
<p>log into facebook: <a href="/login/facebook">Login</a></p>
<?php } else { ?>
<p>log out: <a href="/logout">Logout</a></p>






<p>Want to display a list of armies using Angular server calling, then look at angular's templating</p>

<div ng-app >

<ul ng-controller="RacesCtrl">

</ul>

<?php
echo $this->Html->script('libs/angular/angular.ctrl', array('inline' => false));
?>

</div>












<?php } ?>
<p><?php echo "<pre>";print_r($_SESSION);echo "</pre>";?></p>



