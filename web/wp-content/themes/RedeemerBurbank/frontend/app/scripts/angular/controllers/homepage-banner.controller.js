angular.module('app').controller('HomepageBannerController', ['$scope', '$window', function ($scope, $window) {

	$scope.height = ($window.innerHeight > 425) ? $window.innerHeight : 425;

}]);