import gulp from 'gulp';
import sass from 'gulp-sass';
import sourcemaps from 'gulp-sourcemaps';
import postcss from 'gulp-postcss';
import notify from 'gulp-notify';
import pump from 'pump';
import tildeImporter from 'node-sass-tilde-importer';
import { scssFiles, assets, dist, isProd, successMessage } from '../index';

const task = 'sass';

const postcssPlugins = [
	require( 'postcss-preset-env' )( {
		stage: 3,
		autoprefixer: {
			grid: true,
		},
	} ),
];

if ( isProd ) {
	postcssPlugins.push(
		require( 'cssnano' )( {
			autoprefixer: false,
			calc: {
				precision: 8,
			},
			colormin: true,
			convertValues: true,
			cssDeclarationSorter: true,
			discardComments: true,
			discardEmpty: true,
			discardOverridden: true,
			mergeLonghand: true,
			mergeRules: true,
			minifyFontValues: true,
			minifyGradients: true,
			minifyParams: true,
			minifySelectors: true,
			normalizeCharset: true,
			normalizePositions: true,
			normalizeRepeatStyle: true,
			normalizeString: true,
			normalizeTimingFunctions: true,
			normalizeUnicode: true,
			normalizeUrl: true,
			normalizeWhitespace: true,
			orderedValues: true,
			reduceTransforms: true,
			svgo: true,
			uniqueSelectors: true,
			zindex: false,
		} ),
	);
}

gulp.task( task, cb => {
	const fileSrc = [
		...scssFiles.map( file => `${ assets }/scss/${ file }/${ file }.scss` ),
		`${ assets }/scss/blocks/blocks-editor.scss`,
	];

	pump(
		[
			gulp.src( fileSrc ),
			sourcemaps.init( { loadMaps: true } ),
			sass( { importer: tildeImporter } ).on( 'error', sass.logError ),
			postcss( postcssPlugins ),
			sourcemaps.write( './', {
				mapFile: function( mapFilePath ) {
					return isProd
						? mapFilePath.replace( '.css.map', '.min.css.map' )
						: mapFilePath;
				},
			} ),
			gulp.dest( `${ dist }/css` ),
			notify( { message: successMessage( task ), onLast: true } ),
		],
		cb,
	);
} );
