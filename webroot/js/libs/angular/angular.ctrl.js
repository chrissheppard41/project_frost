function RacesCtrl($scope, $http) {
  $http.get('races.json').success(function(data) {
	console.log(data);
    $scope.races = data;
  });
}