var gulp = require('gulp');
var concat = require('gulp-concat');
var cssmin = require('gulp-cssmin');
var uglify = require('gulp-uglify');


gulp.task('watch', function(){
    gulp.watch('public/css/*.css', ['compile-css']);
    gulp.watch('public/js/*.js', ['compile-js']);
})

gulp.task('compile-css', function(){
    gulp.src(['public/css/*.css'])
        .pipe(cssmin())
        .pipe(concat('romanNumerals.min.css'))
        .pipe(gulp.dest('public/dist/css'))
});

gulp.task('compile-js', function(){
    gulp.src(['public/js/*.js'])
        .pipe(uglify())
        .pipe(concat('romanNumerals.min.js'))
        .pipe(gulp.dest('public/dist/js'))
});