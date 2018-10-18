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

 mix.options({processCssUrls: false});

 mix.less('resources/assets/less/styles.less', 'public/css');

 mix.copy('resources/assets/images', 'public/images');

 mix.copy('resources/assets/js/jquery.min.js', 'public/js');

 mix.sass('resources/assets/sass/app.scss', 'public/css');

mix
    .js('resources/assets/js/app.js', 'public/js')
    .copy('resources/assets/js/album.js', 'public/js')
    .js('resources/assets/js/contact.js', 'public/js');
if (mix.config.inProduction) {
    mix.version();
}
