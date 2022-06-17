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

mix.js('resources/js/admin/header.js', 'public/assets/admin/js')
   .js('resources/js/admin/footer.js', 'public/assets/admin/js')
   .sass('resources/sass/admin.scss', 'public/assets/admin/css');


mix.js('resources/js/web/header.js', 'public/assets/web/js')
    .js('resources/js/web/footer.js', 'public/assets/web/js')
    .sass('resources/sass/web.scss', 'public/assets/web/css');

mix.js('resources/js/trainer/header.js', 'public/assets/trainer/js')
    .js('resources/js/trainer/footer.js', 'public/assets/trainer/js')
    .sass('resources/sass/trainer.scss', 'public/assets/trainer/css');

mix.js('resources/js/trainee/header.js', 'public/assets/trainee/js')
    .js('resources/js/trainee/footer.js', 'public/assets/trainee/js')
    .sass('resources/sass/trainee.scss', 'public/assets/trainee/css');

    mix.sourceMaps();