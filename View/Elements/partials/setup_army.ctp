<section class="clearfix">
	<h2>Setup</h2>
	<a href="#/" class="btn btn-danger">back</a>

	<ul class="clearList">
		<li ng-repeat="squad in squads" class="drag_container" id="{{squad.Squad.id}}">
			<div ng-drag class="a-drag troops unit_data" ng-accept=".dropTroops">
				{{squad.Squad.name}}
			</div>
		</li>
	</ul>


	<div ng-drop class="dropTroops" ng-accept=".troops">
		Drop area

		<div ng-repeat="squad in squad_list" class="drag_container" id="{{squad.group}}_{{squad.id}}">
			{{squad.data.Squad.name}}
			<div class="content">

				<span class="cost">{{squad.total}} pts</span>

				<dl class="row">
					<dd class="col-md-offset-2 col-md-1">Unit Count</dd>
					<dd class="col-md-1">WS</dd>
					<dd class="col-md-1">BS</dd>
					<dd class="col-md-1">S</dd>
					<dd class="col-md-1">T</dd>
					<dd class="col-md-1">W</dd>
					<dd class="col-md-1">I</dd>
					<dd class="col-md-1">A</dd>
					<dd class="col-md-1">Ld</dd>
					<dd class="col-md-1">Sv</dd>
				</dl>
				<dl class="row" ng-repeat="unit in squad.data.Unit">
					<dd class="col-md-2">{{unit.name}} ({{squad.unit[$index].unitType}})</dd>
					<dd class="col-md-1">
						<button class="btn-xs btn-danger" ng-click="subSquad($parent.$index, $index, unit)" ng-disabled="squad.unit[$index].count == unit.SquadUnit.min_count"><span class="glyphicon glyphicon-minus"></span></button>
						{{squad.unit[$index].count}}
						<button class="btn-xs btn-primary" ng-click="addSquad($parent.$index, $index, unit)" ng-disabled="squad.unit[$index].count == unit.SquadUnit.max_count"><span class="glyphicon glyphicon-plus"></span></button>
					</dd>
					<dd class="col-md-1">{{unit.weapon_skill}}</dd>
					<dd class="col-md-1">{{unit.ballistic_skill}}</dd>
					<dd class="col-md-1">{{unit.strength}}</dd>
					<dd class="col-md-1">{{unit.toughness}}</dd>
					<dd class="col-md-1">{{unit.wounds}}</dd>
					<dd class="col-md-1">{{unit.initiative}}</dd>
					<dd class="col-md-1">{{unit.attacks}}</dd>
					<dd class="col-md-1">{{unit.leadership}}</dd>
					<dd class="col-md-1">{{unit.armour_save}}+</dd>
				</dl>
				<dl class="row">
					<dd>
						Special rules
						<ul>
							<li ng-repeat="specialRule in squad.data.SpecialRule">
								{{specialRule.name}}
							</li>
						</ul>
					</dd>
					<dd>
						wargear
					</dd>
				</dl>
			</div>
		</div>
	</div>

</section>