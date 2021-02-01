const mix = require('laravel-mix')
const tailwindcss = require('tailwindcss')

mix.webpackConfig({
  resolve: {
    alias: {
      '@': path.resolve(__dirname, 'resources/assets/js')
    }
  }
})

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
  .js('resources/assets/js/app.js', 'public/admin/js/')
  .js('resources/assets/front/front.js', 'public/front/js/')
  .sass('resources/assets/sass/app.scss', 'public/admin/css/')
.sass('resources/assets/sass/front.scss', 'public/front/css/')
  .options({
    processCssUrls: false,
    postCss: [ tailwindcss('./tailwind.config.js')]
  })

// if (!mix.inProduction()) {
//   mix
//     .webpackConfig({
//       devtool: 'source-map'
//     })
//     .sourceMaps()
// } else {
//   mix.version()
// }



if (mix.inProduction()) {
  mix.version();
  // .purgeCss()
} else {
  mix.webpackConfig({
      devtool: "source-map",
  }).sourceMaps();
}
