const gulp = require('gulp');
const cssnano = require('gulp-cssnano');
const uglify = require('gulp-uglify');
const rename = require('gulp-rename');
const gulpIf = require('gulp-if');
const through = require('through2');

<<<<<<< HEAD

// const purgecss = require('gulp-purgecss');

// <---------------CSS Purging----------------->
// PurgeCSS for assets/css
/*gulp.task('purgecss-css', () => {
    return gulp.src('assets/css/!**!/!*.css')
        .pipe(purgecss({
            content: ['**!/!*.php', '**!/!*.js'], // Adjust paths as needed
            safelist: [] // Add classes to keep if needed
        }))
        .pipe(gulp.dest('assets/css/purged')); // Static path for CSS
});

// PurgeCSS for assets/plugins
gulp.task('purgecss-plugins', () => {
    return gulp.src('assets/plugins/!**!/!*.css')
        .pipe(purgecss({
            content: ['**!/!*.php', '**!/!*.js'], // Adjust paths as needed
            safelist: [] // Add classes to keep if needed
        }))
        .pipe(gulp.dest('assets/plugins/purged')); // Static path for plugins
});*/

//<---------------CSS & JS Minifying------------------>
=======
//<---------------CSS & JS Minifying------------------>
// Helper function to check if a file is already minified
>>>>>>> 1a90ab4 (main local)
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

<<<<<<< HEAD

// Default task to run when you run 'gulp'
gulp.task('default', gulp.series('minify-css','minify-js'));
=======
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
>>>>>>> 1a90ab4 (main local)

