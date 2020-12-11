const mix = require('laravel-mix');

module.exports = {
  module: {
    loaders: [

      // ...

      // Css loader.
      {
        test: /\.css$/,
        loader: 'vue-style-loader!css-loader'
      }

    ]
  },
  vue: {
    loaders: {

      // ...

      // Css loader for Webpack 1.x .
      css: 'vue-style-loader!css-loader'
    }
  }
}

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

mix.js('resources/js/app.js', 'public/js')
  .sass('resources/sass/app.scss', 'public/css');
// .extract()
  // .version();

//Copy images and fonts from 'resources/' to 'public/'
mix.copyDirectory('resources/img', 'public/img');
mix.copyDirectory('resources/css', 'public/css');
