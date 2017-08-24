module.exports = function (gulp, plugins) {
    return function () {
        gulp.src(plugins.pkg._themepath + '/assets/img/**/*')
                .pipe(plugins.newer(plugins.pkg._themepath + '/assets/build/img'))
                .pipe(plugins.imagemin())
                .pipe(gulp.dest(plugins.pkg._themepath + '/assets/build/img'));
    };
};