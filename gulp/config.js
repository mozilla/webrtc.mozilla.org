module.exports = {
	
	minify: true,

	devUrl: 'http://localhost:8888',

	styles: {
		paths: {
			src: './assets/scss/**/*.scss',
			dest: './'
		},
		// browser versions used by Autoprefixer
		browsers: [
			'last 2 versions',
			'ie >= 9'
		]
	}

};