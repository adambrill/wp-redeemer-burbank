angular.module('app').directive('paginate', ['$timeout', function ($timeout) {
    return {
        restrict: 'A',
        scope: true,
        require: '?ngModel',
        link: function (scope, elem, attrs, model) {

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

            var refresh = function (reset) {
                scope.currentPage = (reset == true || !scope.currentPage) ? 1 : scope.currentPage;
                //scope.pageSize = numPerPage();
                scope.numPages = Math.ceil(model.$modelValue.length / scope.pageSize);

                if (scope.currentPage > scope.numPages) {
                    scope.currentPage = scope.numPages;
                }

                scope.startingItem = (scope.currentPage - 1) * scope.pageSize;
                scope.rangeStart = scope.startingItem + 1;
                scope.rangeEnd = (scope.startingItem + scope.pageSize > scope.totalItems) ? scope.totalItems : scope.startingItem + scope.pageSize;
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