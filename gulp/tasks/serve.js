var browserSync = require('browser-sync').create();

module.exports = function(gulp, config) {
	'use strict';

	gulp.task('serve', function() {
		browserSync.init({
			proxy: config.devUrl
		});

		gulp.watch(config.styles.paths.src, ['styles', browserSync.reload]);
	});
};