const mix = require('laravel-mix');



mix.js('resources/js/app.js', 'public/js')
    .styles('resources/css/style.css', 'public/css/app.css')