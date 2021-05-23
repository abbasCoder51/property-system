const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.copy('resources/css/app.css', 'public/css');
mix.copy('resources/js/app.js', 'public/js');
mix.copyDirectory('node_modules/bootstrap/dist', 'public/vendor/bootstrap');
mix.copyDirectory('node_modules/jquery/dist', 'public/vendor/jquery');
mix.copyDirectory('node_modules/@fortawesome/fontawesome-free', 'public/vendor/fontawesome');
