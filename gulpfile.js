const { src, dest, watch, series } = require('gulp');

// CSS y SASS
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const sourcemaps = require('gulp-sourcemaps');
const cssnano = require('cssnano');

// Imagenes
const imagemin = require('gulp-imagemin');
const webp = require('gulp-webp');
const avif = require('gulp-avif');

function css( done ) {
    src('resources/scss/app.scss')
        .pipe( sourcemaps.init() )
        .pipe( sass() )
        .pipe( postcss([ autoprefixer(), cssnano() ]) )
        .pipe( sourcemaps.write('.'))
        .pipe( dest('public/css') )

    done();
}

function imagenes() {
    return src('resources/img/**/*')
        .pipe( imagemin({ optimizationLevel: 3 }) )
        .pipe( dest('public/img') )
}

function versionWebp() {
    const opciones = {
        quality: 50
    }
    return src('resources/img/**/*.{png,jpg}')
        .pipe( webp( opciones ) )
        .pipe( dest('public/img') )
}
function versionAvif() {
    const opciones = {
        quality: 50
    }
    return src('resources/img/**/*.{png,jpg}')
        .pipe( avif( opciones ) )
        .pipe( dest('public/img'))
}

function dev() {
    watch( 'resources/scss/**/*.scss', css );
    watch( 'resources/img/**/*', imagenes );
}


exports.css = css;
exports.dev = dev;
exports.imagenes = imagenes;
exports.versionWebp = versionWebp;
exports.versionAvif = versionAvif;
exports.default = series( imagenes, versionWebp, versionAvif, css, dev  );
