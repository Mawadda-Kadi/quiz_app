const mix = require('laravel-mix');

mix.sass('resources/sass/app.scss', 'public/css')
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/dropdown.js', 'public/js')
    .js('resources/js/footer.js', 'public/js')
    .version();
