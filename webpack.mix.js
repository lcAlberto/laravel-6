const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
  .sass('resources/sass/app.scss', 'public/css');
// .extract()
  // .version();

//Copy images and fonts from 'resources/' to 'public/'
mix.copyDirectory('resources/img', 'public/img');
mix.copyDirectory('resources/css', 'public/css');
