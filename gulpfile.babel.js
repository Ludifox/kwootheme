import { src, dest, watch, series, parallel } from 'gulp';
import yargs from 'yargs';
import sass from 'gulp-sass';
import cleanCss from 'gulp-clean-css';
import gulpif from 'gulp-if';
const PRODUCTION = yargs.argv.prod;
import postcss from 'gulp-postcss';
import sourcemaps from 'gulp-sourcemaps';
import autoprefixer from 'autoprefixer';
import imagemin from 'gulp-imagemin';
import del from 'del';
import webpack from 'webpack-stream';
import named from 'vinyl-named';
import wpPot from 'gulp-wp-pot';
import replace from 'gulp-replace';

var DEVFOLDER = 'C:\\wamp64\\www\\kr\\wp-content\\themes\\kwoo';

export const styles = () => {
    return src('src/sass/style.scss')
    .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
    .pipe(sass().on('error', sass.logError))
    .pipe(gulpif(PRODUCTION, postcss([autoprefixer])))
    .pipe(gulpif(PRODUCTION, cleanCss({compatibility: 'ie8'})))
    .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
    .pipe(replace('@charset "UTF-8";', ''))
    .pipe(dest('kwoo'));
}

export const images = () => {
    return src('src/images/**/*.{jpg,jpeg,png,svg,gif}')
    .pipe(gulpif(PRODUCTION, imagemin()))
    .pipe(dest('kwoo/images'));
}

export const copy = () => {
    return src(['src/**/*', '!src/{images,js,sass}', '!src/{images,js,sass}/**/*'])
    .pipe(dest('kwoo'));
}

export const push = () => {
    return src('kwoo/**/*').pipe(dest(DEVFOLDER));
}

export const clean = () => del(['kwoo']);

export const scripts = () => {
    return src('src/js/kwooscripts.js')
    .pipe(webpack( {
        module: {
            rules: [
                {
                    test: /\.js$/,
                    use: {
                        loader: 'babel-loader',
                        options: {
                            presets: []
                        }
                    }
                }
            ]
        },
        mode: PRODUCTION ? 'production' : 'development',
        devtool: !PRODUCTION ? 'inline-source-map' : false,
        output: {
            filename: '[name].js'
        },
        externals: {
            jquery: 'jQuery'
        }
    }))
    .pipe(dest('kwoo/js'));
}

export const pot = () => {
    return src('**/*.php')
    .pipe(
        wpPot({
            domain: 'kwoo'
        })
    )
    .pipe(dest('kwoo/languages/kwoo.pot'));
}

export const watchChanges = () => {
    watch('src/sass/**/*.scss', styles);
    watch('src(images/**/*.{jpg,jpeg,png,svg,gif}', images);
    watch(['src/**/*', '!src/{images,js,sass}', '!src/{images,js,sass}/**/*'], copy);
    watch('src/js/**/*.js', scripts);
}

export const dev = series(clean, parallel(styles, images, copy, scripts,), watchChanges);
export const build = series(clean, parallel(styles, images, copy, scripts), pot);
export default dev;