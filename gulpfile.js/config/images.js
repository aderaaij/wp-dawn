const config = require('./');

module.exports = {
    source: `${config.sourceAssets}img/**/*`,
    dest: `${config.themeAssets}assets/img/`,
    imagemin: {
        optimizationLevel: 3,
        progressive: true,
        interlaced: true,
    },
};
