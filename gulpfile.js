/**
 * All tasks are imported from ./gulp/index.js
 * Gulp task configuation in ./gulp/config.js
 */

var gulp = require('gulp');
var config = require('./gulp/config');

require('./gulp/index')(gulp, config);