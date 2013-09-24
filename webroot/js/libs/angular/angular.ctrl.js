function RacesCtrl($scope, $http) {
	$http.get('races.json').success(function(data) {
		$scope.races = data.response.data;
	});
}



function MyArmiesCtrl($scope, $http) {
	$scope.user_id = $sid;
	$http({method: 'GET', url: '/armies.json', params: {u_id:$scope.user_id}}).
		success(function(data, status, headers, config) {
			// this callback will be called asynchronously
			// when the response is available

			$scope.my_armies = data.response.data;
		}).
		error(function(data, status, headers, config) {
			// called asynchronously if an error occurs
			// or server returns response with an error status.
			console.log("error");
		});
}



function AllArmiesCtrl($scope, $http) {
	$http({method: 'GET', url: '/allarmies.json'}).
		success(function(data, status, headers, config) {
			// this callback will be called asynchronously
			// when the response is available

			$scope.all_armies = data.response.data;
		}).
		error(function(data, status, headers, config) {
			// called asynchronously if an error occurs
			// or server returns response with an error status.
			console.log("error");
		});
}