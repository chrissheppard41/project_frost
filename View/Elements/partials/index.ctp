<section class="clearfix">
	<a href="#/add" class="btn btn-success">Add</a>

	<p>Display a list of armies related to that user</p>
	<table class='table table-striped table-bordered table-listings'>
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
			<td>{{army.ArmyList.descr | truncate:50}}</td>
			<td>{{army.ArmyList.point_limit}}</td>
			<td>{{army.ArmyList.hide}}</td>
			<td>{{dateMomment(army.ArmyList.created)}}</td>
			<td>{{dateMomment(army.ArmyList.modified)}}</td>
			<td class="actions">
				<a href="#/view/{{army.ArmyList.id}}" class="btn-sm btn-primary">View</a>
				<a href="#/edit/{{army.ArmyList.id}}" class="btn-sm btn-warning">Edit</a>

				<a href="#/" class="btn-sm btn-danger" ng-confirm-click="Are you sure you want to delete this army?" ng-click="submit_delete(army.ArmyList.id)">Delete</a>
			</td>
		</tr>
	</table>

	<p>Display a list of armies that people have submitted and opened for the public</p>
	<table class='table table-striped table-bordered table-listings'>
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
			<td>{{army.ArmyList.descr | truncate:50}}</td>
			<td>{{army.ArmyList.point_limit}}</td>
			<td>{{army.ArmyList.hide}}</td>
			<td>{{dateMomment(army.ArmyList.created)}}</td>
			<td>{{dateMomment(army.ArmyList.modified)}}</td>
			<td class="actions">
				<a href="#/view/{{army.ArmyList.code}}" class="btn-sm btn-primary">View</a>
			</td>
		</tr>
	</table>
</section>