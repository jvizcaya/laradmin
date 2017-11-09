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
    /* js */
    mix.js('resources/assets/js/app.js', 'public/js');

    /* css */
    mix.sass('resources/assets/sass/app.scss', 'public/css/app.sass.css')
    .less('resources/assets/less/app.less', 'public/css/app.less.css');

    /* Concatenate */
    mix.styles([
      'public/css/app.sass.css',
      'public/css/app.less.css',
      'public/css/custom.css'
    ],'public/css/app.css');

    /* copy */
    /*
    mix.copyDirectory('node_modules/admin-lte/plugins', 'public/assets/plugins');
    */
