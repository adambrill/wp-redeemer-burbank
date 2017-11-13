angular.module('app').factory('sermons', ['$q', '$http', function ($q, $http) {

	var sermonsService = {
		setSermonMedia: function (sermons) {

			if (!sermons.length) {
				sermons = [sermons];
			}

			for (var i=0; i<sermons.length; i++) {
				
				var sermon = sermons[i];
				(function(sermon) {
					$http({
						method: 'GET',
						url: 'http://gardencitysv.com/wp-json/media?filter[post_parent]=' + sermon.ID
					}).then(function(results) {
						sermon.media = results.data;
					});
				})(sermon);
				
			}
		},
		getMedia: function (id) {
			return $http({
				method: 'GET',
				url: 'http://gardencitysv.com/wp-json/media?filter[post_parent]=' + id
			});
		}
	};
 
	return sermonsService;

}]);