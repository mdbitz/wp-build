/*
    npm install gulp-ruby-sass gulp-imagemin gulp-newer gulp-autoprefixer gulp-minify-css gulp-jshint jshint-stylish gulp-concat gulp-uglify gulp-imagemin gulp-notify gulp-rename gulp-livereload gulp-cache del require-dir --save-dev
*/

var gulp = require('gulp');
var plugins = require('gulp-load-plugins')({
    scope: ['devDependencies']
});
plugins.pkg = require('./package.json');

function getTask(task) {
    return require('./gulp-tasks/' + task)(gulp, plugins);
}

gulp.task('scripts', getTask('scripts'));
gulp.task('styles', getTask('styles'));
gulp.task('iconfont', getTask('iconfont'));
gulp.task('images', getTask('images'));
gulp.task('jshint', getTask('jshint'));

var scripts = [plugins.pkg._themepath + '/assets/js/**/*.js', '!' + plugins.pkg._themepath + '/assets/js/plugins/**/*.js'];

gulp.task('watch', function() {
    // Watch .svg files
    gulp.watch(plugins.pkg._themepath + '/assets/svg/font/*.svg', ['iconfont']);
  // Watch .scss files
    gulp.watch(plugins.pkg._themepath + '/assets/scss/**/*.scss', ['styles']);
    // Watch .js files
    gulp.watch(scripts, ['jshint']);
    gulp.watch(scripts, ['scripts']);
});

gulp.task('default', function() {
    gulp.start('iconfont','styles', 'jshint', 'scripts');
});