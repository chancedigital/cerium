import gulp from 'gulp';
import cssnano from 'gulp-cssnano';
import rename from 'gulp-rename';
import sourcemaps from 'gulp-sourcemaps';
import pump from 'pump';
import filter from 'gulp-filter';
import { dist } from '../gulp.settings.babel';

// import livereload from 'gulp-livereload';

gulp.task( 'cssnano', cb => {
	const fileDest = `${ dist }/css`,
		fileSrc = [ `${ dist }/css/*.css` ],
		taskOpts = [
			cssnano( {
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
		];

	pump(
		[
			gulp.src( fileSrc ),
			sourcemaps.init( {
				loadMaps: true,
			} ),
			cssnano( taskOpts ),
			rename( function( path ) {
				path.extname = '.min.css';
			} ),
			sourcemaps.write( './' ),
			gulp.dest( fileDest ),
			filter( '**/*.css' ),

			// livereload(),
		],
		cb,
	);
} );
