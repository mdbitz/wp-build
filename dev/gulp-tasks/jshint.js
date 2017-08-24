module.exports = function (gulp, plugins) {
    return function () {
        var scripts = [plugins.pkg._themepath + '/assets/js/**/*.js', '!' + plugins.pkg._themepath + '/assets/js/plugins/**/*.js'];

        gulp.src(scripts)
                .pipe(plugins.jshint('.jshintrc'))
                .pipe(plugins.jshint.reporter('jshint-stylish'));
    };
};