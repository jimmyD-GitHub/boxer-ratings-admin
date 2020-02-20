let Encore = require('@symfony/webpack-encore');

if (!Encore.isRuntimeEnvironmentConfigured()) {
  Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
  .setOutputPath('public/build/')
  .setPublicPath('/build')

  .addEntry('app', './assets/js/app.js')
  .addEntry('login', './assets/js/login.js')

  .splitEntryChunks()
  .enableSingleRuntimeChunk()
  .cleanupOutputBeforeBuild()
  .enableBuildNotifications()
  .enableSourceMaps(!Encore.isProduction())
  .enableVersioning(Encore.isProduction())

  .configureBabel(() => {
  }, {
    useBuiltIns: 'usage',
    corejs: 3
  })

  .enableSassLoader()
;

if (Encore.isProduction()) {
  Encore.setPublicPath('https://assets.boxeratings.com/');
  Encore.setManifestKeyPrefix('');
}

module.exports = Encore.getWebpackConfig();
