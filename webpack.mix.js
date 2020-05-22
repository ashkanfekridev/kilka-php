const mix = require('laravel-mix');
mix.options({ processCssUrls: false });

mix.js("./resources/assets/js/app.js", './public/js')
       .sass('./resources/assets/scss/app.scss', './public/css');
