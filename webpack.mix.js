const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .css('resources/css/app.css', 'public/css')
    .css('resources/css/all.css', 'public/css')
    .js('resources/js/bootstrap.js', 'public/js')
    .js('resources/js/all.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')

