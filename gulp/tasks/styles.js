var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var cssnano = require('gulp-cssnano');
var changed = require('gulp-changed');
var plumber = require('gulp-plumber');
var concat = require('gulp-concat');
var gulpif = require('gulp-if');

module.exports = function(gulp, config) {
	'use strict';

	gulp.task('styles', function() {
		return gulp.src(config.styles.paths.src)
			.pipe(plumber())
			.pipe(changed(config.styles.paths.dest))
			.pipe(gulpif(config.minify == false, sourcemaps.init()))
			.pipe(sass().on('error', sass.logError))
			.pipe(autoprefixer({
				browsers: config.styles.browsers
			}))
			.pipe(concat('style.css'))
			.pipe(gulpif(config.minify == true, cssnano()))
			.pipe(gulpif(config.minify == false, sourcemaps.write()))
			.pipe(gulp.dest(config.styles.paths.dest));
	});
};