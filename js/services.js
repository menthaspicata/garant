'use strict';

/* Services */

var cookbookServices = angular.module('cookbookServices', ['ngResource']);

cookbookServices.factory('Recipe', ['$resource',
	function($resource){
		return $resource( cookbook.theme_path + '/:recipeId', {}, {
			query: {method:'GET', params:{recipeId:'all'}, isArray:true}
	});
}]);