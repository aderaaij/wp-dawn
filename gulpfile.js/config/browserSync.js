const config = require('./');

module.exports = {
    proxy: `http://${config.appUrl}`,
    open: false,
};
