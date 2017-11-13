angular.module('app').controller('ConnectFormController', ['$scope', '$http', function ($scope, $http) {

	$scope.form = {
		'type': 'connect',
		'subject': 'Garden City Connect Form',
		'firstName': {
			'label': 'First Name',
			'value': ''
		},
		'lastName': {
			'label': 'Last Name',
			'value': ''
		},
		'email': {
			'label': 'Email Address',
			'value': ''
		},
		'phone': {
			'label': 'Phone Number',
			'value': ''
		},
		'status': {
			'label': 'Visitor Type',
			'value': ''
		},
		'found': {
			'label': 'Found Garden City',
			'value': ''
		},
		'newsletter': {
			'label': 'Subscribe to Newsletter',
			'value': ''
		},
		'comment': {
			'label': 'Comment',
			'value': ''
		}
	};

	$scope.submit = function() {
		$http({
			method: 'POST',
			url: '/form.php',
			data: $scope.form
		}).then(function (response) {
			$scope.success = true;
			$scope.connect.$setPristine(true);
			ga('send', 'event', 'form', 'Garden City Connect Form');
			//console.log(response);
		}, function (response) {
			console.log(response);
		});

	};

}]);