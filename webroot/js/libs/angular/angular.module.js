angular.module('tool', ['filters', 'listServices', 'route_helper']);

angular.module('route_helper', []).
  config(['$routeProvider', function($routeProvider) {
  $routeProvider.
      when('/', {templateUrl: 'partials/index', controller: DisplayCtrl}).
      when('/add', {templateUrl: 'partials/add_army', controller: AddCtrl}).
      when('/edit', {templateUrl: 'partials/edit_army', controller: EditCtrl}).
      otherwise({redirectTo: '/'});
}]);

angular.module('filters', []).
    filter('truncate', function () {
        return function (text, length, end) {
            if (isNaN(length))
                length = 10;

            if (end === undefined)
                end = "...";

            if (text.length <= length || text.length - end.length <= length) {
                return text;
            }
            else {
                return String(text).substring(0, length-end.length) + end;
            }

        };
    });


angular.module('listServices', []).
    factory('list', function($http, $q){
        var sharedService = {};
        sharedService.getAsync = function ($method, $url, $params) {
            sharedService.data = {};

            var deferred = $q.defer();

            if($method == "POST" || $method == "PUT") {
                $http({method: $method, url: $url, data: $params}).
                    success(function(data, status, headers, config) {
                        console.log($method, $url, data);
                        sharedService.data = data.response;
                        deferred.resolve( sharedService.data );
                    }).
                    error(function(data, status, headers, config) {
                        console.log("Service list: "+$url+" error");
                    });
            } else {
                $http({method: $method, url: $url, params: $params}).
                    success(function(data, status, headers, config) {
                        console.log($method, $url, data);
                        sharedService.data = data.response.data;
                        deferred.resolve( sharedService.data );
                    }).
                    error(function(data, status, headers, config) {
                        console.log("Service list: "+$url+" error");
                    });
            }


            return deferred.promise;
        };

        return sharedService;

      });