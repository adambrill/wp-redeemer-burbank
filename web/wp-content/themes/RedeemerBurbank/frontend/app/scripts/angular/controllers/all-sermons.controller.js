angular.module('app').controller('AllSermonsController', ['$scope', '$http', 'sermons', function ($scope, $http, sermons) {

	$scope.currentPage = 1;
	$scope.pageSize = 10;
	$scope.totalItems = 0;

    var getSermons = function() {

    	$scope.isLoading = true;

	    $http({
			method: 'GET',
			url: 'http://gardencitysv.com/wp-json/posts?type=sermons&filter[posts_per_page]=' + $scope.pageSize + '&page=' + $scope.currentPage
		}).then(function (response) {
			$scope.sermons = response.data;
			$scope.totalItems = response.headers('X-WP-Total');
			$scope.isLoading = false;
			refresh();
		}, function (response) {
			console.log(response);
		});
	}

	var refresh = function (reset) {
	    $scope.numPages = Math.ceil($scope.totalItems / $scope.pageSize);

	    if ($scope.currentPage > $scope.numPages) {
	        $scope.currentPage = $scope.numPages;
	    }

	    //$scope.startingItem = ($scope.currentPage - 1) * $scope.pageSize;
	    //$scope.rangeStart = $scope.startingItem + 1;
	    //$scope.rangeEnd = ($scope.startingItem + $scope.pageSize > $scope.totalItems) ? $scope.totalItems : $scope.startingItem + $scope.pageSize;
	}

    $scope.setCurrentPage = function (val) {
    	console.log(val);
        if (val < 1 || val > $scope.numPages) {
            return;
        }
        $scope.currentPage = val;
    };

    $scope.$watch('currentPage', function(newVal, oldVal) {
    	getSermons();
    }, true);

    getSermons();

}]);