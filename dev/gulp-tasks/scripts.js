module.exports = function (gulp, plugins) {
    return function () {
        gulp.src(plugins.pkg._themepath + '/assets/js/**/*.js')
        .pipe(plugins.concat('scripts.js'))
        .pipe(gulp.dest(plugins.pkg._themepath + '/assets/build'))
        .pipe(plugins.rename({suffix: '.min'}))
        .pipe(plugins.uglify())
        .pipe(gulp.dest(plugins.pkg._themepath + '/assets/build'))
        .pipe(plugins.notify({ message: 'Scripts task complete' }));
    };
};