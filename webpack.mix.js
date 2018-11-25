let mix = require('laravel-mix');
let fs= require('fs');

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

mix.react('resources/assets/js/app.js', 'public/js');

mix.sass('resources/assets/sass/app.scss','public/css');

mix.copy('resources/assets/images','public/images');

//page specific resources, not asynchronous
let page_js_dir = 'resources/assets/js/pages/';
let page_css_dir = 'resources/assets/sass/pages/';
let page_js_files = fs.readdirSync(page_js_dir);
let page_css_files = fs.readdirSync(page_css_dir);

for(file of page_js_files){
    mix.react(page_js_dir + file, 'public/js/pages')
}


for(file of page_css_files){
    mix.sass(page_css_dir+file, 'public/css/pages')
}
