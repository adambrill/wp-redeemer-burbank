angular.module('app').controller('SermonDetailsController', ['$scope', '$http', 'sermons', function ($scope, $http, sermons) {

	$scope.init = function(val) {
		var sermonSlug = val;

		$http({
			method: 'GET',
			//url: 'http://gardencitysv.com/wp-json/posts?type=sermons&filter[posts_per_page]=1'
			url: 'http://gardencitysv.com/wp-json/posts?type=sermons&filter[name]=' + sermonSlug
		}).then(function (response) {
			$scope.sermons = response.data;
			sermons.setSermonMedia($scope.sermons[0]);
		}, function (response) {
			console.log(response);
		});
		
	};

}]);