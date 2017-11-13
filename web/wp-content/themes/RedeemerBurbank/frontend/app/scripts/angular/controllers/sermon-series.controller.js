angular.module('app').controller('SermonSeriesController', ['$scope', '$http', function ($scope, $http) {

	$scope.isLoading = true;

    $http({
		method: 'GET',
		url: 'http://www.gardencitysv.com/wp-json/taxonomies/series/terms?filter[orderby]=ID&filter[order]=desc'
	}).then(function (response) {
		$scope.series = response.data;
		$scope.isLoading = false;
		//sermons.setSermonMedia($scope.sermons);
	}, function (response) {
		console.log(response);
	});

}]);