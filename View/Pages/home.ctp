<p>display log in options, users need to log into various social media applications to be able to access the site.</p>

<?php if(!$loggedIn) { ?>
<p>log into facebook: <a href="/login/facebook">Login</a></p>
<?php } else { ?>
<p>log out: <a href="/logout">Logout</a></p>


<?php
/*
$plainText = time();
$id = 1;
$salt = substr(md5(uniqid(rand(), true)), 0, 9);
echo $salt . sha1($salt . $plainText . $id);
*/
?>



<p>Want to display a list of armies using Angular server calling, then look at angular's templating</p>

<div ng-app >

	<ul ng-controller="RacesCtrl">
		<li ng-repeat="race in races">{{race.Race.name}} ({{race.RaceTypes.name}})</li>
	</ul>








<a href="/pages/add" class="btn btn-success">Add</a>

<p>Display a list of armies related to that user</p>
<table class='table table-striped table-bordered table-listings' ng-controller="MyArmiesCtrl">
	<tr>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Point Limit'); ?></th>
		<th><?php echo __('Hidden'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Actions'); ?></th>
	</tr>

	<tr ng-repeat="army in my_armies" id="myarmy_{{army.ArmyList.id}}">
		<td>{{army.ArmyList.name}}</td>
		<td>{{army.ArmyList.descr}}</td>
		<td>{{army.ArmyList.point_limit}}</td>
		<td>{{army.ArmyList.hide}}</td>
		<td>{{army.ArmyList.created}}</td>
		<td>{{army.ArmyList.modified}}</td>
		<td class="actions">
			<a href="#{{army.ArmyList.code}}" class="btn-sm btn-primary">View</a>
			<a href="#{{army.ArmyList.code}}" class="btn-sm btn-warning">Edit</a>

			<form action="#{{army.ArmyList.code}}" name="post_524172b158eab" id="post_524172b158eab" style="display:none;" method="post" class="ng-pristine ng-valid">
				<input type="hidden" name="_method" value="POST">
			</form>
			<a href="#{{army.ArmyList.code}}" class="btn-sm btn-danger" onclick="if (confirm('Are you sure you want to delete this record?')) { document.post_524172b158eab.submit(); } event.returnValue = false; return false;">Delete</a>
		</td>
	</tr>
</table>


<p>Display a list of armies that people have submitted and opened for the public</p>
<table class='table table-striped table-bordered table-listings' ng-controller="AllArmiesCtrl">
	<tr>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Point Limit'); ?></th>
		<th><?php echo __('Hidden'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Actions'); ?></th>
	</tr>

	<tr ng-repeat="army in all_armies">
		<td>{{army.ArmyList.name}}</td>
		<td>{{army.ArmyList.descr}}</td>
		<td>{{army.ArmyList.point_limit}}</td>
		<td>{{army.ArmyList.hide}}</td>
		<td>{{army.ArmyList.created}}</td>
		<td>{{army.ArmyList.modified}}</td>
		<td class="actions">
			<a href="#{{army.ArmyList.code}}" class="btn-sm btn-primary">View</a>
		</td>
	</tr>
</table>


<?php
echo $this->Html->scriptBlock(
    'var $sid = '.$user['id'],
    array('inline' => false)
);
echo $this->Html->script('libs/angular/angular.ctrl', array('inline' => false));
?>

</div>












<?php } ?>
<p><?php echo "<pre>";print_r($_SESSION);echo "</pre>";?></p>



