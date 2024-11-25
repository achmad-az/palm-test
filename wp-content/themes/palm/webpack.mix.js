let mix = require('laravel-mix');
let path = require('path');

let assetSrc = 'assets/src'
let assetDist = 'assets/dist'

let cssDirDist = `${assetDist}/css`;
let jsDirDist = `${assetDist}/js`;

let cssDirSrc = `${assetSrc}/css`;
let jsDirSrc = `${assetSrc}/js`;

mix.setResourceRoot('../');
mix.setPublicPath(path.resolve('./'));

mix.webpackConfig({
    watchOptions: { ignored: [
        path.posix.resolve(__dirname, './node_modules'),
        path.posix.resolve(__dirname, './assets/dist/css'),
        path.posix.resolve(__dirname, './assets/dist/js')
    ] }
});

mix.js(`${jsDirSrc}/app.js`, jsDirDist);

mix.postCss(`${cssDirSrc}/app.css`, cssDirDist);

mix.postCss(`${cssDirSrc}/editor-style.css`, cssDirDist);

// mix.browserSync({
//     proxy: 'http://palm.test',
//     host: 'palm.test',
//     open: 'external',
//     port: 8000
// });

if (mix.inProduction()) {
    mix.version();
} else {
    mix.options({ manifest: false });
}
