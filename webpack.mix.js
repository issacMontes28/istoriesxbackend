const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .react()  // Tells Laravel Mix to use React JSX
    .sass('resources/sass/app.scss', 'public/css');
