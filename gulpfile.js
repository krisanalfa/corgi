process.env.DISABLE_NOTIFIER = true;

var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss');

    mix.copy('resources/assets/fonts/material-design-icons', 'public/fonts/material-design-icons');

    mix.copy('vendor/bower/material-design-lite/src/images/', 'public/images/');
    mix.copy('vendor/bower/material-design-lite/material.js', 'public/js/');
    mix.copy('vendor/bower/material-design-lite/material.min.js', 'public/js/');
    mix.copy('vendor/bower/material-design-lite/material.min.js.map', 'public/js/');

    mix.copy('vendor/bower/roboto-fontface/fonts', 'public/fonts/roboto');

    mix.browserify([
        '../../../vendor/bower/material-design-lite/material.js',
        'resources/assets/js/app.jsx',
    ], 'public/js/app.js');
});
