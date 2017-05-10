const { mix } = require('laravel-mix');

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

mix.js([
	'resources/assets/js/plugins/jQuery/jquery-1.9.1.min.js',
	'resources/assets/js/plugins/bootstrap/bootstrap.min.js',
	'resources/assets/js/plugins/AdminLTE/app.min.js',
	'resources/assets/js/app.js'

	], 'public/js/app.js')
   .styles([
   	'resources/assets/css/bootstrap.min.css',
   	'resources/assets/css/AdminLTE.min.css',
   	'resources/assets/css/skin-blue.min.css'
   	], 'public/css/app.css')
   .copyDirectory('resources/assets/img', 'public/img');
