module.exports = function (gulp, plugins) {
    return function () {
        gulp.src([plugins.pkg._themepath + '/assets/svg/font/*.svg'])
                .pipe(plugins.iconfontCss({
                    fontName: 'theme-icons',
                    path: plugins.pkg._themepath + '/assets/svg/font/templates/_icons.scss',
                    targetPath: '../scss/utilities/_icons.scss',
                    fontPath: '../fonts/'
                }))
                .pipe(plugins.iconfont({
                    fontName: 'theme-icons',
                    formats: ['ttf', 'eot', 'woff', 'woff2', 'svg']
                }))
                .pipe(gulp.dest(plugins.pkg._themepath + '/assets/fonts/'));
    };
};