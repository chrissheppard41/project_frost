function EditCtrl($scope, $routeParams, list) {
	$scope.$routeParams = $routeParams;
	console.log("Edit");

	var promise_types = list.getAsync('GET', '/edit_army/1.json', {});

	promise_types.then(function( data ){
		$scope.name = list.data.ArmyList.name;
		$scope.descr = list.data.ArmyList.descr;
		$scope.points_limit = list.data.ArmyList.point_limit;
		$scope.hide = list.data.ArmyList.hide;
	});

	$scope.submit_edit = function() {
		//not a number apparently
		console.log($scope.edit_army_list.points_limit.$error);
		if ($scope.edit_army_list.$invalid) {
			$scope.formMessage = "Form contains errors";
		} else {
			$scope.formMessage = "";
		}
	};
}