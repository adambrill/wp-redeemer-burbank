angular.module('app').controller('LatestSermonController', ['$scope', '$http', 'sermons', function ($scope, $http, sermons) {

    $http({
		method: 'GET',
		url: 'http://gardencitysv.com/wp-json/posts?type=sermons&filter[posts_per_page]=1'
	}).then(function (response) {
		$scope.sermon = response.data[0];
	}, function (response) {
		console.log(response);
	});

	$scope.showPlayer = function(sermon) {
		sermons.setSermonMedia(sermon);
	};

}]);