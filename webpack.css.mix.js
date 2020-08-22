require('laravel-mix-merge-manifest');

const mix = require('laravel-mix');

mix
    .sass('resources/sass/vendor.scss', 'public/css/')
    .sass('resources/sass/app.scss', 'public/css/')
    .mergeManifest()
    .version();