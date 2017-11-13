// Loading Message
angular.module('app').directive('loadingIndicator', ['$compile', function ($compile) {
    return {
        restrict: 'A',
        link: function (scope, element, attrs) {
            var html = angular.element('<div class="loadingMessage" ng-show="isLoading"><span><img src="/dist/images/loading.gif" width="32" height="32" /> Loading...</span></div>');
            $compile(html)(scope);
            element.prepend(html);
        }
    };
}]);