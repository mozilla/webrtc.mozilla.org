module.exports = function(gulp, config) {
	'use strict';

	require('./tasks/serve')(gulp, config);
	require('./tasks/styles')(gulp, config);

	return gulp;
};