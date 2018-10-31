let mix = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'js/app.js')
   .js('resources/assets/js/admin.js', 'js/admin.js')
   .sass('resources/assets/sass/app.scss', 'css/app.css')
   .sass('resources/assets/sass/admin.scss', 'css/admin.css')
   .styles([
   	'node_modules/swiper/dist/css/swiper.min.css',
   	'node_modules/video.js/dist/video-js.min.css',
   	'node_modules/cropperjs/dist/cropper.min.css',
   	'resources/assets/vendor/animate/animate.css',
   	'resources/assets/vendor/font-awesome/fontawesome-all.min.css',
   	'public/css/app.css',
   	], 'public/css/app.css')
   .scripts([
   	'node_modules/moment/min/moment-with-locales.min.js',
   	'node_modules/cropperjs/dist/cropper.min.js',
   	'node_modules/swiper/dist/js/swiper.min.js',
   	'node_modules/video.js/dist/video.min.js',
   	'node_modules/video.js/dist/ie8/videojs-ie8.min.js',
   	'node_modules/chart.js/dist/Chart.min.js',
   	'node_modules/scrollreveal/dist/scrollreveal.min.js',
   	'public/js/app.js',
   	], 'public/js/app.js')
   .copy('node_modules/pace-js/pace.min.js', 'public/js/pace.min.js')
   .copyDirectory('resources/assets/fonts', 'public/fonts/')
   .copyDirectory('resources/assets/vendor/font-awesome/webfonts', 'public/fonts/font-awesome')
   .version();
