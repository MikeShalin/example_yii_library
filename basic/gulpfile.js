'use strict';
var gulp = require('gulp'),
    concat = require('gulp-concat'),
// less = require('gulp-less'),
    uglify = require('gulp-uglify'),
    babelify = require('babelify'),
    browserify = require('browserify'),
    source = require('vinyl-source-stream'),
    glob = require('glob');

gulp.task('build', function () {
    var appFiles = glob.sync('web/source/js/main.js');
    return browserify(
        {
            entries: appFiles,
            extensions: ['.js'],
            debug: true})
        .transform("babelify", {presets: ["es2015"]})
        .bundle()
        .pipe(source('web/js/bundle.js'))
        .pipe(gulp.dest('.'));
        // .pipe(reload({stream:true}));

});

// start task gulp watch
gulp.task('default', function() {
    gulp.start('build');
    gulp.watch('web/source/js/**/*.js', ['build']);
});
