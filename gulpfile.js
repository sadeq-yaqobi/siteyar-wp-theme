const gulp = require('gulp');
const cssnano = require('gulp-cssnano');
const uglify = require('gulp-uglify');
const rename = require('gulp-rename');
const gulpIf = require('gulp-if');
const purgecss = require('gulp-purgecss');
const log = require('fancy-log');

//<---------------CSS & JS Minifying with PurgeCSS------------------>
// Purge unused CSS and log removed classes
gulp.task('purge-css', function() {
    return gulp.src('assets/css/main-style.css')
        .pipe(purgecss({
            content: ['**/*.html', '**/*.php', '**/*.js'], // Add paths to all files that contain your HTML, PHP, JS content
            safelist: {
                standard: ['menu-item', 'dropdown-toggle'], // List classes or patterns that should not be removed
                deep: [/^menu-item/, /^dropdown-toggle/] // Use regex for more complex patterns
            }
        }))
        .pipe(rename({ suffix: '.purged' })) // Optional: Rename the purged files
        .pipe(gulp.dest('assets/css'));
});

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


// Default task to run when you run 'gulp'
gulp.task('default', gulp.series('minify-css', 'minify-js'));
