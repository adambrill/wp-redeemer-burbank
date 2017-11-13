angular.module('app', [
		// Angular modules
		//'ngRoute',
		// Custom modules

		// 3rd Party Modules
		'ui.mask',
		'ngSanitize',
		'angularRipple'
]);

angular.module('app').config(function ($locationProvider) {
	$locationProvider.html5Mode({
		enabled: true,
		requireBase: false,
		rewriteLinks: false
	});
});