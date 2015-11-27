'use strict';


var cookbookCtrl = angular.module('cookbookCtrl', []);


cookbookCtrl.controller('cookbookList', ['$scope', 'Recipe',
	function($scope, Recipe) {
		$scope.recipes = Recipe.query();

}]);

cookbookCtrl.controller('cookbookSingle', ['$scope', '$routeParams', 'Recipe',
	function($scope, $routeParams, Recipe) {
		$scope.recipe = Recipe.get({recipeId: $routeParams.recipeId});

}]);
