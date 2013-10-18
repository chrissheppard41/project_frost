function DisplayCtrl($scope, $http, list) {
	$scope.user_id = $sid;

	var promise_my = list.getAsync('GET', '/armies.json', {u_id: $scope.user_id});
	$scope.my_armies = {};

	promise_my.then(function( data ){
		$scope.my_armies = list.data;
	});

	var promise_all = list.getAsync('GET', '/allarmies.json', {});
	$scope.all_armies = {};

	promise_all.then(function( data ){
		$scope.all_armies = list.data;
	});
}