import gulp from 'gulp';
import sass from 'gulp-sass';
import browserSync from 'browser-sync';

import plumber from 'gulp-plumber';
import babel from 'gulp-babel';

import uglify from 'gulp-uglify';
import jshint from 'gulp-jshint';
import stylish from 'jshint-stylish';
import concat from 'gulp-concat';

let proxyUrl;   // Fill in the proxy url here to link the local page to gulp

proxyUrl = 'project-aesir.wp'; // Like this

// COMPILE SASS INTO CSS
function style()
{
    // STEPS
    // 1. Where is my SASS?
    // 2. Pass that file through SASS compiler
    // 3. Where do i save the compiled SASS
    // 4. stream changes to all browser

    // 1.
    return gulp.src('./src/scss/*.scss')
        // 2.
        .pipe(sass({
            outputStyle: 'compressed'
        }).on('error', sass.logError))
        // 3.
        .pipe(gulp.dest('./dist/css'))
        // 4.
        .pipe(browserSync.stream());
}

function scripts()
{
    // STEPS
    // 1. Where is my JS?
    // 2. where do is save my JS
    // 3. stream changes to all browser

    // 1.
    return gulp.src('./src/js/*.js')
        // 2.
        .pipe(babel())
        .pipe(plumber())
        .pipe(jshint('.jshintrc'))
        .pipe(jshint.reporter(stylish))
        .pipe(uglify())
        .pipe(concat('build.min.js'))
        .pipe(gulp.dest('./dist/js'))
        .pipe(browserSync.stream());
}

function watch()
{
    // Check if proxyUrl has been filled in
    if (proxyUrl !== null){
        browserSync.init({
            proxy: proxyUrl,
        });
    } else {
        browserSync.init({
            server: {
                baseDir: './'
            }
        });
    }

    // Watch all css files for reloading
    gulp.watch('./src/scss/**/*.scss', style);
    // Watch all html files for reloading
    gulp.watch('./*.html').on('change', browserSync.reload);
    // Watch all js files for reloading
    gulp.watch('./src/js/*.js', scripts);
    // Watch all php files for reloading
    gulp.watch('**/*.php',).on('change', browserSync.reload);
}

const build = gulp.parallel(style, scripts, watch);

gulp.task('build', build);

export default build;
