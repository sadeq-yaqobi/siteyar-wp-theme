# Gulp Workflow for Minifying CSS/JS and Converting Images to WebP

This Gulp setup is designed to automate the process of minifying CSS and JavaScript files, as well as converting image files to the WebP format. This workflow helps improve the performance of your WordPress theme or any other web project by reducing file sizes and optimizing images.

## Prerequisites

Make sure you have the following installed:

- [Node.js](https://nodejs.org/) (v14 or later)
- [Gulp CLI](https://gulpjs.com/) (v4 or later)

You can install Gulp CLI globally using npm:

```bash
npm install --global gulp-cli
```
## Setup Instructions

1. **Install Node Modules**

   Run the following command in your project directory to install the necessary dependencies:

   ```bash
   npm install gulp gulp-cssnano gulp-uglify gulp-rename gulp-if through2
   ```
   Additionally, for WebP conversion:
   ```
   npm install --save-dev gulp-webp
   ```
   
2. **Create the Gulpfile**
   Create a file named `gulpfile.js` in your project's root directory and add the following code:

   ```javascript
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
   gulp.task('default', gulp.series('minify-css', 'minify-js', 'webp'));
   ```
3. **Run Gulp Tasks**
   ```bash
   gulp
   ```
   - This will execute the default task, which runs all individual tasks (minify-css, minify-js, and webp) in sequence.
## Directory Structure
Ensure your project has the following structure (or adjust the Gulp paths accordingly):
   ```plaintext
   project-root/
├── assets/
│   ├── css/
│   │   ├── style.css
│   ├── js/
│   │   ├── script.js
│   ├── img/
│   │   ├── example.jpg
│   │   ├── example.jpeg
│   │   ├── example.png
├── gulpfile.js
├── package.json
└── node_modules/
```
- ***CSS Files:*** Place your CSS files in `assets/css/`.
- ***JS Files:*** Place your JavaScript files in `assets/js/`.
- ***Image Files:*** Place your images in `assets/img/`.

   The minified files will be saved in the same directory with a `.min` suffix, and the converted WebP images will be saved in `assets/img/webp/`.
## Notes
- ***CSS and JS Minification:*** This setup checks if a file is already minified (by checking if `.min.` is in the file name) and skips minifying it again.
- ***WebP Conversion:*** Only `.jpg`, `.jpeg`, and `.png` images will be converted to WebP format.
## Troubleshooting
  If you encounter any issues, ensure that:

- You have the latest version of Node.js and Gulp installed.
- All required npm packages are installed correctly.
- Your directory paths in the Gulpfile are accurate.

For further assistance, consult the official [Gulp documentation](https://gulpjs.com/docs/en/getting-started/quick-start) or seek help from the community.

## License
This Gulp setup is open-source and free to use under the MIT license.