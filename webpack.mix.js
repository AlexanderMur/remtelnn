let mix = require('laravel-mix');

mix
    .js('resources/assets/js/admin.js', 'public/dist')
    .sass('resources/assets/sass/admin.scss', 'public/dist')
    .js('resources/assets/js/main.js', 'public/dist')
    .sass('resources/assets/sass/main.scss', 'public/dist')
    .copyDirectory('resources/assets/fonts','public/fonts')
    .options({ processCssUrls: false })
    .browserSync({
        proxy: 'lara.ru',
        files: [
            'public/dist/*.css'
        ]
    })
