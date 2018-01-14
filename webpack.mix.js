let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.babel(['node_modules/jquery/dist/jquery.js',
			'node_modules/bootstrap/dist/js/bootstrap.bundle.js',
			'resources/assets/js/app.js'], 'public/js/app.min.js')
	.styles('node_modules/bootstrap/dist/css/bootstrap.css', 'public/css/app.min.css');

	if(mix.inProduction()){
		mix.disableNotifications();
	}
