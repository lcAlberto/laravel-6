const mix = require('laravel-mix');

mix.copyDirectory('resources/img', 'public/img');

mix.js('resources/js/app.js', 'public/js')
  .sass('resources/sass/app.scss', 'public/css')
  .options({ processCssUrls: false });


mix.extract([
  'vue',
  'axios',
  'lodash',
]);