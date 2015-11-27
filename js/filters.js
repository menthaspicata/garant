'use strict';

/* Filters */

angular.module('cookbookFilters', []).filter('ampersants', function() {
  return function(input) {
    return input.replace(/\&amp\;/g, '&').replace(/\&quot\;/g, '"');
  };
});
