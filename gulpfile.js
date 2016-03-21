process.env.DISABLE_NOTIFIER = true;

var elixir  = require('laravel-elixir'),
    gulp    = require('gulp'),
    htmlmin = require('gulp-htmlmin');

elixir.extend('compress', function() {
    new elixir.Task('compress', function() {
        return gulp.src('./storage/framework/views/*')
            .pipe(htmlmin({
                collapseWhitespace:    true,
                removeAttributeQuotes: true,
                removeComments:        true,
                minifyJS:              true,
                minifyCSS:             true,
            }))
            .pipe(gulp.dest('./storage/framework/views/'));
    })
    .watch('./storage/framework/views/*');
});

elixir(function(mix) {
    mix.compress();

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
