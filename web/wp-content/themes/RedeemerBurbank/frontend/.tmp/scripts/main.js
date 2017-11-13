'use strict';

angular.module('app', [
// Angular modules
//'ngRoute',
// Custom modules

// 3rd Party Modules
'ui.mask', 'ngSanitize', 'angularRipple']);

angular.module('app').config(function ($locationProvider) {
	$locationProvider.html5Mode({
		enabled: true,
		requireBase: false,
		rewriteLinks: false
	});
});
angular.module('app').factory('sermons', ['$q', '$http', function ($q, $http) {

	var sermonsService = {
		setSermonMedia: function setSermonMedia(sermons) {

			if (!sermons.length) {
				sermons = [sermons];
			}

			for (var i = 0; i < sermons.length; i++) {

				var sermon = sermons[i];
				(function (sermon) {
					$http({
						method: 'GET',
						url: 'http://gardencitysv.com/wp-json/media?filter[post_parent]=' + sermon.ID
					}).then(function (results) {
						sermon.media = results.data;
					});
				})(sermon);
			}
		},
		getMedia: function getMedia(id) {
			return $http({
				method: 'GET',
				url: 'http://gardencitysv.com/wp-json/media?filter[post_parent]=' + id
			});
		}
	};

	return sermonsService;
}]);
angular.module('app').controller('AllSermonsController', ['$scope', '$http', 'sermons', function ($scope, $http, sermons) {

	$scope.currentPage = 1;
	$scope.pageSize = 10;
	$scope.totalItems = 0;

	var getSermons = function getSermons() {

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
	};

	var refresh = function refresh(reset) {
		$scope.numPages = Math.ceil($scope.totalItems / $scope.pageSize);

		if ($scope.currentPage > $scope.numPages) {
			$scope.currentPage = $scope.numPages;
		}

		//$scope.startingItem = ($scope.currentPage - 1) * $scope.pageSize;
		//$scope.rangeStart = $scope.startingItem + 1;
		//$scope.rangeEnd = ($scope.startingItem + $scope.pageSize > $scope.totalItems) ? $scope.totalItems : $scope.startingItem + $scope.pageSize;
	};

	$scope.setCurrentPage = function (val) {
		console.log(val);
		if (val < 1 || val > $scope.numPages) {
			return;
		}
		$scope.currentPage = val;
	};

	$scope.$watch('currentPage', function (newVal, oldVal) {
		getSermons();
	}, true);

	getSermons();
}]);
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

	$scope.submit = function () {
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
angular.module('app').controller('HomepageBannerController', ['$scope', '$window', function ($scope, $window) {

	$scope.height = $window.innerHeight > 425 ? $window.innerHeight : 425;
}]);
angular.module('app').controller('LatestSermonController', ['$scope', '$http', 'sermons', function ($scope, $http, sermons) {

	$http({
		method: 'GET',
		url: 'http://gardencitysv.com/wp-json/posts?type=sermons&filter[posts_per_page]=1'
	}).then(function (response) {
		$scope.sermon = response.data[0];
	}, function (response) {
		console.log(response);
	});

	$scope.showPlayer = function (sermon) {
		sermons.setSermonMedia(sermon);
	};
}]);
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

	$scope.submit = function () {
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
angular.module('app').controller('RecentSermonsController', ['$scope', '$http', 'sermons', function ($scope, $http, sermons) {

	$scope.isLoading = true;

	$http({
		method: 'GET',
		url: 'http://gardencitysv.com/wp-json/posts?type=sermons&filter[posts_per_page]=3'
	}).then(function (response) {
		$scope.sermons = response.data;
		$scope.isLoading = false;
		//sermons.setSermonMedia($scope.sermons);
	}, function (response) {
		console.log(response);
	});

	$scope.showPlayer = function (sermon) {
		sermons.setSermonMedia(sermon);
	};

	/*$scope.getMedia = function(id) {
 	sermons.getMedia(id).then(function(response) {
 		return response;
 	});
 };*/

	//console.log($scope.getMedia('11116'));
}]);
angular.module('app').controller('SermonDetailsController', ['$scope', '$http', 'sermons', function ($scope, $http, sermons) {

	$scope.init = function (val) {
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
angular.module('app').controller('SermonSeriesDetailsController', ['$scope', '$http', 'sermons', function ($scope, $http, sermons) {

	$scope.init = function (val) {
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

	$scope.showPlayer = function (sermon) {
		sermons.setSermonMedia(sermon);
	};
}]);
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

	$scope.submit = function () {
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
// Float Labels
angular.module('app').directive('floatLabel', ['$compile', function ($compile) {
	// The sole purpose of this directive is to apply the other directives in the standard usage. As such, this directive is kind of a hack.
	// Referenced http://stackoverflow.com/questions/19224028/add-directives-from-directive-in-angularjs.
	// We aren't using templates here because of the reliance of inner elements, which is generally a bad practice; this is why the directive is broken into Container and Target.
	return {
		restrict: 'A',
		priority: 1000,
		terminal: true,
		link: function link(scope, element, attrs) {
			var formEl = angular.element(element[0].querySelectorAll('input,select,textarea')[0]); // Get first form input
			var labelEl = angular.element(element[0].querySelectorAll('label')[0]); // Get first label

			formEl.attr('float-label-target', attrs['floatLabel'] || labelEl.text());
			element.attr('float-label-container', '');
			element.removeAttr('float-label'); //remove the attribute to avoid indefinite loop
			element.removeAttr('data-float-label'); //also remove the same attribute with data- prefix in case users specify data-common-things in the html

			$compile(element)(scope);
		}
	};
}]).directive('floatLabelContainer', ['$timeout', function ($timeout) {
	return {
		restrict: 'A',
		controller: function controller() {
			this.shouldAnimate = false; // Set to false while we set up default state
			this.isActive = false; // whether the label should be displayed as a float
			this.isEnabled = true; // whether we're to a size that should display the float-label
		},
		link: function link(scope, element, attrs, ctrl) {
			var toggleClass = function toggleClass(className) {
				return function (val) {
					if (val) element.addClass(className);else element.removeClass(className);
				};
			};

			var watches = [scope.$watch(function () {
				return ctrl.shouldAnimate;
			}, toggleClass('fl-animate')), scope.$watch(function () {
				return ctrl.isActive;
			}, toggleClass('fl-active')), scope.$watch(function () {
				return ctrl.isEnabled;
			}, toggleClass('fl-enabled'))

			/*scope.$watch(function () {
   return breakpoint.breakpoint.name;
   }, function (newValue, oldValue) {
   ctrl.isEnabled = newValue == 'phone';
   }, true)*/
			];
			element.on('$destroy', function () {
				angular.forEach(watches, function (elem) {
					elem();
				});
			});

			$timeout(function () {
				// Wait for a model to be bound to turn on shouldAnimate; this causes it to just be displayed on page load if the field is already populated.
				ctrl.shouldAnimate = true;
			});
		}
	};
}]).directive('floatLabelTarget', [function () {
	return {
		restrict: 'A',
		require: ['^floatLabelContainer', '?ngModel'],
		link: function link(scope, element, attr, ctrl) {
			var hasPlaceholder = !!element.attr('placeholder');
			var placeholderText = (attr['floatLabelTarget'] || '').replace(/\: *$/g, '');

			var floatLabelContainerController = ctrl[0];
			var ngModelController = ctrl[1];

			var tagName = element[0].tagName.toLowerCase();

			if (tagName == 'select') {
				floatLabelContainerController.isActive = true;
			}

			if (typeof attr.uiMask !== 'undefined') {
				floatLabelContainerController.isActive = true;
			}

			var watches = [];

			if (ngModelController) {
				watches.push(scope.$watch(function () {
					return ngModelController.$viewValue;
				}, function (value) {
					floatLabelContainerController.isActive = tagName == 'select' ? true : !!value;
					if (typeof attr.uiMask !== 'undefined') {
						floatLabelContainerController.isActive = true;
					}
				}));
			} else {
				// mostly this is just to get it to work with html solutions where they didn't put the ngModel; not really a practical application.
				element.on('input keyup keydown paste cut change', function () {
					scope.$apply(function () {
						floatLabelContainerController.isActive = tagName == 'select' ? true : !!element.val();
						if (typeof attr.uiMask !== 'undefined') {
							floatLabelContainerController.isActive = true;
						}
					});
				});
			}

			if (!hasPlaceholder && typeof attr.uiMask === 'undefined') {
				watches.push(scope.$watch(function () {
					return floatLabelContainerController.isEnabled;
				}, function (isEnabled) {
					element.attr('placeholder', isEnabled ? placeholderText : '');
				}));
			}

			element.on('$destroy', function () {
				angular.forEach(watches, function (elem) {
					elem();
				});
			});
		}
	};
}]);
angular.module('app').directive('konami', ['$rootScope', function ($rootScope) {
	return {
		restrict: 'A',
		link: function link(scope, element, attrs) {

			var konami_keys = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65];
			var konami_index = 0;

			var checkTheKonamiCode = function checkTheKonamiCode(event) {
				if (event.which === konami_keys[konami_index++]) {
					if (konami_index === konami_keys.length) {
						$rootScope.$broadcast('konami-code-ok', event.target);
						element.off('keydown', checkTheKonamiCode);
					}
				} else {
					konami_index = 0;
				}
			};

			element.on('keydown', checkTheKonamiCode);
		}
	};
}]);
// Loading Message
angular.module('app').directive('loadingIndicator', ['$compile', function ($compile) {
	return {
		restrict: 'A',
		link: function link(scope, element, attrs) {
			var html = angular.element('<div class="loadingMessage" ng-show="isLoading"><span><img src="/dist/images/loading.gif" width="32" height="32" /> Loading...</span></div>');
			$compile(html)(scope);
			element.prepend(html);
		}
	};
}]);
angular.module('app').directive('paginate', ['$timeout', function ($timeout) {
	return {
		restrict: 'A',
		scope: true,
		require: '?ngModel',
		link: function link(scope, elem, attrs, model) {

			// Debug warnings...

			if (!model) {
				console.warn('Need to set ng-model="model.items" on element, where model.items is the array you are paginating', elem);
				return false;
			}

			// Public Methods

			scope.setCurrentPage = function (val) {
				if (val < 1 || val > scope.numPages) {
					return;
				}
				scope.currentPage = val;
				refresh();
			};

			// Private Methods

			var refresh = function refresh(reset) {
				scope.currentPage = reset == true || !scope.currentPage ? 1 : scope.currentPage;
				//scope.pageSize = numPerPage();
				scope.numPages = Math.ceil(model.$modelValue.length / scope.pageSize);

				if (scope.currentPage > scope.numPages) {
					scope.currentPage = scope.numPages;
				}

				scope.startingItem = (scope.currentPage - 1) * scope.pageSize;
				scope.rangeStart = scope.startingItem + 1;
				scope.rangeEnd = scope.startingItem + scope.pageSize > scope.totalItems ? scope.totalItems : scope.startingItem + scope.pageSize;
				scope.totalItems = model.$modelValue.length;
			};

			scope.pageSize = parseInt(attrs.itemsPerPage, 10) || 10;

			// Watches

			scope.$watch(function () {
				return model.$modelValue;
			}, function (newVal, oldVal) {
				refresh(true);
			});

			scope.$watch('currentPage', function (newVal, oldVal) {
				if (newVal !== oldVal) {
					scope.setCurrentPage(newVal);
				}
			}, true);

			scope.$watch('pageSize', function (newVal, oldVal) {
				if (newVal !== oldVal) {
					refresh();
				}
			}, true);
		}
	};
}]);
$('.site-header .more-nav').click(function (e) {
	$('.nav-menu').show();
	$('body').addClass('nav-open');
	setTimeout(function () {
		$('.nav-menu .more-nav').addClass('open');
		$('.site-header .more-nav').addClass('open');
	}, 10);
	e.preventDefault();
});

$('.nav-menu .more-nav').click(function (e) {
	$('.nav-menu').hide();
	$('body').removeClass('nav-open');
	setTimeout(function () {
		$('.nav-menu .more-nav').removeClass('open');
		$('.site-header .more-nav').removeClass('open');
	}, 10);
	e.preventDefault();
});
//# sourceMappingURL=main.js.map
