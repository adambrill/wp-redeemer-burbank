angular.module('app').controller('LeadershipController', ['$scope', '$http', function ($scope, $http) {

    $scope.deal = '';

    $scope.names = {
    	'justin': 'Justin Buzzard',
    	'fred': 'Fred Mok',
    	'ben': 'Ben Moore',
    	'rob': 'Rob LeLaurin',
    	'haley': 'Haley Hatai', 
    	'daniel': 'Daniel Kunkel'
    };

    $scope.$on('konami-code-ok', function () {
        $scope.deal = '-deal';
        $scope.names = {
	    	'justin': 'Buzz',
	    	'fred': 'Fred Mok',
	    	'ben': 'Ben Moore',
	    	'rob': 'P Rob',
	    	'haley': 'Haley Hatai', 
	    	'daniel': 'Daniel Kunkel'
	    };
        $scope.$apply();
        ga('send', 'event', 'konami', 'shown');
    });

}]);