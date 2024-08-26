const gulp = require('gulp');
const cssnano = require('gulp-cssnano');
const uglify = require('gulp-uglify');
const rename = require('gulp-rename');
const gulpIf = require('gulp-if');
const through = require('through2');

//<---------------CSS & JS Minifying------------------>
// Helper function to check if a file is already minified
function isMinified(file) {
    return file.path.includes('.min.');
}

// Minify CSS
gulp.task('minify-css', function() {
    return gulp.src('assets/css/*.css')
        .pipe(gulpIf(file => !isMinified(file), cssnano()))
        .pipe(gulpIf(file => !isMinified(file), rename({ suffix: '.min' })))
        .pipe(gulp.dest('assets/css'));
});

// Minify JS
gulp.task('minify-js', function() {
    return gulp.src('assets/js/*.js')
        .pipe(gulpIf(file => !isMinified(file), uglify()))
        .pipe(gulpIf(file => !isMinified(file), rename({ suffix: '.min' })))
        .pipe(gulp.dest('assets/js'));
});

//<---------------Image Convertor To WebP------------------>
// Paths to your image files
const paths = {
    images: 'assets/img/**/*.{jpg,jpeg,png}',
};

// Task to convert images to WebP
gulp.task('webp', async function () {
    const webp = (await import('gulp-webp')).default;
    return gulp.src(paths.images)
        .pipe(webp())
        .pipe(gulp.dest('assets/img/webp'));
});

// Default task to run when you run 'gulp'
gulp.task('default', gulp.series('minify-css','minify-js','webp'));

