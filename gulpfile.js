var gulp = require('gulp');
var plumber = require('gulp-plumber');
var rename = require('gulp-rename');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var sass = require('gulp-sass');
var browserSync = require('browser-sync');
var cleanCSS = require('gulp-clean-css');

var input = {
  'css': 'assets/src/styles/main.scss',
  'js' : 'assets/src/scripts/app.js'
};

var output = {
  'css' : 'assets/dist/',
  'js' : 'assets/dist/'
};

gulp.task('default', ['watch']);

gulp.task('build-css', function(){
  return gulp.src(input.css)
    .pipe(sass())
    .pipe(concat('styles.css'))
    .pipe(cleanCSS())
    .pipe(gulp.dest(output.css));
});

gulp.task('build-js', function(){
  return gulp.src(input.js)
  .pipe(concat('scripts.js'))
  .pipe(uglify())
  .pipe(rename({suffix: '.min'}))
  .pipe(gulp.dest(output.js));
});

gulp.task('watch', function(){
  gulp.watch('assets/src/styles/*/*.scss', ['build-css']);
  gulp.watch(input.js, ['build-js']);
});

gulp.task('build', ['build-css', 'build-js']);