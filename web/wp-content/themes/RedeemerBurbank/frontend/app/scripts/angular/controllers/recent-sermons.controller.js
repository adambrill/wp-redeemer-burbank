angular.module('app').controller('RecentSermonsController', ['$scope', '$http', 'sermons', function ($scope, $http, sermons) {

	$scope.isLoading = true;

    $http({
		method: 'GET',
		url: 'http://gardencitysv.com/wp-json/posts?type=sermons&filter[posts_per_page]=3'
	}).then(function (response) {
		$scope.sermons = response.data;
		$scope.isLoading = false;
		//sermons.setSermonMedia($scope.sermons);
	}, function (response) {
		console.log(response);
	});

	$scope.showPlayer = function(sermon) {
		sermons.setSermonMedia(sermon);
	};

	/*$scope.getMedia = function(id) {
		sermons.getMedia(id).then(function(response) {
			return response;
		});
	};*/

	//console.log($scope.getMedia('11116'));

}]);