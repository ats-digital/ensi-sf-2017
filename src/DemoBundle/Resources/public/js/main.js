var app = angular.module('UserApp', [], function($interpolateProvider) {
	$interpolateProvider.startSymbol('[[');
	$interpolateProvider.endSymbol(']]');
});

app.controller('UserCtrl', ['$scope', '$http', function($scope, $http) {

	$scope.getUsers = function() {
		$http.get(Routing.generate('demo_default_getusers')).then(function(response) {
			$scope.users = response.data;
		})
	}

	$scope.getUsers();

}])