const mix = require('laravel-mix');

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

mix.styles([
    // 'resources/admin/assets/css/nice-select.css',
    'resources/admin/assets/css/style-starter.css',
], 'public/css/admin.css');

mix.scripts([
    'resources/admin/assets/js/jquery-3.3.1.min.js',
    'resources/admin/assets/js/jquery-1.10.2.min.js',
    'resources/admin/assets/js/Chart.min.js',
    'resources/admin/assets/js/jquery.nicescroll.js',
    'resources/admin/assets/js/jquery.nice-select.min.js',
    'resources/admin/assets/js/modernizr.js',
    'resources/admin/assets/js/scripts.js',
    'resources/admin/assets/js/bootstrap.min.js',
    'resources/admin/assets/js/utils.js',
    'resources/admin/assets/js/bar.js',
    'resources/admin/assets/js/linechart.js'
], 'public/js/admin.js');

mix.copyDirectory('resources/admin/assets/fonts', 'public/fonts');
mix.copyDirectory('resources/admin/assets/images', 'public/images');
