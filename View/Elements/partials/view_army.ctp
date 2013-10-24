<section class="clearfix">
	<h2>View</h2>
	<a href="#/" class="btn btn-danger">back</a>


	<div class="raceTypes view">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo __('Army Lists view'); ?>
				<span class="pull-right">
					<a href="#/edit/{{army.ArmyList.id}}" class="btn-sm btn-warning">Edit</a>
					<a href="#/" class="btn-sm btn-danger" ng-confirm-click="Are you sure you want to delete this army?" ng-click="submit_delete(army.ArmyList.id)">Delete</a>
				</span>
			</div>
			<div class="panel-body">
				<div class="row">
					<span class="col-md-3"><?php echo __('Id'); ?></span>
					<span class="col-md-9">{{army.ArmyList.id}}</span>
				</div>
				<div class="row">
					<span class="col-md-3"><?php echo __('Name'); ?></span>
					<span class="col-md-9">{{army.ArmyList.name}}</span>
				</div>
				<div class="row">
					<span class="col-md-3"><?php echo __('Description'); ?></span>
					<span class="col-md-9">{{army.ArmyList.descr}}</span>
				</div>
				<div class="row">
					<span class="col-md-3"><?php echo __('Point Limit'); ?></span>
					<span class="col-md-9">{{army.ArmyList.point_limit}}</span>
				</div>
				<div class="row">
					<span class="col-md-3"><?php echo __('Hidden'); ?></span>
					<span class="col-md-9">{{army.ArmyList.hide}}</span>
				</div>
				<div class="row">
					<span class="col-md-3"><?php echo __('Race'); ?></span>
					<span class="col-md-9">{{army.ArmyList.races_id}}</span>
				</div>
				<div class="row">
					<span class="col-md-3"><?php echo __('Created'); ?></span>
					<span class="col-md-9">{{dateMomment(army.ArmyList.created)}}</span>
				</div>
				<div class="row">
					<span class="col-md-3"><?php echo __('Modified'); ?></span>
					<span class="col-md-9">{{dateMomment(army.ArmyList.modified)}}</span>
				</div>
			</div>
		</div>
	</div>
</section>