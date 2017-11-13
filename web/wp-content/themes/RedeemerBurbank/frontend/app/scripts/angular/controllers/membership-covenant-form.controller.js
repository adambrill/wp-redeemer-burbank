angular.module('app').controller('MembershipCoventantFormController', ['$scope', '$http', function ($scope, $http) {

	$scope.form = {
		'type': 'membership',
		'subject': 'Garden City Membership Form',
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
		'lifegroup': {
			'label': 'Life Group Leader(s)',
			'value': ''
		},
		'servicetime': {
			'label': 'Service Time',
			'value': ''
		},
		'affirmation': {
			'label': 'Affirm the Garden City Membership Covenant',
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
			$scope.membership.$setPristine(true);
			ga('send', 'event', 'form', 'Garden City Membership Form');
			//console.log(response);
		}, function (response) {
			console.log(response);
		});

	};

}]);