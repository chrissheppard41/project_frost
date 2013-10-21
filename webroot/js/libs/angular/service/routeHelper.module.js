angular.module('route_helper', []).
  config(['$routeProvider', function($routeProvider) {
  $routeProvider.
      when('/', {templateUrl: 'partials/index', controller: DisplayCtrl}).
      when('/add', {templateUrl: 'partials/add_army', controller: AddCtrl}).
      when('/edit/:id', {templateUrl: 'partials/edit_army', controller: EditCtrl}).
      otherwise({redirectTo: '/'});
}]);