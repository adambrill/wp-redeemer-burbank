angular.module('app').controller('SermonSeriesDetailsController', ['$scope', '$http', 'sermons', function ($scope, $http, sermons) {

	$scope.init = function(val) {
		var seriesSlug = val;

		$scope.isLoading = true;

		$http({
			method: 'GET',
			url: 'http://www.gardencitysv.com/wp-json/posts?type=sermons&filter[taxonomy]=series&filter[term]=' + seriesSlug + '&filter[posts_per_page]=50'
		}).then(function (response) {
			$scope.sermons = response.data;
			$scope.isLoading = false;
			//sermons.setSermonMedia($scope.sermons[0]);
		}, function (response) {
			console.log(response);
		});
		
	};

	$scope.showPlayer = function(sermon) {
		sermons.setSermonMedia(sermon);
	};

}]);