angular.module('app').controller('ServeFormController', ['$scope', '$http', function ($scope, $http) {

	$scope.form = {
		'type': 'serve',
		'subject': 'Garden City Service Form',
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
		'worshipEnvironmentTeam': {
			'label': 'Worship Enviornment Team',
			'value': ''
		},
		'sundayProductionTeam': {
			'label': 'Sunday Production Team',
			'value': ''
		},
		'connectionTeam': {
			'label': 'Connection Team',
			'value': ''
		},
		'worshipTeam': {
			'label': 'Worship Team',
			'value': ''
		},
		'kidsMinistry': {
			'label': 'Kid\'s Ministry',
			'value': ''
		},
		'youthMinistry': {
			'label': 'Youth Ministry',
			'value': ''
		},
		'collegeMinistry': {
			'label': 'College Ministry',
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
			$scope.serve.$setPristine(true);
			ga('send', 'event', 'form', 'Garden City Service Form');
			//console.log(response);
		}, function (response) {
			console.log(response);
		});

	};

}]);