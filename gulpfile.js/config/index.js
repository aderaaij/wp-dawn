const config = {};

// Source
config.sourcePath = './src/';
config.sourceAssets = './src/assets/';

// Destination
config.appUrl = 'loc.wp-dawn.com';
config.appPath = './app/';
config.publicPath = `${config.appPath}www/`;
config.themeName = 'wp-dawn';
config.themePath = `${config.publicPath}content/themes/${config.themeName}/`;
config.themeAssets = `${config.themePath}assets/`;

// Packages path
config.nodeModules = './node_modules/';

module.exports = config;
