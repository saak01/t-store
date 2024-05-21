const gulp = require('gulp');
const sass = require('gulp-sass');
const concat = require('gulp-concat');
const rename = require('gulp-rename');
const del = require('del');
const minifyCss = require('gulp-clean-css');
const terser = require("gulp-terser");

var buildDir = 'public/assets';
var assetsDir = 'resources/assets';

var environments = {
    common: {
        scssFiles: [
            assetsDir + '/scss/common.scss',
        ],
        jsFiles: [
            assetsDir + '/js/common/*.js',
            assetsDir + '/js/common/**/*.js',
        ]
    },
    web: {
        scssFiles: [
            assetsDir + '/scss/web.scss',
        ],
        jsFiles: [
            assetsDir + '/js/web/*.js',
            assetsDir + '/js/web/**/*.js',
        ]
    },
    admin: {
        scssFiles: [
            assetsDir + '/scss/admin.scss',
        ],
        jsFiles: [
            assetsDir + '/js/admin/*.js',
            assetsDir + '/js/admin/**/*.js',
        ]
    }
};

// Concatena os arquivos sass, converte e comprime em css
function sass2Css(files, outputName, env = 'dev') {
    var sassConfig = {
        outputStyle: env == 'prod' ? 'compressed' : 'expanded'
    };

    return gulp.src(files)
        .pipe(concat(outputName + '.scss'))
        .pipe(sass(sassConfig).on('error', sass.logError))
        .pipe(rename(outputName + '.min.css'))
        .pipe(gulp.dest(buildDir + '/css'));
}

// Concatena e mimifica os arquivos css se estiver em produção
function css(files, outputName, env = 'dev') {
    var obj = gulp.src(files)
        .pipe(concat(outputName + '.css'))
        .pipe(rename(outputName + '.min.css'));

    if (env == 'prod') {
        obj.pipe(minifyCss({ compatibility: 'ie8' }));
    }

    return obj.pipe(gulp.dest(buildDir + '/css'));
}

// Concatena os arquivos js e comprime em js
function js2Mimify(files, outputName , env = 'dev') {
    var obj = gulp.src(files)
        .pipe(concat(outputName + ".js"));

    var gulpTerserOptions = {
        output: { comments: false }
    };

    if (env == "prod") {
        obj = obj.pipe(terser(gulpTerserOptions));
    }

    return obj.pipe(rename(outputName + ".min.js"))
        .pipe(gulp.dest(buildDir + "/js"));
}

// Limpa o diretório de build
function cleanBuild() {
    return del([buildDir]);
}

// ---------------------------------------------------------------------------------------------------
// Tasks para CSS/SCSS

function scssTask(files, name, mode) {
    return sass2Css(files, name, mode);
}

function cssTask(files, name, mode) {
    return css(files, name, mode);
}

function commonCssDev() {
    return scssTask(environments.common.scssFiles, 'common');
}

function commonCssProd() {
    return scssTask(environments.common.scssFiles, 'common', 'prod');
}

function webCssDev() {
    return scssTask(environments.web.scssFiles, 'web');
}

function webCssProd() {
    return scssTask(environments.web.scssFiles, 'web', 'prod');
}

function adminCssDev() {
    return scssTask(environments.admin.scssFiles, 'admin');
}

function adminCssProd() {
    return scssTask(environments.admin.scssFiles, 'admin', 'prod');
}

// ---------------------------------------------------------------------------------------------------
// Tasks para JS

function jsTask(files, name, mode) {
    return js2Mimify(files, name, mode);
}

function commonJsDev() {
    return jsTask(environments.common.jsFiles, 'common');
}

function commonJsProd() {
    return jsTask(environments.common.jsFiles, 'common', 'prod');
}

function webJsDev() {
    return jsTask(environments.web.jsFiles, 'web');
}

function webJsProd() {
    return jsTask(environments.web.jsFiles, 'web', 'prod');
}

function adminJsDev() {
    return jsTask(environments.admin.jsFiles, 'admin');
}

function adminJsProd() {
    return jsTask(environments.admin.jsFiles, 'admin', 'prod');
}

// ---------------------------------------------------------------------------------------------------
// Tasks avulsas

/**
 * Monitora a alteração e realiza a publicação dos arquivos
 * @returns
 */
function watch() {
    gulp.watch(scssWatchFiles, commonCssDev);
    gulp.watch(scssWatchFiles, webCssDev);
    gulp.watch(scssWatchFiles, adminCssDev);
}

gulp.task('clean', gulp.series(cleanBuild));

gulp.task('build', gulp.series(
    cleanBuild,
    commonCssProd, commonJsProd,
    webCssProd, webJsProd,
    adminCssProd, adminJsProd,
    images,
    fonts,
));

gulp.task('default', gulp.series(
    cleanBuild,
    commonCssDev, commonJsDev,
    webCssDev, webJsDev,
    adminCssDev, adminJsDev,
    images,
    fonts
));

gulp.task('watch', gulp.series('default', watch));
