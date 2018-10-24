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


//ESTE ERA EL ORIGINAL
// mix.js('resources/js/app.js', 'public/js')
//    .sass('resources/sass/app.scss', 'public/css');


 // ver por que agregaban eso en el ejemplo
 // mix.js('resources/js/app.js', 'public/js')
 //   .sass('resources/sass/app.scss', 'public/css')
 //   .browserSync('laravel-vuejs');



 mix.js('resources/js/app.js', 'public/js')
       .js('resources/js/bootstrap.js', 'public/js')
       .sass('resources/sass/app.scss', 'public/css');